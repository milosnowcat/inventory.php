<!-- RAH Code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--==================== UNICONS ====================-->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />

    <!--==================== SWIPER CSS ====================-->
    <link rel="stylesheet" href="https://www.rahcode.com/assets/css/swiper-bundle.min.css" />

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="https://www.rahcode.com/assets/css/styles.css" />

    <title>Login</title>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="https://www.rahcode.com" class="nav__logo">RAH Code</a>

        <div class="nav__btns">
          <!-- Theme change button -->
          <i class="uil uil-moon change-theme" id="theme-button"></i>
        </div>
      </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">
                <h2 class="section__title">Login</h2>
                <span class="section__subtitle">If you don't have a user contact the administrator</span>

                <form method="post" action="login.php" class="contact__form grid">
                    <div class="contact__inputs grid">
                    <div class="contact__content">
                        <label for="" class="contact__labe">User</label>
                        <input type="text" class="contact__input"  name="txtuser" />
                    </div>
                    <div class="contact__content">
                        <label for="" class="contact__labe">Password</label>
                        <input type="password" class="contact__input" name="txtpass" />
                    </div>
                    </div>

                    <div>
                        <input type="submit" value="Login" class="button button--flex" />
                    </a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer" id="foot">
    </footer>

    <!--==================== SWIPER JS ====================-->
    <script src="https://www.rahcode.com/assets/js/swiper-bundle.min.js"></script>

    <!--==================== MAIN JS ====================-->
    <script src="https://www.rahcode.com/assets/js/main.js"></script>

    <?php
        if (isset($_COOKIE['user'])) {
            header('Location: inventory.php');
        }
    ?>
</body>
</html>