<?php

namespace Database\Seeders;

use App\Game\DatabaseGame;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $game = new DatabaseGame();

        echo "Setting..... \n";
        $this->setting();
        echo "Create World..... \n";
        $this->createWorld();
        echo "Create Multihunter..... \n";
        $this->createMultihunter($game);
        echo "Create Oasis..... \n";
        $this->createOasis($game);
        echo "Finished..... \n";
    }

    public function setting()
    {
        $datas = [
            "servername" => "Travian",
            "speed" => "200",
            "roundlenght" => "7",
            "incspeed" => "50",
            "heroattrspeed" => "2",
            "itemattrspeed" => "3",
            "world_max" => "25",
            "natars_max" => "22.1",
            "reg_open" => "1",
            "server_url" => "http://laravian.tt",
            "storagemultiplier" => "2",
            "minprotecttime" => "43200",
            "maxprotecttime" => "604800",
            "plus_time" => "43200",
            "plus_production" => "43200",
            "auction_time" => "3600",
            "ts_threshold" => "20",
            "medalinterval" => "43200",
            "great_wks" => "1",
            "ww" => "1",
            "peace" => "0",
            "newsbox1" => "0",
            "newsbox2" => "0",
            "newsbox3" => "0",
            "log_build" => "0",
            "log_tech" => "0",
            "log_login" => "0",
            "log_gold" => "0",
            "log_admin" => "0",
            "log_users" => "0",
            "log_war" => "0",
            "log_market" => "0",
            "log_illegal" => "0",
            "lastgavemedal" => null,
            "winmoment" => "0",
            "stats_lasttime" => "1717331909",
            "minimap_time" => "1717331909",
            "last_checkall" => "1717331909",
            "freegold_lasttime" => "1717331909",
            "checkall_time" => "3600",
            "commence" => "1717331909",
            "check_db" => "3600",
            "stats_time" => "21600",
            "taskmaster" => "1",
            "auth_email" => "0",
            "limit_mailbox" => "0",
            "max_mails" => "30",
            "timeout" => "30",
            "autodel" => "0",
            "autodeltime" => "864000",
            "demolish_lvl" => "10",
            "village_expand" => "0",
        ];

        foreach ($datas as $key => $value) {
            Setting::create(['key' => $key, 'value' => $value]);
        }

    }

    public function createWorld()
    {
        $world_max = setting('world_max');
        $natars_max = setting('natars_max');

        for ($y = $world_max; $y >= -$world_max; $y--) {
            for ($x = -$world_max; $x <= $world_max; $x++) {
                if (abs($x) <= 2 && abs($y) <= 2 && ($x != 0 || $y != 0)) {
                    $field_type = 3;
                } else {
                    $random = random_int(1, 1000);
                    if ($random <= 900) {
                        $field_type = ceil($random / 80);
                        $oasis_type = 0;
                    } else {
                        $distance = sqrt(($x * $x) + ($y * $y));
                        if ($distance <= $natars_max) {
                            $oasis_type = min(12, ceil(($random - 900) / 8));
                        } else {
                            $oasis_type = min(12, ceil(($random - 900) / 12) + 3);
                        }
                        $field_type = 0;
                    }
                }

                $image = match ($oasis_type) {
                    1, 2, 3 => 'forest' . random_int(0, 5),
                    4, 5, 6 => 'clay' . random_int(0, 7),
                    7, 8, 9 => 'hill' . random_int(0, 6),
                    10, 11, 12 => 'lake' . random_int(0, 7),
                    default => 'grassland' . random_int(0, 11),
                };

                DB::table('worlds')->insert([
                    'field_type' => $field_type,
                    'oasis_type' => $oasis_type,
                    'x' => $x,
                    'y' => $y,
                    'is_occupied' => 0,
                    'image' => "{$image}.png"
                ]);
            }
        }
    }

    public function createMultihunter($game)
    {
        $password = '123456789';

        $this->insertUsers($password);
        $this->setupVillages($game->getWref(1, 0), 4, 'Multihunter', 1, $game);
        $this->setupVillages($game->getWref(0, 0), 2, '1', 0, $game);

        $speed = setting('speed');
        $speed = $speed > 5 ? 5 : $speed;

        $this->updateUnits($game->getWref(0, 0), $speed);

        for ($i = 1; $i <= 13; $i++) {
            $nareadis = setting('natars_max');
            do {
                $x = rand(3, intval(floor($nareadis)));
                if (rand(1, 10) > 5) $x = $x * -1;
                $y = rand(3, intval(floor($nareadis)));
                if (rand(1, 10) > 5) $y = $y * -1;
                $dis = sqrt(($x * $x) + ($y * $y));
                $villageID = $game->getWref($x, $y);
                $status = $game->getVillageState($villageID);
            } while (($dis > $nareadis) || $status != 0);

            $this->setupVillages($villageID, 2, 'Natars', 1, $game);
            $this->updateNatars($villageID, $speed);
        }
    }

    protected function insertUsers($password)
    {
        $users = [
            ['tribe_id' => 1, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Support', 'email' => 'support@laravian.com', 'password' => bcrypt($password), 'access' => 8, 'desc1' => '[#support]', 'quest' => 25],
            ['tribe_id' => 5, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Natars', 'email' => 'natars@laravian.com', 'password' => bcrypt($password), 'access' => 8, 'desc1' => '[#natars]', 'quest' => 25],
            ['tribe_id' => 4, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Nature', 'email' => 'nature@laravian.com', 'password' => bcrypt($password), 'access' => 2, 'desc1' => '[#nature]', 'quest' => 25],
            ['tribe_id' => 1, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Multihunter', 'email' => 'multihunter@laravian.com', 'password' => bcrypt($password), 'access' => 9, 'desc1' => '[#multihunter]', 'quest' => 25],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }

    protected function setupVillages($worldid, $userid, $username, $capital, $game)
    {
        $status = $game->getVillageState($worldid);
        if ($status == false) {
            $game->setFieldTaken($worldid);
            $game->addVillage($worldid, $userid, $username, $capital);
            $game->addResourceFields($worldid, $game->getVillageType($worldid));
            $game->addUnits($worldid);
            $game->addTech($worldid);
            $game->addABTech($worldid);
        }
    }

    protected function updateUnits($worldID, $speed)
    {
        DB::table('villages')->where('world_id', $worldID)->update(['population' => 781]);
        DB::table('units')->where('world_id', $worldID)->update([
            'u41' => (94700 * $speed),
            'u42' => (295231 * $speed),
            'u43' => (180747 * $speed),
            'u44' => (1048 * $speed),
            'u45' => (364401 * $speed),
            'u46' => (217602 * $speed),
            'u47' => (2034 * $speed),
            'u48' => (1040 * $speed),
            'u49' => 1,
            'u50' => 9
        ]);
    }

    protected function updateNatars($worldID, $speed)
    {
        DB::table('villages')->where('world_id', $worldID)->update([
            'population' => 238,
            'natar' => 1,
            'name' => 'WW Village',
            'is_capital' => 0
        ]);
        DB::table('units')->where('world_id', $worldID)->update([
            'u41' => (random_int(1000, 2000) * $speed),
            'u42' => (random_int(1500, 2000) * $speed),
            'u43' => (random_int(2300, 2800) * $speed),
            'u44' => (random_int(235, 575) * $speed),
            'u45' => (random_int(1200, 1900) * $speed),
            'u46' => (random_int(1500, 2000) * $speed),
            'u47' => (random_int(500, 900) * $speed),
            'u48' => (random_int(100, 300) * $speed),
            'u49' => (random_int(1, 5) * $speed),
            'u50' => (random_int(1, 5) * $speed)
        ]);
        DB::table('fields')->where('world_id', $worldID)->update([
            'f22t' => 27, 'f22' => 10, 'f28t' => 25, 'f28' => 10, 'f19t' => 23, 'f19' => 10, 'f99t' => 40,
            'f26' => 0, 'f26t' => 0, 'f21' => 1, 'f21t' => 15, 'f39' => 1, 'f39t' => 16
        ]);
    }

    public function createOasis($game)
    {
        $worlds = DB::table('worlds')->select('id')->where('oasis_type', '!=', 0)->get();

        $this->populateOasisData($game, $worlds);
        $this->populateOasis($game, $worlds);
        $this->populateOasisUnitsLow($game, $worlds);

        return redirect('install/completed');
    }

    protected function populateOasisData($game, $worlds)
    {
        $speed = setting('speed');

        foreach ($worlds as $world) {
            $time = time();
            $base = $game->getOMInfo($world->id);

            $data = [
                'world_id' => $base->id,
                'user_id' => 3,
                'type' => $base->oasis_type,
                'is_conquered' => 0,
                'wood' => 750 * $speed / 10,
                'iron' => 750 * $speed / 10,
                'clay' => 750 * $speed / 10,
                'crop' => 750 * $speed / 10,
                'max_storage' => 800 * $speed / 10,
                'max_crop' => 800 * $speed / 10,
                'loyalty' => 100,
                'last_train' => $time,
                'last_farmed' => $time,
                'last_updated' => $time
            ];
            DB::table('oases')->insert($data);
        }
    }

    protected function populateOasis($game, $worlds)
    {
        foreach ($worlds as $world) {
            $game->addUnits($world->id);
        }
    }

    protected function populateOasisUnitsLow($game, $worlds)
    {
        foreach ($worlds as $world) {
            $base = $game->getMInfo($world->id);
            $oasisValues = $this->generateOasisValues($base->oasis_type);
            DB::table('units')->where(['world_id' => $world->id])->update($oasisValues);
        }
    }

    protected function generateOasisValues($oasisType)
    {
        $speed = setting('speed');
        return match ($oasisType) {
            1, 2 => [
                'u35' => intval(random_int(5, 30) * ($speed / 10)),
                'u36' => intval(random_int(5, 30) * ($speed / 10)),
                'u37' => intval(random_int(0, 30) * ($speed / 10))
            ],
            3 => [
                'u35' => intval(random_int(5, 30) * ($speed / 10)),
                'u36' => intval(random_int(5, 30) * ($speed / 10)),
                'u37' => intval(random_int(1, 30) * ($speed / 10)),
                'u39' => intval(random_int(0, 10) * ($speed / 10)),
                'u40' => intval(random_int(0, 20) == 1 ? random_int(0, 31) * ($speed / 10) : 0)
            ],
            4, 5 => [
                'u31' => intval(random_int(5, 40) * ($speed / 10)),
                'u32' => intval(random_int(5, 30) * ($speed / 10)),
                'u35' => intval(random_int(0, 25) * ($speed / 10))
            ],
            6 => [
                'u31' => intval(random_int(5, 40) * ($speed / 10)),
                'u32' => intval(random_int(5, 30) * ($speed / 10)),
                'u35' => intval(random_int(1, 25) * ($speed / 10)),
                'u38' => intval(random_int(0, 15) * ($speed / 10)),
                'u40' => intval(random_int(0, 20) == 1 ? random_int(0, 31) * ($speed / 10) : 0)
            ],
            7, 8 => [
                'u31' => intval(random_int(5, 40) * ($speed / 10)),
                'u32' => intval(random_int(5, 30) * ($speed / 10)),
                'u34' => intval(random_int(0, 25) * ($speed / 10))
            ],
            9 => [
                'u31' => intval(random_int(5, 40) * ($speed / 10)),
                'u32' => intval(random_int(5, 30) * ($speed / 10)),
                'u34' => intval(random_int(1, 25) * ($speed / 10)),
                'u37' => intval(random_int(0, 15) * ($speed / 10)),
                'u40' => intval(random_int(0, 20) == 1 ? random_int(0, 31) * ($speed / 10) : 0)
            ],
            10, 11 => [
                'u31' => intval(random_int(5, 40) * ($speed / 10)),
                'u33' => intval(random_int(5, 30) * ($speed / 10)),
                'u37' => intval(random_int(1, 25) * ($speed / 10)),
                'u39' => intval(random_int(0, 25) * ($speed / 10))
            ],
            12 => [
                'u31' => intval(random_int(5, 40) * ($speed / 10)),
                'u33' => intval(random_int(5, 30) * ($speed / 10)),
                'u38' => intval(random_int(1, 25) * ($speed / 10)),
                'u39' => intval(random_int(0, 25) * ($speed / 10)),
                'u40' => intval(random_int(0, 20) == 1 ? random_int(0, 31) * ($speed / 10) : 0)
            ]
        };
    }
}
