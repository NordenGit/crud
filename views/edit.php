<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
    <h2>Edit</h2>
    <?php
        require_once "../controllers/StudentController.php";
        $controller = new StudentController();
        $student = $controller->details($_GET['id']);
        require_once "../controllers/ApiStudentController.php";
    ?>
    <form action="../controllers/StudentController.php" method="POST">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $student->id; ?>">
        First Name: <input type="text" name="firstname" value="<?php echo $student->firstname; ?>" required>
        Last Name: <input type="text" name="lastname" value="<?php echo $student->lastname; ?>" required>
        <input type="submit" value="Edit">
    </form>
</body>
</html>
