<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\DealInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Deal extends Hubspot implements HubspotInterface, DealInterface {

    public function __construct(string $instance = 'i') { $this->_base .= '/deals/v1'; parent::__construct($instance); }

    public function getDeal(int $id, array $options = []) {

        $history = $this->getHistory() ? '&includePropertyVersions=true' : '';
        $deal = $this->cURL($this->_base . '/deal/' . $id . '?' . $this->getHapikey() . $history)
        ->setDebug(...$this->dd())
        ->get($options);

        return json_decode($deal);
    }
    
    public function update(int $id, array $values) {

        $update = $this->cURL($this->_base . '/deal/' . $id . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        
        return json_decode($update);
    }
    
    public function create(array $values) {

        $create = $this->cURL($this->_base . '/deal?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

        return json_decode($create);
    }
    
    public function associate(int $id, int $elementid, string $type) {
        
        $type = strtoupper($type);
        $types = ['CONTACT', 'COMPANY'];
        $log = __CLASS__ . '::' . __FUNCTION__;
        if(!in_array($type, $types)) $this->dlog([$log => 'Bad type value "' . $type . '".']);
        
        $associate = $this->cURL($this->_base . '/deal/' . $id . '/associations/' . $type . '?id=' . $elementid . '&' . $this->getHapikey())       
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put([]);

        $this->log([$log => $associate]);

        return json_decode($associate);
    }
    
}