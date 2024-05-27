<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            //Seo
            ['key' => 'server_name', 'value' => 'Laravian'],
            ['key' => 'meta_keywords', 'value' => ''],
            ['key' => 'meta_description', 'value' => ''],
            ['key' => 'analytics', 'value' => ''],
            //////////////////////////////
            ['key' => 'server_url', 'value' => url('/')],
            ['key' => 'lang', 'value' => 'en'],
            ['key' => 'speed', 'value' => 200],
            ['key' => 'world_max', 'value' => 50],
            ['key' => 'gp_location', 'value' => 'https://cdn.laravian.dev/'],
            ['key' => 'roundlenght', 'value' => 7],
            ['key' => 'increase', 'value' => 50],
            ['key' => 'heroattrspeed', 'value' => 2],
            ['key' => 'itemattrspeed', 'value' => 3],
            ['key' => 'demolish_lvl', 'value' => 10],
            ['key' => 'taskmaster', 'value' => 1],
            ['key' => 'minprotecttime', 'value' => 259200],
            ['key' => 'maxprotecttime', 'value' => 1209600],
            ['key' => 'auctiontime', 'value' => 3600],
            ['key' => 'ww', 'value' => 1],
            ['key' => 'auth_email', 'value' => 0],
            ['key' => 'plus_time', 'value' => 604800],
            ['key' => 'plus_prodtime', 'value' => 604800],
            ['key' => 'great_wks', 'value' => 0],
            ['key' => 'ts_threshold', 'value' => 20],
            ['key' => 'log_build', 'value' => 1],
            ['key' => 'log_tech', 'value' => 1],
            ['key' => 'log_login', 'value' => 1],
            ['key' => 'log_gold', 'value' => 1],
            ['key' => 'log_admin', 'value' => 1],
            ['key' => 'log_war', 'value' => 1],
            ['key' => 'log_market', 'value' => 1],
            ['key' => 'log_illegal', 'value' => 1],
            ['key' => 'news_box1', 'value' => 0],
            ['key' => 'news_box2', 'value' => 0],
            ['key' => 'news_box3', 'value' => 0],
            ['key' => 'admin_email', 'value' => 'admin@laravian.com'],
            ['key' => 'natars_max', 'value' => 22.1],
            ['key' => 'medalinterval', 'value' => 86400],
            ['key' => 'lastgavemedal', 'value' => 1623110687],
            ['key' => 'commence', 'value' => 1623109786],
            ['key' => 'storagemultiplier', 'value' => 1],
            ['key' => 'secsig', 'value' => '123123'],
            ['key' => 'winmoment', 'value' => 0],
            ['key' => 'stats_lasttime', 'value' => 1623161046],
            ['key' => 'stats_time', 'value' => 21600],
            ['key' => 'minimap_time', 'value' => 1623169883],
            ['key' => 'checkall_time', 'value' => 3600],
            ['key' => 'last_checkall', 'value' => 1623169883],
            ['key' => 'freegold_time', 'value' => 86400],
            ['key' => 'freegold_lasttime', 'value' => 1623109786]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
