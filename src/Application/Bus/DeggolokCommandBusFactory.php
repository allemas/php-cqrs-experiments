<?php

/*
 * DeggolokCommandBusFactory.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Bus;


use Deggolok\Application\Domain\Player\Command\SynchPlayerCommandHandler;
use Deggolok\Application\Domain\Player\Command\UpdatePlayerStatusCommandHandler;
use Deggolok\Application\Domain\Player\Event\NewPlayerHandler;
use Deggolok\Application\Domain\Player\Event\StatusChange;
use Deggolok\Application\Domain\Player\Event\StatusChangeHandler;
use Deggolok\Bus\Command\CommandBus;
use Deggolok\Bus\Event\EventBus;
use Deggolok\Infrastructure\Doctrine\PlayerRepository;

class DeggolokCommandBusFactory
{
    public static function construct()
    {
        $playerRepository = new PlayerRepository();
        return new EventBus([
            new NewPlayerHandler(),
            new StatusChangeHandler(),
        ], new CommandBus([
                new SynchPlayerCommandHandler($playerRepository),
                new UpdatePlayerStatusCommandHandler($playerRepository)
            ])
        );

    }
}