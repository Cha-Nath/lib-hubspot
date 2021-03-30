<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface HubspotInterface {

    /**
     *
     * @param string $config
     * @return self
     */
    public function init(string $config);

    /**
     *
     * @param OptionInterface|null $Option
     * @return OptionInterface
     */
    public function Option(?OptionInterface $Option = null) : OptionInterface;

    /**
     *
     * @param stdClass $Class
     * @param string $property
     * @return mixed
     */
    public function get(stdClass $Class, string $property);

    /**
     *
     * @return array
     */
    public function getHapikeys() : array;
    
    /**
     *
     * @return string
     */
    public function getHapikey() : string;

    /**
     *
     * @return string
     */
    public function getBase() : string;

    /**
     *
     * @return boolean
     */
    public function getHistory() : bool;

    /**
     *
     * @return string
     */
    public function getVersion() : string;
    
    /**
     *
     * @param string $hapikey
     * @return self
     */
    public function setHapikeys(string $hapikey);

    /**
     *
     * @param boolean $history
     * @return self
     */
    public function setHistory(bool $history = false);

    /**
     *
     * @param string $version
     * @return self
     */
    public function setVersion(string $version);
    
    #endregion
}