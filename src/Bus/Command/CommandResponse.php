<?php

/*
 * CommandResponse.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Command;

use Deggolok\Bus\Event\EventInterface;

class CommandResponse
{
    public $value;
    public $events = array();


    public function __construct($value)
    {
        $this->value = $value;
    }


    public function getEvents()
    {
        return $this->events;
    }

    static function withValue($value, EventInterface ...$events): CommandResponse
    {
        $response = new CommandResponse($value);
        $response->events = $events;

        return $response;
    }

    static function withArrayEvent($value, iterable $events): CommandResponse
    {
        $response = new CommandResponse($value);
        $response->events = $events;

        return $response;
    }

}