<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface AssociationInterface {

    /**
     *
     * @param string $objectID
     * @param integer $definitionID
     * @return stdClass|null
     */
    public function getAssociations(string $objectID, int $definitionID) : ?stdClass;
}