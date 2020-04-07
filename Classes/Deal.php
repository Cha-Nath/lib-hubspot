<?php

namespace nlib\Hubspot\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Deal extends Hubspot implements HubspotInterface, cURLConstantInterface {

    public function __construct() { $this->_base .= '/deals/v1'; }
    
    public function update(int $id, array $values) {
        $update = $this->cURL($this->_base . '/deal/' . $id . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->put($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        return json_decode($update);
    }
    
    public function create(array $values) {
        $create = $this->cURL($this->_base . '/deal?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->post($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);
        return json_decode($create);
    }
    
    public function associate(int $id, int $elementid, string $type) {
        $type = strtoupper($type);
        $types = ['CONTACT', 'COMPANY'];
        if(!in_array($type, $types)) $this->dlog([__CLASS__ . '::' . __FUNCTION__ => 'Bad type value "' . $type . '".']);
// var_dump($this->_base . '/deal/' . $id . '/associations/' . $type . '?id=' . $elementid . '&' . $this->getHapikey());die;
        $associate = $this->cURL($this->_base . '/deal/' . $id . '/associations/' . $type . '?id=' . $elementid . '&' . $this->getHapikey())
        // $associate = $this->cURL('https://api.hubapi.com/deals/v1/deal/1126609/associations/CONTACT?id=394455&hapikey=demo')
        
        ->setContentType(self::APPLICATION_JSON)
        ->put([]);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $associate]);
        return json_decode($associate);
    }
    
}