<?php 
 ob_start();
// Main page with two forms: sign up and log in *
session_start();
$pageTitle = "Registration";
       include "init.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in
        require 'process/login.php';
    }
    elseif (isset($_POST['register'])) { //user registering   
        require 'process/register.php';
    }
}
?>
<body>  
<section class="signing">        
    <div class="container">
      <div class="row">
                     <div class="col-xs-12 heading">
                            <h2 class="h1 text-center">Bienvenue a la plateforme d'inscription </h2>
                    </div>
              <div class="form">
                          <ul class="tab-group">
                            <li class="tab"><a href="#signup">Inscription</a></li>
                            <li class="tab active"><a href="#login">Connexion</a></li>
                          </ul>
                     <div class="tab-content">
                        <div id="login">  
                                      <h1> Déja inscrit ? connexion</h1>
                                      <form action="registration.php" method="post" autocomplete="off" id="myform">

                                        <div class="field-wrap">
                                        <label>
                                           Address Email<span class="req">*</span>
                                        </label>
                                        <input type="email" required autocomplete="off" name="email"/>
                                      </div>

                                      <div class="field-wrap">
                                        <label>
                                          Mot pass<span class="req">*</span>
                                        </label>
                                        <input type="password" required autocomplete="off" name="password"/>
                                      </div>

                                      <p class="forgot"><a href="forgot.php">Mot de passe oublié?</a></p>

                                      <button class="button button-block" name="login" /><i class="fa fa-sign-in"></i> Connexion</button>

                                      </form>

                        </div>
                       <div id="signup">  
                                      <h1>Vous n'êtes pas un membre ? , inscrivez vous  !</h1>
                          <form action="registration.php" method="post" autocomplete="off">
                                    <div class="top-row">
                                        <div class="field-wrap">
                                          <label>
                                            Nom<span class="req">*</span>
                                          </label>
                                           <input type="text"  required  name='firstname' />		
                                            </div>
                                        <div class="field-wrap">
                                          <label>
                                            Prénom<span class="req">*</span>
                                          </label>
                                          <input type="text"required  name='lastname' />
                                     
                                        </div>
                                      </div>

                                      <div class="field-wrap">
                                        <label>
                                           Address Email<span class="req">*</span>
                                        </label>                                                         <input type="email" required name='email'/>

                              </div>
                                      <div class="field-wrap">
                                        <label>
                                          Tapez un mot de pass<span class="req">*</span>
                                        </label>
                                  <input type="password" required name='password'/>
                                        </div>
                              <div class="field-wrap">
                                   <select name="status" class="form-control choose">  
                                    <option value="0">vous êtes?</option> 
                                    <option value="1" data-class=".teacher">Enseignant</option>
                                    <option value="2" data-class=".student">Etudiant</option>          
                                </select> 
                               </div> 
                   <div class="form-group form-group-lg student" style="display: none">
                              <div class="field-wrap">       
                                  <select method="post">
									                  <option>Niveau</option>
                                     <?php
                                       $stmt = $con->prepare("SELECT * FROM classes");
                                       $stmt->execute();
                                       $classes = $stmt->fetchAll();
                                       foreach ($classes as $classe) {
                                           echo "<option value='". $classe['ClasseId'] ."'>". $classe['Name'] ."</option>";
                                       }
                                    ?>    
                                </select>
                            </div>
                            <div class="field-wrap">
                                   <input type="hidden" name="grade">
                                     </div> 
                    </div>
                              <!-- Start Grade Field -->
                            <div class="form-group form-group-lg teacher" style="display: none;">
                              <div class="top-row">
                              <div class="field-wrap">
                                  
                                      <select method="post">
									<option value="0">Vous êtes un prof de :</option>
										 
                                    <?php
                                       $stmt = $con->prepare("SELECT * FROM classes");
                                       $stmt->execute();
                                       $classes = $stmt->fetchAll();
                                       foreach ($classes as $classe) {
                                           echo "<option value='". $classe['ClasseId'] ."'>". $classe['Name'] ."</option>";
                                       }
                                    ?>    
                                </select>       
                                
                                  </div>
                                      <div class="field-wrap">
                                <label>Grade<span class="req">*</span></label>
                                        
                                            <input 
                                                type="text"
                                                name="grade"
                                             >
                                        </div>                                       
                                  </div>   
                                  </div>
                                      <button type="submit" class="button button-block" name="register" /><i class="fa fa-sign-in"></i> S'Inscrir</button>
                         
                </div>
         </div>
               </form>
</div>
</div>
</div>
    </section>
	<script>
		</script>
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
     
 ?>  