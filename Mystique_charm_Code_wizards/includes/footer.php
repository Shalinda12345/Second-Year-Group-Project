<!-- footer.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS sheet-->
    <link rel="stylesheet" href="./style.css">

    <script>
        function setCurrentYear() {
            document.getElementById('currentYear').textContent = new Date().getFullYear();
        }
    </script>
</head>
<body onload="setCurrentYear()">
    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p class="footer-aboutUs">Welcome to Mystique Charm, where beauty meets innovation. We offer high-quality, affordable cosmetics to enhance natural beauty and boost confidence. Committed to excellence, we provide skincare, makeup, and haircare products crafted with the finest ingredients.</p>
            </div>
            <div class="footer-section links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="./index.php"><b>Home</a></li>
                    <li><a href="./display_all.php">All Products</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="#">Privacy Policy</b></a></li>
                </ul>
            </div>
            <div class="footer-section social">
                <h2>Follow Us</h2>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-section newsletter">
                <h2>Newsletter</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <input class="email_enter" type="email" name="email" placeholder="Enter your email address" required>
                    <button class="subscribe_btn" type="submit">Subscribe</button>
                </form>
            </div>
        </div>

        <!--Divider-->
        <hr class="Divider2">

        <div class="footer-bottom">
            <p>&copy; <span id="currentYear"></span> Mystique Charm. All rights reserved.</p>
            <p class="footer_code_wizards">Develop by : <b>Code Wizards</b></p>
        </div>
    </footer>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        
        // Perform validation or database insertion here

        // For demonstration, we simply print a success message
        //echo '<script>alert("Subscription successful!");</script>';
    }
    ?>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
