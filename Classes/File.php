<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\FileInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class File extends Hubspot implements HubspotInterface, FileInterface {

    public function __construct(string $instance = 'i') { $this->_base .= '/filemanager/api/v2'; parent::__construct($instance); }

    public function upload(array $values) {

        $upload = $this->cURL('http://api.hubapi.com/filemanager/api/v2/files?' . $this->getHapikey())
        ->setContentType(str_replace(';charset=UTF-8;', '', self::MULTIPART))
        ->setEncoding(self::_ARRAY)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $upload]);
        
        return json_decode($upload);
    }
    
}