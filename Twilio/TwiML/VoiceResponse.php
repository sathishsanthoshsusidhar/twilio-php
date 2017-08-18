<?php

namespace Twilio\TwiML;


class VoiceResponse extends TwiML {
    
    public function __construct() {
        parent::__construct('Response');
    }

    public function dial($number = null, $options = array()) {
        return $this->nest(new Dial($number, $options));
    }

}