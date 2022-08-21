<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: TextParser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 07/08/22
 * Time: 10:50 am
 */

class TextParser implements ParserInterface {

    use ParserTrait;

    protected array $options = [
        "tag" => "p",
    ];

    public function toHtml(): string
    {
        $attributes = $this->getAttributes();

        return '<'.$this->options['tag'].(!empty($attributes) ? ' ' . $attributes : '' ).'>'. $this->block['data']['text'] .'</'.$this->options['tag'].'>';
    }
}