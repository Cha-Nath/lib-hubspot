<?php

namespace nlib\Hubspot\Classes;

class File extends Hubspot {

    public function __construct() { $this->_base .= 'filemanager/api/v2'; }

    public function upload(array $values) {

        $upload = $this->cURL($this->_base . '/files?' . $this->getHapikey())
        ->setContentType('Content-Type: application/json')
        ->setEncoding('JSON')
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $upload]);

        return json_decode($upload);
    }
    
}