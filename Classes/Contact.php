<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Entity\Option;
use stdClass;
use nlib\Hubspot\Interfaces\{ AssociationConstanteInterface, ContactInterface, HubspotInterface, OptionInterface, ValueInterface};

class Contact extends Hubspot implements HubspotInterface, ContactInterface {

    public function __construct() {

        $this->_base .= '/crm/v3/objects/contacts';
        $this->setVersion('v3');
        
        parent::__construct();
    }

    public function getContact(int $id, ?OptionInterface $Option = null) : ?stdClass {

        $Contact = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($this->Option($Option)->toUrl());

        return json_decode($Contact);
    }

    public function getContacts(?OptionInterface $Option = null) : ?stdClass {
        
        $Contacts = $this->cURL($this->_base . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->get($this->Option($Option)->toUrl());

        return json_decode($Contacts);
    }

    public function getAllContacts(?OptionInterface $Option = null) : ?stdClass {

        $Afters = null;

        if( !empty($Contacts = $this->getContacts($Option))
            && property_exists($Contacts, $p = 'paging')
            && !empty($Contacts->{$p})

            && property_exists($Contacts->{$p}, $n = 'next')
            && !empty($Contacts->{$p}->{$n})

            && property_exists($Contacts->{$p}->{$n}, $a = 'after')
            && !empty($after = $Contacts->{$p}->{$n}->{$a})
        ) :

            if(empty($Option)) $Option = new Option;
            $Option->setAfter($after);
            $Afters = $this->getAllContacts($Option);
        endif;

        if( !empty($Afters)
            && property_exists($Afters, $r = 'results')
            && !empty($Afters->{$r})
        ) :
            $Contacts->{$r} = array_merge($Contacts->{$r}, $Afters->{$r});
        endif; 

        return $Contacts;
    }

    public function update(int $id, ValueInterface $Value) : ?stdClass {

        $Update = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->patch(['properties' => $Value->getProperties()]);

        $this->log([$this->l() => $Update]);

        return json_decode($Update);
    }

    public function create(array $values) {

        $Create = $this->cURL($this->_base . '?' . $this->getHapikey())
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([$this->l() => $Create]);

        return json_decode($Create);
    }

    // public function replace(string $email, array $values) {
    //     $replace = $this->cURL($this->_base . '/contact/createOrUpdate/email/' . $email . '/?' . $this->getHapikey())
    //     ->setContentType(self::APPLICATION_JSON)
    //     ->setDebug(...$this->dd())
    //     ->post($values);
    //     $this->log([$this->l() => $replace]);
    //     return json_decode($replace);
    // }

    public function associate(int $contactID, string $toObjectType, int $toObjectID, string $associationType) : ?stdClass {

        if(!in_array($toObjectID, AssociationConstanteInterface::OBJECT_TYPES))
            $this->dlog([$this->l() => 'Parameter "$toObjectID" : "' . $toObjectID . '" doesn\'t contain a valid value.']);

        if(!in_array($associationType, AssociationConstanteInterface::ASSOCIATION_TYPES))
            $this->dlog([$this->l() => 'Parameter "$associationType" : "' . $associationType . '" doesn\'t contain a valid value.']);

        $Association = $this->cURL($this->_base . '/' . $contactID
            . '/associations/' . $toObjectType . '/' . $toObjectID . '/' . $associationType . '?' . $this->getHapikey())
        ->setDebug(...$this->dd())
        ->put();

        return json_decode($Association);
    }
}