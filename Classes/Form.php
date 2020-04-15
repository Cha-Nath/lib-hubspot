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

    public function post_v3(int $portalID, string $formGUID, array $options = []) {
        
        $post = $this->cURL('https://api.hsforms.com/submissions/v3/integration/submit/' . $portalID . '/' . $formGUID)
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->post($options);

        $this->log([__CLASS__ . '::' . __FUNCTION__  => $post]);
        
        return json_decode($post);
    }
    
}