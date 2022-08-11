<?php
include('session.php');

if($start == 1 || $start == 2 || $start == 3){
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

    <title>inventory.php</title>
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
      <!--==================== ABOUT ====================-->
      <section class="about section" id="about">
        <h2 class="section__title">inventory</h2>
        <span class="section__subtitle">php</span>

        <div class="about__container container grid">
          <div class="about__data">
            <a href="new.php" class="button button--flex">
                Add a product
                <i class="uil uil-plus"></i>
            </a>
            <br>
            <br>
            <br>
            <br>
            <form method="post" class="contact__form grid">
                <div class="contact__inputs grid">
                    <div class="contact__content">
                        <input type="search" name="search" id="search" class="contact__input">
                    </div>
                    <input type="submit" name="subSearch" id="subSearch" value="Search" class="button button--flex">
                </div>
            </form>
            <br>
            <br>
            <a href="?quantity=0" class="button button--flex">0</a>
            <a href="?quantity=1" class="button button--flex">1</a>
            <a href="inventory.php" class="button button--flex">all</a>
            <br>
            <br>
            <table>
                <tr>
                    <th>ID</th>
                    <th>TYPE</th>
                    <th>MODEL</th>
                    <th>QTY</th>
                    <th>$</th>
                    <th>SETS</th>
                </tr>

                <?php
                if(isset($_GET['quantity'])){
                    $search_quantity = $_GET['quantity'];
                    $sql = "SELECT * FROM products WHERE quantity = ".$search_quantity." ";
                }
                else{
                    $sql = "SELECT * FROM products ";
                }
                
                // Search
                if(isset($_POST['subSearch'])){
                    $search = $_POST['search'];
                    echo '<script>window.location.href = "?search=' . $search .'"</script>';
                }

                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                    
                    $sql = "SELECT * FROM products WHERE (type LIKE LOWER ('%$search%') OR model LIKE LOWER ('%$search%'))";
                }
                // Search

                $result = $conn->query($sql);

                $quantity_total = 0;
                $cost_total = 0;

                if ($result !== false && $result->num_rows > 0){
                    while ($row = $result-> fetch_assoc()){

                        $product_id = $row['id'];
                        $product_type = $row['type'];
                        $product_model = $row['model'];
                        $product_quantity = $row['quantity'];
                        $product_cost = $row['cost'];

                        $quantity_total = $quantity_total + $product_quantity;
                        $cost_total = $cost_total + ($product_quantity * $product_cost);

                        $product_edit = "edit.php?id=$product_id";
                        $product_delete = "delete.php?id=$product_id";
                        ?>

                        <tr>
                            <td><?php echo $product_id ?></td>
                            <td><?php echo $product_type ?></td>
                            <td>
                              <span
                                class="button button--flex button--small button--link services__button"
                              >
                                <?php 
                                  $str_model = explode("/", $product_model);
                                  echo $str_model[0];
                                ?>
                                <i class="uil uil-arrow-right button__icon"></i>
                              </span>
                              <div class="services__modal">
                                <div class="services__modal-content">
                                  <h4 class="services__modal-title">
                                    <?php echo $product_id ?>
                                    <br />
                                    <?php echo $product_type ?>
                                  </h4>
                                  <i class="uil uil-times services__modal-close"></i>
                                  <?php
                                  foreach($str_model as $model_num){
                                  ?>
                                    <ul class="services__modal-services grid">
                                      <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p><?php echo $model_num ?></p>
                                      </li>
                                    </ul>
                                  <?php
                                  }
                                  ?>
                                </div>
                              </div>
                            </td>
                            <td><?php echo $product_quantity ?></td>
                            <td><?php echo $product_cost ?></td>
                            <td>
                              <span class="button button--flex services__button">
                                <i class="uil uil-setting button__icon"></i>
                              </span>
                              <div class="services__modal">
                                <div class="services__modal-content">
                                  <h4 class="services__modal-title">
                                    <?php echo $product_id ?>
                                    <br />
                                    <?php echo $product_type ?>
                                  </h4>
                                  <i class="uil uil-times services__modal-close"></i>
                                    <ul class="services__modal-services grid">
                                      <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <a href="<?php echo $product_edit ?>">
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
                                        <a href="<?php echo $product_delete ?>">
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
                    echo "<p>Total quantity: $quantity_total</p>";
                    echo "<p>Total cost: $cost_total</p><br>";
                }else{
                    echo "No Results";
                }
                $conn->close();
                ?>
            </table>
            <br>
            <br>
            <br>
            <br>
            <p id="version"></p>
            <p id="git_version">GitHub version: error</p>
          </div>
        </div>
      </section>
    </main>

    <!-- Check the app version -->
    <script>
        var version = 0
        var url = 'docs/version.json?v=' + "<?php echo uniqid(); ?>";
        fetch(url)
        .then(response => response.json())
        .then(json => {
            
            // Do stuff with the contents of the JSON file here
            version = json.App.version;
            console.log(version);
            console.log(url);
            document.getElementById("version").innerHTML = "Your version: " +
            version;
            return version;
        });

        var git_url = 'https://api.github.com/repos/miloalvarez9809/inventory.php/releases/latest';
        fetch(git_url)
        .then(response => response.json())
        .then(json => {

            // Do stuff with the contents of the JSON file here
            git_version = json.tag_name;
            console.log(git_version);
            if (version != git_version){
                alert("Contact the administrator to update your app to the latest version");
            }
            document.getElementById("git_version").innerHTML = "GitHub version: " +
            git_version;
        });
    </script>

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

}
?>