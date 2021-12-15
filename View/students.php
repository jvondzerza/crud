<?php require 'includes/header.php'?>
    <section>
        <nav>
            <p><a href="index.php">Back to homepage</a></p>
            <a href="index.php?page=teacher">Teachers</a>
            <a href="index.php?page=class">Classes</a>
        </nav>

        <h4>Student page</h4>

            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                <?php
                $students = $display->getAllStudents($connection);
                foreach ($students as $student) {
                    echo "<tr>
                            <td>${student['id']}</td>
                            <td>${student['name']}</td>
                            <td><a href='index.php?page=edit&type=student&id=${student['id']}'>Edit</a></td>
                            <td><form method='post'><button name='delete' value=${student['id']}>Delete</button></form></td>
                            <td><a href='index.php?page=details&type=student&id=${student['id']}'>Details</a></td>
                            </tr>";
                }
                ?>
            </table>

        <form method="post">
            <label>Id: </label>
            <input name="add_id" type="number">
            <label>Name: </label>
            <input name="add_name" type="text">
            <label>E-mail: </label>
            <input name="add_email" type="text">
            <label>Class Id: </label>
            <input name="add_class_id" type="number">
            <button type="submit" name="add" value="submit">Add Student</button>
        </form>

    </section>
<?php require 'includes/footer.php'?>