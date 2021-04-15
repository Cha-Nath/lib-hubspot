<?php

namespace nlib\Hubspot\Entity;

use JsonSerializable;
use nlib\Hubspot\Interfaces\FileEntityInterface;
use nlib\Orm\Classes\Entity;

class File extends Entity implements FileEntityInterface, JsonSerializable {

    private $_url = '';
    private $_folderPath = '/docs';
    private $_access = 'PUBLIC_INDEXABLE';
    private $_ttl = 'P3M';
    private $_overwrite = false;
    private $_duplicateValidationStrategy = 'NONE';
    private $_duplicateValidationScope = 'ENTIRE_PORTAL';

    #region Getter

    public function getUrl() : string { return $this->_url; }
    public function getFolderPath() : string { return $this->_folderPath; }
    public function getAccess() : string { return $this->_access; }
    public function getTtl() : string { return $this->_ttl; }
    public function getOverwrite() : string { return $this->_overwrite; }
    public function getDuplicateValidationStrategy() : string { return $this->_duplicateValidationStrategy; }
    public function getDuplicateValidationScope() : string { return $this->_duplicateValidationScope; }

    #endregion

    #region Setter

    public function setUrl(string $url) : self { $this->_url = $url; return $this; }
    public function setFolderPath(string $folderPath) : self { $this->_folderPath = $folderPath; return $this; }
    public function setAccess(string $access) : self { $this->_access = $access; return $this; }
    public function setTtl(string $ttl) : self { $this->_ttl = $ttl; return $this; }
    public function setOverwrite(bool $overwrite) : self { $this->_overwrite = $overwrite; return $this; }
    public function setDuplicateValidationStrategy(string $duplicateValidationStrategy) : self { $this->_duplicateValidationStrategy = $duplicateValidationStrategy; return $this; }
    public function setDuplicateValidationScope(string $duplicateValidationScope) : self { $this->_duplicateValidationScope = $duplicateValidationScope; return $this; }

    #endregion

    public function jsonSerialize() : array { return $this->__getProperties(get_object_vars($this), false, false); }
}