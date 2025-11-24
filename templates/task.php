<?php
    if (!isset($task)) {
        die('This file is a template and should not be run directly.');
    }
    $titleCSSclass = 'todo-item-text';
    if($task['status'] === 'ready'){
        $titleCSSclass .= ' done';
    }

?>

<li class="list-group-item d-flex justify-content-between">
    <span class="<?php echo $titleCSSclass; ?>">
        <?php echo htmlspecialchars($task['title']); ?>
    </span>
    <div class="btn-group">
        <?php if ($task['status'] === 'ready'): ?>
            <button role="button" class="btn btn-outline-dark btn-sm">Not finished yet</button>
        <?php else: ?>
            <button role="button" class="btn btn-outline-success btn-sm">Ready</button>
        <?php endif; ?>




        <button role="button" class="btn btn-outline-danger btn-sm">Delete</button>
    </div>
</li>