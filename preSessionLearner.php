<?php
 session_start();

 // Check if the user is logged in
 if (isset($_SESSION['user_id'])) // User is logged in, retrieve the user ID
 $user_id = $_SESSION['user_id'];

$servername= "localhost";
$username= "root" ;
$password= "";
$dbname= "fluency" ;
$connection= mysqli_connect($servername,$username,$password,$dbname);
$database= mysqli_select_db($connection, $dbname);
// Check the connection
if (!$connection) 
die("Connection failed: ".mysqli_connect_error());

// Get current date in the format "YYYY-MM-DD"
$currentDate = date("Y-m-d");

// Get current time in the format "HH:MM:SS"
$currentTime = date("H:i:s");

// Fetch data from the database where schedule date is before the current date
$sql = "SELECT * FROM requestsession WHERE Date  < '$currentDate' AND time< '$currentTime' AND Status=1 AND LID_rq= $user_id";
$result = mysqli_query($connection, $sql);



// Rest of the code...


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Previous sessions</title><meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >

        <link rel="icon" href="Logo.png" type="image/x.icon">
    <link rel="stylesheet" href="sessions.css" >
    <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
    integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
    crossorigin="anonymous"/>
    </head>
    <body>
    <!--Back button--> 
  <div class="backBtn">
    <a href="homePageLearner.html">
      <span class="line tLine"></span>
      <span class="line mLine"></span>
      <span class="label">Back </span>
      <span class="line bLine"></span>
  </a>
</div>
      <h1>My Previous sessions</h1>

       <!-- Navbar Section -->
     <nav class="navbar">
      <div class="navbar__container">
        <img src="LogoBlackBackground.PNG" alt="Flunecy">
         
        </div>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="homePageLearner.html" class="navbar__links" id="home-page">Home</a>
          </li>

          
      <li class="navbar__item">
        <a href="homePageLearner.html" class="navbar__links" id="services-page">Services</a>
      </li>

      <li class="navbar__item navbar__dropdown">
        <a href="#" class="navbar__links">Sessions</a>
        <div class="navbar__dropdown-content">
          <ul>
            <li><a href="currentSessionLearner.html">Current Sessions</a></li>
            <li><a href="#">Previous Sessions</a></li>
          </ul>
        </div>
      </li>
  

      <li class="navbar__item">
        <a href="RequestLearner.html" class="navbar__links" id="partner-list-page">My Requests</a>
      </li>
      <li class="navbar__item navbar__dropdown">
        <a href="#" class="navbar__links">Profile</a>
        <div class="navbar__dropdown-content">
          <ul>
            <li><a href="ProfileLearner.html">View profile</a></li>
            <li><a href="editLearner.html">edit profile</a></li>
           <li> <a href="#overlay" class="open-button">delete account</a></li>
      <div class="overlay" id="overlay">
        <div class="message">
          <h2>Are you sure?</h2>
          <p>You want to delete account</p>
         
          <div>
            <form action="fluency.html" style="display: inline;">
              <button type="submit" style="background-color: red;">Yes</button>
            </form>
            <form action="homePageLearner.html" style="display: inline;">
              <button type="submit" style="background-color: green;">No</button>
            </form>
          </div>
        </div>
      </div>
      <li><a href="fluency.html">Sign out</a></li>
          </ul>
        </div>
      </li>
      <img src="ProfileIcon.png" alt="Profile" class="custom-img">
    </ul>
  </nav>

  <main class="page-content">
            <?php
            // Check if there is any data in the result set
            if (mysqli_num_rows($result) > 0) {
              // Output data of each row
              while ($row = mysqli_fetch_assoc($result)) {
                if($row["Status"] == 1){
                  echo '<div class="card>" ';
                  echo '<div class="content>"';
                  echo '<h2 class="title">Date: ' . $row["time"] . $row["Date"] .'</h2>';
                  echo '<p class="copy">Session Duration: ' . $row["Duration"] . '</p>';

                  $sql1 = "SELECT Language FROM partner_info WHERE partner_id = " . $row["pID_req"];
                  $result1 = mysqli_query($connection, $sql1);

                  echo '<p class="copy">Language to Learn: ' . $result1 . '</p>';
                  echo '<p class="copy">Language Partner: ' . $row["pID_req"] . '</p>';
                  echo '<p class="copy">Rate Partner: <a href = "LearnerRaitingAndReview.html"> HERE! </a></p>';
                  echo '</div></div>' ;
                }
              }
          } else {
              echo "No previous sessions yet.";
          }
            ?>
</main>

    </body>
</html>