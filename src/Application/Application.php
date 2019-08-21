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

use Deggolok\Application\Players\Command\SynchPlayerCommand;
use Deggolok\Application\Players\Command\SynchPlayerCommandHandler;
use Deggolok\Application\Universe\Command\ConstructUniverseCommand;
use Deggolok\Application\Universe\Command\ConstructUniverseCommandHandler;
use Deggolok\Bus\CommandBus;
use Deggolok\Bus\Handler\ConstructUniverseHandler;
use Deggolok\Bus\Handler\Locator\OgameDeggolokLocator;
use Deggolok\Command\ConstructUniverse;
use Deggolok\Infrastructure\Doctrine\PlayerRepository;
use Deggolok\Infrastructure\Doctrine\UniverseRepository;
use Deggolok\Infrastructure\Filesystem\DeggolokFS;
use Deggolok\Services\Configurator\Configurator;


class Application
{
    private $confDir;
    private $bus;

    /**
     * Application constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        if (!empty($options['confDir'])) {
            $this->confDir = $options['confDir'];
        }

        $locator = new OgameDeggolokLocator();
        $locator->register(ConstructUniverseCommand::class, new ConstructUniverseCommandHandler(new UniverseRepository()));
        $locator->register(SynchPlayerCommand::class, new SynchPlayerCommandHandler(new PlayerRepository()));

        $this->bus = new CommandBus($locator);
    }

    private function synchNewUniverse()
    {
        $fs = new DeggolokFS($this->confDir);
        foreach ($fs->getConfigFiles() as $file) {
            $configurator = new Configurator($file);
          //  $this->bus->handle(new ConstructUniverseCommand($configurator));
            $this->bus->handle(new SynchPlayerCommand($configurator));
        }
    }

    public function run()
    {
        $this->synchNewUniverse();

    }
}