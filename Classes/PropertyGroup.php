<?php

namespace nlib\Hubspot\Classes;

use stdClass;
use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\PropertyGroupInterface;

class PropertyGroup extends Hubspot implements HubspotInterface, PropertyGroupInterface  {

    public function __construct() { $this->_base .= '/properties/v1/{object_type}/groups'; parent::__construct(); }

    public function getGroup(string $objectType, string $group) : ?stdClass {
        
        $group = $this->cURL($this->getEndpoint($objectType, $group))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->get();

        $this->log([$this->l() => $group]);
        
        return \json_decode($group);
    }

    public function getGroups(string $objectType) {
        
        $group = $this->cURL($this->getEndpoint($objectType))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->get();

        $this->log([$this->l() => $group]);
        
        return \json_decode($group);
    }

    public function create(string $objectType, array $values) : ?stdClass {

        $create = $this->cURL($this->getEndpoint($objectType))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);
        
        return json_decode($create);
    }

    public function update(string $objectType, string $group, array $values) : ?stdClass {
        
        $update = $this->cURL($this->getEndpoint($objectType, $group))
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put($values);

        $this->log([$this->l() => $update]);
        
        return \json_decode($update);
    }

    public function getEndpoint(string $objectType, string $group = '') : string { 

        $base = str_replace('{object_type}', $objectType, $this->_base);
        if(!empty($group)) $base .= '/named/' . $group;

        return $base . '?' . $this->getHapikey();
    }
}