<?php

namespace hubspotSA\Classes;

use nlib\Hubspot\Interfaces\ContactInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

class Contact extends Hubspot implements ContactInterface, HubspotInterface {

    public function getContact(int $id) {
        $contact = $this->cURL('https://api.hubapi.com/contacts/v1/contact/vid/' . $id . '/profile')->get($this->getHapikeys());
        return json_decode($contact);
    }

    public function getContacts() {
        $contacts = $this->cURL('https://api.hubapi.com/contacts/v1/lists/all/contacts/all')->get($this->getHapikeys());
        return json_decode($contacts);
    }

    public function update(int $id, array $values) {
        $url = 'https://api.hubapi.com/contacts/v1/contact/vid/' . $id . '/profile?' . $this->getHapikey();
        $update = $this->cURL($url)->post($values);
        return json_decode($update);
    }

}