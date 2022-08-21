<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: HeaderParser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 07/08/22
 * Time: 5:43 pm
 */

class HeaderParser implements ParserInterface {

    use ParserTrait;

    protected array $options = [
        "tag" => "h",
    ];

    public function toHtml(): string
    {
        $attributes = $this->getAttributes();

        return '<'.$this->options['tag'].$this->block['data']['level'].(!empty($attributes) ? ' ' . $attributes : '' ).'>'. $this->block['data']['text'] .'</'.$this->options['tag'].$this->block['data']['level'].'>';
    }
}