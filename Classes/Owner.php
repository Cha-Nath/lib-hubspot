<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\OwnerInterface;

class Owner extends Hubspot implements HubspotInterface, OwnerInterface {

    public function __construct() { $this->_base .= 'owners/v2'; parent::__construct(); }

    public function getOwner(int $id, array $options = []) {
        $owner = $this->cURL($this->_base . '/owners/' . $id . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($options);
        return json_decode($owner);
    }

    public function getOwners(array $options = []) {
        $owners = $this->cURL($this->_base . '/owners?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($options);
        return json_decode($owners);
    }

}