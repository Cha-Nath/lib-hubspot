<?php

namespace nlib\Hubspot\Interfaces;

interface OwnerInterface {

    /**
     *
     * @return mixed
     */
    public function getOwners();

    /**
     *
     * @param integer $id
     * @param array $options
     * @return mixed
     */
    public function getOwner(int $id, array $options = []);
}