<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class
CreateUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-admin';

    protected $description = 'Command description';

    public function handle(): void
    {
        $email =  "admin@admin2.com";
        $password = bcrypt('root');

        User::factory()->create([
            'role' => 1,
            'name' => 'Админ',
            'surname' => 'Админов',
            'patronymic' => 'Админович',
            'email' => $email,
            'password' => $password,
        ]);

        $this->info("Пользователь создан! Пароль: $password. Email: $email");
    }
}

