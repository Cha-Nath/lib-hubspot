<?php

namespace nlib\Hubspot\Interfaces;

interface HubspotInterface {

    /**
     *
     * @param string $config
     * @return self
     */
    public function init(string $config);

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
     * @return array
     */
    public function dd() : array;

    /**
     *
     * @param string $hapikey
     * @return self
     */
    public function setHapikeys(string $hapikey);

    /**
     *
     * @param boolean $debug
     * @param boolean $die
     * @return self
     */
    public function setDebug(bool $debug = false, bool $die = false);
}