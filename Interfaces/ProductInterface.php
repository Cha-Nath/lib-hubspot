<?php

namespace nlib\Hubspot\Interfaces;

interface ProductInterface {

    /**
     *
     * @param integer $id
     * @param array $options
     * @return mixed
     */
    public function getProduct(int $id, array $options = []);

    /**
     *
     * @return mixed
     */
    public function getProducts();

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
    public function batchupdate(array $values);

    /**
     *
     * @param array $values
     * @return mixed
     */
    public function create(array $values);

    /**
     *
     * @param array $values
     * @return mixed
     */
    public function batchcreate(array $values);
}