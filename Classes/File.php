<?php

namespace nlib\Hubspot\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class File extends Hubspot implements HubspotInterface, cURLConstantInterface {

    public function __construct() { $this->_base .= '/filemanager/api/v2'; parent::__construct(); }

    public function upload(array $values) {

        $upload = $this->cURL('http://api.hubapi.com/filemanager/api/v2/files?' . $this->getHapikey())
        ->setContentType(self::MULTIPART)
        ->setEncoding(self::_ARRAY)
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $upload]);
        
        return json_decode($upload);
    }
    
}