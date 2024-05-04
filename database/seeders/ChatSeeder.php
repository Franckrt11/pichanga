<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chat::insert([
            [
                'last_message' => 'Hola amigo',
                'last_sender' => 'user',
                'user_id' => 1,
                'company_id' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
        ]);

        ChatMessage::insert([
            [
                'message' => 'Hola amigo',
                'sender' => 'user',
                'attach' => NULL,
                'chat_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
