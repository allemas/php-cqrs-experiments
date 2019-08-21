<?php

/*
 * UniverseRepositoryInterface.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Domain\Entity;


interface UniverseRepositoryInterface
{
    public function create(Universe $universe): string;

    public function find(string $name): Universe;

    public function addPlayer(Player $name): void;

    public function searchPlayerById(int $id): Player;

}