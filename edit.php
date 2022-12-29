<?php
include('session.php');

if($start == 1 || $start == 2){

$id=$_GET['id'];
$query=mysqli_query($conn,"SELECT `id`, `type`, `model`, `quantity`, `cost` FROM `products` WHERE id = '$id'");
$row=mysqli_fetch_array($query);
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

    <title>edit</title>
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
            <?php
                if($start == 1){
                    ?>
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
                    <?php
                }
            ?>
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
        <!--==================== CONTACT ME ====================-->
        <section class="contact section" id="contact">
            <h2 class="section__title">Edit</h2>
            <span class="section__subtitle">Product</span>
            <div class="contact__container container grid">
                <div>
                    <form method="post" action="update.php?id=<?php echo $id; ?>" class="contact__form grid">
                    <div class="contact__inputs grid">
                        <div class="contact__content">
                            <label for="" class="contact__labe">Type/Brand</label>
                            <input type="text" class="contact__input" name="type" value="<?php echo $row['type']; ?>" />
                        </div>
                        <div class="contact__content">
                            <label for="" class="contact__labe">Model</label>
                            <input type="text" class="contact__input" name="model" value="<?php echo $row['model']; ?>" />
                        </div>
                        <div class="contact__content">
                            <label for="" class="contact__labe">Quantity</label>
                            <input type="number" class="contact__input" name="quantity" value="<?php echo $row['quantity']; ?>" />
                        </div>
                        <div class="contact__content">
                            <label for="" class="contact__labe">Cost</label>
                            <input type="number" class="contact__input" name="cost" value="<?php echo $row['cost']; ?>" />
                        </div>
                        <input type="submit" value="Edit" class="button button--flex" />
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer" id="foot">
    </footer>

    <!--==================== SWIPER JS ====================-->
    <script src="https://www.rahcode.com/assets/js/swiper-bundle.min.js"></script>

    <!--==================== MAIN JS ====================-->
    <script src="https://www.rahcode.com/assets/js/main.js" type="module"></script>
  </body>
</html>

<?php

}else{
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>