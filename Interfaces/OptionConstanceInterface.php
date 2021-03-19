<?php

namespace nlib\Hubspot\Interfaces;

interface OptionConstanceInterface {

    /**
     * 
     */
    const COMPANY = 'associations.company';

    /**
     * 
     */
    const CONTACT = 'associations.contact';

    /**
     * 
     */
    const TICKET = 'associations.ticket';

    /**
     * 
     */
    const DEAL = 'associations.deal';

    /**
     * 
     */
    const ASSOCIATIONS = [self::COMPANY, self::CONTACT, self::TICKET, self::DEAL];

}