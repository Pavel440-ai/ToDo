<?php
    require_once ('./config.php');
    require_once ('./db.php');

    // Start session to maintain state
    session_start();

    // TASK: CREATE
    if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
        $task = R::dispense('tasks');
        $task['title'] = trim($_POST['title']);
        $task['status'] = 'active';
        $task['created_at'] = date('Y-m-d H:i:s');
        $id = R::store($task);
        
        // Redirect to avoid form resubmission
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // TASK: DELETE
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $task = R::load('tasks', $_GET['id']);
        if ($task->id) {
            R::trash($task);
        }
        // Redirect to avoid keeping action in URL
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
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
        // Redirect to avoid keeping action in URL
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // GETTING ALL THE TASKS
    $tasks = R::findAll('tasks');

    // COUNT STATISTICS
    $count_all = count($tasks);

    // COMPLETED TASKS
    $count_done = 0;
    foreach ($tasks as $task) {
        if (($task['status'] ?? 'active') === 'ready') {
            $count_done++;
        }
    }

    // UNCOMPLETED TASKS
    $count_undone = $count_all - $count_done;
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
