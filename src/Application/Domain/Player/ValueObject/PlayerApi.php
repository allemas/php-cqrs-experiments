<?php

/*
 * PlayerApi.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\ValueObject;

/**
 * Class PlayerApi
 * Modélisation d'un player issu de l'API
 *
 * @package Deggolok\Application\Domain\Player\ValueObject
 */
class PlayerApi
{
    public $ogameId;
    public $name;
    public $status;
    public $aliance;

    public function __construct($ogameId, $name, $status = "", $aliance = "")
    {
        $this->ogameId = $ogameId;
        $this->name = $name;
        $this->status = $status;
        $this->aliance = $aliance;
    }


    static function withValue($playerArray)
    {
        return new PlayerApi($playerArray["id"], $playerArray["name"], $playerArray["aliance"]);
    }


}