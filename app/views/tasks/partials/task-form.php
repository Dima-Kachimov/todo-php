<?php
/** @var string $formActiveClass */
/** @var string $formTitle */
/** @var string $formAction */
/** @var string $isEdit */
/** @var array $editTask */
/** @var array $category_list */
/** @var string $buttonText */
?>
<div class="card <?= $formActiveClass ?>">
    <h2><?= $formTitle ?></h2>

    <form action="<?= $formAction ?>" method="post">

        <div class="form-group">
            <label>Название задачи</label>
            <input type="text" name="title" placeholder="Например: выучить PDO"
                value="<?= $isEdit ? $editTask['title'] : '' ?>">
            <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $editTask['id'] ?>">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea name="description"
                placeholder="Подробное описание задачи"><?= $isEdit ? $editTask['description'] : '' ?></textarea>
        </div>

        <div class="form-group">
            <label>Приоритет</label>
            <select name="priority">
                <option value="low" <?= $isEdit && $editTask['priority'] === 'low' ? 'selected' : '' ?>>
                    Низкий</option>
                <option value="medium" <?= $isEdit && $editTask['priority'] === 'medium' ? 'selected' : '' ?>>Средний
                </option>
                <option value="high" <?= $isEdit && $editTask['priority'] === 'high' ? 'selected' : '' ?>>Высокий
                </option>
            </select>
        </div>

        <div class="form-group">
            <label>Категория</label>
            <select name="category">
                <?php foreach($category_list as $category): ?>
                <?php
                                $value = $category['id'] . '|' . $category['name'];
                                $selected = $isEdit && $editTask['category_id'] == $category['id'] ? 'selected' : '';
                                ?>

                <option value="<?= $value ?>" <?= $selected ?>>
                    <?= $category['name'] ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label>Дедлайн</label>
            <input type="date" name="deadline" value="<?= $isEdit ? $editTask['deadline'] : '' ?>">
        </div>

        <button class="btn btn-primary" type="submit">
            <?= $buttonText ?>
        </button>

    </form>
</div>