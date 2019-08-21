<?php

/*
 * PlayerRepository.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Infrastructure\Doctrine\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document() */
class Player
{
    /** @ODM\Id() */
    private $id;

    /** @ODM\Field(type="string") */
    private $name;

    /** @ODM\Field(type="string") */
    private $ogameId;

    public function __construct($ogameId)
    {
        $this->ogameId = $ogameId;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}