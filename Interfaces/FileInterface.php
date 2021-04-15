<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface FileInterface {

    /**
     *
     * @param FileEntityInterface $File
     * @return stdClass|null
     */
    public function upload(FileEntityInterface $File) : ?stdClass;
    
}