<?php

namespace App\Http\Controllers;

use App\Game\DatabaseGame;
use App\Http\Requests\InstallationRequest;
use App\Models\Setting;
use App\Models\User;
use Exception;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\BufferedOutput;

class InstallController extends Controller
{
    private $env;
    private $envExample;

    public function __construct()
    {
        $this->env = base_path('.env');
        $this->envExample = base_path('.env.example');
    }

    public function duplicateEnv()
    {
        if (!file_exists($this->env)) {
            if (file_exists($this->envExample)) {
                copy($this->envExample, $this->env);
            } else {
                touch($this->env);
            }
        }
        return file_get_contents($this->env);
    }

    public function index()
    {
        return view('install.index');
    }

    public function requirements()
    {
        $extensions = ['BCMath', 'Ctype', 'Fileinfo', 'JSON', 'Mbstring', 'OpenSSL', 'PDO', 'pdo_mysql', 'Tokenizer', 'XML', 'cURL', 'GD'];
        $phpversion = version_compare(PHP_VERSION, '8.1', '>=');
        return view('install.requirements', compact('extensions', 'phpversion'));
    }

    public function permissions()
    {
        $folders = [
            '/bootstrap/cache',
            '/storage',
            '/storage/app',
            '/storage/framework/',
            '/storage/logs'
        ];

        return view('install.permissions', compact('folders'));
    }

    public function environment()
    {
        return view('install.environment');
    }

    public function environmentSave(InstallationRequest $request)
    {
        $validator = $request->validated();

        if ($validator->fails()) {
            return redirect('install/environment')->withErrors($validator)->withInput();
        }

        $this->duplicateEnv();

        $results = $this->saveFileWizard($request);

        return redirect()->route('install.environment')->with(['results' => $results]);
    }

