<?php

namespace nlib\Hubspot\Interfaces;

interface AssociationConstanteInterface {
    
    /**
     * Contact to company 1
     */
    const CONTACT_TO_COMPANY = 1;

    /**
     * Company to contact 2
     */
    const COMPANY_TO_CONTACT = 2;
    
    /**
     * Deal to contact 3
     */
    const DEAL_TO_CONTACT = 3;

    /**
     * Contact to deal 4
     */
    const CONTACT_TO_DEAL = 4;

    /**
     * Deal to company 5
     */
    const DEAL_TO_COMPANY = 5;

    /**
     * Company to deal 6
     */
    const COMPANY_TO_DEAL = 6;

    /**
     * Company to engagement 7
     */
    const COMPANY_TO_ENGAGEMENT = 7;

    /**
     * Engagement to company 8
     */
    const ENGAGEMENT_TO_COMPANY = 8;

    /**
     * Contact to engagement 9
     */
    const CONTACT_TO_ENGAGEMENT = 9;

    /**
     * Engagement to contact 10
     */
    const ENGAGEMENT_TO_CONTACT = 10;

    /**
     * Deal to engagement 11
     */
    const DEAL_TO_ENGAGEMENT = 11;

    /**
     * Engagement to deal 12
     */
    const ENGAGEMENT_TO_DEAL = 12;

    /**
     * Parent company to child company 13
     */
    const PARENT_COMPANY_TO_CHILD_COMPANY = 13;

    /**
     * Child company to parent company 14
     */
    const CHILD_COMPANY_TO_PARENT_COMPANY = 14;

    /**
     * Contact to ticket 15
     */
    const CONTACT_TO_TICKET = 15;

    /**
     * Ticket to contact 16
     */
    const TICKET_TO_CONTACT = 16;

    /**
     * Ticket to engagement 17
     */
    const TICKET_TO_ENGAGEMENT = 17;

    /**
     * Engagement to ticket 18
     */
    const ENGAGEMENT_TO_TICKET = 18;

    /**
     * Deal to line item 19
     */
    const DEAL_TO_LINE_ITEM = 19;

    /**
     * Line item to deal 20
     */
    const LINE_ITEM_TO_DEAL = 20;

    /**
     * Company to ticket 25
     */
    const COMPANY_TO_TICKET = 25;

    /**
     * Ticket to company 26
     */
    const TICKET_TO_COMPANY = 26;

    /**
     * Deal to ticket 27
     */
    const DEAL_TO_TICKET = 27;

    /**
     * Ticket to deal 28
     */
    const TICKET_TO_DEAL = 28;

    /**
     * 
     */
    const COMPANY = 'company';

    /**
     * 
     */
    const CONTACT = 'contact';

    /**
     * 
     */
    const DEAL = 'deal';

    /**
     * 
     */
    const TICKET = 'ticket';

    /**
     * 
     */
    const OBJECT_TYPES = [self::COMPANY, self::CONTACT, self::DEAL, self::TICKET];

    /**
     * 
     */
    const ASSOCIATION_TYPES = [
        self::CONTACT_TO_COMPANY,
        self::COMPANY_TO_CONTACT,
        self::DEAL_TO_CONTACT,
        self::CONTACT_TO_DEAL,
        self::DEAL_TO_COMPANY,
        self::COMPANY_TO_DEAL,
        self::COMPANY_TO_ENGAGEMENT,
        self::ENGAGEMENT_TO_COMPANY,
        self::CONTACT_TO_ENGAGEMENT,
        self::ENGAGEMENT_TO_CONTACT,
        self::DEAL_TO_ENGAGEMENT,
        self::ENGAGEMENT_TO_DEAL,
        self::PARENT_COMPANY_TO_CHILD_COMPANY,
        self::CHILD_COMPANY_TO_PARENT_COMPANY,
        self::CONTACT_TO_TICKET,
        self::TICKET_TO_CONTACT,
        self::TICKET_TO_ENGAGEMENT,
        self::ENGAGEMENT_TO_TICKET,
        self::DEAL_TO_LINE_ITEM,
        self::LINE_ITEM_TO_DEAL,
        self::COMPANY_TO_TICKET,
        self::TICKET_TO_COMPANY,
        self::DEAL_TO_TICKET,
        self::TICKET_TO_DEAL,
    ];
}