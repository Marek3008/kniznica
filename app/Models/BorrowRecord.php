<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowRecord extends Model
{
    use HasFactory;

    protected $table = "vypozicka";
    public $guarded = ["id"];
    public $timestamps = false;

    public function book(){
        return $this->belongsTo(Book::class, 'kniha');
    }

    public function reader(){
        return $this->belongsTo(Reader::class, 'citatel_id');
    }

    public function fine(){
        return $this->hasOne(Fine::class, 'vypozicka_id');
    }
}
