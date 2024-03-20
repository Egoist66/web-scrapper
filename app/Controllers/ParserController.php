<?php

namespace App\Controllers;


require_once './app/Utils/view.php';

use App\Models\Parser;


class ParserController
{

    public static function index(): string
    {

        return view(
            'layout.main',
            ["scrapper" => view('scrapper-form.scrapper')]
        );
    }

    public static function create(): void
    {
        $from = htmlspecialchars($_POST['url'] ?? '');

        if (empty($from)) {
            return;
        }

        Parser::parse($from, 'http://localhost:3001');


    }

    public static function destroy(): void
    {
        Parser::destroy();
    }
}