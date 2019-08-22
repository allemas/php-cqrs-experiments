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
use Deggolok\Infrastructure\Doctrine\Entity\Highscore;
use Deggolok\Infrastructure\Doctrine\Entity\Name;
use Deggolok\Infrastructure\Doctrine\Entity\PlayerViewModel;

/**
 * Class PlayerRepository
 * @package Deggolok\Infrastructure\Doctrine
 */
class PlayerRepository extends DeggolokDatabaseManager implements PlayerRepositoryInterface
{
    const LABEL_UNIVERSE = "label_universe";


    /**
     * @param Player $player
     */
    public function create(Player $player, array $options)
    {
        $em = $this->getManager();
        $p = new \Deggolok\Infrastructure\Doctrine\Entity\Player($player->getId());

        $p->setName(new Name($player->getName()));
        $p->status = $player->getStatus();
        $p->highscore = [
            new Highscore()
        ];

        if ($options["label_universe"]) {
            $p->label_universe = $options["label_universe"];
        }

        $em->persist($p);
        $em->flush();


    }

    public function findByOgameId($id, $universe)
    {
        $em = $this->getManager();
        $universeEntity = null;
        if ($universe != "") {

            $doctrinePlayer = $em->getRepository(\Deggolok\Infrastructure\Doctrine\Entity\Player::class)
                ->findOneBy(["ogameId" => $id, 'label_universe' => $universe]);
            return PlayerViewModel::withValues($doctrinePlayer);

        }
        return null;
    }


}