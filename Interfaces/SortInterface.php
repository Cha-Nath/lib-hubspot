<?php

namespace nlib\Hubspot\Interfaces;

interface SortInterface {

    /**
     *
     * @return string
     */
    public function getPropertyName() : string;

    /**
     *
     * @return string
     */
    public function getDirection() : string;
    
    /**
     *
     * @param string $propertyName
     * @return self
     */
    public function setPropertyName(string $propertyName);

    /**
     *
     * @param string $direction
     * @return self
     */
    public function setDirection(string $direction);

    /**
     *
     * @return array
     */
    public function jsonSerialize() : array;

    /**
     *
     * @return boolean
     */
    public function isValid() : bool;
}