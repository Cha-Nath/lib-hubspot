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
     * @param mixed (string|int) $id
     * @param array $values
     * @return mixed
     */
    public function update($id, array $values);

    /**
     *
     * @param array $values
     * @return mixed
     */
    public function create(array $values);

    /**
     *
     * @param string $email
     * @param array $values
     * @return mixed
     */
    public function replace(string $email, array $values);

}