<?php

namespace nlib\Hubspot\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Log\Interfaces\DebugTraitInterface;

use nlib\Path\Classes\Path;
use nlib\cURL\Traits\cURLTrait;
use nlib\Hubspot\Traits\PropertyTrait;
use nlib\Instance\Traits\InstanceTrait;
use nlib\Log\Traits\DebugTrait;
use nlib\Log\Traits\LogTrait;
use nlib\Yaml\Traits\ParserTrait;
use nlib\Tool\Traits\ArrayTrait;

abstract class Hubspot implements HubspotInterface, cURLConstantInterface, DebugTraitInterface {

    use ParserTrait;
    use cURLTrait;
    use ArrayTrait;
    use LogTrait;
    use InstanceTrait;
    use DebugTrait;
    use PropertyTrait;

    private $_hapikeys = [];
    private $_version = 'v2';

    protected $_base = 'https://api.hubapi.com';
    protected $_history = false;

    public function __construct() {
        $this->init(Path::i($this->_i())->getConfig() . 'config');   
    }

    public function init(string $config) : self {
        if(file_exists($config . '.yaml'))
            if(array_key_exists('hapikey', $configs = $this->Parser()->get($config)))
                $this->setHapikeys($configs['hapikey']);

        return $this;
    }

    #region Getter

    public function getHapikeys() : array {
        if(empty($this->_hapikeys) || !array_key_exists('hapikey', $this->_hapikeys))
            $this->dlog([__CLASS__ . '::' . __FUNCTION__ => 'Var "hapikeys" is not correct.']);
        return $this->_hapikeys;
    }
    
    public function getHapikey() : string { return $this->assoc_to_GET($this->getHapikeys(), 1); }
    public function getBase() : string { return $this->_base; }
    public function getHistory() : bool { return $this->_history; }
    public function getVersion() : string { return $this->_version; }

    #endregion

    #region Setter
    
    public function setHapikeys(string $hapikey) : self { $this->_hapikeys['hapikey'] = $hapikey; return $this; }
    public function setHistory(bool $history = false) : self { $this->_history = !empty($history); return $this; }
    public function setVersion(string $version) : self { if(in_array($version, ['v1', 'v2', 'v3']))$this->_version = $version; return $this; }
    
    #endregion

}