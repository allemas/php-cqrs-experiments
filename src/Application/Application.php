<?php

/*
 * Application.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application;


use Deggolok\Application\Bus\DeggolokCommandBusFactory;
use Deggolok\Application\Bus\DeggolokQueryBusFactory;
use Deggolok\Application\Domain\Player\Command\SynchPlayerCommand;
use Deggolok\Application\Domain\Player\Command\SynchPlayerCommandHandler;
use Deggolok\Application\Domain\Player\Command\UpdatePlayerStatusCommand;

use Deggolok\Application\Domain\Player\Query\playersStateApiQuery;
use Deggolok\Application\Service\Configurator\ConfiguratorFactory;

use Deggolok\Bus\Event\EventBus;
use Deggolok\Bus\Query\QueryBus;
use Deggolok\Infrastructure\Doctrine\PlayerRepository;

class Application
{
    private $configurators;
    private $commandBus;
    private $queryBus;

    /**
     * Application constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->configurators = ConfiguratorFactory::createFromDir($options["configuration_directory"]);
        $this->commandBus = DeggolokCommandBusFactory::construct();
        $this->queryBus = DeggolokQueryBusFactory::get();
    }


    public function run()
    {
        foreach ($this->configurators as $configurator) {
            $playersApi = $this->queryBus->handle(new PlayersStateApiQuery($configurator->getSystem()));
            if ($this->commandBus->handle(new SynchPlayerCommand($playersApi, $configurator->getSystem("universe")))) {
                $this->commandBus->handle(new UpdatePlayerStatusCommand($playersApi, $configurator->getSystem("universe")));

            }
        }


//        $bus->handle(new SynchPlayerCommand([], "d"));


    }

}