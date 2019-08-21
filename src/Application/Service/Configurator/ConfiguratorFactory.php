<?php

/*
 * ConfiguratorFactory.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Application\Service\Configurator;


use FilesystemIterator;
use RecursiveIteratorIterator;

class ConfiguratorFactory
{
    public static function createFromDir($directory)
    {

        $dir = new \RecursiveDirectoryIterator($directory,
            FilesystemIterator::SKIP_DOTS);

        $it = new RecursiveIteratorIterator($dir,
            RecursiveIteratorIterator::SELF_FIRST);

        $configurators = array();
        foreach ($it as $file) {
            $configurators[] = new Configurator($file);
        }

        return $configurators;
    }

}