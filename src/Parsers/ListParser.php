<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: ListParser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 08/08/22
 * Time: 11:58 am
 */

class ListParser implements ParserInterface {

    use ParserTrait;

    protected array $options = [
        "tag" => [
            "ordered" => "ol",
            "unordered" => "ul"
        ],
    ];

    public function toHtml(): string
    {
        $attributes = $this->getAttributes();

        return '<'.$this->options['tag'][$this->block['data']['style']].(!empty($attributes) ? ' ' . $attributes : '' ).'>'. $this->getListItems() .'</'.$this->options['tag'][$this->block['data']['style']].'>';
    }

    protected function getListItems() : string
    {
        $items = [];

        foreach ($this->block['data']['items'] as $item) {
            $items[] = '<li>'.$item.'</li>';
        }

        return implode("", $items);
    }
}