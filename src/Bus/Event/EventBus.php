<?php

/*
 * EventBus.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Event;


use Deggolok\Bus\Command\CommandBusInterface;
use Deggolok\Bus\Command\CommandHandlerInterface;
use Deggolok\Bus\Command\CommandInterface;

class EventBus implements CommandBusInterface
{
    private $events = array();
    private $next;

    public function __construct(iterable $events, CommandBusInterface $next)
    {
        $this->next = $next;
        foreach ($events as $event) {
            $this->events[$event::listenTo()][] = $event;
        }
    }

    public function handle(CommandInterface $command)
    {
        $commandResponse = $this->next->handle($command);

        if (count($commandResponse->events) > 0) {
            foreach ($commandResponse->events as $event) {
                $handlers = $this->events[get_class($event)];
                foreach ($handlers as $handler) {
                    $handler->handle($event);
                }
            }
        }

        return $commandResponse->value;
    }


    public
    function register($commandName, CommandHandlerInterface $handler)
    {
        // TODO: Implement register() method.
    }

    public
    function getHandler(CommandInterface $command)
    {
        // TODO: Implement getHandler() method.
    }
}