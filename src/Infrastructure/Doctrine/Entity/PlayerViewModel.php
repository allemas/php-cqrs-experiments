<?php

/*
 * PlayerViewModel.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Infrastructure\Doctrine\Entity;


class PlayerViewModel
{

    public static function withValues(Player $player)
    {
        $domainPlayer = new \Deggolok\Application\Domain\Player\Entity\Player($player->getOgameId());
        $names = array();

        /* @var $name \Deggolok\Infrastructure\Doctrine\Entity\Name */
        foreach ($player->getNames() as $name) {
            $names[] = new \Deggolok\Application\Domain\Player\ValueObject\Name($name->name);
        }

        $domainPlayer->setNames($names);
        $domainPlayer->setStatus($player->status);
        $domainPlayer->setAliance("");

        return $domainPlayer;
    }
}