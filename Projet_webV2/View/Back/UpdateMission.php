<?php
include '../../Controller/MissionC.php';
include '../../Model/Mission.php';
$error ="";

if( isset($_GET['id_m'])) {
    $id_m = $_GET['id_m'];
    $MissionC = new MissionC();
    $mission= $MissionC->showMission($id_m);
    if(!$mission  || !isset($mission['title']) || !isset($mission['description']) || !isset($mission['place']) || !isset($mission['gift_point'])){
      echo "mission post not found.";
    
        exit;
    }
  } else {
    // Handle the case where modifierid is not provided
    echo "modifierid parameter is missing.";
    exit;
}
$valid = 0;
if(isset($_POST['title']) &&
    isset($_POST['description']) &&
    isset($_POST['place']) &&
    isset($_POST['gift_point'])) {
        if(!empty($_POST['title'])&&
        !empty($_POST['description'])&&
        !empty($_POST['place'])&&
        !empty($_POST['gift_point'])) 
      {
        $img = $_FILES['imageM'];

        $imagefilename = $img['name'];
        $imagefileerror = $img['error'];
        $imagefiletemp = $img['tmp_name'];
        $filename_seperate = explode('.', $imagefilename);
        $file_extension = strtolower($filename_seperate[1]);
        $extension = array('jpeg', 'jpg', 'png');
        if (in_array($file_extension, $extension)) {
            $upload_image = '../images/missions' . $imagefilename;
            move_uploaded_file($imagefiletemp, $upload_image);
            $valid = 1; // Form validation passed
        }
    } else {
        $error = "Missing information";
    }
  }
  if($valid == 1)
  {
    $mission = new Mission(
      $_POST["title"],
      $_POST["description"],
      $upload_image,
      $_POST["place"],
      $_POST["gift_point"],
      null,
      null,
      null
       // Utiliser le chemin de l'image comme valeur
  );
  $MissionC->updateMission($mission,$id_m);

header('Location: MissionPage.php');
    exit;

  }
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Voysync</title>
    <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../../CSS/styleTab.css" type="text/css">

</head>
<body>
    <nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="../images/logo.png" alt="">Voysync
    </div>
    <div class="search_bar">
        <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <img src="../images/profile.jpg" alt="" class="profile">
    </div>
  </nav>
  <nav class="sidebar">
    <div class="menu_content">
      <ul class="menu_items">
        <div class="menu_title menu_dahsboard"></div>
        <li class="item">
          <div href="index.html" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class="bx bx-home-alt"></i>
            </span>
            <span class="navlink">Home</span>
          </div>
        </li>
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-wallet'></i>
            </span>
            <span class="navlink">Pochette de voyage</span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>
          <ul class="menu_items submenu">
            <a href="Depenses_back.html" class="nav_link sublink">Back office</a>
            <a href="Depenses_front.html" class="nav_link sublink">Front office</a>
          </ul>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bxs-magic-wand"></i>
            </span>
            <span class="navlink">Itineraire magique</span>
          </a>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-chat'></i>
            </span>
            <span class="navlink">Blog</span>
          </a>
        </li>
        <li class="item">
          <div href="#" class="nav_link submenu_item">
            <span class="navlink_icon">
              <i class='bx bx-wallet'></i>
            </span>
            <span class="navlink">Missions</span>
            <i class="bx bx-chevron-right arrow-left"></i>
          </div>
          <ul class="menu_items submenu">
            <a href="HomePage.php" class="nav_link sublink">Back office</a>
            <a href="FRMissionPage.php" class="nav_link sublink">Front office</a>
          </ul>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bxs-user-account'></i>
            </span>
            <span class="navlink">Compte</span>
          </a>
        </li>
      </ul>
      <ul class="menu_items">
        <div class="menu_title menu_setting"></div>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bx-medal"></i>
            </span>
            <span class="navlink">Award</span>
          </a>
        </li>
        <li class="item">
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class="bx bx-cog"></i>
            </span>
            <span class="navlink">Setting</span>
          </a>
        </li>
      </ul>
      <div class="bottom_content">
        <div class="bottom expand_sidebar">
          <span> Expand</span>
          <i class='bx bx-log-in'></i>
        </div>
        <div class="bottom collapse_sidebar">
          <span> Collapse</span>
          <i class='bx bx-log-out'></i>
        </div>
      </div>
    </div>
    </nav>
  <div class="main_body">
    <div class="tabs">
			 <input type="radio" name="tabs" id="tab1"  >
			 <label for="tab1">
				  <a  href="MissionPage.php" class="icon home"></a><span>Home</span>
			 </label>
			 <input type="radio" name="tabs" id="tab2" checked>
			 <label for="tab2">
				  <a href="MissionPage.php" class="icon missionimg"></a><span>Mission</span>
			 </label>
			 <input type="radio" name="tabs" id="tab3">
			 <label for="tab3">
				  <a href="RewardPage.php" class="icon reward"></a><span>Reward</span>
			 </label>
    </div>
     <br> <br>
    <div id="Missions" class="tabcontent">
      <div class="container">
        <h2> Update mission</h2>
        <form  method="post" enctype="multipart/form-data">
            
            <label for="title">Titre:</label><br>
            <input type="text" id="title" name="title" value=<?php echo $mission['title'];?> ><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" cols="30" rows="3"><?php echo $mission['description']; ?></textarea><br>

            <label for="imageM">Image :</label>
            <input type="file" id="imageM" name="imageM" accept="image/*" ><br>
            
            <label for="place">Lieu:</label><br>
            <input type="text" id="place" name="place"  value="<?php echo $mission['place']; ?>"><br>
            
            <label for="gift_posint">Gift Point:</label><br>
            <input type="number" id="gift_point" name="gift_point" value="<?php echo $mission['gift_point']; ?>" ><br><br>
            <!-- Bouton de soumission -->
            <button class="btn" type="submit" name="submit">Update</button>
        </form>
        <?php echo $error; ?>
      </div>
       
    </div>
    </div>
        <script>
        
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
                document.getElementById('btnAjouter').addEventListener('click', function() 
                {
                  window.location.href = 'AjoutMission.php';
                });
            }
        </script>
        <script src="../js/script.js"></script>        

        
</body>