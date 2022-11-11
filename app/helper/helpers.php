<?php
function remaining_time($book){
    $check_out_date = date_create($book->checkout_date);
    $due_date = date_create($book->checkout_date);
    date_add($due_date, date_interval_create_from_date_string("10 days"));
    $time_remaining = date_diff(new DateTime(), $due_date);
    $time_remaining = $time_remaining->format("%R%a");

     return intval($time_remaining);
}

?>