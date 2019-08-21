<?php

/*
 * QueryBus.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Query;


use Deggolok\Bus\Handler\CommandHandlerInterface;
use Deggolok\Bus\Locator\CommandLocatorInterface;

class QueryBus implements QueryBusInterface
{
    /**
     * @var CommandHandlerInterface[]
     */
    private $handlers = array();

    /**
     * @param QueryInterface $query
     * @return |null
     * @throws \Exception
     */
    public function handle(QueryInterface $query)
    {
        $aggregateRoot = null;

        $commandHandler = $this->getHandler($query);
        $aggregateRoot = $commandHandler->handle($query);

        return $aggregateRoot;
    }

    /**
     * @param QueryInterface $query
     * @return CommandHandlerInterface
     * @throws \Exception
     */
    public function getHandler(QueryInterface $query)
    {
        if (!array_key_exists($query->__toString(), $this->handlers)) {
            throw new \Exception(
                sprintf(
                    'No handler defined for the command "%s". ',
                    $query->__toString()
                ));
        }

        return $this->handlers[$query->__toString()];
    }

    public function register($commandName, QueryHandlerInterface $handler)
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