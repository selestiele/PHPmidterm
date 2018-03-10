<?php
//include the functions for sql statements and calculating the letter grade?

function get_student_list() {
    global $db;
    $query = 'SELECT * FROM grades ORDER BY student_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
                
}

function delete_student($student_id) {
    global $db;
    $query = 'DELETE FROM grades WHERE student_id = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_student($name, $grade) {
    global $db;
    $query = 'INSERT INTO grades (student_name, student_grade) VALUES (:student_name, :student_grade)';
    $statement = $db->prepare($query);
    $statement->bindValue(':student_name', $name);
    $statement->bindValue(':student_grade', $grade);
    $statement->execute();
    $statement->closeCursor();
}

function calcGrade($numGrade) {
    if ($numGrade >= 90){
        $letterGrade = "A";
    } else if ($numGrade >= 80) {
        $letterGrade = "B";
    } else if ($numGrade >= 70) {
        $letterGrade = "C";
    } else if ($numGrade >= 60) {
        $letterGrade = "D";
    } else {
        $letterGrade = "F";
    }
    
    return $letterGrade;
}


?>