<?php

include 'config.php';

try {
    $stmt = $conn->query("SELECT username FROM user");
    while ($row = $stmt->fetch()) {
        echo $row['username']."<br />";
    }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

