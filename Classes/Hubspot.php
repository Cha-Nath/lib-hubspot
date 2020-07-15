<?php

namespace nlib\Hubspot\Classes;

use nlib\cURL\Interfaces\cURLConstantInterface;
use nlib\Hubspot\Interfaces\HubspotInterface;

use nlib\Path\Classes\Path;
use nlib\cURL\Traits\cURLTrait;
use nlib\Instance\Traits\InstanceTrait;
use nlib\Log\Traits\LogTrait;
use nlib\Yaml\Traits\ParserTrait;
use nlib\Tool\Traits\ArrayTrait;

abstract class Hubspot implements HubspotInterface, cURLConstantInterface {

    use ParserTrait;
    use cURLTrait;
    use ArrayTrait;
    use LogTrait;
    use InstanceTrait;

    private $_hapikeys = [];

    protected $_base = 'https://api.hubapi.com';
    protected $_debug = false;
    protected $_die = false;

    public function __construct(string $instance = 'i') {
        $this->init(Path::i($instance)->getConfig() . 'config');   
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
    public function dd() : array { return [$this->_debug, $this->_die]; }

    #endregion

    #region Setter
    
    public function setHapikeys(string $hapikey) : self { $this->_hapikeys['hapikey'] = $hapikey; return $this; }
    public function setDebug(bool $debug = false, bool $die = false) : self { $this->_debug = $debug; $this->_die = $die; return $this; }
    
    #endregion

}