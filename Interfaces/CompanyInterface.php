<?php

namespace nlib\Hubspot\Interfaces;

use stdClass;

interface CompanyInterface {
    
    /**
     * Undocumented function
     *
     * @param integer $id
     * @param OptionInterface|null $Option
     * @return stdClass|null
     */
    public function getCompany(int $id, ?OptionInterface $Option = null) : ?stdClass;

    /**
     * Undocumented function
     *
     * @param OptionInterface|null $Option
     * @return stdClass|null
     */
    public function getCompagnies(?OptionInterface $Option = null) : ?stdClass;

    /**
     * Undocumented function
     *
     * @param Search $Search
     * @return stdClass|null
     */
    public function search(SearchInterface $Search) : ?stdClass;

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param array $values
     * @return stdClass|null
     */
    // public function update(int $id, array $values) : ?stdClass;
    
    /**
     * Undocumented function
     *
     * @param array $values
     * @return stdClass|null
     */
    // public function create(array $values) : ?stdClass;

    /**
     *
     * @param integer $companyID
     * @param string $toObjectType
     * @param integer $toObjectID
     * @param string $associationType
     * @return stdClass|null
     */
    public function associate(int $companyID, string $toObjectType, int $toObjectID, string $associationType) : ?stdClass;
    
}