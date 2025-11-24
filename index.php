<?php
    require_once ('./config.php');
    require_once ('./db.php');

    // TASK: CREATE
    if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
        $task = R::dispense('tasks');
        $task['title'] = trim($_POST['title']);
        $task['status'] = 'active';
        $id = R::store($task);
    }

    // TASK: DELETE
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id'] && is_numeric($_GET['id'])) {
        $task = R::load('tasks', $_GET['id']);
        R::trash($task);
    }

    // TASK: CHANGE STATUS
    if (isset($_GET['action']) && $_GET['action'] == 'changeStatus' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $task = R::load('tasks', $_GET['id']);
        if ($task->id) {
            if ($task['status'] === 'ready') {
                $task['status'] = 'active';
            } else {
                $task['status'] = 'ready';
            }
            R::store($task);
        }
    }

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
