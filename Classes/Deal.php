<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\AssociationConstanteInterface;
use nlib\Hubspot\Interfaces\DealInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\OptionInterface;
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
    
    // public function update(int $id, array $values) {

    //     $update = $this->cURL($this->_base . '/deal/' . $id . '?' . $this->getHapikey())
    //     ->setContentType(self::APPLICATION_JSON)
    //     ->setDebug(...$this->dd())
    //     ->put($values);

    //     $this->log([$this->l() => $update]);
        
    //     return json_decode($update);
    // }
    
    // public function create(array $values) {

    //     $create = $this->cURL($this->_base . '/deal?' . $this->getHapikey())
    //     ->setContentType(self::APPLICATION_JSON)
    //     ->setDebug(...$this->dd())
    //     ->post($values);

    //     $this->log([$this->l() => $create]);

    //     return json_decode($create);
    // }
    
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