<?php 
$email = $_SESSION['email'];
$sql = "SELECT * FROM expenses WHERE email='$email'";
$result = $conn->query($sql);
$balance = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $balance += $row["expensecost"];
    }
}
if (isset($balance)){ 
    echo $balance;
} else{
    echo "0.00";
} 
?>