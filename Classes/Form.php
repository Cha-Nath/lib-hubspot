<?php

namespace nlib\Hubspot\Classes;

class Form extends Hubspot {

    public function __construct() { $this->_base .= '/form/v2'; parent::__construct(); }

    public function post(int $portalID, string $formGUID, array $options = []) {

        $post = $this->cURL('https://forms.hubspot.com/uploads/form/v2/' . $portalID . '/' . $formGUID)
        ->setEncoding(self::_STRING)
        ->setContentType(self::APPLICATION)
        ->post($options);

        $this->log([__CLASS__ . '::' . __FUNCTION__  => $post]);
        
        return json_decode($post);
    }

    public function post_v3(int $portalID, string $formGUID, array $options = []) {
        
        $post = $this->cURL('https://api.hsforms.com/submissions/v3/integration/submit/' . $portalID . '/' . $formGUID)
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->post($options);

        $this->log([__CLASS__ . '::' . __FUNCTION__  => $post]);
        
        return json_decode($post);
    }

    public function update(string $guid, array $values) {
        
        $update = $this->Curl($this->_base . '/forms/' . $guid . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setEncoding(self::JSON)
        ->put($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);

        return json_decode($update);
    }

    public function create(array $values) {

        $create = $this->Curl($this->_base . '/forms?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setEncoding(self::JSON)
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

        return json_decode($create);
    }
    
}