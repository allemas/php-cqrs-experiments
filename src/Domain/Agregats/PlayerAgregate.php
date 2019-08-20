<?php

/*
 * PlayerAgregate.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Domain\Agregats;


use Deggolok\Domain\Entity\PlayerState;

class PlayerAgregate
{
    private $state;




    public function getState(): PlayerState
    {
        return end($this->state);
    }

    public function addState(PlayerState $state): void
    {
        $this->checkEvolution($state);
        $this->state[] = $state;
    }

    private function checkEvolution(PlayerState $state)
    {
        throw new \Exception("not implemented");
    }

}