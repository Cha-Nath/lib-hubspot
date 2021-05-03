<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\OwnerInterface;

class Owner extends Hubspot implements HubspotInterface, OwnerInterface {

    public function __construct() { parent::__construct(); $this->_base .= '/crm/v3/owners/'; }

    public function getOwner(int $id, array $options = []) {
        $owner = $this->cURL('http://api.hubapi.com/owners/v2/owners/' . $id . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($options);
        return json_decode($owner);
    }

    public function getOwners(array $options = []) {
        $owners = $this->cURL('http://api.hubapi.com/owners/v2/owners?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($options);
        return json_decode($owners);
    }

}