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


use Deggolok\Application\Domain\Player\ValueObject\PlayerApi;
use Deggolok\Application\Service\OgameAPI\Parser\Player as PlayerParser;
use Deggolok\Application\Service\OgameAPI\PlayerClient;
use Deggolok\Bus\Query\QueryHandlerInterface;
use Deggolok\Bus\Query\QueryInterface;

class PlayersStateApiQueryHandler implements QueryHandlerInterface
{

    public function handle(QueryInterface $query)
    {
        $responseArray = array();
        $apiPlayers = PlayerParser::parseList(PlayerClient::fetch($query->getEndpoints("player")));

        foreach ($apiPlayers as $key => $player) {
            $responseArray[$key] = new PlayerApi($key, $player["name"], $player["status"], $player["aliance"]);
        }
        return $responseArray;
    }
}