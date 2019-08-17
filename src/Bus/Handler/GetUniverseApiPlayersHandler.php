<?php

/*
 * GetUniverseApiPlayersHandler.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Handler;


use Deggolok\Command\CommandInterface;
use Deggolok\Services\OgameApi\PlayersClient;

class GetUniverseApiPlayersHandler implements CommandHandlerInterface
{

    public function handle(CommandInterface $command)
    {
        $configurator = $command->configurator;
        $serviceApi = new PlayersClient();

        return $serviceApi::fetch($configurator->getSystem("player"));


    }
}