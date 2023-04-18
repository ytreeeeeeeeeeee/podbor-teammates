<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Request::factory()->create([
            'title' => 'Ищу тиммейтов для Apex Legends',
            'description' => 'Играю на ПК, ищу сильных и опытных игроков, готовых сражаться в рейтинговых играх.',
            'game_id' => 1,
            'author_id' => 3,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Нужны тиммейты для игры на высоком уровне',
            'description' => 'Играю в Dota 2 уже несколько лет и ищу игроков, готовых играть на высоком уровне и участвовать в соревнованиях.',
            'game_id' => 2,
            'author_id' => 1,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для постройки города',
            'description' => 'Я люблю играть в Minecraft и хочу создать огромный город, для этого ищу тиммейтов, которые помогут мне в этом труде.',
            'game_id' => 3,
            'author_id' => 5,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для рейсинга',
            'description' => 'Ищу тиммейтов, чтобы участвовать в рейсингах и побеждать соперников в многопользовательском режиме игры.',
            'game_id' => 4,
            'author_id' => 8,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Нужны тиммейты для соревнований',
            'description' => 'Хочу поучаствовать в соревнованиях Fortnite и ищу тиммейтов, чтобы совместными усилиями добиться победы.',
            'game_id' => 5,
            'author_id' => 4,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для клана',
            'description' => 'Ищу тиммейтов, чтобы создать клан в League of Legends и совместными усилиями добиваться успехов в игре.',
            'game_id' => 6,
            'author_id' => 5,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для соревнований',
            'description' => 'Ищу тиммейтов, чтобы участвовать в соревнованиях по CS:GO и добиться победы.',
            'game_id' => 7,
            'author_id' => 6,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для командного рейтинга',
            'description' => 'Ищу тиммейтов, чтобы играть в командном режиме Valorant и достигать высоких рейтинговых показателей.',
            'game_id' => 8,
            'author_id' => 7,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для онлайн-чемпионата',
            'description' => 'Ищу тиммейтов, чтобы участвовать в онлайн-чемпионате FIFA 23 и побеждать сильнейших соперников.',
            'game_id' => 9,
            'author_id' => 8,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу команду для совместной игры в Overwatch 2',
            'description' => 'Я опытный игрок в Overwatch и ищу команду для регулярных игр и участия в турнирах. Я играю за многих персонажей и готов адаптироваться под стратегию команды.',
            'game_id' => 12,
            'author_id' => 10,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для выживания в Minecraft',
            'description' => 'Я ищу других игроков, которые хотят играть в выживание в Minecraft вместе со мной. Я хотел бы создать крепость и победить Дракона Края, и я ищу тиммейтов, которые готовы присоединиться ко мне в этом приключении.',
            'game_id' => 3,
            'author_id' => 2,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу команду для совместной игры в CS:GO',
            'description' => 'Я опытный игрок в CS:GO и ищу команду для регулярных игр и участия в турнирах. Я играю за многих персонажей и готов адаптироваться под стратегию команды.',
            'game_id' => 7,
            'author_id' => 3,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для совместной игры в FIFA 23',
            'description' => 'Я ищу тиммейтов для регулярных игр в FIFA 23. Я играю на PS5 и предпочитаю играть в онлайн-режиме. Если вы хотите играть вместе со мной, давайте создадим свою команду и начнем играть!',
            'game_id' => 9,
            'author_id' => 8,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу команду для совместной игры в Rainbow Six Siege',
            'description' => 'Я ищу команду для совместной игры в Rainbow Six Siege. Я играю на PC и предпочитаю играть в режиме соревновательной игры. Я готов играть за любой класс персонажей и адаптироваться под стратегию команды.',
            'game_id' => 14,
            'author_id' => 5,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для выживания в Rust',
            'description' => 'Я ищу других игроков, которые хотят играть в выживание в Rust вместе со мной. Я хотел бы создать базу и выжить в этом опасном мире. Я готов работать в команде и делиться ресурсами.',
            'game_id' => 16,
            'author_id' => 11,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для игры в режиме капитанов',
            'description' => 'Здравствуйте! Я ищу опытных игроков Dota 2, чтобы собрать команду и играть в режиме капитанов. Я предпочитаю играть за поддержку, но могу адаптироваться к любой роли. Если вы готовы сосредоточиться на командной игре и улучшении своих навыков, свяжитесь со мной!',
            'game_id' => 2,
            'author_id' => 11,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для игры в режиме "королевская битва"',
            'description' => 'Привет всем! Я ищу тиммейтов для игры в режиме "королевская битва" в Fortnite. Мне нужны игроки, которые умеют стрелять и быстро принимать решения в динамичной игре. Если вы хотите сыграть вместе и победить, свяжитесь со мной!',
            'game_id' => 5,
            'author_id' => 8,
            'created_at' => now(),
        ]);

        Request::factory()->create([
            'title' => 'Ищу тиммейтов для игры в режиме "боевая арена"',
            'description' => 'Здравствуйте! Я ищу тиммейтов для игры в режиме "боевая арена" в League of Legends. Я играю за мага и мне нужны игроки, которые могут защищать меня и работать в команде. Если вы хотите попробовать свои силы в командной игре и улучшить свои навыки, свяжитесь со мной!',
            'game_id' => 6,
            'author_id' => 9,
            'created_at' => now(),
        ]);
    }
}
