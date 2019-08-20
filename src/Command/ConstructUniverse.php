<?php

/*
 * CheckPlayerStatus.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Command;

use Deggolok\Domain\ValueObject\Universe;
use Deggolok\Services\Configurator\Configurator;

/**
 * Class ConstructUniverse
 * @package Deggolok\Command
 */
class ConstructUniverse implements CommandInterface
{
    /**
     * @var Configurator
     */
    public $configurator;

    public function __construct($configurator)
    {
        $this->configurator = $configurator;
    }


}