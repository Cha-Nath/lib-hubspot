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
     * @return void
     */
    public function getSort() : SortInterface;

    /**
     *
     * @return string
     */
    public function getOffset() : string;

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
     * @param array $filters
     * @return self
     */
    public function addFilters(array $filters);

    /**
     *
     * @return array
     */
    public function jsonSerialize() : array;
}