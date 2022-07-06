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
        table, th, td {
            border: 1px solid var(--first-color-second);
            border-collapse: collapse;
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
            <!-- <form method="post" class="contact__form grid">
                <div class="contact__inputs grid">
                    <div class="contact__content">
                        <input type="search" name="search" id="search" class="contact__input">
                    </div>
                    <input type="submit" name="subSearch" id="subSearch" value="Search" class="button button--flex">
                </div>
            </form>
            <br>
            <br> -->
            <a href="?quantity=0" class="button button--flex">0</a>
            <a href="?quantity=1" class="button button--flex">1</a>
            <a href="inventory.php" class="button button--flex">all</a>
            <br>
            <br>
            <table style="width:100%">
                <tr>
                    <th>Id</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Options</th>
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
                    header("Location: ?search=$search");
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
                            <td><?php echo $product_model ?></td>
                            <td><?php echo $product_quantity ?></td>
                            <td><?php echo $product_cost ?></td>
                            <td>
                                <a href=<?php echo $product_edit ?> class="button button--flex">
                                    <i class="uil uil-edit"></i>
                                </a>
                                <a href=<?php echo $product_delete ?> class="button button--flex">
                                    <i class="uil uil-trash-alt"></i>
                                </a>
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
        var url = 'docs/version.json';
        fetch(url)
        .then(response => response.json())
        .then(json => {
            
            // Do stuff with the contents of the JSON file here
            version = json.App.version;
            console.log(version);
            document.getElementById("version").innerHTML = "Your version: " +
            version;
            return version;
        });

        var url = 'https://api.github.com/repos/miloalvarez9809/inventory.php/releases/latest';
        fetch(url)
        .then(response => response.json())
        .then(json => {

            // Do stuff with the contents of the JSON file here
            git_version = json.name;
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