<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::factory()->create([
            'title' => 'Apex Legends',
            'image' => 'https://thumbs.dreamstime.com/b/apex-legends-logo-illustration-video-game-along-its-name-144082430.jpg',
        ]);

        Game::factory()->create([
            'title' => 'Dota 2',
            'image' => 'data:image/jpeg;base64,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',
        ]);

        Game::factory()->create([
            'title' => 'Minecraft',
            'image' => 'https://thumbs.dreamstime.com/b/minecraft-logo-online-game-dirt-block-illustrations-concept-design-isolated-186775550.jpg',
        ]);

        Game::factory()->create([
            'title' => 'Grand Theft Auto V',
            'image' => 'https://i.pinimg.com/originals/9a/77/db/9a77db0d3793bb8c4170658776d948c8.jpg',
        ]);

        Game::factory()->create([
            'title' => 'Fortnite',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Fortnite_F_lettermark_logo.png',
        ]);

        Game::factory()->create([
            'title' => 'League of Legends',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/LoL_icon.svg/2048px-LoL_icon.svg.png',
        ]);

        Game::factory()->create([
            'title' => 'Counter-Strike: Global Offensive',
            'image' => 'https://avatars.mds.yandex.net/i?id=81b921f3279836ab789c43fd96551fb5d9a7f391-5876175-images-thumbs&n=13',
        ]);

        Game::factory()->create([
            'title' => 'Valorant',
            'image' => 'https://seeklogo.com/images/V/valorant-logo-FAB2CA0E55-seeklogo.com.png',
        ]);

        Game::factory()->create([
            'title' => 'FIFA 23',
            'image' => 'https://brandlogos.net/wp-content/uploads/2022/09/fifa_23-logo_brandlogos.net_mw1xe.png',
        ]);

        Game::factory()->create([
            'title' => 'Roblox',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/7/7e/Roblox_Logo_2022.jpg',
        ]);

        Game::factory()->create([
            'title' => 'Hearthstone',
            'image' => 'https://play-lh.googleusercontent.com/qTt7JkhZ-U0kevENyTChyUijNUEctA3T5fh7cm8yzKUG0UAnMUgOMpG_9Ln7D24NbQ',
        ]);

        Game::factory()->create([
            'title' => 'Overwatch 2',
            'image' => 'https://sm.ign.com/ign_ap/cover/o/overwatch-/overwatch-2_bybr.jpg',
        ]);

        Game::factory()->create([
            'title' => 'Rocket League',
            'image' => 'https://store.playstation.com/store/api/chihiro/00_09_000/container/US/en/99/UP2002-NPUB31645_00-UAROCKETLE000011/0/image?_version=00_09_000&platform=chihiro&bg_color=000000&opacity=100&w=720&h=720',
        ]);

        Game::factory()->create([
            'title' => 'Tom Clancy`s Rainbow Six Siege',
            'image' => 'https://i.pinimg.com/originals/8c/c4/92/8cc492be438c76b99371d691d23cff8f.jpg',
        ]);

        Game::factory()->create([
            'title' => 'Assassin`s Creed Valhalla',
            'image' => 'https://seeklogo.com//images/A/assassin-s-creed-valhalla-logo-458602C18D-seeklogo.com.png',
        ]);

        Game::factory()->create([
            'title' => 'Rust',
            'image' => 'data:image/jpeg;base64,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',
        ]);

        Game::factory()->create([
            'title' => 'Deceit',
            'image' => 'https://steamuserimages-a.akamaihd.net/ugc/945076811364221027/B202F0BCDB981B0C0CCD15BB591DF9CA0D69DBB1/?imw=512&imh=512&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true',
        ]);

        Game::factory()->create([
            'title' => 'PUBG',
            'image' => 'https://www.freepnglogos.com/uploads/pubg-png/pubg-png-playerunknown-battlegrounds-windows-central-0.png',
        ]);
    }
}
