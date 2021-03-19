<?php

namespace nlib\Hubspot\Interfaces;

interface FilterInterface {

    /**
     *
     * @return string
     */
    public function getPropertyName() : string;

    /**
     *
     * @return string
     */
    public function getOperator() : string ;

    /**
     *
     * @return string
     */
    public function getValue() : string;

    /**
     *
     * @param string $propertyName
     * @return self
     */
    public function setPropertyName(string $propertyName);

    /**
     *
     * @param string $operator
     * @return self
     */
    public function setOperator(string $operator);

    /**
     *
     * @param string $value
     * @return self
     */
    public function setValue(string $value);

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

    #endregion
}