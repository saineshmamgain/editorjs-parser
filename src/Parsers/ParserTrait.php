<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: ParserTrait.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 07/08/22
 * Time: 5:46 pm
 */

trait ParserTrait {
    protected array $block;

    public static function init() : ParserInterface
    {
        return new static();
    }

    public function setBlock(array $block): ParserInterface
    {
        $this->block = $block;

        return $this;
    }

    public function setOptions(array $options): ParserInterface
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    protected function getAttributes() : string
    {
        $attributes = [];
        foreach ($this->options as $key => $option) {
            if (is_callable($option)){
                continue;
            }
            if (! in_array($key, ['tag'])){
                $attributes[] = $key . '="' . $option . '"';
            }
        }

        return trim(implode(" ", $attributes));
    }
}