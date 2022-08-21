<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: QuoteParser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 07/08/22
 * Time: 10:50 am
 */

class QuoteParser implements ParserInterface {

    use ParserTrait;

    protected ?\Closure $caption = null;

    protected array $options = [
        "tag" => "blockquote",
    ];

    public function withCaption(callable $closure) : ParserInterface
    {
        $this->caption = $closure;
        return $this;
    }

    public function toHtml(): string
    {
        $attributes = $this->getAttributes();

        $caption = $this->caption;

        return '<span><'.$this->options['tag'].(!empty($attributes) ? ' ' . $attributes : '' ).'>'. $this->block['data']['text'] .'</'.$this->options['tag'].'>'. (is_callable($caption) ? $caption($this->block['data']['caption']) : '<figcaption>'.$this->block['data']['caption'].'</figcaption>').'</span>';
    }
}