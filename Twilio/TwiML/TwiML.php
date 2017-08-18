<?php

namespace Twilio\TwiML;

abstract class TwiML {

    /**
     * @var string TwiML tag
     */
    private $name;

    /**
     * @var object TwiML attributes
     */
    private $attributes;

    /**
     * @var string TwiML body value
     */
    private $value;

    /**
     * @var TwiML[] nested verbs
     */
    private $children;

    public function __construct($name, $value = null, $attributes = array()) {
        $this->name = $name;
        $this->value = $value;
        $this->attributes = $attributes;
        $this->children = array();
    }

    public function append($twiml) {
        $this->children[] = $twiml;
        return $this;
    }

    public function nest($twiml) {
        $this->children[] = $twiml;
        return $twiml;
    }

    public function setAttribute($key, $value) {
        $this->attributes[$key] = $value;
    }

    /**
     * @param $children TwiML[]
     * @param $element \SimpleXMLElement
     */
    private static function buildChildren($children, $element) {
        foreach ($children as $child) {
            $childElement = $element->addChild($child->name);
            self::buildElement($child, $childElement);
            self::buildChildren($child->children, $childElement);
        }
    }

    /**
     * @param $twiml TwiML
     * @param $element \SimpleXMLElement
     */
    private static function buildElement($twiml, $element) {
        if (is_string($twiml->value)) {
            $element[0] = $twiml->value;
        }

        foreach ($twiml->attributes as $name => $value) {
            if (is_bool($value)) {
                $value = ($value === true) ? 'true' : 'false';
            }
            $element->addAttribute($name, $value);
        }
    }

    public function xml() {
        $element = new \SimpleXMLElement('<' . $this->name . '/>');
        self::buildElement($this, $element);
        self::buildChildren($this->children, $element);
        return $element;
    }

    public function asXML() {
        return $this->__toString();
    }

    public function __toString() {
        return str_replace(
            '<?xml version="1.0"?>',
            '<?xml version="1.0" encoding="UTF-8"?>',
            $this->xml()->asXML()
        );
    }

}