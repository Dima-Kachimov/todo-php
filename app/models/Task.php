<?php

class Task
{
    public static function getAll()
    {
        return R::findAll('tasks', 'ORDER BY id DESC');
    }

    public static function getActive()
    {
        return R::findAll('tasks', 'status = ? ORDER BY id DESC', ['active']);
    }

    public static function getDone()
    {
        return R::findAll('tasks', 'status = ? ORDER BY id DESC', ['done']);
    }

    public static function getHigh()
    {
        return R::findAll('tasks', 'priority = ? ORDER BY id DESC', ['high']);
    }

    public static function getToday()
    {
        return R::findAll('tasks', 'deadline = ? ORDER BY id DESC', [date('Y-m-d')]);
    }

    public static function getExpired()
    {
        return R::findAll(
            'tasks',
            'deadline < ? AND status != ? ORDER BY id DESC',
            [date('Y-m-d'), 'done']
        );
    }

    public static function countAll()
    {
        return R::count('tasks');
    }

    public static function countActive()
    {
        return R::count('tasks', 'status = ?', ['active']);
    }

    public static function countDone()
    {
        return R::count('tasks', 'status = ?', ['done']);
    }

    public static function findById($id)
    {
        return R::load('tasks', $id);
    }

    public static function create(array $data)
    {
        $task = R::dispense('tasks');

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->priority = $data['priority'];
        $task->category_id = $data['category_id'];
        $task->category_name = $data['category_name'];
        $task->status = 'active';
        $task->created = date('Y-m-d');
        $task->deadline = !empty($data['deadline']) ? $data['deadline'] : null;

        R::store($task);
    }

    public static function update($id, array $data)
    {
        $task = R::load('tasks', $id);

        if (!$task->id) {
            return;
        }

        $categoryData = explode('|', $data['category']);

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->priority = $data['priority'];
        $task->category_id = $categoryData[0];
        $task->category_name = $categoryData[1];
        $task->deadline = !empty($data['deadline']) ? $data['deadline'] : null;

        R::store($task);
    }

    public static function delete($id)
    {
        $task = R::load('tasks', $id);

        if ($task->id) {
            R::trash($task);
        }
    }

    public static function toggleStatus($id)
    {
        $task = R::load('tasks', $id);

        if (!$task->id) {
            return;
        }

        if ($task->status === 'done') {
            $task->status = 'active';
        } elseif ($task->status === 'active') {
            $task->status = 'done';
        }

        R::store($task);
    }
    public static function search(string $search)
    {
    if (empty($search)) {
        return self::getAll();
    }

    return R::findAll(
        'tasks',
        'title LIKE ? OR description LIKE ? ORDER BY id DESC',
        [
            '%' . $search . '%',
            '%' . $search . '%'
        ]
    );
    }   
}