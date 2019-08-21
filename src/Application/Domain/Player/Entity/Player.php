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


class Player
{
    private $id;
    private $name;
    private $status;
    private $aliance;

    public function __construct($id, $name, $status = 'actif', $aliance = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->aliance = $aliance;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus(): string
    {
        return $this->status;
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
}