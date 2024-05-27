<?php

namespace Database\Seeders;

use App\Models\Timezone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimezonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timezones = [
            ['name' => '(GMT) Monrovia, Reykjavik', 'value' => 'Africa/Abidjan'],
            ['name' => '(GMT+03:00) Nairobi', 'value' => 'Africa/Addis_Ababa'],
            ['name' => '(GMT+01:00) West Central Africa', 'value' => 'Africa/Algiers'],
            ['name' => '(GMT+02:00) Harare, Pretoria', 'value' => 'Africa/Blantyre'],
            ['name' => '(GMT+02:00) Cairo', 'value' => 'Africa/Cairo'],
            ['name' => '(GMT+01:00) Windhoek', 'value' => 'Africa/Windhoek'],
            ['name' => '(GMT-10:00) Hawaii-Aleutian', 'value' => 'America/Adak'],
            ['name' => '(GMT-09:00) Alaska', 'value' => 'America/Anchorage'],
            ['name' => '(GMT-03:00) UTC-3', 'value' => 'America/Araguaina'],
            ['name' => '(GMT-03:00) Buenos Aires', 'value' => 'America/Argentina/Buenos_Aires'],
            ['name' => '(GMT-06:00) Saskatchewan, Central America', 'value' => 'America/Belize'],
            ['name' => '(GMT-05:00) Bogota, Lima, Quito, Rio Branco', 'value' => 'America/Bogota'],
            ['name' => '(GMT-04:00) Campo Grande', 'value' => 'America/Campo_Grande'],
            ['name' => '(GMT-06:00) Guadalajara, Mexico City, Monterrey', 'value' => 'America/Cancun'],
            ['name' => '(GMT-04:30) Caracas', 'value' => 'America/Caracas'],
            ['name' => '(GMT-06:00) Central Time (US & Canada)', 'value' => 'America/Chicago'],
            ['name' => '(GMT-07:00) Chihuahua, La Paz, Mazatlan', 'value' => 'America/Chihuahua'],
            ['name' => '(GMT-07:00) Arizona', 'value' => 'America/Dawson_Creek'],
            ['name' => '(GMT-07:00) Mountain Time (US & Canada)', 'value' => 'America/Denver'],
            ['name' => '(GMT-08:00) Tijuana, Baja California', 'value' => 'America/Ensenada'],
            ['name' => '(GMT-04:00) Atlantic Time (Canada)', 'value' => 'America/Glace_Bay'],
            ['name' => '(GMT-03:00) Greenland', 'value' => 'America/Godthab'],
            ['name' => '(GMT-04:00) Atlantic Time (Goose Bay)', 'value' => 'America/Goose_Bay'],
            ['name' => '(GMT-05:00) Cuba', 'value' => 'America/Havana'],
            ['name' => '(GMT-04:00) La Paz', 'value' => 'America/La_Paz'],
            ['name' => '(GMT-08:00) Pacific Time (US & Canada)', 'value' => 'America/Los_Angeles'],
            ['name' => '(GMT-03:00) Miquelon, St. Pierre', 'value' => 'America/Miquelon'],
            ['name' => '(GMT-03:00) Montevideo', 'value' => 'America/Montevideo'],
            ['name' => '(GMT-05:00) Eastern Time (US & Canada)', 'value' => 'America/New_York'],
            ['name' => '(GMT-02:00) Mid-Atlantic', 'value' => 'America/Noronha'],
            ['name' => '(GMT-04:00) Santiago', 'value' => 'America/Santiago'],
            ['name' => '(GMT-03:00) Brasilia', 'value' => 'America/Sao_Paulo'],
            ['name' => '(GMT-03:30) Newfoundland', 'value' => 'America/St_Johns'],
            ['name' => '(GMT+12:00) Anadyr, Kamchatka', 'value' => 'Asia/Anadyr'],
            ['name' => '(GMT+07:00) Bangkok, Hanoi, Jakarta', 'value' => 'Asia/Bangkok'],
            ['name' => '(GMT+02:00) Beirut', 'value' => 'Asia/Beirut'],
            ['name' => '(GMT+02:00) Syria', 'value' => 'Asia/Damascus'],
            ['name' => '(GMT+06:00) Astana, Dhaka', 'value' => 'Asia/Dhaka'],
            ['name' => '(GMT+04:00) Abu Dhabi, Muscat', 'value' => 'Asia/Dubai'],
            ['name' => '(GMT+02:00) Gaza', 'value' => 'Asia/Gaza'],
            ['name' => '(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi', 'value' => 'Asia/Hong_Kong'],
            ['name' => '(GMT+08:00) Irkutsk, Ulaan Bataar', 'value' => 'Asia/Irkutsk'],
            ['name' => '(GMT+02:00) Jerusalem', 'value' => 'Asia/Jerusalem'],
            ['name' => '(GMT+04:30) Kabul', 'value' => 'Asia/Kabul'],
            ['name' => '(GMT+05:45) Kathmandu', 'value' => 'Asia/Katmandu'],
            ['name' => '(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi', 'value' => 'Asia/Kolkata'],
            ['name' => '(GMT+07:00) Krasnoyarsk', 'value' => 'Asia/Krasnoyarsk'],
            ['name' => '(GMT+11:00) Magadan', 'value' => 'Asia/Magadan'],
            ['name' => '(GMT+06:00) Novosibirsk', 'value' => 'Asia/Novosibirsk'],
            ['name' => '(GMT+06:30) Yangon (Rangoon)', 'value' => 'Asia/Rangoon'],
            ['name' => '(GMT+09:00) Seoul', 'value' => 'Asia/Seoul'],
            ['name' => '(GMT+05:00) Tashkent', 'value' => 'Asia/Tashkent'],
            ['name' => '(GMT+03:30) Tehran', 'value' => 'Asia/Tehran'],
            ['name' => '(GMT+09:00) Osaka, Sapporo, Tokyo', 'value' => 'Asia/Tokyo'],
            ['name' => '(GMT+10:00) Vladivostok', 'value' => 'Asia/Vladivostok'],
            ['name' => '(GMT+09:00) Yakutsk', 'value' => 'Asia/Yakutsk'],
            ['name' => '(GMT+05:00) Ekaterinburg', 'value' => 'Asia/Yekaterinburg'],
            ['name' => '(GMT+04:00) Yerevan', 'value' => 'Asia/Yerevan'],
            ['name' => '(GMT-01:00) Azores', 'value' => 'Atlantic/Azores'],
            ['name' => '(GMT-01:00) Cape Verde Is.', 'value' => 'Atlantic/Cape_Verde'],
            ['name' => '(GMT-04:00) Faukland Islands', 'value' => 'Atlantic/Stanley'],
            ['name' => '(GMT+09:30) Adelaide', 'value' => 'Australia/Adelaide'],
            ['name' => '(GMT+10:00) Brisbane', 'value' => 'Australia/Brisbane'],
            ['name' => '(GMT+09:30) Darwin', 'value' => 'Australia/Darwin'],
            ['name' => '(GMT+08:45) Eucla', 'value' => 'Australia/Eucla'],
            ['name' => '(GMT+10:00) Hobart', 'value' => 'Australia/Hobart'],
            ['name' => '(GMT+10:30) Lord Howe Island', 'value' => 'Australia/Lord_Howe'],
            ['name' => '(GMT+08:00) Perth', 'value' => 'Australia/Perth'],
            ['name' => '(GMT-06:00) Easter Island', 'value' => 'Chile/EasterIsland'],
            ['name' => '(GMT+11:00) Solomon Is., New Caledonia', 'value' => 'Etc/GMT-11'],
            ['name' => '(GMT+12:00) Fiji, Kamchatka, Marshall Is.', 'value' => 'Etc/GMT-12'],
            ['name' => '(GMT-10:00) Hawaii', 'value' => 'Etc/GMT+10'],
            ['name' => '(GMT-08:00) Pitcairn Islands', 'value' => 'Etc/GMT+8'],
            ['name' => '(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna', 'value' => 'Europe/Amsterdam'],
            ['name' => '(GMT) Greenwich Mean Time : Belfast', 'value' => 'Europe/Belfast'],
            ['name' => '(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague', 'value' => 'Europe/Belgrade'],
            ['name' => '(GMT+01:00) Brussels, Copenhagen, Madrid, Paris', 'value' => 'Europe/Brussels'],
            ['name' => '(GMT) Greenwich Mean Time : Dublin', 'value' => 'Europe/Dublin'],
            ['name' => '(GMT) Greenwich Mean Time : Lisbon', 'value' => 'Europe/Lisbon'],
            ['name' => '(GMT) Greenwich Mean Time : London', 'value' => 'Europe/London'],
            ['name' => '(GMT+02:00) Minsk', 'value' => 'Europe/Minsk'],
            ['name' => '(GMT+03:00) Moscow, St. Petersburg, Volgograd', 'value' => 'Europe/Moscow'],
            ['name' => '(GMT+12:00) Auckland, Wellington', 'value' => 'Pacific/Auckland'],
            ['name' => '(GMT+12:45) Chatham Islands', 'value' => 'Pacific/Chatham'],
            ['name' => '(GMT-09:00) Gambier Islands', 'value' => 'Pacific/Gambier'],
            ['name' => '(GMT+14:00) Kiritimati', 'value' => 'Pacific/Kiritimati'],
            ['name' => '(GMT-09:30) Marquesas Islands', 'value' => 'Pacific/Marquesas'],
            ['name' => '(GMT-11:00) Midway Island, Samoa', 'value' => 'Pacific/Midway'],
            ['name' => '(GMT+11:30) Norfolk Island', 'value' => 'Pacific/Norfolk'],
            ['name' => '(GMT+13:00) Nuku\'alofa', 'value' => 'Pacific/Tongatapu'],
        ];

        foreach ($timezones as $timezone) {
            Timezone::create($timezone);
        }
    }
}
