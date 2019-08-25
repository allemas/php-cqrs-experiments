<?php

/*
 * Player.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Entity;


use Deggolok\Application\Domain\Player\ValueObject\Name;
use Deggolok\Application\Domain\Player\ValueObject\PlayerApi;

class Player
{
    private $id;
    private $name = array();
    private $status;
    private $aliance;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Return Active name
     */
    public function getName()
    {
        if ($this->name) {
            return array_values(array_slice($this->name, -1))[0];
        }
    }

    public function getNames()
    {
        return $this->name;
    }

    public function setNames(array $names)
    {
        $this->name = $names;
    }


    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setAliance($aliance)
    {
        $this->aliance = $aliance;
    }

    public function getAliance()
    {
        return $this->aliance;
    }

    final public function __toString(): string
    {
        return (string)json_encode(array(
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'aliance' => $this->aliance
        ));
    }

    final public function __toArray()
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'aliance' => $this->aliance
        );
    }

    public static function withValue(PlayerApi $playerApi)
    {
        $player = new Player($playerApi->ogameId);
        $player->setNames([new Name($playerApi->name)]);
        $player->setStatus($playerApi->status);
        $player->setAliance($playerApi->aliance);
        return $player;
    }

}