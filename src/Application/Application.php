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
use Deggolok\Bus\Handler\Locator\OgameDeggolokLocator;
use Deggolok\Command\CheckPlayersStatus;
use Deggolok\Domain\ValueObject\Universe;

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


    public function run()
    {
        $locator = new OgameDeggolokLocator();
        $locator->register('Deggolok\Command\CheckPlayersStatus', new CheckPlayersStatusHandler());





        $bus = new CommandBus($locator);

       var_dump($bus->handle(new CheckPlayersStatus(new Universe("spica"))));


    }
}