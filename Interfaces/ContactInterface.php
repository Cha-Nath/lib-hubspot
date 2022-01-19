<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface ContactInterface {

    /**
     *
     * @param integer|string $id
     * @param array $options
     * @return stdClass|null
     */
    public function getContact($id, array $options = []) : ?stdClass;

    /**
     *
     * @param array $options
     * @return stdClass|null
     */
    public function getContacts(array $options = []) : ?stdClass;

    /**
     *
     * @param mixed (string|int) $id
     * @param array $values
     * @return stdClass|null
     */
    public function update($id, array $values) : ?stdClass;

    /**
     *
     * @param array $values
     * @return stdClass|null
     */
    public function create(array $values) : ?stdClass;

    /**
     *
     * @param string $email
     * @param array $values
     * @return stdClass|null
     */
    public function replace(string $email, array $values) : ?stdClass;

}