<?php

namespace nlib\Hubspot\Classes;

class Engagement extends Hubspot {

    public function __construct() { $this->_base .= '/engagements/v1'; }

    public function create(array $values) {

        $create = $this->cURL($this->_base . '/engagements?' . $this->getHapikey())
        ->setContentType('Content-Type: application/json')
        ->setEncoding('JSON')
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

        return json_decode($create);
    }
    
}