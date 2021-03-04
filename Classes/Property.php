<?php

namespace nlib\Hubspot\Classes;

use stdClass;
use nlib\Hubspot\Interfaces\PropertyInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Property extends Hubspot implements HubspotInterface, PropertyInterface  {

    public function __construct() { $this->_base .= '/properties/v1/{object_type}/properties'; parent::__construct(); }
    // /properties/v2/:object_type/properties/named/:property_name

    public function getProperty(string $objectType, string $property) : ?stdClass {
        
        $property = $this->cURL($this->getEndpoint($objectType, $property))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->get();

        $this->log([$this->l() => $property]);
        
        return \json_decode($property);
    }

    public function create(string $objectType, array $values) : ?stdClass {

        $create = $this->cURL($this->getEndpoint($objectType))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);
        
        return json_decode($create);
    }

    public function update(string $objectType, string $property, array $values) : ?stdClass {
        
        $update = $this->cURL($this->getEndpoint($objectType, $property))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put($values);

        $this->log([$this->l() => $update]);
        
        return \json_decode($update);
    }

    public function getEndpoint(string $objectType, string $property = '') : string { 

        $base = str_replace('{object_type}', $objectType, $this->_base);
        if(!empty($property)) $base .= '/named/' . $property;

        return $base . '?' . $this->getHapikey();
    }
}