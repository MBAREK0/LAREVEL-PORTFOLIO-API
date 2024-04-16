<?php
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'chakirlatifa2001@gmail.com',
            'password' => bcrypt('chakirlatifa2001@gmail.com'),
        ]);
    }
}
