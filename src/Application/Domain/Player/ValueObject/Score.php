<?php

/*
 * Score.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\ValueObject;


class Score
{
    public $total;
    public $economy;


    public function __construct($total)
    {
        $this->total = $total;
    }
}