<?php

/*
 * UniverseRepository.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Infrastructure\Doctrine\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class Universe
{
    /** @ODM\Id */
    private $id;

    /** @ODM\Field(type="string") */
    public $name;

    /** @ODM\ReferenceMany(targetDocument="Deggolok\Infrastructure\Doctrine\Entity\Player") */
    public $players;

    /**
     * @return uuid
     */
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPlayers()
    {
        return $this->players;
    }

}
