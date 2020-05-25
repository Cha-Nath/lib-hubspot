<?php

namespace nlib\Hubspot\Interfaces;

interface FormInterface {

    /**
     *
     * @param integer $portalID
     * @param string $formGUID
     * @param array $options
     * @return mixed
     */
    public function post(int $portalID, string $formGUID, array $options = []);

    /**
     *
     * @param integer $portalID
     * @param string $formGUID
     * @param array $options
     * @return mixed
     */
    public function post_v3(int $portalID, string $formGUID, array $options = []);

    /**
     *
     * @param string $guid
     * @param array $values
     * @return mixed
     */
    public function update(string $guid, array $values);

    /**
     *
     * @param array $values
     * @return mixed
     */
    public function create(array $values);
    
}