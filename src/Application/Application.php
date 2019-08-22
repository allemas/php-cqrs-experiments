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


use Deggolok\Application\Domain\Player\Command\SynchPlayerCommand;
use Deggolok\Application\Domain\Player\Command\SynchPlayerCommandHandler;
use Deggolok\Application\Domain\Player\Command\UpdateStatusCommand;
use Deggolok\Application\Domain\Player\Command\UpdateStatusCommandHandler;
use Deggolok\Application\Service\Configurator\ConfiguratorFactory;
use Deggolok\Bus\Command\CommandBus;

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
        $this->commandBus = new CommandBus();
        $this->register();
    }

    private function register()
    {
        $this->commandBus->register(SynchPlayerCommand::class, new SynchPlayerCommandHandler(
            $this->configurators, new PlayerRepository()));
        $this->commandBus->register(UpdateStatusCommand::class, new UpdateStatusCommandHandler(
            $this->configurators, new PlayerRepository()));
    }

    public function run()
    {
        $this->commandBus->handle(new SynchPlayerCommand());
        $this->commandBus->handle(new UpdateStatusCommand());


    }

}