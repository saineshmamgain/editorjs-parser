<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: ParserInterface.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 07/08/22
 * Time: 10:48 am
 */

interface ParserInterface {

    public function setBlock(array $block) : ParserInterface;

    public function setOptions(array $options) : ParserInterface;

    public function getOptions() : array;

    public function toHtml() : string;

}