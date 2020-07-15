<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\PropertyInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Property extends Hubspot implements HubspotInterface, PropertyInterface  {

    public function __construct(string $instance = 'i') { $this->_base .= '/properties/v1/{object_type}/properties'; parent::__construct($instance); }
    // /properties/v2/:object_type/properties/named/:property_name

    public function update(string $objectype, string $property, array $values) {

        $base = str_replace('{object_type}', $objectype, $this->_base);
        
        $update = $this->cURL($base . '/named/' . $property . '?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        
        return \json_decode($update);
    }
}