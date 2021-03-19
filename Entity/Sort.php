<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Hubspot\Interfaces\SortConstanteInterface;
use nlib\Hubspot\Interfaces\SortInterface;
use nlib\Orm\Classes\Entity;

class Sort extends Entity implements SortInterface, SortConstanteInterface, JsonSerializable {

    private $_propertyName = '';
    private $_direction = '';

    #region Getter

    public function getPropertyName() : string { return $this->_propertyName; }
    public function getDirection() : string { return $this->_direction; }

    #endregion

    #region Setter

    public function setPropertyName(string $propertyName) : self { $this->_propertyName = $propertyName; return $this; }
    public function setDirection(string $direction) : self { $this->_direction = $direction; return $this; }

    #endregion

    #region Method

    public function jsonSerialize() : array { return $this->__getProperties(get_object_vars($this), false, false); }
    public function isValid() : bool {
        
        return !empty($this->getPropertyName())
        && !empty($this->getDirection()
        && in_array($this->getDirection(), self::ORDERING));
    }
}