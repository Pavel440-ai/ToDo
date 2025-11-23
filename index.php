<?php
    require_once ('./config.php');
    require_once ('./db.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include(ROOT . 'templates/page_parts/head.tpl'); ?>
<body class="todo-app p-5">

	<!-- Header -->
    <?php include(ROOT . 'templates/page_parts/header.tpl'); ?>

	<!-- List -->
	<ul class="list-group mb-3">
        <?php
            include(ROOT . 'templates/empty.tpl');
            include(ROOT . 'templates/task.tpl');
        ?>
	</ul>

	<!-- Form -->
    <?php include(ROOT . 'templates/page_parts/form.tpl'); ?>

</body>
</html>
