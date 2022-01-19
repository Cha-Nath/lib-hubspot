<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Hubspot\Interfaces\QueryInterface;
use nlib\Orm\Classes\Entity;

class Query extends Entity implements QueryInterface, JsonSerializable {

    /**
     *
     * @var string
     */
    private $_q = '';

    /**
     *
     * @var string
     */
    private $_sort = '';

    /**
     *
     * @var string
     */
    private $_offset = '';

    /**
     *
     * @var int
     */
    private $_count = 100;

    /**
     *
     * @var array
     */
    private $_properties = [];

    #region Getter

    public function getQuery() : string { return $this->_q; }
    public function getOffset() : string { return $this->_offset; }
    public function getCount() : int { return $this->_count; }
    public function getSort() : string { return $this->_sort; }
    public function getProperties() : array { return $this->_properties; }

    #endregion

    #region Setter

    public function setQuery(string $query) : self { $this->_q = $query; return $this; }
    public function setOffset(string $offset) : self { $this->_offset = $offset; return $this; }
    public function setCount(int $count) : self { $this->_count = $count; return $this; }
    public function setSort(string $sort) : self { $this->_sort = $sort; return $this; }    
    public function setProperties(array $properties) : self { $this->_properties = $properties; return $this; }

    #endregion

    #region Add

    public function addProperty(string $property) : self {
        $this->_properties[] = $property;
        return $this;
    }

    #endregion

    public function jsonSerialize() : array {

        $properties = $this->__getProperties(get_object_vars($this), false, false);

        return $properties;
    }
}