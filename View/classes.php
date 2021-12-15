<?php require 'includes/header.php'?>
    <section>
        <nav>
            <p><a href="index.php">Back to homepage</a></p>
            <a href="index.php?page=teacher">Teachers</a>
            <a href="index.php?page=student">Students</a>
            <?php
            if (isset($_GET["view"]) && $_GET["view"] === "detailed") {
                echo '<a href="index.php?page=class">General View</a>';
            }
            if (!isset($_GET["view"])) {
                echo '<a href="index.php?page=class&view=detailed">Detailed View</a>';
            }
            ?>
        </nav>

        <h4>Class page</h4>

        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <?php
                if (isset($_GET["view"]) && $_GET["view"] === "detailed") {
                    echo "<th>Location</th><th>Teacher</th><th>Students</th><th>Actions</th>";
                }
                ?>
            </tr>
            <?php
            $display->table($connection, $columns, $table);
            ?>
        </table>

        <form method="post">
            <label>Id: </label>
            <input name="add_id" type="number">
            <label>Name: </label>
            <input name="add_name" type="text">
            <label>Location: </label>
            <input name="add_location" type="text">
            <label>Teacher: </label>
            <select name="add_teacher_id">
                <?php $display->teacherIdOptions($connection, $table) ?>
            </select>
            <button type="submit" name="add" value="submit">Add Class</button>
        </form>

    </section>
<?php require 'includes/footer.php'?>