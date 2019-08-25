<?php

/*
 * getPlayersStates.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Query;

use Deggolok\Bus\Query\QueryInterface;

class PlayersStateApiQuery implements QueryInterface
{

    /**
     * API endpoints array
     */
    private $endpoints;


    public function __construct($endpoints)
    {
        $this->endpoints = $endpoints;
    }

    public function getEndpoints($label)
    {
        if ($label != null) {
            return isset($this->endpoints[$label]) ? $this->endpoints[$label] : null;
        }
    }

    public function __toString()
    {
        return __CLASS__;
    }
}