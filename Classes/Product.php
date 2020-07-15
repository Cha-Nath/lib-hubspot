<?php

namespace nlib\Hubspot\Classes;

use nlib\Hubspot\Interfaces\HubspotInterface;
use nlib\Hubspot\Interfaces\ProductInterface;

class Product extends Hubspot implements HubspotInterface, ProductInterface {

    public function __construct(string $instance = 'i') { $this->_base .= '/crm-objects/v1/objects/products'; parent::__construct($instance); }

    public function getProduct(int $id, array $options = []) {

        $product = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setDebug(...$this->dd())
        ->get($options);

        return json_decode($product);
    }

    public function getProducts() {

        $products = $this->cURL($this->_base . '/paged?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setDebug(...$this->dd())
        ->get();

        return json_decode($products);
    }

    public function update(int $id, array $values) {

        $update = $this->cURL($this->_base . '/' . $id . '?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->put($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update]);
        
        return \json_decode($update);
    }

    public function batchupdate(array $values) {

        $update = $this->cURL($this->_base . '/batch-update?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $update], 'batch_');
        
        return \json_decode($update);
    }

    public function create(array $values) {

        $create = $this->cURL($this->_base . '?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create]);

        return json_decode($create);
    }

    public function batchcreate(array $values) {

        $create = $this->cURL($this->_base . '/batch-create?' . $this->getHapikey())
        ->setEncoding(self::JSON)
        ->setContentType(self::APPLICATION_JSON)
        ->setDebug(...$this->dd())
        ->post($values);

        // var_dump(json_decode($create));

        $this->log([__CLASS__ . '::' . __FUNCTION__ => $create], 'batch_');

        return json_decode($create);
    }
}