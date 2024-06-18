<?php

namespace App\View\Components;

use App\Game\DatabaseGame;
use Closure;
use Dflydev\DotAccessData\Data;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class MultiVillageLayout extends Component
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

    }

    public static function multi(Request $request, DatabaseGame $game)
    {
        $user = User::findOrFail($request->session()->get('user_id'));

        $total_vill = count($user->villages);
        $village_attack = [];
        $village_title = [];

        foreach ($user->villages as $village) {
            // Lógica para definir se há ataques no vilarejo $village
            $vm['v31'] = $game->getMovement(3, $village->wid, 1); // Exemplo de uso de getMovement
            if (!is_array($vm['v31'])) {
                $vm['v31'] = array();
            }

            // Lógica para buscar oásis e verificar ataques
            $oasats = $game->getVillageOasis(['extra' => 'distance<4.9497474683058326708059105347339'], 30, ['by' => 'distance', 'x' => $village->x, 'y' => $village->y, 'max' => 2 * WORLD_MAX + 1]);
            foreach ($oasats as $os) {
                if ($os['owner'] == $user->id) {
                    $vm['o31'] = $game->getMovement(3, $os['wref'], 1);
                    if (!is_array($vm['o31'])) {
                        $vm['o31'] = array();
                    }
                }
            }
            $waveser = array_merge($vm['v31'], $vm['o31']);
            $waveCountW = count($waveser);
            for ($ixx = 0; $ixx < $waveCountW; $ixx++) {
                if ($ixx >= 0 && $waveser[$ixx]['attack_type'] <= 2) {
                    $waveCountW -= 1;
                    array_splice($waveser, $ixx, 1);
                    $ixx--;
                }
            }

            if ($waveCountW > 0) {
                $village_attack[$village->id] = 'att1';
                $village_title[$village->id] = 'attacks on this village: ' . $aantal; // Defina $aantal conforme necessário
            } else {
                $village_attack[$village->id] = '';
                $village_title[$village->id] = htmlspecialchars($village->name);
            }
        }

        return view('villages.index', [
            'user' => $user,
            'villages' => $user->villages,
            'village_attack' => $village_attack,
            'village_title' => $village_title,
        ]);
    }
}
