<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface DealInterface {

    /**
     *
     * @param integer $id
     * @param OptionInterface|null $Option
     * @return stdClass|null
     */
    public function getDeal(int $id, ?OptionInterface $Option = null) : ?stdClass;

    /**
     *
     * @param OptionInterface|null $Option
     * @return stdClass|null
     */
    public function getDeals(?OptionInterface $Option = null) : ?stdClass;
    
    /**
     *
     * @param integer $id
     * @param array $values
     * @return mixed
     */
    // public function update(int $id, array $values);
    
    /**
     *
     * @param array $values
     * @return mixed
     */
    // public function create(array $values);
    
    /**
     *
     * @param integer $dealID
     * @param string $toObjectType
     * @param integer $toObjectID
     * @param string $associationType
     * @return stdClass|null
     */
    public function associate(int $dealID, string $toObjectType, int $toObjectID, string $associationType) : ?stdClass;
    
}