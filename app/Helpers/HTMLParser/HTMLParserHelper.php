<?php

namespace App\Helpers\HTMLParser;


use DOMDocument;
use DOMXPath;
use stdClass;

class HTMLParserHelper
{
    /**
     * Получает HTML-код из указанного URL и возвращает его в виде строки.
     *
     * @param string $url URL сайта
     * @return bool|string HTML-код
     */
    public static function getHTML(string $url): bool | string
    {
        return file_get_contents($url);
    }

    public static function parseHTML(string $html, string $tag): array
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_use_internal_errors(false);

        $data = array();
        $elements = $dom->getElementsByTagName($tag);

        foreach ($elements as $element) {
            $item = array();

            if ($element->hasAttributes()) {
                foreach ($element->attributes as $attribute) {
                    $item[$attribute->nodeName] = $attribute->nodeValue;
                }
            }

            $item['content'] = trim(preg_replace('/\s+/', ' ', $element->nodeValue));
            $item['tag'] = $tag;

            $data[] = $item;


        }

        return $data;
    }

    /**
     * @param string $html
     * @return array
     */
    public static function parseAllHTML(string $html): array
    {
      try {

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_use_internal_errors(false);

        $data = array();
        $xpath = new DOMXPath($dom);
        $elements = $xpath->query("//*"); // Выбираем все элементы

        foreach ($elements as $element) {
            $item = new stdClass();

            if ($element->hasAttributes()) {
                foreach ($element->attributes as $attribute) {
                    $item->{$attribute->nodeName} = $attribute->nodeValue;
                }
            }

            $item->content = trim(preg_replace('/\s+/', ' ', $element->nodeValue));
            $item->tag = $element->tagName;

            $data[] = $item;
        }

        return $data;
      }
      catch(Exception $e ){
        return [];
        echo "Unable to parse data!";
      }
    }
    /**
     * Преобразует массив данных в JSON-строку.
     *
     * @param array $data Массив данных
     * @return bool|string JSON-строка
     */
    public static function toJSON(array $data): bool | string
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
