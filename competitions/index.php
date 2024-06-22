<?php
  include "../config/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- Open Sans Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <div class="grid-container">

    <!-- Header -->
    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
      </div>
      <div class="header-left">
        <span class="material-icons-outlined">search</span>
      </div>
      <div class="header-right">
        <span class="material-icons-outlined">notifications</span>
        <span class="material-icons-outlined">email</span>
        <span class="material-icons-outlined">account_circle</span>
      </div>
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar">
      <div class="sidebar-title">
        <div class="sidebar-brand">
          <span class="material-icons-outlined">mood</span> LOGO
        </div>
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
      </div>

      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="#">
            <span class="material-icons-outlined">leaderboard</span> Competition
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="#">
            <span class="material-icons-outlined">dashboard</span> Add Competition
          </a>
        </li>
      </ul>
    </aside>
    <!-- End Sidebar -->

    <!-- Main -->
    <main class="main-container">
      <div class="main-title">
        <h2>DASHBOARD</h2>
      </div>
      <!-- SECTION INSERT -->
      <div class="main-cards">
        <table>

          <?php
          $sql = "SELECT * FROM competition";
          $query = mysqli_query($conn, $sql);
          $rows = mysqli_num_rows($query);
          ?>

          <thead>
            <tr>
              <th>League Name</th>
              <th>League Banner</th>
              <th>Teams</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <?php
              if ($rows == 0) {
              ?>
                <td colspan="3">No Data</td>
                <?php
              } else {
                for ($i = 0; $i < $rows; $i++) {
                  $result = mysqli_fetch_array($query);
                  $id = $result['id'];
                  $name = $result['name'];
                  $slug = $result['slug'];
                  $banner = $result['banner'];
                  $max_team = $result['max_teams'];
                ?>
            </tr>
            <tr>
              <td><?php echo $name; ?></td>
              <td><img src="images/<?php echo $banner ?>" alt=""></td>
              <td><?php echo $max_team ?></td>
              <td>
                <!-- <form action="index.php" method="GET">
                  <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                  <button type="submit" class="btn"></button>
                </form> -->
                <a href="<?php echo $slug;?>">League Infos</a>  
                <a href="create">Create</a>  
                
              </td>
            </tr>
        <?php
                }
              }
        ?>
          </tbody>
          </tr>
        </table>
      </div>
      <!-- SECTION INSERT -->

    </main>
    <!-- End Main -->



  </div>

  <!-- Scripts -->
  <!-- Custom JS -->
  <script src="js/scripts.js"></script>
</body>

</html>