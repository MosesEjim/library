<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function borrower(){
        return $this->hasOne('App\Models\User', 'id', 'borrower_id');
    }

    
}
