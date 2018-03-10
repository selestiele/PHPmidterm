<?php include 'view/header.php' ; ?>
<main>
    <h2>Student Grades</h2>
 
    <table>
        <tr>
        <th>Student Name</th>
        <th>Numeric Grade</th>
        <th>Letter Grade</th>
        <th>&nbsp;</th>
        </tr>
            <?php foreach ($students as $student) : ?>
            <tr>
                <td><?php echo $student['student_name']; ?></td>
                <td class="center"><?php $numGrade = $student['student_grade']; 
                          echo $numGrade; ?></td>
                <td class="center"><?php $letterGrade = calcGrade($numGrade); 
                          echo $letterGrade; ?></td>
                <td><form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_student">
                    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                    <input type="submit" value="Delete" class="deleteButton">
                    </form>
                </td>
            </tr>    
            <?php endforeach; ?>
    </table>
    <p class="addButton"><a href="model/add_student.php">Add Student</a></p>
</main>
<?php include 'footer.php'; ?>