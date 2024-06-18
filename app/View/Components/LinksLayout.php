<?php

namespace App\View\Components;

use App\Game\DatabaseGame;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinksLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }

    public function render()
    {

    }

    public static function links()
    {
        $game = new DatabaseGame();
        return $game->getLinks(auth()->user()->id);
    }

    public static function timestamp()
    {
        $game = new DatabaseGame();
        return $game->isDeleting(auth()->user()->id);
    }
}
