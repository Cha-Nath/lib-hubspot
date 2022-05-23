<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Hubspot\Interfaces\OptionConstanceInterface;
use nlib\Hubspot\Interfaces\OptionInterface;
use nlib\Orm\Classes\Entity;

class Option extends Entity implements OptionInterface, OptionConstanceInterface, JsonSerializable {

    /**
     * A comma separated list of the properties to be returned in the response.
     * If any of the specified properties are not present on the requested object(s), they will be ignored.
     *
     * @var array
     */
    private $_properties = [];

    /**
     * Whether to return only results that have been archived.
     *
     * @var boolean
     */
    private $_archived = false;

    /**
     * A comma separated list of object types to retrieve associated IDs for.
     * If any of the specified associations do not exist, they will be ignored.
     *
     * @var array
     */
    private $_associations = [];

    /**
     * The name of a property whose values are unique for this object type
     *
     * @var string
     */
    private $_idProperty = '';

    /**
     * The paging cursor token of the last successfully read resource will be returned as the paging.next.after JSON property of a paged response containing more results.
     *
     * @var string
     */
    private $_after = '';

    /**
     * The maximum number of results to display per page.   
     *
     * @var integer
     * @default 10
     */
    private $_limit = 10;

    #region Getter
    
    public function getProperties() : array { return $this->_properties; }
    public function getArchived() : bool { return $this->_archived; }
    public function getAssociations() : array { return $this->_associations; }
    public function getIDProperty() : string { return $this->_idProperty; }
    public function getAfter() : string { return $this->_after; }
    public function getLimit() : int { return $this->_limit; }
    
    #endregion
    
    #region Setter
    
    public function setArchived(bool $archived) : self { $this->_archived = $archived; return $this; }
    public function setIDProperty(string $idproperty) : self { $this->_idProperty = $idproperty; return $this; }
    public function setProperties(array $properties) : self { $this->_properties = $properties; return $this; }
    public function setAssociations(array $associations) : self { $this->_associations = $associations; return $this; }
    public function setAfter(string $after) : self { $this->_after = $after; return $this; }
    public function setLimit(int $limit) : self { if($limit > 100) $limit = 100; $this->_limit = $limit; return $this; }

    #endregion

    #region Add

    public function addProperty(string $property) : self { 
        
        if(!in_array($property, $this->_properties))
            $this->_properties[] = $property;
        
        return $this;
    }

    public function addAssociation(string $association) : self {

        if(!in_array($association, $this->_associations) && in_array($association, self::ASSOCIATIONS))
            $this->_associations[] = $association;

        return $this;
    }

    #endregion

    public function jsonSerialize() : array { return $this->__getProperties(get_object_vars($this), false, false); }
    public function toURL(bool $nullable = false) : array {
        
        $results = [];
        $replace = 1;
        $properties = get_object_vars($this);

        foreach ($properties as $key => $value) :
            if(!$nullable && !(!empty($value) || is_numeric($value) || is_bool($value))) continue;
            
            if(is_array($value)) $value = urlencode(implode(',', $value));
            if($value === false) $value = 'false';

            $results[str_replace('_', '', $key, $replace)] = $value;
            // $string .= '&' .  . '=' . $value;
        endforeach;
        
        return $results;
    }
}