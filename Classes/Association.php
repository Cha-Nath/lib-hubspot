<?php

namespace nlib\Hubspot\Classes;

use stdClass;

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
}