<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\PropertyInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Property extends Hubspot implements HubspotInterface, PropertyInterface  {

    public function __construct() { $this->_base .= '/properties/v1/{object_type}/properties'; parent::__construct(); }
    // /properties/v2/:object_type/properties/named/:property_name

    public function update(string $objectype, string $property, array $values) {

        $base = str_replace('{object_type}', $objectype, $this->_base);
        
        $update = $this->cURL($this->getUrl($objectype, $property))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        
        return \json_decode($update);
    }

    public function getProperty(string $objectype, string $property) {
        
        $property = $this->cURL($this->getUrl($objectype, $property))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->get();

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $property]);
        
        return \json_decode($property);
    }

    public function getUrl(string $objectype, string $property) : string { 

        $base = str_replace('{object_type}', $objectype, $this->_base);
        return $base . '/named/' . $property . '?' . $this->getHapikey();
    }
}