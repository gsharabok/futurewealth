<?php 
$email = $_SESSION['email'];
$sql = "SELECT * FROM expenses WHERE email='$email'";
$result = $conn->query($sql);
$largestexpense = 0;
$largestincome = 0;

$expenseitem = NULL;
$incomeitem = NULL;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["expensecost"] < $largestexpense){
            $largestexpense = $row["expensecost"];
            $expenseitem = $row["expenseitem"];
        }
        if($row["expensecost"] > $largestincome){
            $largestincome = $row["expensecost"];
            $incomeitem = $row["expenseitem"];
        }
    }
}
if ($largestexpense < 0){ 
    echo "<p>You have spent the most money on " . $expenseitem . ". The total is: $" . abs($largestexpense) . ". Consider reducing this expense!</p>";
} elseif ($largestincome > 0){
    echo "You have made the most money on " . $incomeitem . ". The total is: $" . abs($largestincome) . ". Keep it up!";
} else{
    echo "No expense or income data available. Please add some transactions to receive our advice!";
} 
?>