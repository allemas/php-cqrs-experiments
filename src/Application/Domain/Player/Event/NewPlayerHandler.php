<?php

/*
 * NewPlayer.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Event;


use Deggolok\Application\Domain\Player\ValueObject\PlayerApi;
use Deggolok\Bus\Event\EventHandlerInterface;
use Deggolok\Bus\Event\EventInterface;

class NewPlayerHandler implements EventHandlerInterface
{

    public function handle(EventInterface $event)
    {
        $players = $event->players;
        print "NEW players";
        var_dump($players);
    }

    /**
     * @return string
     */
    public static function listenTo()
    {
        return NewPlayer::class;
    }
}