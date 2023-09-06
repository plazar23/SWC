<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'conversation_id',
    ];

    // Each participation belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Each participation belongs to a conversation
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}