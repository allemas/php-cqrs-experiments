<?php

/*
 * SynchPlayerCommand.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Domain\Player\Command;

use Deggolok\Bus\Command\CommandInterface;

/**
 * Class SynchPlayerCommand
 * Vérifie que tous les utilisateurs sont existant
 *
 * @package Deggolok\Application\Players\Command
 */
class SynchPlayerCommand implements CommandInterface
{

    public function __toString()
    {
        return __CLASS__;
    }
}