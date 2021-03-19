<?php

namespace nlib\Hubspot\Interfaces;

interface OptionInterface {
    
    /**
     *
     * @return array
     */
    public function getProperties() : array;

    /**
     *
     * @return boolean
     */
    public function getArchived() : bool;

    /**
     *
     * @return array
     */
    public function getAssociations() : array;

    /**
     *
     * @return string
     */
    public function getIDProperty() : string;
    
    /**
     *
     * @param boolean $archived
     * @return self
     */
    public function setArchived(bool $archived);

    /**
     *
     * @param string $idproperty
     * @return self
     */
    public function setIDProperty(string $idproperty);

    /**
     *
     * @param array $properties
     * @return self
     */
    public function setProperties(array $properties);

    /**
     *
     * @param array $associations
     * @return self
     */
    public function setAssociations(array $associations);

    /**
     *
     * @param string $property
     * @return self
     */
    public function addProperty(string $property);

    /**
     *
     * @param string $association
     * @return self
     */
    public function addAssociation(string $association);

    /**
     *
     * @return array
     */
    public function jsonSerialize() : array;

    /**
     *
     * @param boolean $nullable
     * @return array
     */
    public function toURL(bool $nullable = false) : array;
}