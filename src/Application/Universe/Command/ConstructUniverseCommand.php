<?php

/*
 * ConstructUniverseCommand.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Universe\Command;


use Deggolok\Command\CommandInterface;
use Deggolok\Services\Configurator\Configurator;

class ConstructUniverseCommand implements CommandInterface
{
    public $name;

    public function __construct(Configurator $configurator)
    {
        $this->name = $configurator->getSystem("universe");
    }
}