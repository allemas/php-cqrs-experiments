<?php

/*
 * ConstructUniverseHandler.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Handler;


use Deggolok\Command\CommandInterface;
use Deggolok\Domain\ValueObject\Player;
use Deggolok\Domain\ValueObject\Universe;
use Deggolok\Services\OgameApi\EconomyPlayersClient;
use Deggolok\Services\OgameApi\PlayersClient;
use Deggolok\Services\Parsers\HighscoreParser;
use Deggolok\Services\Parsers\Players as PlayerParser;

class ConstructUniverseHandler implements CommandHandlerInterface
{
    /**
     * @var PlayersClient
     */
    private $playerApiService;


    public function __construct()
    {
        $this->playerApiService = new PlayersClient();
    }

    private function getPlayersList($configurator)
    {
        return PlayerParser::parseList($this->playerApiService::fetch($configurator->getSystem("player")));
    }


    public function handle(CommandInterface $command)
    {
        $configurator = $command->configurator;

        $unvierse = new Universe($configurator->getSystem("universe"));




        $highscore = HighscoreParser::parseToArray(EconomyPlayersClient::fetch($configurator->getSystem("score")));
        $unvierse->players = $this->getPlayersList($configurator);
        foreach ($unvierse->players as $player) {
            if (array_key_exists($player->getId(), $highscore)) {
                print $player->getName() . ' : ' . $highscore[$player->getId()]["score"]. "\n";
            }

        }

        return $unvierse;
    }
}