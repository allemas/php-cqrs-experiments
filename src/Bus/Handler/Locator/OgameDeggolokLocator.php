<?php

/*
 * OgameDeggolokLocator.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Bus\Handler\Locator;


use Deggolok\Bus\Handler\CommandHandlerInterface;
use Deggolok\Command\CommandInterface;

class OgameDeggolokLocator
{

    /**
     * @var CommandHandlerInterface[]
     */
    private $handlers = array();


    public function getCommandHandlerForCommand(CommandInterface $command)
    {
        $commandClassName = get_class($command);

        if (!$this->isCommandRegistered($commandClassName)) {
            throw new \Exception(
                sprintf(
                    'No handler registered to handle command "%s".',
                    $commandClassName
                )
            );
        }
        return $this->handlers[$commandClassName];
    }


    public function getRegisteredCommandHandlers()
    {
        return $this->handlers;
    }


    public function register($commandClassName, CommandHandlerInterface $commandHandler)
    {
        $this->assertImplementsCommandInterface($commandHandler);


        if ($this->isCommandRegistered($commandClassName)) {
            throw new \Exception(
                sprintf(
                    'A command handler has already been defined for the command "%s". Previous handler: %s. New handler: %s',
                    $commandClassName,
                    get_class($this->handlers[strtolower($commandClassName)]),
                    get_class($commandHandler)
                )
            );
        }


        $this->handlers[$commandClassName] = $commandHandler;
    }


    private function assertImplementsCommandInterface($commandClassName)
    {

        if (!in_array('Deggolok\\Bus\\Handler\\CommandHandlerInterface', class_implements($commandClassName), true)) {
            throw new InvalidArgumentException(
                sprintf(
                    'The class %s must implements the PhpDDD\\Command\\CommandInterface.',
                    $commandClassName
                )
            );
        }

    }


    /**
     * @param string $commandClassName
     *
     * @return bool
     */
    private function isCommandRegistered($commandClassName)
    {
        return isset($this->handlers[$commandClassName]);
    }


}