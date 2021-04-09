<?php

namespace nlib\Hubspot\Interfaces;

interface SearchInterface {

    /**
     *
     * @return array
     */
    public function getFilterGroups() : array;

    /**
     *
     * @return string
     */
    public function getQuery() : string;

    /**
     *
     * @return SortInterface
     */
    public function getSort() : SortInterface;

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
     * @return integer
     */
    public function getAfter() : int;

    /**
     *
     * @param string $query
     * @return self
     */
    public function setQuery(string $query);

    /**
     *
     * @param string $offset
     * @return self
     */
    public function setOffset(string $offset);

    /**
     *
     * @param integer $limit
     * @return self
     */
    public function setLimit(int $limit);

    /**
     *
     * @param array $options
     * @return self
     */
    public function setSort(array $options);

    /**
     *
     * @param array $properties
     * @return self
     */
    public function setProperties(array $properties);

    /**
     *
     * @param integer $after
     * @return self
     */
    public function setAfter(int $after);

    /**
     *
     * @param array $filters
     * @return self
     */
    public function addFilters(array $filters);

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