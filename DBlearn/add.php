<?php session_start(); ?>

<form method="POST" action="add_action.php">
    <label>
        Name:
        <input type="text" name="name" />
    </label><br/><br/>
    <label>
        E-mail:
        <input type="email" name="email" />
    </label><br/><br/>
    <input type="submit" value="Submit" />
</form>
<?=$_SESSION['WARN'] ?? ''; ?>
<?php session_unset(); ?>