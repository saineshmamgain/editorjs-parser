<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: DelimiterParser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 08/08/22
 * Time: 11:55 am
 */

class DelimiterParser implements ParserInterface {

    use ParserTrait;

    protected array $options = [
        "tag" => "hr",
    ];

    public function toHtml(): string
    {
        $attributes = $this->getAttributes();

        return '<'.$this->options['tag'].(!empty($attributes) ? ' ' . $attributes : '' ).'></'.$this->options['tag'].'>';
    }

}