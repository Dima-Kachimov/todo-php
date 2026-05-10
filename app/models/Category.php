<?php

class Category
{
    public static function getAll()
    {
        return R::findAll('categories');
    }

    public static function create($name)
    {
        if (empty($name)) {
            return;
        }

        $category = R::dispense('categories');

        $category->name = $name;

        R::store($category);
    }
}