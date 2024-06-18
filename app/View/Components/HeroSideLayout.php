<?php

namespace App\View\Components;

use App\Game\DatabaseGame;
use App\Models\Hero;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class HeroSideLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }

    public function render()
    {
        return null;
    }

    public static function hero()
    {
        $game = new DatabaseGame();

        $userID = auth()->user()->id;
        $hero_levels = Hero::heroLevels();
        $hero = $game->getHeroData($userID);

        $dead = false;

        if ($game->getHeroData2($userID)) {
            if ($game->getHeroInVillid($userID, 1)) {
                $villswref = $game->getHeroInVillid($userID, 1);
            }
            $vm['v90'] = $game->getMovement(9, session('world_id'), 0);
            if (!is_array($vm['v90'])) {
                $vm['v90'] = [];
            }
            if (count($vm['v90']) > 0) {
                $statusInfoText = ' Adventure';
                $image = 100;
            } else {
                $statusInfoText = ' The hero is in the village';
                $image = 100;
            }
        } else {
            $dead = true;
            $statusInfoText = 'The hero is not alive';
            $image = 101;
        }

        if (!$statusInfoText) {
            if ($villswref) {
                $statusInfoText = $villswref;
            } else {
                $adventures = $game->getMovement(9, session('world_id'), 0);
                $image = 9;
                if ($adventures) {
                    $statusInfoText = 'On the move';
                } elseif ($game->getMovement(4, session('world_id'), 1)) {
                    $statusInfoText = 'Returning';
                } else {
                    $statusInfoText = 'Your hero is not in the village';
                }
            }
        }

        $health = $hero->health;
        $color = match ($health) {
            $health <= 10 => '#F00',
            $health <= 25 => '#F0B300',
            $health <= 50 => '#FFFF00',
            $health <= 90 => '#99C01A',
            default => '#006900',
        };

        $adventure = DB::table('adventures')->select('id')->where('end', 0)->where('user_id', $userID)->count();

        $heroXpBar = '';

        if ($hero->level < 100 && $hero->level >= 1) {
            $heroXpBar = round(100 * ($hero->experience - $hero_levels[$hero->level - 1]) / ($hero_levels[$hero->level] - $hero_levels[$hero->level - 1]));
        }

        return [
            'hero' => $hero,
            'dead' => $dead,
            'image' => $image,
            'color' => $color,
            'adventure' => $adventure,
            'status' => $statusInfoText,
            'heroXP' => $heroXpBar
        ];
    }
}
