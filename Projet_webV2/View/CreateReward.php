<?php
include '../Controller/RewardC.php';
include '../Model/Reward.php';

$RewardC = new RewardC();

if (isset($_POST['submit'])) {
  // Récupérer les données du formulaire
  $title = $_POST['title'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $place = $_POST['place'];
  $prix_coins = $_POST['prix_coins'];

  // Récupérer les données de l'image uploadée
  $image = $_FILES['image'];
  $imageName = $image['name'];
  $imageTmpName = $image['tmp_name'];
  $imageError = $image['error'];

  // Vérifier s'il n'y a pas d'erreur lors de l'upload
  if ($imageError === 0) {
      // Déplacer l'image téléchargée vers le répertoire d'upload
      $upload_image = 'images/' . $imageName;
      move_uploaded_file($imageTmpName, $upload_image);

      // Créer une nouvelle instance de la classe Reward et définir ses propriétés
      $reward = new Reward( // L'ID sera généré automatiquement
          $title,
          $type,
          $upload_image,
          $description,     
          $place,
          $prix_coins
      );

      $RewardC->addReward($reward);

      // Rediriger vers une autre page en cas de succès
      header('Location: RewardPage.php');
      exit(); // Arrêter l'exécution ultérieure
  } else {
      // Gérer les erreurs d'upload d'image
      die('Error uploading image.');
  }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Voysync</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <link rel="stylesheet" href="CSS/styleTab.css" type="text/css">

</head>
<body>
    <nav class="navbar">
    <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <img src="images/logo.png" alt="">Voysync
    </div>
    <div class="search_bar">
        <input type="text" placeholder="Search">
    </div>
    <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <i class='bx bx-bell'></i>
      <img src="images/profile.jpg" alt="" class="profile">
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
          <a href="#" class="nav_link">
            <span class="navlink_icon">
              <i class='bx bx-map-alt'></i>
            </span>
            <span class="navlink">Missions</span>
          </a>
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
			 <input type="radio" name="tabs" id="tab1" >
			 <label for="tab1">
				  <a  href="HomePage.php" class="icon home"></a><span>Home</span>
			 </label>
			 <input type="radio" name="tabs" id="tab2"  >
			 <label for="tab2">
				  <a href="MissionPage.php" class="icon missionimg"></a><span>Mission</span>
			 </label>
			 <input type="radio" name="tabs" id="tab3" checked>
			 <label for="tab3">
				  <a href="RewardPage.php" class="icon reward"></a><span>Reward</span>
			 </label>
    </div>
     <br> <br>
    <div id="Rewards" class="tabcontent">
    <div class="container">
      <h2>Ajouter reward</h2>
      <form id="rewardForm" method="post" enctype="multipart/form-data">
            
            <label for="title">Titre :</label><br>
            <input type="text" id="title" name="title"  ><br>
            <span id="titleError" style="color: red;"></span><br>

            <label for="type">Type :</label><br>
            <select class="form-select" id="type" name="type">
              <option value="Restaurant">Restaurant</option>
              <option value="Loisir">Loisir</option>
              <option value="Logement">Logement</option>
              <option value="Vol">Vol</option>
            </select><br>

            <label for="image">Image :</label>
            <input type="file" id="image" name="image" accept="image/*" ><br>

            <label for="description">Description :</label><br>
            <textarea id="description" name="description" ></textarea><br>
            <span id="descriptionError" style="color: red;"></span><br>

            
            <label for="place">Lieu :</label><br> 
            <select class="form-select" id="place" name="place" >
                <option value="">country</option>
                <option value="Afghanistan">L'Afghanistan</option>
                <option value="Aland Islands">Iles Aland</option>
                <option value="Albania">Albanie</option>
                <option value="Algeria">Algérie</option>
                <option value="American Samoa">Samoa américaines</option>
                <option value="Andorra">Andorre</option>
                <option value="Angola">L'Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctique</option>
                <option value="Antigua and Barbuda">Antigua-et-Barbuda</option>
                <option value="Argentina">Argentine</option>
                <option value="Armenia">Arménie</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australie</option>
                <option value="Austria">L'Autriche</option>
                <option value="Azerbaijan">Azerbaïdjan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahreïn</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbade</option>
                <option value="Belarus">Biélorussie</option>
                <option value="Belgium">Belgique</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Bénin</option>
                <option value="Bermuda">Bermudes</option>
                <option value="Bhutan">Bhoutan</option>
                <option value="Bolivia">Bolivie</option>
                <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Saint-Eustache et Saba</option>
                <option value="Bosnia and Herzegovina">Bosnie Herzégovine</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Île Bouvet</option>
                <option value="Brazil">Brésil</option>
                <option value="British Indian Ocean Territory">Territoire britannique de l'océan Indien</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgarie</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodge</option>
                <option value="Cameroon">Cameroun</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cap-Vert</option>
                <option value="Cayman Islands">Îles Caïmans</option>
                <option value="Central African Republic">République centrafricaine</option>
                <option value="Chad">Tchad</option>
                <option value="Chile">Chili</option>
                <option value="China">Chine</option>
                <option value="Christmas Island">L'île de noël</option>
                <option value="Cocos (Keeling) Islands">Îles Cocos (Keeling)</option>
                <option value="Colombia">Colombie</option>
                <option value="Comoros">Comores</option>
                <option value="Congo">Congo</option>
                <option value="Congo, Democratic Republic of the Congo">Congo, République démocratique du Congo</option>
                <option value="Cook Islands">les Îles Cook</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'Ivoire">Côte d'Ivoire</option>
                <option value="Croatia">Croatie</option>
                <option value="Cuba">Cuba</option>
                <option value="Curacao">Curacao</option>
                <option value="Cyprus">Chypre</option>
                <option value="Czech Republic">République Tchèque</option>
                <option value="Denmark">Danemark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominique</option>
                <option value="Dominican Republic">République dominicaine</option>
                <option value="Ecuador">Equateur</option>
                <option value="Egypt">Egypte</option>
                <option value="El Salvador">Le Salvador</option>
                <option value="Equatorial Guinea">Guinée Équatoriale</option>
                <option value="Eritrea">Érythrée</option>
                <option value="Estonia">Estonie</option>
                <option value="Ethiopia">Ethiopie</option>
                <option value="Falkland Islands (Malvinas)">Îles Falkland (Malvinas)</option>
                <option value="Faroe Islands">Îles Féroé</option>
                <option value="Fiji">Fidji</option>
                <option value="Finland">Finlande</option>
                <option value="France">France</option>
                <option value="French Guiana">Guyane Française</option>
                <option value="French Polynesia">Polynésie française</option>
                <option value="French Southern Territories">Terres australes françaises</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambie</option>
                <option value="Georgia">Géorgie</option>
                <option value="Germany">Allemagne</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Grèce</option>
                <option value="Greenland">Groenland</option>
                <option value="Grenada">Grenade</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernesey</option>
                <option value="Guinea">Guinée</option>
                <option value="Guinea-Bissau">Guinée-Bissau</option>
                <option value="Guyana">Guyane</option>
                <option value="Haiti">Haïti</option>
                <option value="Heard Island and Mcdonald Islands">Îles Heard et McDonald</option>
                <option value="Holy See (Vatican City State)">Saint-Siège (État de la Cité du Vatican)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hongrie</option>
                <option value="Iceland">Islande</option>
                <option value="India">Inde</option>
                <option value="Indonesia">Indonésie</option>
                <option value="Iran, Islamic Republic of">Iran (République islamique d</option>
                <option value="Iraq">Irak</option>
                <option value="Ireland">Irlande</option>
                <option value="Isle of Man">île de Man</option>
                <option value="Israel">Israël</option>
                <option value="Italy">Italie</option>
                <option value="Jamaica">Jamaïque</option>
                <option value="Japan">Japon</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">République populaire démocratique de Corée</option>
                <option value="Korea, Republic of">Corée, République de</option>
                <option value="Kosovo">Kosovo</option>
                <option value="Kuwait">Koweit</option>
                <option value="Kyrgyzstan">Kirghizistan</option>
                <option value="Lao People's Democratic Republic">République démocratique populaire lao</option>
                <option value="Latvia">Lettonie</option>
                <option value="Lebanon">Liban</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Libéria</option>
                <option value="Libyan Arab Jamahiriya">Jamahiriya arabe libyenne</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lituanie</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, the Former Yugoslav Republic of">Macédoine, ancienne République yougoslave de</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaisie</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malte</option>
                <option value="Marshall Islands">Iles Marshall</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritanie</option>
                <option value="Mauritius">Ile Maurice</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexique</option>
                <option value="Micronesia, Federated States of">Micronésie, États fédérés de</option>
                <option value="Moldova, Republic of">Moldova, République de</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolie</option>
                <option value="Montenegro">Monténégro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Maroc</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibie</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Népal</option>
                <option value="Netherlands">Pays-Bas</option>
                <option value="Netherlands Antilles">Antilles néerlandaises</option>
                <option value="New Caledonia">Nouvelle Calédonie</option>
                <option value="New Zealand">Nouvelle-Zélande</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">l'ile de Norfolk</option>
                <option value="Northern Mariana Islands">Îles Mariannes du Nord</option>
                <option value="Norway">Norvège</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Territoire palestinien, occupé</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papouasie Nouvelle Guinée</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Pérou</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Pologne</option>
                <option value="Portugal">Le Portugal</option>
                <option value="Puerto Rico">Porto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Réunion</option>
                <option value="Romania">Roumanie</option>
                <option value="Russian Federation">Fédération Russe</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Barthelemy">Saint Barthélemy</option>
                <option value="Saint Helena">Sainte-Hélène</option>
                <option value="Saint Kitts and Nevis">Saint-Christophe-et-Niévès</option>
                <option value="Saint Lucia">Sainte-Lucie</option>
                <option value="Saint Martin">Saint Martin</option>
                <option value="Saint Pierre and Miquelon">Saint-Pierre-et-Miquelon</option>
                <option value="Saint Vincent and the Grenadines">Saint-Vincent-et-les-Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">Saint Marin</option>
                <option value="Sao Tome and Principe">Sao Tomé et Principe</option>
                <option value="Saudi Arabia">Arabie Saoudite</option>
                <option value="Senegal">Sénégal</option>
                <option value="Serbia">Serbie</option>
                <option value="Serbia and Montenegro">Serbie et Monténégro</option>
                <option value="Seychelles">les Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapour</option>
                <option value="Sint Maarten">St Martin</option>
                <option value="Slovakia">Slovaquie</option>
                <option value="Slovenia">Slovénie</option>
                <option value="Solomon Islands">Les îles Salomon</option>
                <option value="Somalia">Somalie</option>
                <option value="South Africa">Afrique du Sud</option>
                <option value="South Georgia and the South Sandwich Islands">Géorgie du Sud et îles Sandwich du Sud</option>
                <option value="South Sudan">Soudan du sud</option>
                <option value="Spain">Espagne</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Soudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard et Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Suède</option>
                <option value="Switzerland">la Suisse</option>
                <option value="Syrian Arab Republic">République arabe syrienne</option>
                <option value="Taiwan, Province of China">Taiwan, Province de Chine</option>
                <option value="Tajikistan">Tadjikistan</option>
                <option value="Tanzania, United Republic of">Tanzanie, République-Unie de</option>
                <option value="Thailand">Thaïlande</option>
                <option value="Timor-Leste">Timor-Leste</option>
                <option value="Togo">Aller</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinité-et-Tobago</option>
                <option value="Tunisia">Tunisie</option>
                <option value="Turkey">Turquie</option>
                <option value="Turkmenistan">Turkménistan</option>
                <option value="Turks and Caicos Islands">îles Turques-et-Caïques</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Ouganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">Emirats Arabes Unis</option>
                <option value="United Kingdom">Royaume-Uni</option>
                <option value="United States">États-Unis</option>
                <option value="United States Minor Outlying Islands">Îles mineures éloignées des États-Unis</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Ouzbékistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Îles Vierges britanniques</option>
                <option value="Virgin Islands, U.s.">Îles Vierges américaines, États-Unis</option>
                <option value="Wallis and Futuna">Wallis et Futuna</option>
                <option value="Western Sahara">Sahara occidental</option>
                <option value="Yemen">Yémen</option>
                <option value="Zambia">Zambie</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select><br>
            
            <label for="prix_coins">Prix :</label><br>
            <input type="number" id="prix_coins" name="prix_coins"  ><br>
            <span id="prixError" style="color: red;"></span><br><br>

            <!-- Bouton de soumission -->
            <button type="submit" name="submit">Ajouter</button>
        </form>
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
            }
          </script>
          <script>
            document.getElementById('rewardForm').addEventListener('submit', function(event) {
            event.preventDefault()
                console.log("Form validation function called");
                var title = document.getElementById("title").value;
                var type = document.getElementById("type").value;
                var prix_coins = document.getElementById("prix_coins").value;
                var description = document.getElementById("description").value;
                var place = document.getElementById("place").value;
                var image = document.getElementById("image").value;

                var errors = {}; 

                var prixError = document.getElementById('prixError');
                var descriptionError = document.getElementById('descriptionError');

                console.log("Title:", title);
                console.log("type:", title);               
                console.log("prix_coins:", prix_coins);
                console.log("Description:", description);
                console.log("place:", place);

                // Check if any field is empty
                if (title == "" || type == "" || prix_coins == "" || description == "" || place == "" || image==""  ) {
                    alert("Veuillez remplir tous les champs");
                    return false;
                }

                if (isNaN(prix_coins) || prix_coins.length > 100) {
                  errors.prix_coins = "Le prix doit etre supérieur à 100";
                  } else {
                      errors.prix_coins = "";
                  }

                if (description.length > 10) {
                  errors.description = "La description ne doit pas passer 100 caractéres.";
                  } else {
                      errors.description = "";
                  }
                  Object.keys(errors).forEach(function(field) {
                var errorSpan = document.getElementById(field + "Error");
                errorSpan.textContent = errors[field];
              });

                if (Object.values(errors).every(error => error === "")) {
                  Object.keys(errors).forEach(function(field) {
                      var errorSpan = document.getElementById(field + "Error");
                      errorSpan.textContent = "correct";
                      errorSpan.style.color= "green";
                  });
                
                }
            });
                
              
        </script>
        
        <script src="js/script.js"></script>

</body>
</html>