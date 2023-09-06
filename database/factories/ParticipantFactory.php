<?php

namespace Database\Factories;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    protected $model = Participant::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'conversation_id' => \App\Models\Conversation::factory(),
            'created_at'=> $this->faker->dateTimeThisYear(),
        ];
    }
}