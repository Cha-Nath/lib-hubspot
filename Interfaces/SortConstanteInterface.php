<?php

namespace nlib\Hubspot\Interfaces;

interface SortConstanteInterface {

    const ASC = 'ASCENDING';
    const DESC = 'DESCENDING';

    const ORDERING = [self::ASC, self::DESC];
}