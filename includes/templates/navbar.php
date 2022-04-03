
<!-- Start Navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
         <div class="container" >
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand visible-lg visible-xs" href="#"><img src="images/brand.png" class="img-responsive" width="200x" height="50px"></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="hvr-underline-from-center index"><a href="index.php">Acceuil</a></li>
                <li class="presentation mdedirecteur mission_et_objectif organigramme conseil_scientifique conseil_d_administration annuaire-enseignants annuaire-personnel">
                    <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Ecole<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li><a href="presentation.php">Présentation</a></li>
                        <li><a href="mdedirecteur.php">Mot De Directeur</a></li>
                        <li><a href="mission_et_objectif.php">Missions et Objectifs</a></li>
                        <li><a href="organigramme.php">Organigramme</a></li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Conseil de ESI SBA</a>
                            <ul class="dropdown-menu">
                                <li><a href="conseil_scientifique.php">Conseil Scientifique</a></li>
                                <li><a href="conseil_d_administration.php">Conseil d'dministration</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Annuaire</a>
                            <ul class="dropdown-menu">
                                <li><a href="teachers.php">Annuaire Enseignants</a></li>
                                <li><a href="annuaire-personnel.php">Annuaire Personnel</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="ingénieur master magiste doctorat">
                    <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Formation<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Graduation</a>
                            <ul class="dropdown-menu">
                                <li><a href="ingénieur.php">Ingénieur</a></li>
                                <li><a href="master.php">Master</a></li>
                            </ul>
                        </li>
                        <li class=".dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Post Graduation</a>
                            <ul class="dropdown-menu">
                                <li><a href="magister.php">Magister</a></li>
                                <li><a href="doctorat.php">Doctorat</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="inscription_en_1ere_annee reinscription magister equipes_de_recherche textes-reglementaires">
                    <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">PG & recherche<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Doctorat En Sciences</a>
                            <ul class="dropdown-menu">
                                <li><a href="inscription_en_1ere_annee.php">Inscription en 1ere Annee</a></li>
                                <li><a href="reinscription.php">Reinscription</a></li>
                            </ul>
                        </li>
                        <li><a href="textes-reglementaires.php">Textes Reglementaires</a></li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Labri</a>
                            <ul class="dropdown-menu">
                                <li><a href="magister.php">Presentation</a></li>
                                <li><a href="equipes_de_recherche.php">Equipes de Recherche</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="shema admission debouches cpi1 hcpi2 cs1">
                    <a href="#" class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown">Etudes<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Information</a>
                            <ul class="dropdown-menu">
                                <li><a href="shema.php">Schéma de formation </a></li>
                                <li><a href="admission.php">Admission</a></li>
                                <li><a href="debouches.php">Débouchés</a></li>
                            </ul>
                        </li>
                       
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Programmes</a>
                            <ul class="dropdown-menu">
                                <li><a href="cpi1.php">Premiére année </a></li>
                                <li><a href="hcpi2.php">deuxiéme année</a></li>
                                <li><a href="cs1.php">premiére année cycle séperieur</a></li>
                            </ul>
                        </li>
                    </ul>
               
                <li class="contact" hvr-underline-from-center"><a href="contact.php">Contact</a></li>
                 <li class="registration hvr-underline-from-center">
                     <?php
                     if (isset($_SESSION['email'])) echo '<a href="monespace.php">
                          My ESI</a>';
                      else echo '<a href="registration.php">
                          Connexion</a>';
                     ?>
                </li> 
                <li class="search1" style="margin-left: 10px;"><i class="fa fa-search fa-lgr" style="margin-top: 27px; color: #34495E; cursor: pointer;"></i></li>               
            </ul>
          </div><!--/.nav-collapse -->
         </div>
        </nav>
        <div class="search">
           <div class="container">
            <form class="form-wrapper cf" method="POST" action="recherche.php">
                  <input name="recherche" type="text" placeholder="Rechercher Ici.." class="wow flipInX">
                  <button type="submit" id="search"><i class='fa fa-search fa-3x'></i></button>
            </form>
           </div>
        </div>