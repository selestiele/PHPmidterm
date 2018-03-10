<?php
    require('model/database.php');
    require('model/grades_db.php');
     
  
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'student_list';
        }
    }
   
    if ($action == 'student_list') {
        $students = get_student_list();
        include('view/student_list.php');
    } else if ($action == 'add_student') {
        $nameInput = filter_input(INPUT_POST, 'student_name');
        $name = htmlspecialchars($nameInput);
        $grade = filter_input(INPUT_POST, 'student_grade', FILTER_VALIDATE_INT);
        if ($grade == NULL || $name == NULL) {
            $error = "You must complete all the fields.";
            include('errors/error.php');
        } else if ($grade == FALSE || $grade < 0 || $grade > 100) {
            $error = "Grade must be in numeric form, between 0 and 100 only.";
            include('errors/error.php');
        } else {
            add_student($name, $grade);
            header("Location: . ");
        }
    } else if ($action == 'delete_student') {
        $student_id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
        //echo $student_id;
        if ($student_id == NULL || $student_id == FALSE) {
            $error = "Missing or incorrect data.";
            include('errors/error.php');
        } else {
            delete_student($student_id);
            header('Location: . ');
        }
    }
    
?>