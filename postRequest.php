
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

$partnerID = $_POST['partnerId'];
$partnerName = $_POST['partnerName'];


?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <title> Post Request </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="postStyle.css" />
    
    <link rel="icon" href="Logo.png" type="image/x.icon">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"/>  
   </head>
<body>
  <!--Back button--> 
  <div class="backBtn">
    <a href="listOfPartner1.html">
      <span class="line tLine"></span>
      <span class="line mLine"></span>
      <span class="label">Back </span>
      <span class="line bLine"></span>
  </a>
</div>
<!--End Back button-->
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
              <li><a href="preSessionLearner.html">Previous Sessions</a></li>
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
             <li> <a href="#overlay" class="open-button">delete account</a></li>
        <div class="overlay" id="overlay">
          <div class="message">
            <h2>Are you sure?</h2>
            <p>You want to delete account</p>
           
            <div>
              <form action="fluency.html" style="display: inline;">
                <button type="submit" style="background-color: red;">Yes</button>
              </form>
              <form action="homePagePartner.html" style="display: inline;">
                <button type="submit" style="background-color: green;">No</button>
              </form>
            </div>
          </div>
        </div>
            </ul>
          </div>
        </li>
        <img src="ProfileIcon.png" alt="Profile" class="custom-img">
        <li><a href="fluency.html">Sign out</a></li>
      </ul>
      </nav>
  <div class="container">

    <div class="title" id="postreq">Post Request</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Language want to learn:</span>
            <select name="language" required>
              <option value="" disabled selected>Language want to learn</option>
      

              <!-- Add more options for other languages as needed -->
            </select>
          </div>
          
          <div class="input-box">
            <span class="details">Level:</span>
            <select name="Level" required>
              <option value="" disabled selected>your current level</option>
              <option value="Beginner">Beginner</option>
              <option value="intermediate">Intermediate</option>
              <option value="advanced">Advanced</option>
              <!-- Add more options for other levels as needed -->
            </select>
          </div>
          
          <div class="input-box">
            <span class="details">Schedule a session:</span>
            <input type="datetime-local" required>
          </div>
          
          <div class="input-box">
            <span class="details">Session duration:</span>
            <select name="duration" required>
              <option value="" disabled selected>Select a duration</option>
              <option value="30">30 minutes</option>
              <option value="60">1 hour</option>
              <!-- Add more options for other durations as needed -->
            </select>
          </div>
          
          <div>
            <form>
              <input type="submit" value="Post" class="green-button" formaction="RequestLearner.html">
              <input type="reset" value="Clear" class="red-button" formaction="postRequest.html">
            </form>
          </div>
          </div>     
</body>
</html>