<?php

/*
 * QueryHandlerInterface.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Query;


interface QueryHandlerInterface
{

    public function handle(QueryInterface $command);

}