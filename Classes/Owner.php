<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\OwnerInterface;

class Owner extends Hubspot implements OwnerInterface, HubspotInterface {

    public function getOwners() {

        return json_decode($this->cURL('http://api.hubapi.com/owners/v2/owners')->get($this->_hapikey));
    }
}