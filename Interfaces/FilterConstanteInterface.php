<?php

namespace nlib\Hubspot\Interfaces;

interface FilterConstanteInterface {
    
    // eq =ual to
    const EQ = 'EQ';
    
    // not equal to
    const NEQ = 'NEQ';
    
    // less than
    const LT = 'LT';
    
    // less than or equal to
    const LTE = 'LTE';
    
    // greater than
    const GT = 'GT';
    
    // greater than or equal to
    const GTE = 'GTE';
    
    // has property value
    const HAS_PROPERTY = 'HAS_PROPERTY';
    
    // does not have property value
    const NOT_HAS_PROPERTY = 'NOT_HAS_PROPERTY';
    
    // contains token
    const CONTAINS_TOKEN = 'CONTAINS_TOKEN';
    
    // does not contain token
    const NOT_CONTAINS_TOKEN = 'NOT_CONTAINS_TOKEN';

    const OPERATORS = [self::EQ, self::NEQ, self::LT, self::LTE, self::GT, self::GTE, self::HAS_PROPERTY, self::NOT_HAS_PROPERTY, self::CONTAINS_TOKEN, self::NOT_CONTAINS_TOKEN];
    const VALUES_COMPARATORS = [self::EQ, self::NEQ, self::LT, self::LTE, self::GT, self::GTE];
}