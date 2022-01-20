<?php

namespace nlib\Hubspot\Classes;

use stdClass;
use nlib\Hubspot\Interfaces\ContactInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\SearchInterface;

class Contact extends Hubspot implements HubspotInterface, ContactInterface {

    private $_base_v3;

    public function __construct() {
        $this->_base_v3 = $this->_base . '/crm/v3/objects/contacts';
        $this->_base .= '/contacts/v1';
        parent::__construct();
    }

    public function getContact($id, array $options = []) : ?stdClass {

        if(is_numeric($id)) $url = 'vid/' . (int) $id;
        elseif(filter_var($id, FILTER_VALIDATE_EMAIL)) $url = 'email/' . $id;
        else $url = 'utk/' . $id;

        $Contact = $this->cURL($this->_base . '/contact/' . $url . '/profile?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($options);
        
        return json_decode($Contact);
    }

    public function getContacts(array $options = []) : ?stdClass {

        $Contacts = $this->cURL($this->_base . '/lists/all/contacts/all?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($options);

        return json_decode($Contacts);
    }

    public function update($id, array $values) : ?stdClass {

        $url = is_numeric($id) ? 'vid/' . (int) $id : 'email/' . $id;
        $Update = $this->cURL($this->_base . '/contact/' . $url . '/profile?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([$this->l() => $Update]);

        return json_decode($Update);
    }

    public function create(array $values) : ?stdClass {

        $Create = $this->cURL($this->_base . '/contact?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([$this->l() => $Create]);

        return json_decode($Create);
    }

    public function replace(string $email, array $values) : ?stdClass {

        $Replace = $this->cURL($this->_base . '/contact/createOrUpdate/email/' . $email . '/?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([$this->l() => $Replace]);

        return json_decode($Replace);
    }

    public function search(SearchInterface $Search) : ?stdClass {

        $Contacts = $this->cURL($this->_base_v3 . '/search?' . $this->getHapikey() . '&archived=true')
            ->setContentType(self::APPLICATION_JSON)
            ->setHttpheaders([self::APPLICATION_JSON_ACCEPT])
            ->setDebug(...$this->dd())
            ->post($Search->jsonSerialize());

            return json_decode($Contacts);
    }

}