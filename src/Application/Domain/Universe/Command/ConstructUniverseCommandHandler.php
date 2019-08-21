<?php

/*
 * ConstructUniverseCommandHandler.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Universe\Command;


use Deggolok\Bus\Handler\CommandHandlerInterface;
use Deggolok\Command\CommandInterface;
use Deggolok\Domain\Entity\Universe;
use Deggolok\Domain\Entity\UniverseRepositoryInterface;

class ConstructUniverseCommandHandler implements CommandHandlerInterface
{
    /** @var UniverseRepositoryInterface */
    private $repository;

    public function __construct(UniverseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function handle(CommandInterface $command)
    {
        $nameUniverse = $command->name;
        try {
            $universe = $this->repository->find($nameUniverse);
        } catch (\Exception $e) {
            $universe = new Universe($nameUniverse);
            $this->repository->create($universe);
        }
    }
}