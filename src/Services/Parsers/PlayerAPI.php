<?php

/*
 * PlayerAPI.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Infr\OgameAPI;

use DiscordWebhooks\Client as DiscordClient;
use DiscordWebhooks\Embed;
use GuzzleHttp\Client;


class PlayerAPI
{
    public function __construct($universe, $webhook, $mmourl)
    {
        $this->_universe = $universe;
        $this->_webhook = $webhook;
        $this->_mmourl = $mmourl;
    }


    public function fetch()
    {




        $collection = (new \MongoDB\Client('mongodb://127.0.0.1'))->watson_spica->players;
        $changed = [];
        foreach ($doc->firstChild->childNodes as $t) {

            $player = $collection->findOne(['id' => $t->attributes->getNamedItem("id")->nodeValue,]);
            if ($player != null) {
                $old_status = @($t->attributes->getNamedItem("status")->nodeValue) == "" ? "actif" : $t->attributes->getNamedItem("status")->nodeValue;
                if ($player->status != $old_status) {
                    $changed[] = [
                        "player" => $player,
                        "status" => $old_status
                    ];
                }

                $updateResult = $collection->updateOne(
                    ['id' => $t->attributes->getNamedItem("id")->nodeValue],
                    ['$set' => [
                        'name' => $t->attributes->getNamedItem("name")->nodeValue,
                        'status' => @($t->attributes->getNamedItem("status")->nodeValue) == "" ? "actif" : $t->attributes->getNamedItem("status")->nodeValue
                    ]]
                );
            } else {
                $insertOneResult = $collection->insertOne([
                    'id' => $t->attributes->getNamedItem("id")->nodeValue,
                    'name' => $t->attributes->getNamedItem("name")->nodeValue,
                    'status' => @($t->attributes->getNamedItem("status")->nodeValue) == "" ? "actif" : $t->attributes->getNamedItem("status")->nodeValue
                ]);
            }
        }

        var_dump($changed);


    }

}
