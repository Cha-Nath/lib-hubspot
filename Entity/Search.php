<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Orm\Classes\Entity;
use nlib\Tool\Traits\ArrayTrait;

class Search extends Entity implements JsonSerializable {

    use ArrayTrait;
    /**
     *
     * @var 
     */
    private $_FilterGroups;

    /**
     *
     * @var string
     */
    private $_query = '';

    /**
     *
     * @var 
     */
    private $_Sort;

    /**
     *
     * @var string
     */
    private $_offset = '';

    /**
     *
     * @var int
     */
    private $_limit = 10000;

    /**
     *
     * @var string
     */
    private $_after = '';

    /**
     *
     * @var array
     */
    private $_property = [];

    #region Getter

    public function getFilterGroups() { return $this->_FilterGroups; }
    public function getQuery() : string { return $this->_query; }
    public function getSort() { return $this->_Sort; }
    public function getOffset() : string { return $this->_offset; }

    #endregion

    #region Setter

    public function setQuery(string $query) : self { $this->_query = $query; return $this; }
    public function setOffset(string $offset) : self { $this->_offset = $offset; return $this; }
    public function setLimit(int $limit) : self { $this->_limit = $limit; return $this; }
    public function setSort(array $options) : self {
        $Sort = (new Sort)->hydrate($options);
        if($Sort->isValide()) $this->_Sort = $Sort;
        return $this;
    }

    #endregion

    #region Add

    public function addFilters(array $filters) {
        
        $Filters = [];
        $Filter = null;

        // only one fitler {propertyName:NAME, etc}
        if($this->is_assoc($filters)) $filters = [$filters];
        
        foreach($filters as $options) :
            $Filter = (new Filter)->hydrate($options);
            if(!$Filter->isValid()) continue;
            $Filters[] = $Filter;
        endforeach;

        if(!empty($Filters)) $this->_FilterGroups[] = ['filters' => $Filters];

        return $this;
    }

    public function addProperty(string $property) : self {
        $this->_property[] = $property;
        return $this;
    }

    #endregion

    public function jsonSerialize() { return $this->__getProperties(get_object_vars($this), true, false); }
}