<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'GamerPro69',
            'email' => 'gamerpro69@gmail.com',
            'password' => bcrypt('Pass1234'),
            'description' => 'Играю в Dota 2 уже более 5 лет, ищу команду для участия в турнирах и казуальных матчах.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'IT',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'MinecraftAddict',
            'email' => 'minecraftaddict@hotmail.com',
            'password' => bcrypt('Minecraft2023'),
            'description' => 'Играю в Minecraft уже много лет, ищу компанию для совместной игры и создания новых проектов.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'BY',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'GTA5Master',
            'email' => 'gta5master@gmail.com',
            'password' => bcrypt('GTAV123'),
            'description' => 'Играл в GTA V на PS4, теперь перешел на PC. Ищу людей для участия в онлайн-сессиях и совместной игры в режиме «выживание».',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'RU',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'FortniteFanatic',
            'email' => 'fortnitefanatic@yahoo.com',
            'password' => bcrypt('Fort12345'),
            'description' => 'Играю в Fortnite уже более 3 лет, участвовал в нескольких соревнованиях. Ищу людей для создания сильной команды и побед в битвах роялей.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'RU',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'LoLChampion',
            'email' => 'lolchampion@gmail.com',
            'password' => bcrypt('League123'),
            'description' => 'Играл в League of Legends на высоком уровне, ищу сильных партнеров для игры в режиме соревновательной игры и участия в турнирах.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'KZ',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'CS:GOPro',
            'email' => 'csgopro@gmail.com',
            'password' => bcrypt('CSGO456'),
            'description' => 'Играю в CS:GO уже более 5 лет, имею опыт участия в турнирах и игре на профессиональном уровне. Ищу команду для совместной игры и достижения высоких результатов.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'RU',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'ValorantAce',
            'email' => 'valorantace@hotmail.com',
            'password' => bcrypt('Valorant2023'),
            'description' => 'Играл в Valorant в бета-версии и продолжаю играть в релизной версии. Ищу команду для участия в турнирах и достижения высоких результатов.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'BY',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'RobloxMaster',
            'email' => 'robloxmaster@gmail.com',
            'password' => bcrypt('Roblox2023'),
            'description' => 'Играю в Roblox уже более 4 лет, имею опыт создания собственных игровых уровней и проектов. Ищу компанию для совместной игры и создания новых проектов.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'CN',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'FIFA23Champ',
            'email' => 'fifa23champ@yahoo.com',
            'password' => bcrypt('FIFA2345'),
            'description' => 'Играю в FIFA уже много лет, имею опыт участия в онлайн-турнирах и игре на профессиональном уровне. Ищу партнеров для совместной игры и участия в турнирах.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'RU',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'OverwatchPro',
            'email' => 'overwatchpro@hotmail.com',
            'password' => bcrypt('OW456'),
            'description' => 'Играю в Overwatch уже более 2 лет, имею опыт игры на высоком уровне и участия в турнирах. Ищу команду для совместной игры и достижения высоких результатов.',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'DE',
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'ytre',
            'email' => 'kvaskowal@gmail.com',
            'password' => bcrypt('1234'),
            'description' => 'основной аккаунт разработчика',
            'avatar' => 'public/storage/avatars/base_avatar.jpeg',
            'country' => 'RU',
            'role_id' => 2,
            'status_id' => 2,
            'created_at' => now(),
        ]);
    }
}
