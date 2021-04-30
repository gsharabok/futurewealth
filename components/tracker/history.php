<?php
$email = $_SESSION['email'];
$sql = "SELECT * FROM expenses WHERE email='$email'";
$result = $conn->query($sql);
$balance = 0;
if ($result->num_rows > 0) {
    echo '<table id="history"><tr><th>Item</th><th>Cost</th><th>Date</th></tr>';
    while($row = $result->fetch_assoc()) {
        $balance += $row["expensecost"];
        echo "<tr><td>" . $row["expenseitem"]. "</td><td>" . $row["expensecost"]. "</td><td>" . $row["expensedate"]. "</td></tr>";
    }
    } else {
        echo "0 results";
    }
    echo "</table>";
    
?>