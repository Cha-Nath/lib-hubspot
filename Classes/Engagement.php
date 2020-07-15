<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\EngagementInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Engagement extends Hubspot implements HubspotInterface, EngagementInterface {

    public function __construct(string $instance = 'i') { $this->_base .= '/engagements/v1'; parent::__construct($instance); }

    public function create(array $values) {

        $create = $this->cURL($this->_base . '/engagements?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setEncoding(self::JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

        return json_decode($create);
    }
    
}