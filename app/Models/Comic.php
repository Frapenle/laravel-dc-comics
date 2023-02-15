<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//add soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use HasFactory;

    //add soft delete
    use SoftDeletes;


    protected $fillable = array('title', 'description', 'thumb', 'price', 'series', 'sale_date', 'type');
}
