<?php

namespace nlib\Hubspot\Interfaces;

interface ContactInterface {

    /**
     *
     * @param integer $id
     * @param array $options
     * @return mixed
     */
    public function getContact(int $id, array $options = []);

    /**
     *
     * @param array $options
     * @return mixed
     */
    public function getContacts(array $options = []);

    /**
     *
     * @param integer $id
     * @param array $values
     * @return mixed
     */
    public function update(int $id, array $values);

}