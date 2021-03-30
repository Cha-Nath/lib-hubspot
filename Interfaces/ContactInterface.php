<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface ContactInterface {

    /**
     *
     * @param string|integer $id
     * @param OptionInterface|null $Option
     * @return stdClass|null
     */
    public function getContact(int $id, ?OptionInterface $Option = null) : ?stdClass;

    /**
     *
     * @param OptionInterface|null $Option
     * @return stdClass|null
     */
    public function getContacts(?OptionInterface $Option = null) : ?stdClass;

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