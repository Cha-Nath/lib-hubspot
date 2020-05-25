<?php

namespace nlib\Hubspot\Interfaces;

interface CompanyInterface {
    
    /**
     *
     * @param integer $id
     * @param array $options
     * @return mixed
     */
    public function getCompany(int $id, array $options = []);

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
     * @param array $contactid
     * @return mixed
     */
    public function associate(int $id, array $contactid);
    
}