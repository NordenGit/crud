<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
    <h2>Create</h2>
    <form action="../controllers/StudentController.php" method="POST">
        <input type="hidden" name="action" value="create">
        First Name: <input type="text" name="firstname" required>
        Last Name: <input type="text" name="lastname" required>
        <input type="submit" value="Create">
    </form>
</body>
</html>
