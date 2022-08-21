<?php

namespace SaineshMamgain\EditorJSParser;

use Exception;
use SaineshMamgain\EditorJSParser\Parsers\DelimiterParser;
use SaineshMamgain\EditorJSParser\Parsers\HeaderParser;
use SaineshMamgain\EditorJSParser\Parsers\ImageParser;
use SaineshMamgain\EditorJSParser\Parsers\ListParser;
use SaineshMamgain\EditorJSParser\Parsers\ParserInterface;
use SaineshMamgain\EditorJSParser\Parsers\QuoteParser;
use SaineshMamgain\EditorJSParser\Parsers\RawParser;
use SaineshMamgain\EditorJSParser\Parsers\TableParser;
use SaineshMamgain\EditorJSParser\Parsers\TextParser;

/**
 * File: Parser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 07/08/22
 * Time: 10:42 am
 */

class Parser {

    protected array $data;

    protected array $config;

    protected array $parsers = [
        "paragraph" => TextParser::class,
        "header" => HeaderParser::class,
        "delimiter" => DelimiterParser::class,
        "list" => ListParser::class,
        "quote" => QuoteParser::class,
        "table" => TableParser::class,
        "raw" => RawParser::class,
        "image" => ImageParser::class,
    ];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function init(array $data): Parser
    {
        return new static($data);
    }

    public function setParser(string $type, string $parser) : Parser
    {
        $this->parsers[$type] = $parser;

        return $this;
    }

    /**
     * @param ParserInterface[] $configs
     * @return $this
     */
    public function setConfig(array $configs) : Parser
    {
        foreach ($configs as $config) {
            $this->config[get_class($config)] = $config;
        }

        return $this;
    }

    /**
     * @throws Exception
     */
    public function parse() : string
    {
        $html = [];

        foreach ($this->data['blocks'] as $block){

            if (array_key_exists($block['type'], $this->parsers)){

                /** @var ParserInterface $parser */
                $parser = new $this->parsers[$block['type']];

                if (!empty($this->config[get_class($parser)])){
                    $parser = $this->config[get_class($parser)];
                }

                $parser = $parser
                    ->setBlock($block);

                $html[] = $parser->toHtml();
            }
        }

        return implode("",$html);
    }
}