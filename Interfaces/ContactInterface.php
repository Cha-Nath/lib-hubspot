<?php

namespace nlib\Hubspot\Interfaces;

interface ContactInterface {

    /**
     *
     * @param integer $id
     * @param array $parameters
     * @return mixed
     */
    public function getContact(int $id, array $parameters = []);

    /**
     *
     * @param array $parameters
     * @return mixed
     */
    public function getContacts(array $parameters = []);

    /**
     *
     * @param integer $id
     * @param array $values
     * @return mixed
     */
    public function update(int $id, array $values);

}