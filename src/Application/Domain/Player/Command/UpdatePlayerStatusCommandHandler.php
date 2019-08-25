<?php

/*
 * UpdatePlayerStatusCommandHandler.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Command;


use Deggolok\Application\Domain\Player\Entity\PlayerRepositoryInterface;
use Deggolok\Application\Domain\Player\Event\StatusChange;
use Deggolok\Bus\Command\CommandHandlerInterface;
use Deggolok\Bus\Command\CommandInterface;
use Deggolok\Bus\Command\CommandResponse;

class UpdatePlayerStatusCommandHandler implements CommandHandlerInterface
{


    public function __construct(PlayerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function handle(\Deggolok\Bus\Command\CommandInterface $command): CommandResponse
    {
        $events = array();
        foreach ($command->getPlayers() as $ogameId => $player) {
            $playerAgregat = $this->repository->findByOgameId($ogameId, $command->getUniverse());
            if ($playerAgregat) {
                if ($player->status != $playerAgregat->getStatus()) {
                    $events[] = new StatusChange($playerAgregat, $player);
                }
                if ($player->aliance != $playerAgregat->getAliance()) {
                    $events[] = new StatusChange($playerAgregat, $player);
                }
            }
        }

        return CommandResponse::withArrayEvent(true, $events);

    }


    public
    function listenTo()
    {
        return UpdatePlayerStatusCommand::class;
    }
}