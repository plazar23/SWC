<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id', 'sender_id', 'content',
    ];

    // Each message belongs to a conversation
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    // Each message has a sender (a user)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
