<?php

/*
 * StatusChangeHandler.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Event;


use Deggolok\Bus\Event\EventHandlerInterface;
use Deggolok\Bus\Event\EventInterface;

class StatusChangeHandler implements EventHandlerInterface
{

    public function handle(EventInterface $event)
    {
        var_dump($event);


    }


    /**
     * @return string
     */
    public static function listenTo()
    {
        return StatusChange::class;
    }
}