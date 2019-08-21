<?php

/*
 * PlayerRepository.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Infrastructure\Doctrine;

use Deggolok\Application\Domain\Player\Entity\Player;
use Deggolok\Application\Domain\Player\Entity\PlayerRepositoryInterface;

/**
 * Class PlayerRepository
 * @package Deggolok\Infrastructure\Doctrine
 */
class PlayerRepository extends DeggolokDatabaseManager implements PlayerRepositoryInterface
{
    /**
     * @param Player $player
     */
    public function create(Player $player, array $options)
    {
        $em = $this->getManager();
        $p = new \Deggolok\Infrastructure\Doctrine\Entity\Player($player->getId());
        if ($options["label_universe"]) {
            $p->label_universe = $options["label_universe"];
        }

        $em->persist($p);
        $em->flush();


    }

    /**
     * @param $id
     * @return object|null
     */
    public function findByOgameId($id)
    {
        $em = $this->getManager();
        $universeEntity = $em->getRepository(\Deggolok\Infrastructure\Doctrine\Entity\Player::class)
            ->findOneBy(["ogameId" => $id]);

        if ($universeEntity != null) {
            return $universeEntity;
        }

    }
}