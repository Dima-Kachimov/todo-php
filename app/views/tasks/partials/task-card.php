<?php
/** @var mixed $task */
/** @var array $status */
/** @var array $priority */
/** @var string $status_btn */

?>
<article class="task <?= $priority['class'] ?> <?= $status['class'] ?>">
    <div class="task-header">
        <div>
            <div class="task-title"><?= $task['title'] ?></div>
            <span class="badge badge-<?= $status['class'] ?>"><?= $status['text'] ?></span>
            <span class="badge badge-<?= $priority['class'] ?>"><?= $priority['text'] ?></span>
            <span class="badge"><?= $task['category_name'] ?></span>
        </div>
    </div>

    <p class="task-text">
        <?= $task['description'] ?>
    </p>

    <div class="task-meta">
        Создано: <?= $task['created'] ?> | Дедлайн: <?= $task['deadline'] ?>
    </div>

    <div class="task-actions">
        <form action="/?action=toggle" method="post">
            <button class="btn btn-success" name="id" value="<?= $task['id']?>"><?= $status['button']  ?></button>
        </form>

        <form action="/" method="get">
            <input type="hidden" name="is_edit" value='true'>
            <button class="btn btn-warning" name="edit_id" value="<?= $task['id']?>">Редактировать</button>
        </form>

        <form action="/?action=delete" method="post">
            <button class="btn btn-danger" name="id" value="<?= $task['id']?>">Удалить</button>
        </form>
    </div>
</article>