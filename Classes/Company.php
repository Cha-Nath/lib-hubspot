<?php

namespace nlib\Hubspot\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Company extends Hubspot implements HubspotInterface, cURLConstantInterface {

    public function __construct() { $this->_base .= '/companies/v2'; parent::__construct(); }
    
    public function getCompany(int $id, array $options = []) {
        $company = $this->cURL($this->_base . '/companies/' . $id . '?' . $this->getHapikey())
        ->get($options);
        return json_decode($company);
    }

    public function update(int $id, array $values) {
        $update = $this->cURL($this->_base . '/companies/' . $id . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->put($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        return json_decode($update);
    }
    
    public function create(array $values) {
        $create = $this->cURL($this->_base . '/companies/?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->post($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);
        return json_decode($create);
    }

    public function associate(int $id, array $contactid) {
        $associate = $this->cURL($this->_base . '/companies/' . $id . '/contacts/' . $contactid . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->put();
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $associate]);
        return json_decode($associate);
    }
    
}