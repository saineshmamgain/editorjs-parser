<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: ImageParser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 21/08/22
 * Time: 10:46 pm
 */

class ImageParser implements ParserInterface {

    use ParserTrait;

    protected array $options = [
        "tag" => "img",
    ];

    public function toHtml(): string
    {
        $attributes = $this->getAttributes();

        return '<'.$this->options['tag'].(!empty($attributes) ? ' ' . $attributes : '' ).' src="'.$this->block['data']['file']['url'].'" alt="'.$this->block['data']['caption'].'">';
    }
}