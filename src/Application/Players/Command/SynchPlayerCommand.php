<?php

/*
 * SynchPlayerCommand.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Players\Command;


use Deggolok\Command\CommandInterface;
use Deggolok\Services\Configurator\Configurator;

class SynchPlayerCommand implements CommandInterface
{

    /**
     * @var Configurator
     */
    public $configurator;

    /**
     * SynchPlayerCommand constructor.
     * @param $configurator
     */
    public function __construct($configurator)
    {
        $this->configurator = $configurator;
    }


}