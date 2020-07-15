<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\CompanyInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Company extends Hubspot implements HubspotInterface, CompanyInterface {

    public function __construct(string $instance = 'i') { $this->_base .= '/companies/v2'; parent::__construct($instance); }
    
    public function getCompany(int $id, array $options = []) {
        $company = $this->cURL($this->_base . '/companies/' . $id . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($options);
        return json_decode($company);
    }

    public function update(int $id, array $values) {
        $update = $this->cURL($this->_base . '/companies/' . $id . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        return json_decode($update);
    }
    
    public function create(array $values) {
        $create = $this->cURL($this->_base . '/companies/?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);
        return json_decode($create);
    }

    public function associate(int $id, array $contactid) {
        $associate = $this->cURL($this->_base . '/companies/' . $id . '/contacts/' . $contactid . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put();
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $associate]);
        return json_decode($associate);
    }
    
}