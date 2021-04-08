<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Hubspot\Interfaces\ValueInterface;
use nlib\Orm\Classes\Entity;

class Value extends Entity implements ValueInterface, JsonSerializable {

    private $_properties = [];

    #region Getter

    public function getProperties() : array { return $this->_properties; }

    #endregion

    #region Setter

    public function addProperty(string $key, string $value) : self { $this->_properties[$key] = $value; return $this; }
    public function setProperties(array $properties) : self { $this->_properties = $properties; return $this; }

    #endregion

    public function jsonSerialize() : array { return $this->__getProperties(get_object_vars($this), false, false); }
}