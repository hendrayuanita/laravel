<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // protected $table = 'tasks'; 
    //protected $fillable = []; //untuk menentukan field apa saja yg akan di isikan
    protected $guarded = []; //menentukan field apa saja yg tidak boleh di isikan
}
