<?php

namespace nlib\Hubspot\Interfaces;

interface PropertyInterface {

    /**
     *
     * @param string $property
     * @param array $values
     * @return mixed
     */
    public function update(string $property, array $values);

}