<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['taskName']; // this is basically the items which the model will allow to go on and pass inside the database
    public $timestamps = false;
}
