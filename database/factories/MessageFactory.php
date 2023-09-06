<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'content' => $this->faker->paragraph,
            'sender_id' => \App\Models\User::factory(),
            'conversation_id' => \App\Models\Conversation::factory(),
        ];
    }
}