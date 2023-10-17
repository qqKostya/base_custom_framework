<?php

namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;
class MainController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = new Db();
    }
    public function main()
    {
        $articles = $this->db->query('SELECT * FROM `articles`;');
        var_dump($articles);
//        $articles = [
//            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
//            ['name' => 'Статья 2', 'text' => 'Текст статьи 2'],
//        ];
//        $title = '';
//        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        $title = 'Страница приветствия';
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
    }

    public function sayBye(string $name)
    {
        echo 'Пока, ' . $name;
    }
}