    private function checkDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
            return 'Database Connection Success!';
        } catch (\Exception $e) {
            return 'Database Connection Failed!';
        }
    }

    public function saveFileWizard(Request $request)
    {
        $results = 'Your .env file settings have been saved.';

        $datas = [
            'APP_NAME' => $request->app_name,
            'APP_ENV' => $request->environment,
            'APP_DEBUG' => $request->app_debug,
            'APP_URL' => $request->app_url,
            'DB_CONNECTION' => $request->database_connection,
            'DB_HOST' => $request->database_hostname,
            'DB_PORT' => $request->database_port,
            'DB_DATABASE' => $request->database_name,
            'DB_USERNAME' => $request->database_username,
            'DB_PASSWORD' => $request->database_password,
            'MAIL_MAILER' => $request->mail_driver,
            'MAIL_HOST' => $request->mail_host,
            'MAIL_PORT' => $request->mail_port,
            'MAIL_USERNAME' => $request->mail_username,
            'MAIL_PASSWORD' => $request->mail_password,
            'MAIL_ENCRYPTION' => $request->mail_encryption,
        ];

        $envContent = '';
        foreach ($datas as $key => $value) {
            $envContent .= "{$key}={$value}\n";
        }

        try {
            file_put_contents($this->env, $envContent);
        } catch (\Exception $e) {
            $results = 'Unable to save the .env file, Please create it manually.';
        }

        return $results;
    }

    public function database()
    {
        $result = $this->checkDatabaseConnection();
        return view('install.database', compact('result'));
    }

    public function databaseSave()
    {
        $results = $this->migrateAndSeed();
        return redirect()->route('install.migration')->with(['results' => $results]);
    }

    public function migration()
    {
        return view('install.migration');
    }

    public function migrateAndSeed()
    {
        $outputLog = new BufferedOutput;
        $this->sqlite($outputLog);
        return $this->migrate($outputLog);
    }

    private function migrate(BufferedOutput $outputLog)
    {
        try {
            Artisan::call('migrate', ['--force' => true], $outputLog);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 'error', $outputLog);
        }
        return $this->seed($outputLog);
    }

    private function seed(BufferedOutput $outputLog)
    {
        try {
            Artisan::call('db:seed', ['--force' => true], $outputLog);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 'error', $outputLog);
        }
        return $this->response('Finished', 'success', $outputLog);
    }

    private function response($message, $status, BufferedOutput $outputLog)
    {
        return [
            'status' => $status,
            'message' => $message,
            'dbOutputLog' => $outputLog->fetch(),
        ];
    }

    private function sqlite(BufferedOutput $outputLog)
    {
        if (DB::connection() instanceof SQLiteConnection) {
            $database = DB::connection()->getDatabaseName();
            if (!file_exists($database)) {
                touch($database);
            }
            $outputLog->write('Using SqlLite database: ' . $database, 1);
        }
    }

    public function config()
    {
        return view('install.config');
    }

    public function configSave(Request $request)
    {
        $datas = $request->except(['_token']);
        foreach ($datas as $key => $value) {
            Setting::create(['key' => $key, 'value' => $value]);
        }
        return redirect('install/world');
    }

    public function world()
    {
        return view('install.world');
    }

    public function worldSave()
    {
        set_time_limit(0);
        error_reporting(0);

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

        return redirect('install/multihunter');
    }

    public function multihunter()
    {
        return view('install.multihunter');
    }

    public function multihunterSave(Request $request, DatabaseGame $game)
    {
        $password = $request->input('mhpwd');

        if (empty($password)) {
            $password = md5_gen();
        }

        $this->insertUsers($password);

        $this->setupVillages($game->getWref(1, 0), 4, 'Multihunter', 1, $game);
        $worldID2 = $game->getWref(0, 0);
        $this->setupVillages($worldID2, 2, '1', 0, $game);

        $speed = setting('speed');
        $speed = $speed > 5 ? 5 : $speed;

        $this->updateUnits($worldID2, $speed);

        for ($i = 1; $i <= 13; $i++) {
            $nareadis = setting('natars_max');
            do {
                $x = rand(3, intval(floor($nareadis)));
                if (rand(1, 10) > 5) $x = $x * -1;
                $y = rand(3, intval(floor($nareadis)));
                if (rand(1, 10) > 5) $y = $y * -1;
                $dis = sqrt(($x * $x) + ($y * $y));
                $worldID = $game->getWref($x, $y);
                $status = $game->getVillageState($worldID);
            } while (($dis > $nareadis) || $status != 0);

            $this->setupVillages($worldID, 2, 'Natars', 1, $game);
            $this->updateNatars($worldID, $speed);
        }

        return redirect('install/oasis');
    }

    protected function insertUsers($password)
    {
        $users = [
            ['tribe_id' => 1, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Support', 'email' => 'support@laravian.com', 'password' => bcrypt($password), 'access' => 8, 'desc1' => '[#support]', 'quest' => 25],
            ['tribe_id' => 5, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Natars', 'email' => 'natars@laravian.com', 'password' => bcrypt($password), 'access' => 8, 'desc1' => '[#natars]', 'quest' => 25, 'fquest' => 35],
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

    public function oasis()
    {
        return view('install.oasis');
    }

    public function oasisSave(DatabaseGame $game)
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

    public function completed()
    {
        $outputLog = new BufferedOutput;

        $this->generateKey($outputLog);
        $this->publishVendorAssets($outputLog);
        $this->runFinal();
        $this->installed();

        return view('install/completed');
    }

    private function runFinal()
    {
        $outputLog = new BufferedOutput;

        $this->generateKey($outputLog);
        $this->publishVendorAssets($outputLog);

        return $outputLog->fetch();
    }

    private function generateKey(BufferedOutput $outputLog)
    {
        try {
            if (config('installer.final.key')) {
                Artisan::call('key:generate', ['--force' => true], $outputLog);
            }
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 'error', $outputLog);
        }
        return $outputLog;
    }

    private function publishVendorAssets(BufferedOutput $outputLog)
    {
        try {
            if (config('installer.final.publish')) {
                Artisan::call('vendor:publish', ['--all' => true], $outputLog);
            }
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 'error', $outputLog);
        }
        return $outputLog;
    }

    public function installed()
    {
        $installedFile = storage_path('installed');

        $dateStamp = date('Y/m/d h:i:sa');

        if (!file_exists($installedFile)) {
            $message = "Laravel Installer successfully INSTALLED on {$dateStamp} \n";
            file_put_contents($installedFile, $message);
        } else {
            $message = "Laravel Installer successfully UPDATED on {$dateStamp}";
            file_put_contents($installedFile, $message . PHP_EOL, FILE_APPEND | LOCK_EX);
        }
        return $message;
    }
}
