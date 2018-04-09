<?php

function addTask($link) {
  $taskstring = $_POST['newtask'];
  $query = "INSERT INTO tasklist (task, priority) VALUES ('$taskstring', 2.0)";

  if (!mysqli_query($link, $query)) {
    die(mysqli_error($link));
  }
}

function deleteTask($link) {
  $id = $_GET['delete_task'];

  $listquery = "DELETE FROM tasklist WHERE id = $id";
  if(!mysqli_query($link, $listquery)) {
    die(mysqli_error($link));
  }
}
  
function populateList($link) {
  $listquery = "SELECT * FROM tasklist WHERE 1";
  $result = mysqli_query($link, $listquery) or die(mysqli_error($link));;

  $taskList = array();

  if (mysqli_num_rows($result) > 0) {
    $index = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $taskList[$index] = $row;
      $index++;
    }
  }

  return $taskList;
}

?>