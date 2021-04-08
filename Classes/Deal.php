<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\AssociationConstanteInterface;
use nlib\Hubspot\Interfaces\DealInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\OptionInterface;
use nlib\Hubspot\Interfaces\SearchInterface;
use stdClass;

class Deal extends Hubspot implements HubspotInterface, DealInterface {

    public function __construct() {

        $this->_base .= '/crm/v3/objects/deals';
        $this->setVersion('v3');
        
        parent::__construct();
    }

    public function getDeal(int $id, ?OptionInterface $Option = null) : ?stdClass {

        $deal = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($this->Option($Option)->toUrl());

        return json_decode($deal);
    }

    public function getDeals(?OptionInterface $Option = null) : ?stdClass {

        $deal = $this->cURL($this->_base . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($this->Option($Option)->toUrl());

        return json_decode($deal);
    }

    public function search(SearchInterface $Search) : ?stdClass {

        $Deals = $this->cURL($this->_base . '/search?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setHttpheaders([self::APPLICATION_JSON_ACCEPT])
        ->setDebug(...$this->dd())
        ->post($Search->jsonSerialize());

        return json_decode($Deals);
    }
    
    public function create(OptionInterface $Option) : ?stdClass {

        if(empty($Option->getProperties())) $this->dlog([$this->l() => 'Property "properties" cannot be empty.']);

        $create = $this->cURL($this->_base . '/?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post(['properties' => $Option->getProperties()]);

        $this->log([$this->l() => $create]);

        return json_decode($create);
    }
    
    public function update(int $id, OptionInterface $Option) : ?stdClass {

        if(empty($Option->getProperties())) $this->dlog([$this->l() => 'Property "properties" cannot be empty.']);

        $update = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->patch(['properties' => $Option->getProperties()]);

        $this->log([$this->l() => $update]);
        
        return json_decode($update);
    }
    
    public function associate(int $dealID, string $toObjectType, int $toObjectID, string $associationType) : ?stdClass {

        if(!in_array($toObjectID, AssociationConstanteInterface::OBJECT_TYPES))
            $this->dlog([$this->l() => 'Parameter "$toObjectID" : "' . $toObjectID . '" doesn\'t contain a valid value.']);

        if(!in_array($associationType, AssociationConstanteInterface::ASSOCIATION_TYPES))
            $this->dlog([$this->l() => 'Parameter "$associationType" : "' . $associationType . '" doesn\'t contain a valid value.']);

        $Association = $this->cURL($this->_base . '/' . $dealID
            . '/associations/' . $toObjectType . '/' . $toObjectID . '/' . $associationType . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->put();

        return json_decode($Association);
    }
    
}