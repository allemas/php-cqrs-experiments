<?php

/*
 * Players.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Services\Parsers;


class Players
{
    public static function parseList(\DOMDocument $players): array
    {
        $data = array();
        foreach ($players->firstChild->childNodes as $player) {
            $id = $player->attributes->getNamedItem("id")->nodeValue;
            $name = $player->attributes->getNamedItem("name")->nodeValue;
            $status = @$player->attributes->getNamedItem("status")->nodeValue;
            $aliance = @$player->attributes->getNamedItem("aliance")->nodeValue;

            $data[$id] = [
                "name" => $name,
                "status" => $status,
                "aliance" => $aliance
            ];
        }

        return $data;
    }


}