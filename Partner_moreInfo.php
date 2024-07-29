<?php 


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
//partner_info( partner_id , Fnam , Lname, email, phoneNumber, password , confirmPaswoord , City , Age 
//, Language, Bio, Photo , Gender , ProficiencyLevel , SessionPrice); 
// Fetch data from the database
$sql = "SELECT * FROM partner_info where partner_id = $partnerID" ; 
$result = mysqli_query($connection , $sql);


?>

<!DOCTYPE html>
<html>
<head>
  <title>Partner Info</title>
  <link rel="stylesheet" type="text/css" href="ProfilePartner.css">
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="images/fav-icon.png"/>
  <link rel="icon" href="Logo.png" type="image/x.icon">
    <!--poppins-font-family------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Navbar Section -->
    <nav class="navbar">
      <div class="navbar__container">
        <img src="LogoBlackBackground.PNG" alt="Flunecy">
    
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="homePageLearner.html" class="navbar__links" id="home-page">Home</a>
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
    
          <li class="navbar__item navbar__dropdown">
            <a href="#" class="navbar__links">Profile</a>
            <div class="navbar__dropdown-content">
              <ul>
                <li><a href="#">View profile</a></li>
                <li><a href="editLearner.css">edit profile</a></li>
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
      </div>
       <!--**********************************************************-->
    <div class="backBtn">
        <a href="listOfPartner1.html">
          <span class="line tLine"></span>
          <span class="line mLine"></span>
          <span class="label">Back </span>
          <span class="line bLine"></span>
      </a>
    </div>
    </nav>

<div class="container">
    
    <div class="img-container">
        <img class="user-pic" src="images\ProfileIcon.png">
        </div>

    <div class="lastName-container">
      <label class="firstName-label">Name: <?php echo $result['Fnam'] . ' ' . $result['Lname']; ?> </label>
    </div>
   
    <div class="lastName-container">
        <label class="firstName-label">Bio: <?php echo $result[' Bio']; ?> </label>
    </div>

    <div class="lastName-container">
      <label class="firstName-label">language spoken: <?php echo $result['Language']; ?> </label>
    </div>

    <div class="lastName-container">
      <label class="firstName-label">Proficiency level: <?php echo $result['ProficiencyLevel']; ?></label>
    </div>
    
    <div class="lastName-container">
    <label class="firstName-label">Rating & Reviews: <a href="raitingAndReviewPartner.php?partner_id=<?php echo $partnerId; ?>">View Partner's Rating & Reviews</a></label>
    </div>

    <div class="lastName-container">
      <label class="firstName-label">price per houre: <?php echo $result['SessionPrice']; ?></label>
    </div>

    <div class="lastName-container">
    <label class="firstName-label">Contact me: <a href="mailto:<?php echo $result['email']; ?>"><?php echo $result['email']; ?></a></label>
      </div>
</div>
 
</body>
</html>
