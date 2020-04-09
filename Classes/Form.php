<?php

namespace nlib\Hubspot\Classes;

class Form extends Hubspot {

    public function post(int $portalID, string $formGUID, array $options = []) {

        $post = $this->cURL('https://forms.hubspot.com/uploads/form/v2/' . $portalID . '/' . $formGUID)
        ->setEncoding(self::_STRING)
        ->setContentType(self::APPLICATION)
        ->post($options);

        $this->log([__CLASS__ . '::' . __FUNCTION__  => $post]);
        
        return json_decode($post);
    }
    
}