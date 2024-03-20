<?php

namespace App\Models;

use App\Helpers\HTMLParser\HTMLParserHelper;

class Parser
{
    /**
     * @param string $from
     * @param string $host
     * @return bool|array
     */
    public static function parse(string $from, string $host): bool|array
    {
        $html = HTMLParserHelper::getHTML($from);
        $data = HTMLParserHelper::parseAllHTML($html);
        $json = HTMLParserHelper::toJSON($data);

        if (file_put_contents('./parsed/content.json', $json)) {
            $filename = './parsed/content.json'; // Укажите путь к вашему файлу
            $fileNameForDownload = '/parsed/content.json';
            $download_link = $host . $fileNameForDownload;

            file_put_contents('./parsed/link.txt', $download_link);
            // Генерируем заголовки для скачивания файла
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
            header('Content-Length: ' . filesize($filename));

            // Отправляем файл пользователю для скачивания
            readfile($filename);
        } else {
            $download_link = '';
        }


        return [
            "json" => $json,
            "link" => $download_link
        ];
    }

    public static function destroy(): void {
        if(is_dir('./parsed') && file_exists('./parsed/content.json')){
            unlink('./parsed/content.json');
            unlink('./parsed/link.txt');

            header('Location: /');
            exit();
        }
    }


}