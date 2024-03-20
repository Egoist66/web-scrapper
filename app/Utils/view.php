<?php

/**
 * @throws Exception
 */
function view(string $viewFile, array $data = []): false|string
{

    try {
        [$folder, $file] = explode('.', $viewFile);

        if (!is_dir("./app/Views/$folder")) {
            throw new Exception("Such folder not found: $folder");
        }


        if (!file_exists("./app/Views/$folder/$file.php")) {
            throw new Exception("View file not found: $file");
        }


        // Извлекаем данные для использования в представлении
        extract($data);

        // Начинаем буферизацию вывода
        ob_start();

        // Включаем файл представления

        include "./app/Views/$folder/$file.php";

        // Получаем содержимое буфера вывода
        $content = ob_get_clean();

        // Возвращаем содержимое представления
        return $content;
    }
    catch (Exception $e){
        echo $e->getMessage();
        return '';
    }
}