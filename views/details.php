<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
    <h2>Details</h2>
    <?php
        require_once "../controllers/StudentController.php";
        $controller = new StudentController();
        $student = $controller->details($_GET['id']);
        require_once "../controllers/ApiStudentController.php";
    ?>

    <p>First Name: <?php echo $student->firstname; ?></p>
    <p>Last Name: <?php echo $student->lastname; ?></p>
    <a href="edit.php?id=<?php echo $student->id; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $student->id; ?>">Delete</a>
</body>
</html>
