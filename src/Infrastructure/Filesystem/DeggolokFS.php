<?php

/*
 * DeggolokFS.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Infrastructure\Filesystem;



use FilesystemIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Filesystem\Filesystem;

class DeggolokFS
{
    private $_dir;
    private $_fs;

    public function __construct($dir)
    {
        $this->_dir = $dir;
        $this->_fs = new Filesystem();
    }

    public function getConfigFiles()
    {
        $dir = new \RecursiveDirectoryIterator($this->_dir,
            FilesystemIterator::SKIP_DOTS);

        $it = new RecursiveIteratorIterator($dir,
            RecursiveIteratorIterator::SELF_FIRST);

        return $it;
    }


}