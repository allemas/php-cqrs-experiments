<?php

/*
 * UniversAgregate.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Domain\Agregats;


use Deggolok\Domain\Entity\PlayerState;

class UniversAgregate
{
    public $name;


    public function __construct($name)
    {
        $this->name = $name;
    }


    public function __toString()
    {
        return $this->name;
    }



}