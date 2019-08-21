<?php

/*
 * QueryBus.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Query;


interface QueryBusInterface
{
    public function handle(QueryInterface $query);

    public function register($commandName, QueryHandlerInterface $handler);

    public function getHandler(QueryInterface $query);

}