<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Orm\Classes\Entity;

class Association extends Entity implements AssociationEntityInterface, JsonSerializable {
    
    private $_inputs = [];

    #region Getter
    
    public function getInputs() : array { return $this->_inputs; }

    #endregion

    #region Setter
    
    public function setInputs(array $inputs) : self { $this->_inputs = $inputs; return $this; }
    public function addInput(string $key, string $value) : self { $this->_inputs[$key] = $value; return $this; }
    
    #endregion

    public function jsonSerialize() : array { return $this->__getProperties(get_object_vars($this), false, false); }
}

//   CURLOPT_POSTFIELDS => "{\"inputs\":[{\"from\":{\"id\":\"53628\"},\"to\":{\"id\":\"12726\"},\"type\":\"contact_to_company\"}]}",
