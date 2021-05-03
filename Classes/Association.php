<?php

namespace nlib\Hubspot\Classes;

use stdClass;

use nlib\Hubspot\Interfaces\AssociationConstanteInterface;
use nlib\Hubspot\Interfaces\AssociationInterface;

class Association extends Hubspot implements AssociationConstanteInterface, AssociationInterface {

    public function __construct() {
        $this->_base .= '/crm-associations/v1/associations';
        parent::__construct();
    }

    public function getAssociations(string $objectID, int $definitionID) : ?stdClass {

        $associations = $this->cURL(str_replace(
            ['{objectId}', '{definitionId}'],
            [$objectID, $definitionID],
            $this->_base . '/{objectId}/HUBSPOT_DEFINED/{definitionId}') .
            '?' . $this->getHapikey()
        )
        ->setDebug(...$this->dd())
        ->setContentType(self::APPLICATION_JSON)
        ->get();

        $this->log([$this->l() => $associations]);

        return json_decode($associations);
    }

    public function create(string $fromObjectType, string $toObjectType, array $parameters) : ?stdClass {

        $url = str_replace('/crm-associations/v1/associations', '/crm/v3/associations/{fromObjectType}/{toObjectType}/batch/create', $this->_base);

        $create = $this->cURL(str_replace(
            ['{fromObjectType}', '{toObjectType}'],
            [$fromObjectType, $toObjectType],
            $url . '?' . $this->getHapikey()
        ))
        ->setDebug(...$this->dd())
        ->setContentType(self::APPLICATION_JSON)
        ->post($parameters);

        $this->log([$this->l() => $create]);

        return json_decode($create);
    }
}