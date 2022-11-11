<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyLibrarian;
use App\Mail\NotifyReader;
use App\Models\Book;
use App\Models\User;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

     public function get_overdue_books(){
        return Book::where('checked_out', true)
                ->get()
                ->filter(function($book){
                            // checking if book is overdue with a global helper function
                            remaining_time($book) < 0;
                });
     }

     public function get_soon_to_be_overdue_books(){
        return Book::where('checked_out', true)
        ->get()
        ->filter(function($book){
                    // check if we have two days left
                    remaining_time($book) == 2;
        });
     }

    protected function schedule(Schedule $schedule)
    {
        $librarian_email = User::where('role', 'librarian')->first();
        $schedule->call(function () {
            $overdue_books = get_overdue_books();
            foreach($overdue_books as $book){
                Mail::to($librarian_email)->send(new NotifyLibrarian($book));
            }
            
        })->everyMinute();

        $schedule->call(function () {
            $soon_overdue_books = get_soon_to_be_overdue_books();
            foreach($soon_overdue_books as $book){
                Mail::to($book->borrower->email)->send(new NotifyReader($book));
            }
          
        })->everyMinute();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
