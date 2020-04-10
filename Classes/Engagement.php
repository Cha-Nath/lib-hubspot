<?php

namespace nlib\Hubspot\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Engagement  extends Hubspot implements HubspotInterface, cURLConstantInterface {

    public function __construct() { $this->_base .= '/engagements/v1'; }

    public function create(array $values) {

        $create = $this->cURL($this->_base . '/engagements?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setEncoding(self::JSON)
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

        return json_decode($create);
    }
    
}