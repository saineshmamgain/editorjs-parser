<?php

namespace SaineshMamgain\EditorJSParser\Parsers;

/**
 * File: TableParser.php
 * Author: Sainesh Mamgain
 * Email: saineshmamgain@gmail.com
 * Date: 21/08/22
 * Time: 10:20 pm
 */

class TableParser implements ParserInterface {

    use ParserTrait;

    protected array $options = [
        "tag" => "table",
    ];

    public function toHtml(): string
    {
        $attributes = $this->getAttributes();
        
        $html = '<'.$this->options['tag'].(!empty($attributes) ? ' ' . $attributes : '' ).'>';

        foreach ($this->block['data']['content'] as $key => $row) {
            $html .= "<tr>";
            foreach ($row as $column) {
                if ($key == 0){
                    if ($this->block['data']['withHeadings']){
                        $html.="<th>{$column}</th>";
                    }
                }else{
                    $html.="<td>{$column}</td>";
                }
            }
            $html .= "</tr>";
        }

        $html .= "</".$this->options['tag'].">";

        return $html;
    }
}