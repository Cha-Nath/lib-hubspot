<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface FileInterface {

    const COMPLETE = 'COMPLETE';
    const PENDING = 'PENDING';

    /**
     *
     * @param FileEntityInterface $File
     * @return stdClass|null
     */
    public function upload(FileEntityInterface $File) : ?stdClass;

    /**
     * Recursive function
     *
     * @param stdClass|null $Obj
     * @return stdClass|null
     */
    public function is(?stdClass $Obj) : ?stdClass;

    /**
     *
     * @param string $string
     * @param boolean $isLink
     * @return stdClass|null
     */
    public function getStatus(string $string, bool $isLink = true) : ?stdClass;
    
}