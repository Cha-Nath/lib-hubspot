<?php

namespace nlib\Hubspot\Interfaces;

interface PropertyEntityInterface {

    /**
     *
     * @return array
     */
    public function getProperties() : array;

    /**
     *
     * @param string $key
     * @param string $value
     * @return self
     */
    public function addProperty(string $key, string $value);

    /**
     *
     * @param array $properties
     * @return self
     */
    public function setProperties(array $properties);
}