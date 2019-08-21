<?php

/*
 * UniverseRepository.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Infrastructure\Doctrine;


use Deggolok\Domain\Entity\Player;
use Deggolok\Domain\Entity\Universe as DomainUniverse;
use Deggolok\Domain\Entity\UniverseRepositoryInterface;


/**
 * Class UniverseRepository
 * @package Deggolok\Infrastructure\Doctrine
 */
class UniverseRepository extends DeggolokDatabaseManager implements UniverseRepositoryInterface
{

    public function find(string $name): DomainUniverse
    {
        $em = $this->getManager();
        try {
            $universeEntity = $em->getRepository(\Deggolok\Infrastructure\Doctrine\Entity\Universe::class)
                ->findOneBy(["name" => $name]);
            if ($universeEntity != null) {
                $domainUniverse = new DomainUniverse($universeEntity->name);
                return $domainUniverse;
            }
        } catch
        (\Exception $e) {
            var_dump($e->getMessage());
        }
        throw new \Exception("no results");
    }

    public function addPlayer(Player $name): void
    {
        // TODO: Implement addPlayer() method.
    }

    public function searchPlayerById(int $id): Player
    {
        // TODO: Implement searchPlayerById() method.
    }

    public function create(DomainUniverse $universe): string
    {
        $em = $this->getManager();
        $tUniverse = new \Deggolok\Infrastructure\Doctrine\Entity\Universe();
        $tUniverse->name = $universe->name;
        $em->persist($tUniverse);
        $em->flush();

        return $tUniverse->getId();
    }
}