<?php
require_once "../config/config.php";
require_once "../models/Student.php";

class StudentController {
    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];
            switch ($action) {
                case 'create':
                    $this->create($_POST);
                    break;
                case 'edit':
                    $this->edit($_POST['id'], $_POST);
                    break;
                case 'delete':
                    $this->delete($_POST['id']);
                    break;
                case 'search':
                    $this->search($_POST);
                    break;
            }
        }
    }

    public function create($data) {
        $student = new Student;
        $student->firstname = $data['firstname'];
        $student->lastname = $data['lastname'];
        if ($student->save()) {
            header("Location: ../views/list.php");
        }
    }

    public function edit($id, $data) {
        $student = Student::find($id);
        $student->firstname = $data['firstname'];
        $student->lastname = $data['lastname'];
        if ($student->save()) {
            header("Location: ../views/list.php");
        }
    }

    public function delete($id) {
        $student = Student::find($id);
        if ($student->delete()) {
            header("Location: ../views/list.php");
        }
    }
    
    public function details($id) {
        return Student::find($id);
    }

    public function list($search = null) {
        if ($search) {
            return Student::where('firstname', 'LIKE', "%$search%")->get();
        } else {
            return Student::all();
        }
    }

    public function search($data) {
        $search = $data['search'] ?? '';
        header("Location: ../views/list.php?search=$search");
    }
}
$controller = new StudentController();
$controller->handleRequest();