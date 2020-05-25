<?php

namespace nlib\Hubspot\Interfaces;

interface FileInterface {

    /**
     *
     * @param array $values
     * @return mixed
     */
    public function upload(array $values);
    
}