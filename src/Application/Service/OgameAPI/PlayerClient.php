<?php

/*
 * PlayerClient.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Service\OgameAPI;


use GuzzleHttp\Client;

class PlayerClient
{
    public static function fetch(string $uri): \DOMDocument
    {
        $client = new Client();
        $res = $client->request("GET", $uri);

        $doc = \DOMDocument::loadXML($res->getBody()->getContents());
        return $doc;
    }
}