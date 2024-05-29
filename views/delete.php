<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
    <h2>Delete</h2>
    <?php
        require_once "../controllers/StudentController.php";
        $controller = new StudentController();
        $student = $controller->details($_GET['id']);
        require_once "../controllers/ApiStudentController.php";
    ?>
    
    <form action="../controllers/StudentController.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $student->id; ?>">
        Supprimer ?
        <input type="submit" value="Delete">
    </form>
</body>
</html>
