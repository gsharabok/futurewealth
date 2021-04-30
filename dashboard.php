<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>
<?php 

include 'components/accounts/config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];
    $note = $_POST['note'];
	$cost = $_POST['cost'];

    $day = strtotime($_POST["date"]);
    $day = date('Y-m-d H:i:s', $day);

    $sql = "INSERT INTO expenses (email, expensedate, expenseitem, expensecost)
					VALUES ('$email', '$day', '$note', '$cost')";
	$result = mysqli_query($conn, $sql);

    header("Location: dashboard.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
	<link href="css/styles_tracker.css" rel="stylesheet">
	
</head>
<body>

<script src="js/tracker-scripts.js"></script>

<div id="expenses">
    <h2>Expense Tracker</h2>
    <div class="cont">
      <h4>Your Balance</h4>
      <h1 id="balance">$<?php include('components/tracker/balance.php'); ?>
       </h1>
      <div class="inc-exp-container">
        <div>
          <h4>Income</h4>
          <p id="money-plus" class="money-plus">
            +$<?php include('components/tracker/income.php'); ?>
          </p>
        </div>
        <div>
          <h4>Expense</h4>
          <p id="money-minus" class="money-minus">
            -$<?php include('components/tracker/expense.php'); ?>
          </p>
        </div>
      </div>

    <button type="button" class="collapsible">Add Transaction</button>
        <div class="collapse_inside">
        <form action="" method="POST" class="cost">
            
			<div class="input-group form-control">
                <label for="text">Item</label>
				<input type="text" placeholder="Enter Item..." name="note" value="<?php echo $note; ?>" required>
			</div>
			<div class="input-group form-control">
                <label for="amount">Amount <br> (negative = expense, positive = income )</label>
				<input type="number" placeholder="Enter Amount..." name="cost" value="<?php echo $cost; ?>" required>
			</div>
            <div class="input-group form-control">
                <label for="date">Date: &nbsp;</label>
				<input type="date" placeholder="Enter Date..." name="date" value="<?php echo $date; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Add</button>
			</div>
		</form>
        </div>
    <button type="button" class="collapsible">Delete Transaction</button>
        <div class="collapse_inside">
            <p>Coming Soon...</p>
        </div>

    <button type="button" class="collapsible">Advice of the day</button>
        <div class="collapse_inside">
            <div id="advicetxt"> <?php include('components/tracker/advice.php'); ?> </div>
        </div>

      <br><br>
      <h3>History</h3>
      <br>
      <input type="text" id="searchInput" onkeyup="search()" placeholder="Search for items.." title="Type in a name">
      <br>  
      <?php include('components/tracker/history.php'); ?>
      <br><br>

    </div>
</div>
    
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {

  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("history");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>


</body>
</html>

<?php include('components/footer.inc.php'); ?>