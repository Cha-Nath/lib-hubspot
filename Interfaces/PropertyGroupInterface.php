<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface PropertyGroupInterface {

    /**
     *
     * @param string $objectType
     * @param string $group
     * @return stdClass|null
     */
    public function getGroup(string $objectType, string $group) : ?stdClass;

    /**
     *
     * @param string $objectType
     * @return stdClass|null
     */
    public function getGroups(string $objectType) : ?stdClass;

    /**
     *
     * @param string $objectType
     * @param array $values
     * @return stdClass|null
     */
    public function create(string $objectType, array $values) : ?stdClass;

    /**
     *
     * @param string $objectType
     * @param string $group
     * @param array $values
     * @return stdClass|null
     */
    public function update(string $objectType, string $group, array $values) : ?stdClass;

    /**
     *
     * @param string $objectType
     * @param string $group
     * @return string
     */
    public function getEndpoint(string $objectType, string $group = '') : string;

}