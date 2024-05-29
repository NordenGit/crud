<?php
require_once "../config/config.php";
require_once "../models/Student.php";

class ApiStudentController {
    public function create($data) {
        $student = new Student;
        $student->firstname = $data['firstname'];
        $student->lastname = $data['lastname'];
        if ($student->save()) {
            echo json_encode(['status' => 'success', 'message' => 'Student created successfully']);
        }
    }

    public function edit($id, $data) {
        $student = Student::find($id);
        $student->firstname = $data['firstname'];
        $student->lastname = $data['lastname'];
        if ($student->save()) {
            echo json_encode(['status' => 'success', 'message' => 'Student updated successfully']);
        }
    }

    public function delete($id) {
        $student = Student::find($id);
        if ($student->delete()) {
            echo json_encode(['status' => 'success', 'message' => 'Student deleted successfully']);
        }
    }

    public function details($id) {
        $student = Student::find($id);
        if ($student) {
            echo json_encode(['status' => 'success', 'data' => $student]);
        }
    }

    public function list($search = null) {
        if ($search) {
            $students = Student::where('firstname', 'LIKE', "%$search%")->get();
        } else {
            $students = Student::all();
        }
        echo json_encode(['status' => 'success', 'data' => $students]);
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $data = json_decode(file_get_contents('php://input'), true) ?? [];
        $id = $_GET['id'] ?? '';

        switch ($method) {
            case 'POST':
                $this->create($data);
                break;
            case 'PUT':
                $this->edit($id, $data);
                break;
            case 'DELETE':
                $this->delete($id);
                break;
            case 'GET':
                if ($id) {
                    $this->details($id);
                } else {
                    $search = $_GET['search'] ?? null;
                    $this->list($search);
                }
                break;
            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
                break;
        }
    }
}

$controller = new ApiStudentController();
$controller->handleRequest();