<?php

use MintyPHP\Session;
?>

<form method="POST">
    <label for="title"> titel </label>
    <br>
    <input type="text" id="title" name="title">
    <br>
    <label for="message"> bericht </label>
    <br>
    <textarea id="message" name="message" rows="4" cols="50" maxlength="3000" required></textarea>

    <?php if (!isset($id)) : ?>
        <br>
        <label for="about_user_id"> over </label>
        <br>
        <select id="about_user_id" name="about_user_id">
            <?php foreach ($users as $u) : ?>
                <option value="<?php e($u['users']['id']); ?>">
                    <?php e($u['users']['username']); ?>
                </option>
            <?php endforeach ?>
        </select>
    <?php else : ?>
        <input name="about_user_id" type="hidden" value="<?php e($id); ?>" />
    <?php endif; ?>
    <br>
    <br>
    <button type="submit" class="btn" name="submit"> Voeg een bericht toe toe </button>
    <?php Session::getCsrfInput(); ?>
</form>