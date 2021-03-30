<?php

namespace nlib\Hubspot\Classes;

use stdClass;

use nlib\Hubspot\Interfaces\CompanyInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\OptionInterface;
use nlib\Hubspot\Interfaces\SearchInterface;
use nlib\Hubspot\Interfaces\AssociationConstanteInterface;

class Company extends Hubspot implements HubspotInterface, CompanyInterface {

    public function __construct() {

        $this->_base .= '/crm/v3/objects/companies';
        $this->setVersion('v3');

        parent::__construct();
    }
    
    public function getCompany(int $id, ?OptionInterface $Option = null) : ?stdClass {

        $Company = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($this->Option($Option)->toUrl());

        return json_decode($Company);
    }

    public function getCompagnies(?OptionInterface $Option = null) : ?stdClass {
        
        $Companies = $this->cURL($this->_base . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($this->Option($Option)->toUrl());

        return json_decode($Companies);
    }

    public function search(SearchInterface $Search) : ?stdClass {

      $Companies = $this->cURL($this->_base . '/search?' . $this->getHapikey() . '&archived=true')
        ->setContentType(self::APPLICATION_JSON)
        ->setHttpheaders([self::APPLICATION_JSON_ACCEPT])
        ->setDebug(...$this->dd())
        ->post($Search->jsonSerialize());

        return json_decode($Companies);
    }

    // public function update(int $id, array $values) : ?stdClass {

    //     $update = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
    //     ->setContentType(self::APPLICATION_JSON)
    //     ->setDebug(...$this->dd())
    //     ->patch($values);

    //     $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);

    //     return json_decode($update);
    // }
    
    // public function create(array $values) : ?stdClass {

    //     $create = $this->cURL($this->_base . '/companies/?' . $this->getHapikey())
    //     ->setContentType(self::APPLICATION_JSON)
    //     ->setDebug(...$this->dd())
    //     ->post($values);

    //     $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

    //     return json_decode($create);
    // }

    public function associate(int $companyID, string $toObjectType, int $toObjectID, string $associationType) : ?stdClass {

        if(!in_array($toObjectID, AssociationConstanteInterface::OBJECT_TYPES))
            $this->dlog([$this->l() => 'Parameter "$toObjectID" : "' . $toObjectID . '" doesn\'t contain a valid value.']);

        if(!in_array($associationType, AssociationConstanteInterface::ASSOCIATION_TYPES))
            $this->dlog([$this->l() => 'Parameter "$associationType" : "' . $associationType . '" doesn\'t contain a valid value.']);

        $Association = $this->cURL($this->_base . '/' . $companyID
            . '/associations/' . $toObjectType . '/' . $toObjectID . '/' . $associationType . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->put();

        return json_decode($Association);
    }
    
}