<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\Query\Query;
use Doctrine\ODM\MongoDB\UnitOfWork;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadataInfo;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class DeggolokInfrastructureDoctrineEntityPlayerHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="id") */
        if (isset($data['_id']) || (! empty($this->class->fieldMappings['id']['nullable']) && array_key_exists('_id', $data))) {
            $value = $data['_id'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['id']['type'];
                $return = $value instanceof \MongoId ? (string) $value : $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Many */
        $mongoData = isset($data['name']) ? $data['name'] : null;
        $return = $this->dm->getConfiguration()->getPersistentCollectionFactory()->create($this->dm, $this->class->fieldMappings['name']);
        $return->setHints($hints);
        $return->setOwner($document, $this->class->fieldMappings['name']);
        $return->setInitialized(false);
        if ($mongoData) {
            $return->setMongoData($mongoData);
        }
        $this->class->reflFields['name']->setValue($document, $return);
        $hydratedData['name'] = $return;

        /** @Field(type="integer") */
        if (isset($data['ogameId']) || (! empty($this->class->fieldMappings['ogameId']['nullable']) && array_key_exists('ogameId', $data))) {
            $value = $data['ogameId'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['ogameId']['type'];
                $return = (int) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['ogameId']->setValue($document, $return);
            $hydratedData['ogameId'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['label_universe']) || (! empty($this->class->fieldMappings['label_universe']['nullable']) && array_key_exists('label_universe', $data))) {
            $value = $data['label_universe'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['label_universe']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['label_universe']->setValue($document, $return);
            $hydratedData['label_universe'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['status']) || (! empty($this->class->fieldMappings['status']['nullable']) && array_key_exists('status', $data))) {
            $value = $data['status'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['status']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['status']->setValue($document, $return);
            $hydratedData['status'] = $return;
        }

        /** @Many */
        $mongoData = isset($data['highscore']) ? $data['highscore'] : null;
        $return = $this->dm->getConfiguration()->getPersistentCollectionFactory()->create($this->dm, $this->class->fieldMappings['highscore']);
        $return->setHints($hints);
        $return->setOwner($document, $this->class->fieldMappings['highscore']);
        $return->setInitialized(false);
        if ($mongoData) {
            $return->setMongoData($mongoData);
        }
        $this->class->reflFields['highscore']->setValue($document, $return);
        $hydratedData['highscore'] = $return;
        return $hydratedData;
    }
}