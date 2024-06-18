<?php

namespace App\View\Components;

use App\Game\DatabaseGame;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AllianceLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return null;
    }

    public static function alliance()
    {
        $allianceID = session()->get('alliance');
        $database = new DatabaseGame();
        return $database->getAlliance($allianceID);
    }
}
