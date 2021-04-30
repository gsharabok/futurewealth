<?php 
$email = $_SESSION['email'];
$sql = "SELECT * FROM expenses WHERE email='$email'";
$result = $conn->query($sql);
$balance = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["expensecost"] < 0){
            $balance += $row["expensecost"];
        }
    }
}
if (isset($balance)){ 
    echo abs($balance);
} else{
    echo "0.00";
} 
?>