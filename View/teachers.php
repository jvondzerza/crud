<?php require 'includes/header.php'?>
    <section>
        <nav>
            <p><a href="index.php">Back to homepage</a></p>
            <a href="index.php?page=student">Students</a>
            <a href="index.php?page=class">Classes</a>
            <?php
            if (isset($_GET["view"]) && $_GET["view"] === "detailed") {
                echo '<a href="index.php?page=teacher">General View</a>';
            }
            if (!isset($_GET["view"])) {
                echo '<a href="index.php?page=teacher&view=detailed">Detailed View</a>';
            }
            ?>
        </nav>

        <h4>Teacher page</h4>

        <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <?php
                    if (isset($_GET["view"]) && $_GET["view"] === "detailed") {
                        echo "<th>Students</th><th>Actions</th>";
                    }
                    ?>
                </tr>
                <?php
                $display->table($connection, $columns, $table);
                ?>
            </table>

    </section>
<?php require 'includes/footer.php'?>