<?php

/*
 * CommandBus.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Command;


use Symfony\Component\Debug\Tests\Fixtures\LoggerThatSetAnErrorHandler;

/**
 * Class CommandBus
 * @package Deggolok\Bus\Command
 */
class CommandBus implements CommandBusInterface
{
    /**
     * @var CommandHandlerInterface[]
     */
    private $handlers = array();


    public function __construct(iterable $handlers)
    {
        foreach ($handlers as $handler) {
            $this->handlers[$handler->listenTo()] = $handler;
        }
    }


    public function handle(CommandInterface $command)
    {
        $aggregateRoot = null;

        $commandHandler = $this->handlers[get_class($command)];

        $commandResponse = $commandHandler->handle($command);

        /**
         * Exemple
         * $logerMiddleware = new Mid($commandHandler, new Mid2());
         */


        return $commandResponse;

    }


    public function getHandler(CommandInterface $command)
    {
        if (!array_key_exists($command->__toString(), $this->handlers)) {
            throw new \Exception(
                sprintf(
                    'No handler defined for the command "%s". ',
                    $command->__toString()
                ));
        }

        return $this->handlers[$command->__toString()];
    }

    public function register($commandName, CommandHandlerInterface $handler)
    {
        if (array_key_exists($commandName, $this->handlers)) {
            throw new \Exception(
                sprintf(
                    'A command handler has already been defined for the command "%s". ',
                    $commandName
                ));
        }

        $this->handlers[$commandName] = $handler;
    }
}