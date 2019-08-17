<?php

/*
 * UniverseAnalyser.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Services\Analyser;


use Deggolok\Db\PlayersRepository;
use Deggolok\Domain\Player\Player;

class UniverseAnalyser
{
    public function analyserStatusPlayers(array $universes)
    {

        foreach ($universes as $univers) {
            $db = new PlayersRepository($univers->name);

            /** @var $player Player */
            foreach ($univers->players as $player) {
                if ($result = $db->findById($player->getId()))
                {



                    var_dump($result);
                }else{
                    $db->insert($player->__toArray());
                }
            }
        }
    }
}


