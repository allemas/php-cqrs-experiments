<?php

/*
 * SynchPlayerCommandHandler.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Command;

use Deggolok\Application\Domain\Player\Entity\Player;
use Deggolok\Application\Domain\Player\Entity\PlayerRepositoryInterface;
use Deggolok\Application\Service\Configurator\Configurator;
use Deggolok\Application\Service\OgameAPI\PlayerClient;
use Deggolok\Bus\Command\CommandHandlerInterface;
use Deggolok\Bus\Command\CommandInterface;
use \Deggolok\Application\Service\OgameAPI\Parser\Player as PlayerParser;

class SynchPlayerCommandHandler implements CommandHandlerInterface
{
    /** @var PlayerRepositoryInterface */
    private $repository;


    /**
     * @var Configurator[]
     */
    private $configurators = array();

    public function __construct(array $configurators, PlayerRepositoryInterface $repository)
    {
        $this->configurators = $configurators;
        $this->repository = $repository;
    }

    /**
     * @param CommandInterface $command
     */
    public function handle(CommandInterface $command)
    {
        foreach ($this->configurators as $configurator) {

            $apiPlayer = PlayerParser::parseList(PlayerClient::fetch($configurator->getSystem("player")));

            foreach ($apiPlayer as $key => $player) {
                $player = $this->repository->findByOgameId($key);
                if (!$player) {
                    $player = new Player($key, $player["name"]);

                    $this->repository->create($player, ["label_universe" => $configurator->getSystem("universe")]);

                }
            }


        }

    }
}