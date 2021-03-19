<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Hubspot\Interfaces\SearchInterface;
use nlib\Hubspot\Interfaces\SortInterface;
use nlib\Orm\Classes\Entity;
use nlib\Tool\Traits\ArrayTrait;

class Search extends Entity implements SearchInterface, JsonSerializable {

    use ArrayTrait;

    /**
     *
     * @var Filter[]
     */
    private $_FilterGroups;

    /**
     *
     * @var string
     */
    private $_query = '';

    /**
     *
     * @var Sort|null
     */
    private $_Sort = null;

    /**
     *
     * @var string
     */
    private $_offset = '';

    /**
     *
     * @var int
     */
    private $_limit = 100;

    /**
     *
     * @var string
     */
    private $_after = '';

    /**
     *
     * @var array
     */
    private $_properties = [];

    #region Getter

    public function getFilterGroups() : array { return $this->_FilterGroups; }
    public function getQuery() : string { return $this->_query; }
    public function getSort() : SortInterface { return $this->_Sort; }
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
    public function setProperties(array $properties) : self { $this->_properties = $properties; return $this; }

    #endregion

    #region Add

    public function addFilters(array $filters) : self {
        
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

    // public function addProperty(string $property) : self {
    //     $this->_property[] = $property;
    //     return $this;
    // }

    #endregion

    public function jsonSerialize() : array {
        
        if(!empty($this->_FilterGroups)) :
            $this->filterGroups = $this->_FilterGroups;
            $this->_FilterGroups = [];
        endif;

        if(!empty($this->_Sort)) :
            $this->sorts = $this->_Sort;
            $this->_Sort = null;
        endif;

        $properties = $this->__getProperties(get_object_vars($this), false, false);

        return $properties;
    }
}