<?php

namespace nlib\Hubspot\Traits;

use stdClass;

trait PropertyTrait {

    public function get(?stdClass $Class, string $property) {

        $value = null;

        if(!empty($Class)) :
            if(property_exists($Class, $p = 'properties') && property_exists($Class->{$p}, $property)) :
                // if($this->getVersion() == 'v3') :
                if(! $Class->{$p}->{$property} instanceof stdClass) :
                    $value = $Class->{$p}->{$property};
                else :
                    if(property_exists($Class->{$p}->{$property}, $v = 'value')) :
                        $value = $Class->{$p}->{$property}->{$v};
                    endif;
                endif;
            else :
                if(property_exists($Class, $property)) $value = $Class->{$property};
            endif;
        endif;

        return $value;
    }
}