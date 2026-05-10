<?php

require ROOT . '/app/models/Task.php';
require ROOT . '/app/models/Category.php';

class TaskController
{
    public function index()
    {
        $filter = $_GET['filter'] ?? 'all';

        switch ($filter) {
            case 'active':
                $tasks_list = Task::getActive();
                break;

            case 'done':
                $tasks_list = Task::getDone();
                break;

            case 'high':
                $tasks_list = Task::getHigh();
                break;

            case 'today':
                $tasks_list = Task::getToday();
                break;

            case 'expired':
                $tasks_list = Task::getExpired();
                break;

            default:
                $tasks_list = Task::getAll();
                break;
        }

        $category_list = Category::getAll();

        $count = Task::countAll();
        $active_tasks_count = Task::countActive();
        $done_tasks_count = Task::countDone();

        $editTask = null;
        $isEdit = false;

        if (isset($_GET['edit_id'])) {
            $editTask = Task::findById($_GET['edit_id']);

            if ($editTask->id) {
                $isEdit = true;
            }
        }

        $formTitle = $isEdit ? 'Редактировать задачу' : 'Добавить задачу';
        $formAction = $isEdit ? '/?action=edit' : '/?action=add';
        $buttonText = $isEdit ? 'Сохранить изменения' : 'Добавить задачу';
        $formActiveClass = $isEdit ? 'card-active' : '';

        require ROOT . '/app/views/tasks/index.php';
    }

    public function add()
    {
        $categoryData = explode('|', $_POST['category']);

        Task::create([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'priority' => $_POST['priority'],
            'category_id' => $categoryData[0],
            'category_name' => $categoryData[1],
            'deadline' => $_POST['deadline'] ?? null,
        ]);

        header('Location: /');
        exit;
    }

    public function edit()
    {
        Task::update($_POST['id'], [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'priority' => $_POST['priority'],
            'category' => $_POST['category'],
            'deadline' => $_POST['deadline'] ?? null,
        ]);

        header('Location: /');
        exit;
    }

    public function delete()
    {
        Task::delete($_POST['id']);

        header('Location: /');
        exit;
    }

    public function toggle()
    {
        Task::toggleStatus($_POST['id']);

        header('Location: /');
        exit;
    }

    public function addCategory()
    {
        Category::create($_POST['category_name']);

        header('Location: /');
        exit;
    }
    public function search()
    {
    $search = $_GET['search'] ?? '';

    $tasks_list = Task::search($search);

        foreach ($tasks_list as $task) {

            $status = getTaskStatusData($task['status']);

            $priority = getTaskPriorityData($task['priority']);

            require ROOT . '/app/views/tasks/partials/task-card.php';
        }
    }
}