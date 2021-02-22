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
     * @param string $hapikey
     * @return self
     */
    public function setHapikeys(string $hapikey);
}