<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,300;0,500;1,300&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/homepage.css">

</head>
<body>
   
<header class="header">
    <div class="logo">
        <h1><a href="/onlinequiz">QuizPulse</a></h1>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="#" class="hover-effect">Home</a></li>
            <li><a href="user/index.php" class="hover-effect">Take Quiz!</a></li>
            <li><a href="#About" class="hover-effect">About Us</a></li>
            <li><a href="#features" class="hover-effect">Features</a></li>
            <a class="signup" href="user/signup.php">Sign Up!</a>
        </ul>
    </nav>
</header>

<section class="hero">
        <div class="container text-center">
            <h1>Welcome to <span id="typing-text"></span></h1>
            <p>Discover. Learn. Enjoy.</p>
            <a href="#" class="btn btn-primary">Get Started Today!</a>
        </div>
</section>

<section class="blog-post-area" id="About">
    <div class="container">
        <div class="row">
            <div class="blog-post-area-style">
                <div class="col-md-12">
                    <div class="single-post-big">
                        <div class="big-image">
                            <img src="includes/aboutus.png" alt="">
                        </div>

                        <div class="big-text" style="border-color: black; border-style: solid; border-width: thin;">
                            <br><br><br><br>
                            <h3><a href="#">About Us</a></h3>
                            <p>Welcome to QuizPulse, where learning meets fun! We are a dedicated team of educators, developers, and enthusiasts passionate about creating an engaging and enriching learning experience for students of all ages. Our platform offers a wide range of quizzes and educational content that cover various subjects and topics, from science and mathematics to literature and history. Our goal is to inspire curiosity, foster critical thinking, and empower learners to explore and expand their knowledge in an interactive and enjoyable way.</p>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>

<section class="features-section">
        <div class="container">
            <h1 class="Subject-heading" style=" color: white;">Our Services</h1>
            <br><br>
            <div class="row">
                <div class="col-md-4 feature">
                    <div class="icon-circle">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3>Interactive Quizzes</h3>
                    <p>Engage in interactive quizzes covering various subjects and topics. Test your knowledge and improve your understanding. Enjoy a diverse range of question formats, including multiple-choice, true/false, and open-ended questions.</p>
                </div>
        
                <div class="col-md-4 feature">
                    <div class="icon-circle">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Competitive Leaderboards</h3>
                    <p>Join the competition and challenge your peers on the leaderboards. As you complete quizzes and improve your scores, your ranking rises. Compare your progress with other students, and celebrate your achievements as you climb the leaderboard. This friendly competition adds motivation and a sense of accomplishment to your learning journey.</p>
                </div>
        
                <div class="col-md-4 feature">
                    <div class="icon-circle">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Progress Tracking</h3>
                    <p>Stay informed about your learning journey with comprehensive progress tracking. The portal keeps a record of the quizzes you've completed, scores achieved, and topics covered. It empowers you to set goals, monitor your improvement, and stay motivated to excel in your studies.</p>
                </div>
            </div>
        </div>
</section>

<section id="Subjects">
   <div class="Subject-heading">
        Top Rated Subjects for Quiz
     </div>
    <div class="row image-row">
      <div class="col-md-3" style="margin: 30;">
        <div class="image-box">
          <img src="includes/computer science.jpg" alt="Image 1">
          <div class="image-overlay"></div>
          <div class="image-caption">
            <h1>Computer Science</h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="image-box">
          <img src="includes/electronics.jpg" alt="Image 2">
          <div class="image-overlay"></div>
          <div class="image-caption">
            <h1>Electronics</h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="image-box">
          <img src="includes/physics.png" alt="Image 3">
          <div class="image-overlay"></div>
          <div class="image-caption">
            <h1>Physics</h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="image-box">
          <img src="includes/books literature.jpg" alt="Image 4">
          <div class="image-overlay"></div>
          <div class="image-caption">
            <h1>Literature</h1>
          </div>
        </div>
      </div>
    </div>
  
</section>

<a id="scrollToTop" class="scroll-to-top" href="#top">↑</a>

<footer class="footer">
        <div class="footer-icon">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
        </div>
</footer>
      
<script>
const text = "QuizPulse";
const typingText = document.getElementById('typing-text');
let i = 0;

function typeWriter() {
    if (i < text.length) {
        typingText.innerHTML += text.charAt(i);
        i++;
        setTimeout(typeWriter, 150); // Typing speed in milliseconds
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const scrollToTopButton = document.getElementById("scrollToTop");

    // Show the button when the user scrolls down 20px from the top of the document
    window.addEventListener("scroll", function() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopButton.style.display = "block";
        } else {
            scrollToTopButton.style.display = "none";
        }
    });

    // Scroll to the top when the button is clicked
    scrollToTopButton.addEventListener("click", function() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    });
});

typeWriter();
</script>
</body>
</html>