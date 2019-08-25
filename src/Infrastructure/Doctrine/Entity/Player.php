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

    /** @ODM\ReferenceMany(targetDocument="Name", cascade="all") */
    private $name = array();

    /** @ODM\Field(type="integer") */
    private $ogameId;

    /** @ODM\Field(type="string") */
    public $label_universe;

    /** @ODM\Field(type="string") */
    public $status;

    /** @ODM\ReferenceMany(targetDocument="Highscore", cascade="all") */
    public $highscore = array();

    public function __construct($ogameId)
    {
        $this->ogameId = $ogameId;
        $this->highscore = array();
    }

    /**
     * @return mixed
     */
    public function getNames()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function addName($name): void
    {
        $this->name[] = $name;
    }

    /**
     * @return mixed
     */
    public function getOgameId()
    {
        return $this->ogameId;
    }

    /**
     * @param mixed $ogameId
     */
    public function setOgameId($ogameId): void
    {
        $this->ogameId = $ogameId;
    }

    /**
     * @return mixed
     */
    public function getLabelUniverse()
    {
        return $this->label_universe;
    }

    /**
     * @param mixed $label_universe
     */
    public function setLabelUniverse($label_universe): void
    {
        $this->label_universe = $label_universe;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getHighscore()
    {
        return $this->highscore;
    }

    /**
     * @param mixed $highscore
     */
    public function setHighscore($highscore): void
    {
        $this->highscore = $highscore;
    }


}