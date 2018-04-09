<?php

include 'php/functions.php';

$link = mysqli_connect("localhost", "root", "", "tasks");

if ($_POST && $_POST['newtask']) {
  addTask($link);
}

if ($_GET && $_GET['delete_task']) {
  deleteTask($link);
}

$taskList = populateList($link);

mysqli_close($link);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Cool App Name</title>
</head>

<body>
  <div id="appcontainer" class="container">
    <div id="listBox" class="row">
      <div class="col">
        <ul id="list" class="list-group">
          <!-- php to control list -->
          <?php foreach ($taskList as $task) { ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $task['task']; ?>
            <a href="index.php?delete_task=<?php echo $task['id'] ?>" class="close-button badge">X</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div id="input" class="row">
      <div class="col">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="newtask" placeholder="Task Description" aria-label="Task Description" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Add Task</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>