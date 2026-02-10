<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notebook extends Model
{
    //
//    public mixed $id;
    protected $fillable = ['name', 'user_id'];

    use HasFactory, Notifiable;


    public function notes(){

        return $this->belongsToMany(Note::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

