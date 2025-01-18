<?php
// Database connection
  require_once('connection.php');


// Check conection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve the PDF file from the database
$sql = "SELECT id, filename FROM pdf_files ORDER BY uploaded_at DESC";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Notes | Notes for All</title>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./../../E-Notes/src/style.css">
    <link rel="stylesheet" href="./../../css/bootstrap.css">
    <link rel="stylesheet" href="./../../font/bootstrap-icons.css">

</head>
<body>
    <header class="p-4 d-flex justify-content-between h-auto align-items-center">
        <div id="head-left-section">
            <img height="100" id="logo" src="./../src/logo.png" alt="logo">
        </div>

        <div>
          <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">
            <span class="bi bi-clipboard"></span><p class="d-inline "> Register</p>
          </div>
          <div class="btn btn-success" data-bs-toggle="modal" data-bs-target="#login" id="head-right-section">
              <span class="bi bi-person-circle"></span> <p class="d-inline">Login</p>
          </div>
        </div>
    </header>


<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-between">
        <h5 class="modal-title" id="exampleModalLongTitle">Admin Login</h5>
        <div class="bi bi-x text-danger h1" id="close" data-bs-dismiss="modal"></div>
      </div>
      <div class="modal-body">
        <!-- <h2>Login Form</h2> -->
        <form onsubmit="validateForm()" action="login.php" method="post">
          <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <span id="usernameError" style="color:red"></span>
          </div>
          <div class="mt-3 mb-4">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span id="passwordError" style="color:red"></span>
          </div>
          <!-- <div>
            <button type="submit">Login</button>
          </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- register modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="loginCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-between">
        <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
        <div class="bi bi-x text-danger h1" id="close" data-bs-dismiss="modal"></div>
      </div>
      <div class="modal-body">
        <!-- <h2>Login Form</h2> -->
        <form action="register.php" method="post">
          <div class="mb-3">
            <label for="username">ID:</label>
            <input type="number" id="username" name="id">
            <!-- <span id="usernameError" style="color:red"></span> -->
          </div>
          <div class="mb-3">
            <label for="username">Name:</label>
            <input type="text" id="username" name="name">
            <!-- <span id="usernameError" style="color:red"></span> -->
          </div>
          <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <!-- <span id="usernameError" style="color:red"></span> -->
          </div>
          <div class="mt-3 mb-4">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span id="passwordError" style="color:red"></span>
          </div>
          <!-- <div>
            <button type="submit">Login</button>
          </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <!-- Open PDF in a new window/tab when clicked -->
                    <a href="view_pdf.php?id=<?php echo $row['id']; ?>" target="_blank">
                        <?php echo $row['filename']; ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No PDF files found.</p>
    <?php endif; ?>

    <?php $con->close(); 
    ?>



    <script src="./../../dist/jquery.js"></script>
   <script src="./../../js/bootstrap.bundle.js"></script>
   <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
   <script src="/node_modules/jquery/dist/jquery.js"></script>
</body>
</html>