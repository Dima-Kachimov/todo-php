<?php
/** @var string $filter */
?>
<nav class="filters">
    <a href="/" class="<?= $filter === 'all' ? 'active' : '' ?>">Все</a>
    <a href="/?filter=active" class="<?= $filter === 'active' ? 'active' : '' ?>">Активные</a>
    <a href="/?filter=done" class="<?= $filter === 'done' ? 'active' : '' ?>">Выполненные</a>
    <a href="/?filter=high" class="<?= $filter === 'high' ? 'active' : '' ?>">Высокий приоритет</a>
    <a href="/?filter=today" class="<?= $filter === 'today' ? 'active' : '' ?>">Сегодня</a>
    <a href="/?filter=expired" class="<?= $filter === 'expired' ? 'active' : '' ?>">Просроченные</a>
</nav>