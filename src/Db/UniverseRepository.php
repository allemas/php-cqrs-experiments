<?php

/*
 * UniverseRepository.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Db;


class UniverseRepository
{
    public function __construct($name)
    {
        $topic = "deggolok_" . $name;

        $this->client = new \MongoDB\Client('mongodb://127.0.0.1');
        $this->client = $this->client->$topic;
    }


    public function create(){

    }

    public function findUniverse($name)
    {
        return $this->client->universe->find();
    }






}