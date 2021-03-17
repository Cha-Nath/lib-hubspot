<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Hubspot\Interfaces\FilterConstanteInterface;
use nlib\Orm\Classes\Entity;

class Filter extends Entity implements FilterConstanteInterface, JsonSerializable {

    private $_propertyName = '';
    private $_operator = '';
    private $_value = '';

    #region Getter

    public function getPropertyName() : string { return $this->_propertyName; }
    public function getOperator() : string { return $this->_operator; }
    public function getValue() : string { return $this->_value; }

    #endregion

    #region Setter

    public function setPropertyName(string $propertyName) : self { $this->_propertyName = $propertyName; return $this; }
    public function setOperator(string $operator) : self { $this->_operator = $operator; return $this; }
    public function setValue(string $value) : self { $this->_value = $value; return $this; }

    #endregion

    #region Method

    public function jsonSerialize() { return $this->__getProperties(get_object_vars($this), false, false); }
    public function isValid() : bool {
        $bool = false;

        if(!empty($this->getPropertyName()) && !empty($this->getOperator())) :
            if(in_array($this->getOperator(), self::OPERATORS)) :
                if(in_array($this->getOperator(), self::VALUES_COMPARATORS)) :
                    if(!empty($this->getValue())) : $bool = true; endif;
                else :
                    $bool = true;
                endif;
            endif;
        endif;

        return $bool;
    }

    #endregion
}