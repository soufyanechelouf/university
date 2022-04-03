<?php  
       session_start();
       $pageTitle = "ESI Contactez-Nous";
       include "init.php";
?>
<body>
  <section>     
   <div class="titre container">    
    <h2 class="h1 text-center">Contactez Nous pour plus d'aides </h2>
    </div>  
    <br><br>
    <div class="container map-info">
        
        <div class="col-md-6 tel">
        <h2>Admission et infos</h2>
        <div class="lead">
        Admission au premier cycle
        <br>
        <strong>+ Tel:</strong>
        &nbsp;+213 48 74 94 52 
        <br>
        <strong>+ Fax:</strong>
        &nbsp;+213 48 74 94 52
            <br>
        </div> 
        </div>
        <div class="col-md-6 tel">
        <h2>Informations Générales</h2>
        <div class="lead">
        Adresse: BP 73, Bureau de poste EL WIAM, Rue Guerouache Mohamed
        <br>
        22000 Sidi Bel Abbès, Algérie
        <br>
        <strong>+ Tel:</strong> +213 48 74 94 50
        </div>    
        </div>
        <div>    
            <br />
            <br />
            <br />
        </div>
        
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13040.202485685479!2d-0.6392518152868136!3d35.20520802614722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x415ddcaa33d72f37!2sEcole+Sup%C3%A9rieure+en+informatique+08+Mai+1945!5e0!3m2!1sfr!2sdz!4v1489157134426" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
               
            <br><br><br>
            <p class="lead">
            L’ESI de Sidi Bel Abbes est abritée par le site de l’ex Faculté des lettres et sciences humaines. Rue Guerouache Mohamed, Sidi Bel Abbes, 22000, Algerie.
            <br>Telephone +213 (0) 48 74 94 52
            <br>Fax +213 (0) 48 74 94 52
            </p>
    </div>
    </section>
        <!-- end map div -->

        <!-- other info -->
    <section>
    <div class="faq container col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
    

    <div class="panel-group" id="accordion">
        <h2 class="faqHeader">Autre informations</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><strong>DÉRECTION GÉNÉRALE<i class="fa fa-top"></i></strong></a>
                </h3>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="lead panel-body">
                    Tel: +213 48 74 94 50<br>
                    Mail: secretariat@esi-sba.dz 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen"><strong>DÉRECTION DES ÉTUDES</strong></a>
                </h3>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="lead panel-body">
                    Tel: +213 48 74 94 52<br>
                    Mail: ded@esi-sba.dz 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven"><strong>SECRÉTARIAT GÉNÉRALE</strong></a>
                </h3>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="lead panel-body">                    
                    Tel: +213 48 74 94 52<br>
                    Mail: sg@esi-sba.dz
                </div>
            </div>
        </div><br><br><br><br>
        </div>
    </div>
    </section>
        <!-- other info -->
        
        <!-- contact form -->
    <section>
        <div class="row">
    <div class="message container col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
    
    <form class="well form-horizontal" action="process/contactp.php" method="post"  id="contact_form">
        <fieldset>

            <!-- Form Name -->
            <legend class="text-center">Contactez nous pour plusieur d'information</legend>

            <!-- Text input-->

            <div class="form-group">
    <label class="col-md-2 control-label">Nom</label>  
    <div class="col-md-10 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="Votre nom" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-2 control-label" >Prénom</label> 
    <div class="col-md-10 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Votre prenom" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-2 control-label">E-Mail</label>  
    <div class="col-md-10 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="votre E-Mail Addresse" class="form-control"  type="email">
    </div>
  </div>
</div>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-2 control-label" >Password</label> 
    <div class="col-md-10 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="password" placeholder="Votre email password" class="form-control"  type="password">
    </div>
  </div>
</div>
<!-- Text area -->
  
<div class="form-group">
  <label class="col-md-2 control-label">Message </label>
    <div class="col-md-10 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <textarea class="form-control" name="comment" placeholder="ecrire une message"></textarea>
  </div>
  </div>
</div>

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i>votre message est envoyé , restez brancher pour notre réponse .</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="envoyer" class="btn btn-primary">Envoyer <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div>
        </div>
    </section>
        <!-- /.container -->
    
        <!-- end contact form -->
    <div class="clearfix"></div>

     
</body>            
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
