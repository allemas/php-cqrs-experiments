<?php

/*
 * DeggolokDatabaseManager.php is part of ogame_deggolok.
 *
 * (c) Allemand Sébastien <sebastien.a.consulting@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deggolok\Infrastructure\Doctrine;


use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

class DeggolokDatabaseManager
{
    protected function getManager()
    {
        $connection = new Connection();
        $config = new Configuration();
        $config->setProxyDir(__DIR__ . '/cache/proxy');
        $config->setProxyNamespace('Proxies');
        $config->setHydratorDir(__DIR__ . '/cache/hydrator');
        $config->setHydratorNamespace('Hydrators');
        $config->setDefaultDB('doctrine_odm');

        $config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__));

        AnnotationDriver::registerAnnotationClasses();

        return DocumentManager::create($connection, $config);
    }

}