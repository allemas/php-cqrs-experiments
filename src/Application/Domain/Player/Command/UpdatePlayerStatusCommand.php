<?php

/*
 * UpdatePlayerStatus.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Command;


use Deggolok\Bus\Command\CommandInterface;

class UpdatePlayerStatusCommand implements CommandInterface
{
    private $players = array();
    private $universe;

    /**
     * SynchPlayerCommand constructor.
     * @param array $playerList
     */
    public function __construct(array $playerList, $universe)
    {
        $this->players = $playerList;
        $this->universe = $universe;
    }

    public function getUniverse()
    {
        return $this->universe;
    }


    public function getPlayers()
    {
        return $this->players;
    }


    public function __toString()
    {
        return __CLASS__;
    }
}