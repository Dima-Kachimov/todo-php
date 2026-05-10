<?php
/** @var string $count */
/** @var string $active_tasks_count */
/** @var string $done_tasks_count */
?>
<header class="header">
    <div>
        <h1>Todo App</h1>
        <p>Управление задачами, статусами, приоритетами и дедлайнами</p>
    </div>

    <div class="header-stats">
        <div class="stat">
            <strong><?= $count ?></strong>
            Всего
        </div>

        <div class="stat">
            <strong><?= $active_tasks_count ?></strong>
            Активные
        </div>

        <div class="stat">
            <strong><?= $done_tasks_count ?></strong>
            Выполнены
        </div>
    </div>
</header>