<?php

namespace nlib\Hubspot\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\Hubspot\Interfaces\PropertyInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Property extends Hubspot implements HubspotInterface, cURLConstantInterface  {

    public function __construct() { $this->_base .= '/properties/v1/contacts/properties'; parent::__construct(); }

    public function update(string $property, array $values) {

        $update = $this->cURL($this->_base . '/named/' . $property . '?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->put($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        
        return \json_decode($update);
    }
}