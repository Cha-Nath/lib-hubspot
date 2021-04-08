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
     * @param SearchInterface $Search
     * @return stdClass|null
     */
    public function search(SearchInterface $Search) : ?stdClass;
    
    /**
     *
     * @param OptionInterface $Option
     * @return stdClass|null
     */
    public function create(OptionInterface $Option) : ?stdClass;
    
    /**
     *
     * @param integer $id
     * @param OptionInterface $Option
     * @return stdClass|null
     */
    public function update(int $id, OptionInterface $Option) : ?stdClass;
    
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