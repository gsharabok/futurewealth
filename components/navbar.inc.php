<?php include 'components/accounts/config.php'; 
error_reporting(0);

session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><h1>FutureWealth</h1></a>
        <button
          class="navbar-toggler navbar-toggle"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Opportunities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            
            <?php  if(isset($_SESSION['username'])) {?>
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">My Expenses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="components/accounts/logout.php">Logout</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>