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
use Deggolok\Application\Domain\Player\Event\NewPlayer;
use Deggolok\Application\Domain\Player\ValueObject\Name;
use Deggolok\Application\Service\Configurator\Configurator;
use Deggolok\Application\Service\OgameAPI\PlayerClient;
use Deggolok\Bus\Command\CommandHandlerInterface;
use Deggolok\Bus\Command\CommandInterface;
use \Deggolok\Application\Service\OgameAPI\Parser\Player as PlayerParser;
use Deggolok\Bus\Command\CommandResponse;

class SynchPlayerCommandHandler implements CommandHandlerInterface
{
    /** @var PlayerRepositoryInterface */
    private $repository;


    /**
     * @var Configurator[]
     */
    private $configurators = array();

    public function __construct(PlayerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CommandInterface $command
     * @return CommandResponse
     */
    public function handle(CommandInterface $command): CommandResponse
    {

        $newPlayers = array();

        foreach ($command->getPlayers() as $ogameId => $player) {
            $agregat = $this->repository->findByOgameId($ogameId, $command->getUniverse());
            if (!$agregat) {
                $newPlayers[] = $player;
                $this->repository->create(Player::withValue($player), ["label_universe" => $command->getUniverse()]);
            }

        }

        if (count($newPlayers) > 0) {
            return CommandResponse::withValue(true, NewPlayer::withValues($newPlayers));
        }
        return CommandResponse::withValue(true);

    }

    public function listenTo()
    {
        return SynchPlayerCommand::class;
    }
}