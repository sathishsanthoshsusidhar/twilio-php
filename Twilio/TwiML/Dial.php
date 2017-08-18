<?php

namespace Twilio\TwiML;


class Dial extends TwiML {


    /**
     * Dial constructor.
     *
     * @param string $number phone number to dial
     * @param array $attributes Optional attributes
     */
    public function __construct($number = null, $attributes = array()) {
        parent::__construct('Dial', $number, $attributes);
    }
    
    public function setAction($action) {
        $this->setAttribute('action', $action);    
    } 
    
    public function setMethod($method) {
        $this->setAttribute('method', $method);
    }
    
    public function setTimeout($timeout) {
        $this->setAttribute('timeout', $timeout);
    }
    
    public function setHangupOnStar($hangupOnStar) {
        $this->setAttribute('hangupOnStar', $hangupOnStar);
    }
    
    public function setTimeLimit($timeLimit) {
        $this->setAttribute('timeLimit', $timeLimit);
    }
    
    public function setCallerId($callerId) {
        $this->setAttribute('callerId', $callerId);
    }
    
    public function setRecord($record) {
        $this->setAttribute('record', $record);
    }
    
    public function setTrim($trim) {
        $this->setAttribute('trim', $trim);
    }
    
    public function setRecordingStatusCallback($recordingStatusCallback) {
        $this->setAttribute('recordingStatusCallback', $recordingStatusCallback);
    }
    
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod) {
        $this->setAttribute('recordingStatusCallbackMethod', $recordingStatusCallbackMethod);
    }
    

}