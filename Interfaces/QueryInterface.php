<?php

namespace nlib\Hubspot\Interfaces;

interface QueryInterface {

    /**
     *
     * @return string
     */
    public function getQuery() : string;

    /**
     *
     * @return integer
     */
    public function getCount() : int;

    /**
     *
     * @return string
     */
    public function getSort() : string;

    /**
     *
     * @return string
     */
    public function getOffset() : string;

    /**
     *
     * @return array
     */
    public function getProperties() : array;

    /**
     *
     * @param string $query
     * @return self
     */
    public function setQuery(string $query);

    /**
     *
     * @param integer $limit
     * @return self
     */
    public function setCount(int $limit);

    /**
     *
     * @param string $offset
     * @return self
     */
    public function setOffset(string $offset);

    /**
     *
     * @param string $sort
     * @return self
     */
    public function setSort(string $sort);

    /**
     *
     * @param array $properties
     * @return self
     */
    public function setProperties(array $properties);

    /**
     *
     * @param string $property
     * @return self
     */
    public function addProperty(string $property);

    /**
     *
     * @return array
     */
    public function jsonSerialize() : array;
}