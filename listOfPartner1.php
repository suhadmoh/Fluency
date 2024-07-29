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

// Fetch data from the database
$sql = "SELECT * FROM partner_info"; 
$result = mysqli_query($connection , $sql);


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Partner List</title>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="ListOfpartner1.css" />
        
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
    <a href="homePageLearner.html">
      <span class="line tLine"></span>
      <span class="line mLine"></span>
      <span class="label">Back </span>
      <span class="line bLine"></span>
  </a>
</div>
<!--End Back button-->
      <h1>List Of Partner</h1>
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
      <li><a href="fluency.html" id="singout">Sign out</a></li>
          </ul>
        </div>
      </li>
      <img src="ProfileIcon.png" alt="Profile" class="custom-img">


    </ul>
</nav>
<main class="page-content">
            <?php
            // Check if there is any data in the result set
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                   echo '<div class="card" >';
                    echo '<div class="content >"';
                    echo '<form method="post" class="partner-form" >';

                    echo '<label for="partnerLanguage" class="title" >Language:</label>';
                    echo '<input type="text" id="partnerLanguage" name="partnerLanguage" class="cop" value="' . $row["Language"] . '"><br><br>';

                    echo '<label for="partnerName" >Partner Name:</label>';
                    echo '<input type="text" id="partnerName" name="partnerName" class="cop" value="' . $row["partnerName"] . '"><br><br>';
                    
                    echo '<label for="proficiencyLevel">Proficiency Level:</label>';
                    echo '<input type="text" id="proficiencyLevel" name="proficiencyLevel" value="' . $row["proficiencyLevel"] . '"><br><br>';
                    
                    // Add a hidden input field to pass the row's ID or any other unique identifier
                    echo '<input type="hidden" name="partnerId" value="' . $row["id"] . '">'; // Assuming "id" is the column name for unique identifier
                    echo '<button type="button" id="moreDetailsButton">Partner Details</button>';
                    echo '<button type="button" id="postRequestButton">Post Request</button>';
                    echo '</div></div></form>';
                }
            } else {
                echo "0 results";
            }
            ?>
</main>

<script>
    // JavaScript to handle form submission based on button click
    document.querySelectorAll('.partner-form').forEach(function(form) {
        form.querySelector('.moreDetailsButton').addEventListener('click', function() {
            // Set form action to "more_details.php"
            form.action = 'more_details.php';
            // Submit the form
            form.submit();
        });

        form.querySelector('.postRequestButton').addEventListener('click', function() {
            // Set form action to "postRequest.php"
            form.action = 'postRequest.php';
            // Submit the form
            form.submit();
        });
    });
</script>




  <!--
        <main class="page-content">
            <div class="card">
              <div class="content">
                <h2 class="title">Emma Noah </h2>
                <p class="cop"> <br>Proficiency level: Advanced <br></p>
                <p class="btn"><a href="Partner_moreInfo.html.html" style="font-size: small; color: bisque;">More details</a></p>
                <button class="btn" onclick="window.location.href='postRequest.html'">Post Request</button>
              </div>
            </div>
            <div class="card">
              <div class="content">
                <h2 class="title">Mohmmad Saleh </h2>
                <p class="btn"><a href="Partner_moreInfo.html.html" style="font-size: small; color: bisque;">More details</a></p>
                <p class="cop">Price: 45$ per hour <br>Proficiency level: Mastery<br> Rating: <img src="5rate.png" width="60px" alt="rating"><br>(Click on the email icon to discuss your learning goals):<a href="mailto:Mosaleh@hotmail.com"><img src="mail.png" width="20px" alt="email icon"></a></p>
                <button class="btn" onclick="window.location.href='postRequest.html'">Post Request</button>
              </div>
            </div>
            <div class="card">
              <div class="content">
                <h2 class="title">Jordi Alba <img src="spain.png" width="30px" alt="Spain flag"></h2>
                <p class="copy">Hola, I'm Jordi Alba, a football coach in Madrid, and I love teaching our language. So let's go.<a href="partnerDetailes.html" style="font-size: small; color: bisque;"> for more details</a></p>
                <p class="cop">Price: 40$ per hour <br>Proficiency: Advanced<br> Rating: <img src="rate.png" width="60px" alt="rating"><br>(Click on the email icon to discuss your learning goals):<a href="mailto:Alb48@gmail.com"><img src="mail.png" width="20px" alt="email icon"></a></p>
                <button class="btn" onclick="window.location.href='postRequest.html'">Post Request</button>
              </div>
            </div>
            <div class="card">
              <div class="content">
                <h2 class="title">Kumar Moh <img src="india1.png" width="30px" alt="Hind flag"></h2>
                <p class="copy">Hello, I'm Kumar, an Indian teacher in New Delhi, and I'm here to teach you the Indian language.<a href="partnerDetailes.html" style="font-size: small; color: bisque;"> for more details</a></p>
                <p class="cop">Price: 35$ per hour <br>Proficiency: Advanced<br> Rating: <img src="3rate.png" width="60px" alt="rating"><br>(Click on the email icon to discuss your learning goals):<a href="mailto:Kummar11@gmail.com"><img src="mail.png" width="20px" alt="email icon"></a></p>
                <button class="btn" onclick="window.location.href='postRequest.html'">Post Request</button>
              </div>
            </div>
          </main>-->



          <?php 
          // Close the database connection
          $connection->close(); ?>

    </body>
</html>
