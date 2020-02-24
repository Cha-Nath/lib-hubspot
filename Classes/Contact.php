<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\ContactInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Contact extends Hubspot implements ContactInterface, HubspotInterface {

    public function getContact(int $id, array $options = []) {
        $gets = array_merge($options, $this->getHapikeys());
        $contact = $this->cURL('https://api.hubapi.com/contacts/v1/contact/vid/' . $id . '/profile')->get($gets);
        return json_decode($contact);
    }

    public function getContacts(array $options = []) {
        $gets = array_merge($options, $this->getHapikeys());
        $contacts = $this->cURL('https://api.hubapi.com/contacts/v1/lists/all/contacts/all')->get($gets);
        return json_decode($contacts);
    }

    public function update(int $id, array $values) {
        $url = 'https://api.hubapi.com/contacts/v1/contact/vid/' . $id . '/profile?' . $this->getHapikey();
        $update = $this->cURL($url)->post($values);
        return json_decode($update);
    }

}