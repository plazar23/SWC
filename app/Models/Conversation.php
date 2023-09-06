<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
    ];

    // A conversation has many participants (users)
    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants');
    }

    // A conversation has many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}