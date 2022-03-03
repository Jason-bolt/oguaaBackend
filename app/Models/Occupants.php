<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupants extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'other_name', 'last_name', 'contact', 'program', 'level', 'index_number', 'room_number', 'image'];
}
