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

use Deggolok\Bus\CommandBus;
use Deggolok\Bus\Handler\CheckPlayersStatusHandler;
use Deggolok\Bus\Handler\GetUniverseApiPlayersHandler;
use Deggolok\Bus\Handler\Locator\OgameDeggolokLocator;
use Deggolok\Command\CheckPlayersStatus;
use Deggolok\Command\GetUniverseApiPlayers;
use Deggolok\Domain\ValueObject\Universe;
use Deggolok\Infrastructure\Filesystem\DeggolokFS;
use Deggolok\Services\Configurator\Configurator;

class Application
{
    private $confDir;

    /**
     * Application constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        if (!empty($options['confDir'])) {
            $this->confDir = $options['confDir'];
        }
    }


    private function getLocator(): OgameDeggolokLocator
    {
        $locator = new OgameDeggolokLocator();
        $locator->register('Deggolok\Command\CheckPlayersStatus', new CheckPlayersStatusHandler());
        $locator->register('Deggolok\Command\GetUniverseApiPlayers', new GetUniverseApiPlayersHandler());

        return $locator;
    }

    public function run()
    {
        $bus = new CommandBus($this->getLocator());

        $fs = new DeggolokFS($this->confDir);
        foreach ($fs->getConfigFiles() as $file) {

            $configurator = new Configurator($file);
            var_dump($bus->handle(new GetUniverseApiPlayers($configurator)));

        }
        /*

                $configurator = new Configurator($this->confDir);
                var_dump($bus->handle(new GetUniverseApiPlayers($configurator)));
        */

        var_dump($bus->handle(new CheckPlayersStatus(new Universe("spica"))));


    }
}