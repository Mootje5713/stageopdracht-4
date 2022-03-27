<form method="POST" action="addmessage.php">
    <label for="title"> titel </label>
    <br>
    <input type="text" id="title" name="title">
    <br>
    <label for="message"> bericht </label>
    <br>
    <textarea id="message" name="message" rows="4" cols="50" maxlength="3000" required></textarea>
    <?php if(!isset($_GET['id'])): ?>
        <br>
        <label for="about_user_id"> over </label>
        <br>
        <select id="about_user_id" name="about_user_id">
        <?php foreach($users as $row): ?>
            <option value="<?php echo $row['id'] ?>">
            <?php echo $row['username'] ?>
            </option>
            <?php endforeach ?>
        </select>
    <?php else: ?>
        <input name="about_user_id" type="hidden" value="<?php echo $_GET['id']; ?>" />
    <?php endif; ?>
    <br>
    <br>
    <button type="submit" class="btn"  name="submit"> Voeg een bericht toe toe </button>
</form>