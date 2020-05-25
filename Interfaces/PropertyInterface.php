<?php

namespace nlib\Hubspot\Interfaces;

interface PropertyInterface {

    /**
     *
     * @param string $objectype
     * @param string $property
     * @param array $values
     * @return mixed
     */
    public function update(string $objectype, string $property, array $values);

}