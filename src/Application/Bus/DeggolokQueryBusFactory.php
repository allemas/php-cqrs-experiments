<?php

/*
 * DeggolokQueryBusFactory.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Bus;


use Deggolok\Application\Domain\Player\Query\PlayersStateApiQuery;
use Deggolok\Application\Domain\Player\Query\PlayersStateApiQueryHandler;
use Deggolok\Bus\Query\QueryBus;

class DeggolokQueryBusFactory
{
    /**
     * @return QueryBus
     * @throws \Exception
     *
     *
     * @todo injection client ogameAPI
     */
    static function get()
    {
        $bus = new QueryBus();
        $bus->register(PlayersStateApiQuery::class, new PlayersStateApiQueryHandler());


        return $bus;
    }
}