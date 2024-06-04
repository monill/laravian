<?php

namespace App\Http\Controllers;

use App\Game\DatabaseGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivateController extends Controller
{
    public function index()
    {
        return view('activate.index');
    }

    public function store(Request $request, DatabaseGame $game)
    {
        $character = $request->input('character');
        $sector =  $request->input('sector');

        $tribes = [
            'romans' => 1,
            'teutons' => 2,
            'gauls' => 3
        ];
        $tribe = $tribes[$character];

        $user = Auth::user();

        if (empty($user['tribe_id'])) {
            $this->generateBase($sector, $user->id, $user->username, $game);
            $game->setTribe($tribe, $user->id);
            $game->addHero($user->id);
            $game->addHeroFace($user->id);
            $game->modifyUnit($game->getVFH($user->id), 'hero', 1, 1);
            for ($s = 1; $s <= 3; $s++) {
                $game->addAdventure($game->getVFH($user->id), $user->id);
            }
            $game->modifyGold($user->id, 40, 1);
            $currentTimestamp = time();
            $minProtectTime = setting('minprotecttime');
            DB::table('users')->where('id', $user->id)->update([
                'protect' => $currentTimestamp + ($minProtectTime * 2),
                'plus' => $currentTimestamp + 21600
            ]);
            DB::table('user_settings')->insert(['user_id' => $user->id]);

//        $this->message->sendWelcome($user->id, $user->username);
        }

        return redirect()->intended(route('resources', absolute: true));
    }

    protected function generateBase($coordinate, $userID, $username, $game)
    {
        $coordinateMap = [
            'random' => 0,
            'sw' => 1,
            'se' => 2,
            'ne' => 3,
            'nw' => 4,
        ];
        $sector = $coordinateMap[$coordinate];

        $worlID = $game->generateBase($sector);

        $game->setFieldTaken($worlID);
        $game->addVillage($worlID, $userID, $username, 1);
        $game->addResourceFields($worlID, $game->getVillageType($worlID));
        $game->addUnits($worlID);
        $game->addTech($worlID);
        $game->addABTech($worlID);
        $game->updateUserField($userID, 'access', 2, 0);
    }
}
