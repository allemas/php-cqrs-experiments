<?php

/*
 * UpdateStatusCommandHandler.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Command;

use Deggolok\Application\Domain\Player\Entity\Player;
use Deggolok\Application\Domain\Player\Entity\PlayerRepositoryInterface;
use Deggolok\Application\Domain\Player\ValueObject\Name;
use Deggolok\Application\Service\Configurator\Configurator;
use Deggolok\Application\Service\OgameAPI\Parser\Player as PlayerParser;
use Deggolok\Application\Service\OgameAPI\PlayerClient;
use Deggolok\Bus\Command\CommandHandlerInterface;
use Deggolok\Bus\Command\CommandInterface;

class UpdateStatusCommandHandler implements CommandHandlerInterface
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

    public function handle(CommandInterface $command)
    {
        foreach ($this->configurators as $configurator) {
            $apiPlayers = PlayerParser::parseList(PlayerClient::fetch($configurator->getSystem("player")));
            $eventChanged = array();
            foreach ($apiPlayers as $key => $apiPlayer) {
                $player = $this->repository->findByOgameId($key, $configurator->getSystem("universe"));

                if (new Name($apiPlayer["name"]) != $player->getName()) {
                    print "new name " . $player->getName();
                    print "\n";
                }
                if (new Name($apiPlayer["status"]) != $player->getStatus()) {
                    print "new status " . $player->getStatus();
                    print "\n";

                }

            }
        }
    }


}