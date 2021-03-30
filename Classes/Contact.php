<?php

namespace nlib\Hubspot\Classes;

use stdClass;
use nlib\Hubspot\Interfaces\ContactInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\OptionInterface;

class Contact extends Hubspot implements HubspotInterface, ContactInterface {

    public function __construct() {

        $this->_base .= '/crm/v3/objects/contacts';
        $this->setVersion('v3');
        
        parent::__construct();
    }

    public function getContact(int $id, ?OptionInterface $Option = null) : ?stdClass {

        $Contact = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get(!empty($Option) ? $Option->toURL() : []);

        return json_decode($Contact);
    }

    public function getContacts(?OptionInterface $Option = null) : ?stdClass {
        
        $Contacts = $this->cURL($this->_base . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get(!empty($Option) ? $Option->toURL() : []);

        return json_decode($Contacts);
    }

    public function update($id, array $values) {
        $url = is_numeric($id) ? 'vid/' . (int) $id : 'email/' . $id;
        $update = $this->cURL($this->_base . '/contact/' . $url . '/profile?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        return json_decode($update);
    }

    public function create(array $values) {

        $create = $this->cURL($this->_base . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

        return json_decode($create);
    }

    public function replace(string $email, array $values) {
        $replace = $this->cURL($this->_base . '/contact/createOrUpdate/email/' . $email . '/?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $replace]);
        return json_decode($replace);
    }

}