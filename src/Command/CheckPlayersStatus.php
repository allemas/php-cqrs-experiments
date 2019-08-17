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

class CheckPlayersStatus implements CommandInterface
{

    public $universe;

    public function __construct(Universe $universe)
    {
        $this->universe = $universe;
    }

}