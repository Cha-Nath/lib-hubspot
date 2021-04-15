<?php

namespace nlib\Hubspot\Interfaces;

interface FileEntityInterface {

    /**
     *
     * @return string
     */
    public function getUrl() : string;

    /**
     *
     * @return string
     */
    public function getFolderPath() : string;

    /**
     *
     * @return string
     */
    public function getAccess() : string;

    /**
     *
     * @return string
     */
    public function getTtl() : string;

    /**
     *
     * @return string
     */
    public function getOverwrite() : string;

    /**
     *
     * @return string
     */
    public function getDuplicateValidationStrategy() : string;

    /**
     *
     * @return string
     */
    public function getDuplicateValidationScope() : string;

    /**
     *
     * @param string $url
     * @return self
     */
    public function setUrl(string $url);

    /**
     *
     * @param string $folderPath
     * @return self
     */
    public function setFolderPath(string $folderPath);

    /**
     *
     * @param string $access
     * @return self
     */
    public function setAccess(string $access);

    /**
     *
     * @param string $ttl
     * @return self
     */
    public function setTtl(string $ttl);

    /**
     *
     * @param boolean $overwrite
     * @return self
     */
    public function setOverwrite(bool $overwrite);

    /**
     *
     * @param string $duplicateValidationStrategy
     * @return self
     */
    public function setDuplicateValidationStrategy(string $duplicateValidationStrategy);

    /**
     *
     * @param string $duplicateValidationScope
     * @return self
     */
    public function setDuplicateValidationScope(string $duplicateValidationScope);

    /**
     *
     * @return array
     */
    public function jsonSerialize() : array;
}