<?php

/*
 * SynchPlayerCommandHandler.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Players\Command;


use Deggolok\Bus\Handler\CommandHandlerInterface;
use Deggolok\Command\CommandInterface;
use Deggolok\Domain\Entity\Player;
use Deggolok\Domain\Entity\PlayerRepositoryInterface;
use Deggolok\Services\OgameApi\PlayersClient;
use Deggolok\Services\Parsers\Players;

class SynchPlayerCommandHandler implements CommandHandlerInterface
{
    /** @var PlayerRepositoryInterface */
    private $repository;

    public function __construct(PlayerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CommandInterface $command
     */
    public function handle(CommandInterface $command)
    {
        $ogameApiPlayers = Players::parseList(PlayersClient::fetch($command->configurator->getSystem("player")));

        foreach ($ogameApiPlayers as $key => $player) {
            $player = $this->repository->findByOgameId($key);
            if (!$player) {
                $player = new Player($key, $player["name"], $command->configurator->getSystem("universe"));
                $this->repository->create($player);
            }
        }
    }
}