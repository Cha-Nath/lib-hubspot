<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\EngagementInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;
use stdClass;

class Engagement extends Hubspot implements HubspotInterface, EngagementInterface {

    public function __construct() { $this->_base .= '/engagements/v1'; parent::__construct(); }

    public function create(array $values) {

        $create = $this->cURL($this->_base . '/engagements?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setEncoding(self::JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

        return json_decode($create);
    }

    public function getEngagements() : ?stdClass {

        $Engagements = $this->cURL($this->_base . '/engagements/paged?limit=99&' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setEncoding(self::JSON)
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($Engagements);
    }

    public function getEngagement(int $id) : ?stdClass {

        $Engagement = $this->cURL($this->_base . '/engagements/' . $id . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setEncoding(self::JSON)
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($Engagement);
    }
    
}