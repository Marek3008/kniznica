<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "kniha";
    protected $guarded = [];
    protected $primaryKey = "isbn";

    public $timestamps = false;
}
