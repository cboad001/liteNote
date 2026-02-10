<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Note extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    //
    protected $fillable = ['user_id', 'title', 'text',
        'uuid',
        'notebook_id'
    ];
    public function getRouteKeyName(){
        return 'uuid';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function notebook(){
        return $this->belongsTo(Notebook::class);
    }
}
