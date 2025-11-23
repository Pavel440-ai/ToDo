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


        $tasks = R::findAll('tasks');
        if (empty($tasks)) {
            include(ROOT . 'templates/empty.tpl');
        } else {
            foreach ($tasks as $task) {
                include(ROOT . 'templates/task.php');
            }
        }

        ?>
	</ul>

	<!-- Form -->
    <?php include(ROOT . 'templates/page_parts/form.tpl'); ?>

</body>
</html>
