<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\AssociationConstanteInterface;
use stdClass;
use nlib\Hubspot\Interfaces\PropertyInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Property extends Hubspot implements HubspotInterface {

    public function __construct() { $this->_base .= '/crm/v3/properties'; parent::__construct(); }

    public function getProperties(string $objectType, bool $archived = false) : ?stdClass {
        // /crm/v3/properties/{objectType}

        if(!in_array($objectType, AssociationConstanteInterface::OBJECT_TYPES))
            $this->dlog([$this->l() => 'Parameter "$objectType" : "' . $objectType . '" doesn\'t contain a valid value.']);

        $Properties = $this->cURL($this->_base . '/' . $objectType . '?archived=' . $archived . '&' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->get();

        $this->log([$this->l() => $Properties]);

        return json_decode($Properties);
    }

    // public function __construct() { $this->_base .= '/properties/v1/{object_type}/properties'; parent::__construct(); }
    // /properties/v2/:object_type/properties/named/:property_name

    // public function getProperty(string $objectType, string $property) : ?stdClass {
        
    //     $property = $this->cURL($this->getEndpoint($objectType, $property))
    //     ->setEncoding(self::JSON)
    //     ->setContentType(self::APPLICATION_JSON)
    //     ->setDebug(...$this->dd())
    //     ->get();

    //     $this->log([$this->l() => $property]);
        
    //     return \json_decode($property);
    // }

    public function create(string $objectType, array $values) : ?stdClass {

        $create = $this->cURL($this->getEndpoint($objectType))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([$this->l() => $create]);
        
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

        $base = str_replace('/crm/v3/properties', '/properties/v1/{object_type}/properties', $this->_base);
        $base = str_replace('{object_type}', $objectType, $base);
        if(!empty($property)) $base .= '/named/' . $property;

        return $base . '?' . $this->getHapikey();
    }
}