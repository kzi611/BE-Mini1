<?php
    include_once("config.php");
    $result = $dbConn->query("SELECT * FROM users ORDER BY id DESC");
    $row_count = $result->rowCount(); // Get the total number of rows

    // Define an array of background colors
    $bg_colors = array("#000000", "#333333"); // Add more colors if needed

    // Counter to keep track of the background color index
    $color_index = 0;

    echo "<html>";
    echo "<head>";
    echo "<title>Homepage</title>";
    echo "</head>";
    echo "<body>";
    echo "<a href='add.html'>Add New Data</a><br/><br/>";
    echo "<table width='80%' border=0>";

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Alternate background color for each row
        $bg_color = $bg_colors[$color_index % count($bg_colors)];
        
        // Increment the color index
        $color_index++;

        echo "<tr bgcolor='".$bg_color."'>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['age']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</body>";
    echo "</html>";
?>