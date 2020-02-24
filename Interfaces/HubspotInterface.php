<?php

namespace nlib\Hubspot\Interfaces;

interface HubspotInterface {

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
     * @param string $hapikey
     * @return self
     */
    public function setHapikeys(string $hapikey);
}