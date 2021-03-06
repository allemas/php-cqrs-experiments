<?php

/*
 * NewPlayer.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Event;


use Deggolok\Application\Domain\Player\ValueObject\PlayerApi;
use Deggolok\Bus\Event\EventInterface;

class NewPlayer implements EventInterface
{
    public $players = array();

    public function addPlayer(PlayerApi $playerApi)
    {
        $this->players[] = $playerApi;
    }

    static function withValues(array $players)
    {
        $event = new NewPlayer();
        $event->players = $players;
        return $event;
    }


    public static function listenTo()
    {
        // TODO: Implement listenTo() method.
    }
}