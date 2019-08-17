<?php

/*
 * GetUniverseApiPlayers.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Command;


use Deggolok\Services\Configurator\Configurator;

class GetUniverseApiPlayers implements CommandInterface
{
    public $configurator;

    /**
     * GetUniverseApiPlayers constructor.
     * @param Configurator $configurator
     */
    public function __construct(Configurator $configurator)
    {
        $this->configurator = $configurator;
    }

}