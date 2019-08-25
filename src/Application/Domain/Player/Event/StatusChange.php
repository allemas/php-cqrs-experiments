<?php

/*
 * StatusChange.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Event;


use Deggolok\Bus\Event\EventInterface;

class StatusChange implements EventInterface
{
    public $aggregat;
    public $playerAPI;

    public function __construct($aggregat, $playerAPI)
    {
        $this->aggregat = $aggregat;
        $this->playerAPI = $playerAPI;
    }

    public static function withValue($player, $apiPlayer)
    {
        return new StatusChange($player, $apiPlayer);
    }
}