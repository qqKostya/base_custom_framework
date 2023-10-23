<?php include __DIR__ . '/../header.php';
if ($user!==null && $user->isAdmin()) :?>
    <a href="/articles/<?= $article->getId() ?>/edit">Редактировать</a>
<? endif; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
<?php include __DIR__ . '/../footer.php'; ?>