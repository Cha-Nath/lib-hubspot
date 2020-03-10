<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\OwnerInterface;

class Owner extends Hubspot implements OwnerInterface, HubspotInterface {

    public function getOwner(int $id, array $options = []) {
        $owner = $this->cURL('http://api.hubapi.com/owners/v2/owners/' . $id . '?' . $this->getHapikey())->get($options);
        return json_decode($owner);
    }

    public function getOwners(array $options = []) {
        $owners = $this->cURL('http://api.hubapi.com/owners/v2/owners?' . $this->getHapikey())->get($options);
        return json_decode($owners);
    }

}