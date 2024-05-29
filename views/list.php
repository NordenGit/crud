<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>
    <h2>List</h2>
    <form method="GET" action="list.php">
        <input type="text" name="search" placeholder="Search by first name" value="<?php echo $_GET['search'] ?? ''; ?>">
        <input type="submit" value="Search">
    </form>
    <a href="create.php">Create Student</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once "../controllers/StudentController.php";
                $controller = new StudentController();
                $search = $_GET['search'] ?? null;
                $students = $controller->list($search);
                foreach ($students as $student) {
                    echo "<tr>";
                    echo "<td>".$student->id."</td>";
                    echo "<td>".$student->firstname."</td>";
                    echo "<td>".$student->lastname."</td>";
                    echo "<td><a href='details.php?id=".$student->id."'>Details</a> | <a href='edit.php?id=".$student->id."'>Edit</a> | <a href='delete.php?id=".$student->id."'>Delete</a></td>";
                    echo "</tr>";
                }
                require_once "../controllers/ApiStudentController.php";
            ?>
        </tbody>
    </table>
</body>
</html>
