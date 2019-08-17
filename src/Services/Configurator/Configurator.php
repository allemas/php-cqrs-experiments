<?php

/*
 * Configurator.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Services\Configurator;

use Deggolok\Services\Configurator\Exceptions\NoSystemConfigurationException;
use Symfony\Component\Yaml\Yaml;

class Configurator
{
    const GENERAL = "general";
    const MILITARY = "military";
    const ECO = "eco";

    private $_fileConf;

    public function __construct($dirname)
    {
        $this->_fileConf = Yaml::parseFile($dirname);

    }

    public function get($type)
    {
        return $this->_fileConf[$type];
    }

    public function getPlayers()
    {
        if (array_key_exists("players", $this->_fileConf))
            return $this->_fileConf["players"];
        else
            return NULL;
    }

    public function getSystem($uri = null)
    {
        if (!array_key_exists("system", $this->_fileConf))
            throw new NoSystemConfigurationException("system not defined");

        if ($uri === null)
            return $this->_fileConf["system"];

        if (array_key_exists($uri, $this->_fileConf["system"])) {
            return $this->_fileConf["system"][$uri];
        }

        return new \RuntimeException();
    }


}