<?php

/*
 * HighscoreParser.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Services\Parsers;


class HighscoreParser
{
    const POSITION = "position";
    const SCORE = "score";

    /**
     * @param \DOMDocument $score
     * @return array
     */
    public static function parseToArray(\DOMDocument $score): array
    {
        $result = array();
        foreach ($score->firstChild->childNodes as $score) {
            $result[$score->attributes->getNamedItem("id")->nodeValue] = [
                self::POSITION => $score->attributes->getNamedItem("position")->nodeValue,
                self::SCORE => $score->attributes->getNamedItem("score")->nodeValue
            ];
        }

        return $result;
    }
}