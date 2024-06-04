<?php

namespace App\Http\Controllers;

use App\Game\DatabaseGame;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    private $game;

    public function __construct()
    {
        $this->game = new DatabaseGame();
    }

    public function index()
    {
        $countmsg = count($this->game->getMessage(auth()->user()->id, 12));
        $unmsg = $countmsg >= 1 ? $countmsg : $countmsg;
        $countnot = $this->game->getNotice5(auth()->user()->id);
        $unnotice = $countnot >= 1 ? $countnot : $countnot;

        //resources
        $coorarray = array(1 => "180,80,28", "269,81,28", "338,93,28", "122,119,28", "235,132,28", "292,139,28", "377,137,28", "62,170,28", "143,171,28", "333,171,28", "420,171,28", "70,231,28", "143,221,28", "279,257,28", "401,226,28", "174,311,28", "265,316,28", "355,293,28");

        for ($i = 1; $i <= 18; $i++) {
            $loopsame = $building->isCurrent($i) ? 1 : 0;
            if ($loopsame > 0 && $building->isLoop($i)) {
                $doublebuild = 1;
            }
            $lev = $village->resarray["f" . $i] + ($loopsame > 0 ? 2 : 1) + $doublebuild;
            $uprequire = $building->resourceRequired($i, $village->resarray["f" . $i . "t"], ($loopsame > 0 ? 2 : 1) + $doublebuild);
            $t = $_SESSION["wid"];
            $lvl = $lev - 1;
            echo "<area id=\"BuildStatus" . $i . "\" href=\"build.php?id=$i\" coords=\"$coorarray[$i]\" shape=\"circle\" title=\"" . LOADING . "\"/>";
        }

        return view('resources');
    }
}
