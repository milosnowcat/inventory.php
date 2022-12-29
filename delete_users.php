<?php
include('session.php');
include('admin_users.php');

if($start == 1){

    $id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--==================== UNICONS ====================-->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />

    <!--==================== SWIPER CSS ====================-->
    <link
      rel="stylesheet"
      href="https://www.rahcode.com/assets/css/swiper-bundle.min.css"
    />

    <!--==================== CSS ====================-->
    <link
      rel="stylesheet"
      href="https://www.rahcode.com/assets/css/styles.css"
    />

    <title>delete user</title>
  </head>
  <body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="/" class="nav__logo">inventory.php</a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list grid">
            <li class="nav__item">
              <a href="#" class="nav__link">
                <i class="uil uil-at nav__icon"></i>
                Hello "<?php echo $user ?>"
              </a>
            </li>
            <li class="nav__item">
                <a href="users.php" class="nav__link">
                    <i class="uil uil-user nav__icon"></i>
                    Users
                </a>
            </li>
            <li class="nav__item">
                <a href="docs/" class="nav__link">
                    <i class="uil uil-arrow-circle-up nav__icon"></i>
                    Update
                </a>
            </li>
            <li class="nav__item">
              <a href="logout.php" class="nav__link">
                <i class="uil uil-signout nav__icon"></i>
                Logout
              </a>
            </li>
          </ul>
          <i class="uil uil-times nav__close" id="nav-close"></i>
        </div>

        <div class="nav__btns">
          <!-- Theme change button -->
          <i class="uil uil-moon change-theme" id="theme-button"></i>

          <div class="nav__toggle" id="nav-toggle">
            <i class="uil uil-apps"></i>
          </div>
        </div>
      </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">

      <!--==================== ABOUT ====================-->
      <section class="about section" id="about">
        <h2 class="section__title">Delete</h2>
        <span class="section__subtitle">User</span>

        <div class="about__container container grid">
          <div class="about__data">
            <p class="about__description">
                Are you sure you want to remove this user?
                <br>
                <br>
                <a href="?id=<?php echo $id ?>&action=yes" class="button button--flex">
                    Yes
                </a>
                <br>
                <br>
                <a href="/" class="button button--flex">
                    No
                </a>
            </p>
          </div>
        </div>
      </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer" id="foot"></footer>

    <!--==================== SCROLL TOP ====================-->
    <a href="#" class="scrollup" id="scroll-up">
      <i class="uil uil-arrow-up scrollup__icon"></i>
    </a>

    <!--==================== SWIPER JS ====================-->
    <script src="https://www.rahcode.com/assets/js/swiper-bundle.min.js"></script>

    <!--==================== MAIN JS ====================-->
    <script src="https://www.rahcode.com/assets/js/main.js" type="module"></script>
  </body>
</html>

<?php
    if(isset($_GET['action'])){

        $action=$_GET['action'];

        if($action=='yes'){
            mysqli_query($conn,"DELETE FROM `users` WHERE id = '$id'");
            header('Location: users.php');
        }elseif($action=='no'){
            header('Location: users.php');
        }
    }

}else{
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>