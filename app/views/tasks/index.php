<?php
/** @var array $tasks_list */

require ROOT . '/app/views/layouts/header.php'; 
?>

<div class="app">

    <?php require ROOT . '/app/views/tasks/partials/stats.php'; ?>

    <div class="layout">

        <aside>
            <?php require ROOT . '/app/views/tasks/partials/task-form.php'; ?>
            <?php require ROOT . '/app/views/tasks/partials/category-form.php'; ?>
        </aside>

        <main>

            <form id="searchForm" class="search-box" action="" method="get">
                <input id="searchInput" type="text" name="search" placeholder="Поиск задач...">
                <button class="btn btn-primary" type="submit">Найти</button>
            </form>

            <?php require ROOT . '/app/views/tasks/partials/filters.php'; ?>

            <section id="taskList" class="task-list">
                <?php foreach ($tasks_list as $task): ?>
                <?php
                        $status = getTaskStatusData($task['status']);
                        $priority = getTaskPriorityData($task['priority']);

                        require ROOT . '/app/views/tasks/partials/task-card.php';
                        ?>
                <?php endforeach; ?>
            </section>

        </main>

    </div>

</div>

<?php require ROOT . '/app/views/layouts/footer.php'; ?>