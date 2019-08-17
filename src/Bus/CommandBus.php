<?php

/*
 * CommandBus.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus;


use Deggolok\Command\CommandInterface;

class CommandBus implements CommandBusInterface
{


    /**
     * @var array
     */
    private $locator;
    private $queue;
    private $executing;

    public function __construct($locator)
    {
        $this->locator = $locator;
    }


    public function handle(CommandInterface $command)
    {
        $this->queue[] = $command;
        if ($this->executing) {
            return array();
        }

        $first = true;
        $aggregateRoots = array();

        while ($command = array_shift($this->queue)) {
            $aggregateRoots[] = $this->invokeHandler($command, $first);
            $first = false;
        }
        return $aggregateRoots;
    }


    protected function invokeHandler(CommandInterface $command, $first)
    {
        $aggregateRoot = null;
        try {
            $this->executing = true;
            $commandHandler = $this->locator->getCommandHandlerForCommand($command);
            $aggregateRoot = $commandHandler->handle($command);
        } catch (\Exception $exception) {
            $this->executing = false;
            throw  $exception;
        }
        $this->executing = false;

        return $aggregateRoot;
    }


}

