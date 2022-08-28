<?php
include('session.php');

if($start == 1){
?>

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
    <style>
        td {
          text-align: center;
        }
    </style>

    <title>users</title>
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
                <a href="users.php" class="nav__link active-link">
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
        <h2 class="section__title">users</h2>
        <span class="section__subtitle">inventory.php</span>

        <div class="about__container container grid">
          <div class="about__data">
            <a href="new_users.php" class="button button--flex">
                Add a user
                <i class="uil uil-plus"></i>
            </a>
            <br>
            <br>

            <table>
                <tr>
                    <th>ID</th>
                    <th>USER</th>
                    <th>ADMIN</th>
                    <th>DATE</th>
                    <th>SETS</th>
                </tr>

                <?php
                $sql = "SELECT * FROM users";

                $result = $conn->query($sql);

                if ($result !== false && $result->num_rows > 0){
                    while ($row = $result-> fetch_assoc()){

                        $user_id = $row['id'];
                        $user_name = $row['user'];
                        $user_admin = $row['admin'];
                        $user_date = $row['date'];

                        $user_edit = "edit_users.php?id=$user_id";
                        $user_delete = "delete_users.php?id=$user_id";

                        if($user_id != $superuser){
                            ?>

                            <tr>
                                <td><?php echo $user_id ?></td>
                                <td><?php echo $user_name ?></td>
                                <td><?php echo $user_admin ?></td>
                                <td><?php echo $user_date ?></td>
                                <td>
                                    <span class="button button--flex services__button">
                                        <i class="uil uil-setting button__icon"></i>
                                    </span>
                                    <div class="services__modal">
                                        <div class="services__modal-content">
                                        <h4 class="services__modal-title">
                                            <?php echo $user_id ?>
                                            <br />
                                            <?php echo $user_name ?>
                                        </h4>
                                        <i class="uil uil-times services__modal-close"></i>
                                            <ul class="services__modal-services grid">
                                            <li class="services__modal-service">
                                                <i class="uil uil-check-circle services__modal-icon"></i>
                                                <a href="<?php echo $user_edit ?>">
                                                <span class="button button--flex button--small button--link">
                                                    Edit
                                                    <i class="uil uil-edit button__icon"></i>
                                                </span>
                                                </a>
                                            </li>
                                            </ul>

                                            <ul class="services__modal-services grid">
                                            <li class="services__modal-service">
                                                <i class="uil uil-check-circle services__modal-icon"></i>
                                                <a href="<?php echo $user_delete ?>">
                                                <span class="button button--flex button--small button--link">
                                                    Delete
                                                    <i class="uil uil-trash-alt button__icon"></i>
                                                </span>
                                                </a>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                <?php
                        }
                    }
                        }
                        else{
                            echo "No Results";
                        }
                        $conn->close();
                ?>
            </table>
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
    <script src="https://www.rahcode.com/assets/js/main.js"></script>
</body>
</html>

<?php
}else{
    echo "<script> alert('You are not allowed to do this');window.location= 'inventory.php' </script>";
}
?>