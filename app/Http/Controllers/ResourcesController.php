<?php

namespace App\Http\Controllers;

use App\Game\DatabaseGame;
use App\Models\Building;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResourcesController extends Controller
{
    private $game, $village;

    public function __construct()
    {
        $this->game = new DatabaseGame();
        $this->village = new Village();
    }

    public function index()
    {
        $coordinates = [
            1 => "180,80,28", "269,81,28", "338,93,28", "122,119,28", "235,132,28", "292,139,28",
            "377,137,28", "62,170,28", "143,171,28", "333,171,28", "420,171,28", "70,231,28",
            "143,221,28", "279,257,28", "401,226,28", "174,311,28", "265,316,28", "355,293,28"
        ];

        $coorarray = [
            1 => "left:180px; top:80px;",
            2 => "left:269px; top:81px;",
            3 => "left:338px; top:93px;",
            4 => "left:122px; top:119px;",
            5 => "left:235px; top:132px;",
            6 => "left:292px; top:139px;",
            7 => "left:377px; top:137px;",
            8 => "left:62px; top:170px;",
            9 => "left:143px; top:171px;",
            10 => "left:333px; top:171px;",
            11 => "left:420px; top:171px;",
            12 => "left:70px; top:231px;",
            13 => "left:143px; top:221px;",
            14 => "left:279px; top:257px;",
            15 => "left:401px; top:226px;",
            16 => "left:174px; top:311px;",
            17 => "left:265px; top:316px;",
            18 => "left:355px; top:293px;",
        ];

        $buildings = [];

        for ($i = 1; $i <= 18; $i++) {
            $buildingType = $this->village->resarray->{"f{$i}t"};

            if ($buildingType != 0) {
                $loopsame = Building::isCurrent($i) ? 1 : 0;
                $doublebuild = ($loopsame > 0 && Building::isLoop($i)) ? 1 : 0;
                $level = $this->village->resarray->{"f{$i}"} + ($loopsame > 0 ? 2 : 1) + $doublebuild;
                $maxLevelClass = ($level == 20) ? 'maxLevel' : '';
                $underConstruction = $this->game->getBuildingByField(session()->get('world_id'), $i);

                $buildings[] = [
                    'id' => $i,
                    'coords' => $coordinates[$i],
                    'title' => 'Loading...',
                    'level' => $level,
                    'maxLevelClass' => $maxLevelClass,
                    'underConstruction' => $underConstruction,
                ];
            }
        }

        return view('resources', compact('buildings', 'coorarray'));
    }
}
