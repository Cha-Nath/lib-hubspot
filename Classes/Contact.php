<?php

namespace nlib\Hubspot\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\Hubspot\Interfaces\ContactInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Contact extends Hubspot implements ContactInterface, HubspotInterface, cURLConstantInterface {

    public function __construct() { $this->_base .= '/contacts/v1'; }

    public function getContact(int $id, array $options = []) {
        $contact = $this->cURL($this->_base . '/contact/vid/' . $id . '/profile?' . $this->getHapikey())->get($options);
        return json_decode($contact);
    }

    public function getContacts(array $options = []) {
        $contacts = $this->cURL($this->_base . '/lists/all/contacts/all?' . $this->getHapikey())->get($options);
        return json_decode($contacts);
    }

    public function update($id, array $values) {
        $url = is_numeric($id) ? 'vid/' . (int) $id : 'email/' . $id;
        $update = $this->cURL($this->_base . '/contact/' . $url . '/profile?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->post($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        return json_decode($update);
    }

    public function create(array $values) {
        $create = $this->cURL($this->_base . '/contact?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->post($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);
        return json_decode($create);
    }

    public function replace(string $email, array $values) {
        $replace = $this->cURL($this->_base . '/contact/createOrUpdate/email/' . $email . '/?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->post($values);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $replace]);
        return json_decode($replace);
    }

}