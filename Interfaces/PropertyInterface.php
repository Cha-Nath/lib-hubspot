<?php

namespace nlib\Hubspot\Interfaces;

interface PropertyInterface {

    /**
     *
     * @param string $objectype
     * @param string $property
     * @param array $values
     * @return mixed array|stdClass
     */
    public function update(string $objectype, string $property, array $values);

    /**
     *
     * @param string $objectype
     * @param string $property
     * @return mixed array|stdClass
     */
    public function getProperty(string $objectype, string $property);

    /**
     *
     * @param string $objectype
     * @param string $property
     * @return string
     */
    public function getUrl(string $objectype, string $property) : string;

}