<?php

function getTaskStatusData(string $status): array
{
    switch ($status) {

        case 'active':
            return [
                'text' => 'Активная',
                'class' => 'active',
                'button' => 'Выполнить'
            ];

        case 'done':
            return [
                'text' => 'Выполнена',
                'class' => 'done',
                'button' => 'Возобновить'
            ];

        default:
            return [
                'text' => 'Неизвестно',
                'class' => 'unknown',
                'button' => 'Изменить'
            ];
    }
}

function getTaskPriorityData(string $priority): array
{
    switch ($priority) {

        case 'low':
            return [
                'text' => 'Низкий',
                'class' => 'low'
            ];

        case 'medium':
            return [
                'text' => 'Средний',
                'class' => 'medium'
            ];

        case 'high':
            return [
                'text' => 'Высокий',
                'class' => 'high'
            ];

        default:
            return [
                'text' => 'Низкий',
                'class' => 'low'
            ];
    }
}