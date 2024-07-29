<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rate Partner</title>
    <link rel="stylesheet" href="LearnerRaitingAndReview.css">
    <link rel="icon" href="Logo.png" type="image/x.icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
    // Retrieve the rating and review from the form submission
    $rating = $_POST['rating'] ?? '';
    $review = $_POST['review'] ?? '';

    // Perform any necessary validation and sanitization on the data

    // Connect to the database
    $dbhost = 'your_db_host';
    $dbuser = 'your_db_username';
    $dbpass = 'your_db_password';
    $dbname = 'your_db_name';

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Prepare and execute the SQL statement to insert the rating and review into the database
        $stmt = $conn->prepare("INSERT INTO learnerreview (rating, review) VALUES (?, ?)");
        $stmt->bind_param("is", $rating, $review);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            echo "Rating and review stored successfully.";
        } else {
            echo "Error storing rating and review.";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    }
    ?>
 
 
  </head>
  <body>
<!-- Back button -->
<div class="backBtn">
    <a href="preSessionLearner.html">
        <span class="line tLine"></span>
        <span class="line mLine"></span>
        <span class="label">Back </span>
        <span class="line bLine"></span>
    </a>
</div>

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
                    <li><a href="editLearner.html">edit profile</a></li>
                    <li><a href="#overlay" class="open-button">delete account</a></li>
                </ul>
            </div>
        </li>
        <img src="ProfileIcon.png" alt="Profile" class="custom-img">


    </ul>
</nav>

<div class="container">
    <div class="post">
        <div class="text">Thanks for rating us!</div>
        <div class="edit">EDIT</div>
    </div>
    <h1 class="title">How did you find your experience?</h1>
    <div class="star-widget">
        <form  method="POST">
            <input type="radio" name="rating" id="rate-5" value="5">
            <label for="rate-5" class="fas fa-star"></label>
            <input type="radio" name="rating" id="rate-4" value="4">
            <label for="rate-4" class="fas fa-star"></label>
            <input type="radio" name="rating" id="rate-3" value="3">
            <label for="rate-3" class="fas fa-star"></label>
            <input type="radio" name="rating" id="rate-2" value="2">
            <label for="rate-2" class="fas fa-star"></label>
            <input type="radio" name="rating" id="rate-1" value="1">
            <label for="rate-1" class="fas fa-star"></label>
            <div class="textarea">
                <textarea name="review" cols="30" placeholder="Describe your experience.."></textarea>
            </div>
            <div class="btn">
                <button type="submit">Post</button>
            </div>
        </form>
    </div>
</div>

<script>
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const widget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");
    btn.onclick = () => {
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = () => {
            widget.style.display = "block";
            post.style.display = "none";
        }
        return false;
    }
</script>

</body>
</html>