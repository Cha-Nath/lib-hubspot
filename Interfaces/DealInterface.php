<?php

namespace nlib\Hubspot\Interfaces;

interface DealInterface {

    /**
     *
     * @param integer $id
     * @param array $options
     * @return mixed
     */
    public function getDeal(int $id, array $options = []);
    
    /**
     *
     * @param integer $id
     * @param array $values
     * @return mixed
     */
    public function update(int $id, array $values);
    
    /**
     *
     * @param array $values
     * @return mixed
     */
    public function create(array $values);
    
    /**
     *
     * @param integer $id
     * @param integer $elementid
     * @param string $type
     * @return mixed
     */
    public function associate(int $id, int $elementid, string $type);
    
}