<?php
session_start();

// Initialize session array if not set
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add':
            $id = time() + rand(0, 9999);
            $_SESSION['students'][$id] = [
                'id' => $id,
                'name' => $_POST['name'],
                'age' => intval($_POST['age']),
                'class' => $_POST['class'],
            ];
            break;

        case 'update':
            $id = $_POST['id'];
            if (isset($_SESSION['students'][$id])) {
                $_SESSION['students'][$id]['name'] = $_POST['name'];
                $_SESSION['students'][$id]['age'] = intval($_POST['age']);
                $_SESSION['students'][$id]['class'] = $_POST['class'];
            }
            break;

        case 'delete':
            $id = $_POST['id'];
            if (isset($_SESSION['students'][$id])) {
                unset($_SESSION['students'][$id]);
            }
            break;
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_students') {
    header('Content-Type: application/json');
    echo json_encode(array_values($_SESSION['students']));
    exit;
}
