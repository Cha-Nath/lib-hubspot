<?php

namespace nlib\Hubspot\Interfaces;

interface ContactInterface {

    /**
     *
     * @param integer $id
     * @return mixed
     */
    public function getContact(int $id);

    /**
     *
     * @return mixed
     */
    public function getContacts();

    /**
     *
     * @param integer $id
     * @param array $values
     * @return mixed
     */
    public function update(int $id, array $values);

}