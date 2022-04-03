<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ournavbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DASHBOARD</a>
    </div>
    <div class="collapse navbar-collapse" id="ournavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="home"><a href="home.php"><span class="sr-only">(current)</span>HOME</a></li>
        <li class="classes"><a href="classes.php?do=Manage">CLASSE</a></li>
        <li class="study"><a href="study.php">STUDY</a></li>        
        <li class="news"><a href="news.php?do=Manage">NEWS</a></li>
        <li class="events"><a href="events.php?do=Manage">EVENTS</a></li>
        <li class="notifacations"><a href="notifacations.php?do=Manage">NOTIFICATIONS</a></li>        
        <li class="dropdown users">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["Email"] ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="users.php?do=Edit&userid=<?php echo $_SESSION["ID"] ?>">Edit Profils</a></li>
             <li role="separator" class="divider">
             <li><a href="../index.php">Acceuil</a></li>
              <li><a href="../../../site/Connexion/html/administrateur/administrateur.php">Assiduité</a></li>
            <li><a href="logout.php">LogOut</a></li>
           </li>
          </ul>
        </li>
      </ul>
  </div>
 </div>
</nav>
    <script type="text/javascript">
        // Add Class Active to active Link
        var $link = window.location.href;
        console.log($link);
        $link.split('/');
        $array = $link.split('/');
        $x = $array[6];
        $array1 = $x.split('.');
        $class = $array1[0];
        $class = $class;
        console.log($class);
        $(".nav ." + $class).addClass("active");
    </script>
