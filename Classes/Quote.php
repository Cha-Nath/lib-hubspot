<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\OptionInterface;
use stdClass;

class Quote extends Hubspot {

    public function __construct() {
        $this->_base .= '/crm/v3/objects/quotes';        
        parent::__construct();
    }

    public function getQuotes(?OptionInterface $Option = null) : ?stdClass {

        $Quotes = $this->cURL($this->_base . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($this->Option($Option)->toUrl());

        return json_decode($Quotes);
    }

    public function getQuote(int $id, ?OptionInterface $Option = null) : ?stdClass {
    
        $Quote = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($this->Option($Option)->toUrl());

        return json_decode($Quote);
    }
}