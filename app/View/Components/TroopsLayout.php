<?php

namespace App\View\Components;

use App\Models\Enforcement;
use App\Models\Unit;
use App\Models\Village;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class TroopsLayout extends Component
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
    public function render(): View|Closure|string
    {
        return view('components.troops-layout');
    }

    public static function showTroops()
    {
        $units = [];
        $village = DB::table('villages')->select('id')->where('world_id', session('world_id'));

        self::addUnitsToCollection($units, Unit::where('world_id', session('world_id'))->first());

        // Lógica para buscar unidades de reforço
        $enforcements = Enforcement::where('to_world_id', session('world_id'))->get();
        foreach ($enforcements as $enforcement) {
            self::addUnitsToCollection($units, $enforcement);
        }

        return $units;
    }

    private static function addUnitsToCollection(&$units, $row)
    {
        for ($i = 1; $i <= 50; ++$i) {
            if (!$row['u' . $i]) {
                continue;
            }
            if (!isset($units[$i])) {
                $units[$i] = 0;
            }
            $units[$i] += $row['u' . $i];
        }
        if ($row['hero']) {
            if (!isset($units['hero'])) {
                $units['hero'] = 0;
            }
            $units['hero'] += $row['hero'];
        }
    }
}
