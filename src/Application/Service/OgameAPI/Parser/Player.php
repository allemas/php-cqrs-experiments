<?php

/*
 * Player.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Service\OgameAPI\Parser;


class Player
{

    private static function understandStatus($status)
    {
        $status = str_split($status);
        $states = "";
        foreach ($status as $state) {
            switch ($state) {
                case "v":
                    $states .= "mode vacance ";
                    break;
                case "I":
                    $states .= "inactif ";
                    break;
                case "i":
                    $states .= "inactif ";
                    break;
                case "b":
                    $states .= "bloqué ";
                    break;
                default:
                    $states .= "actif";
                    break;

            }
        }
        return $states;
    }


    public
    static function parseList(\DOMDocument $players): array
    {
        $data = array();
        foreach ($players->firstChild->childNodes as $player) {
            $id = $player->attributes->getNamedItem("id")->nodeValue;
            $name = $player->attributes->getNamedItem("name")->nodeValue;
            $status = self::understandStatus(@$player->attributes->getNamedItem("status")->nodeValue);
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