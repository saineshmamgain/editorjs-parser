<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: RawParser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 21/08/22
 * Time: 10:44 pm
 */

class RawParser implements ParserInterface {

    use ParserTrait;

    public function toHtml(): string
    {
        return $this->block['data']['html'];
    }
}