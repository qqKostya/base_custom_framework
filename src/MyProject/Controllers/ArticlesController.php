<?php

namespace MyProject\Controllers;

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\Db;
use MyProject\View\View;

class ArticlesController
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

    public function view(int $articleId)
    {
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId],
            Article::class
        );
        var_dump($result);


        if ($result === []) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $result_user = $this->db->query(
            'SELECT `nickname` FROM `users` WHERE id = :id',
            [':id' => $result->id]
        );
        var_dump($result_user);

        if ($result_user === []) {
            $result_user[0]['nickname'] = 'не известно';
        }

        $this->view->renderHtml('articles/view.php', ['article' => $result[0], 'nickname' => $result_user[0]['nickname']]);
    }
}