<?php
include '../view/header.php';
?>

<main>
    <h1>Add a Student</h1>
    <form action="../index.php" method="post" id="add_student">
        <input type="hidden" name="action" value="add_student">
        <label>Student Name</label>
        <input type="text" id="student_name" name="student_name"><br>
        <label>Grade</label>
        <input type="text" id="student_grade" name="student_grade" maxlength="3">
        <br>
        <input type="submit" value="Enter Student" class="addButton">
    </form>
    
</main>
<?php include '../view/footer.php'; ?>