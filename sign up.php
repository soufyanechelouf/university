<?php  
       session_start();
       $pageTitle = "ESI Signing up";
       include "init.php";
?>
  <body>
   <section class="signup">        
         <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center">ESI student ? sign up now !</h2>
              </div></br>
                
                <div id="marge">
                  <form action="../includes/process/register.php" method="post" class="form1" >

                        <div class="field-wrap">
                          <label>
                            First Name<span class="req">*</span>
                          </label>
                          <input type="text" required autocomplete="off" name='firstname' />
                        </div>

                        <div class="field-wrap">
                          <label>
                            Last Name<span class="req">*</span>
                          </label>
                          <input type="text"required autocomplete="off" name='lastname' />
                        </div>
                      <div class="field-wrap">
                        <label>
                          Email Address<span class="req">*</span>
                        </label>
                        <input type="email"required autocomplete="off" name='email' />
                      </div>

                      <div class="field-wrap">
                        <label>
                          Set A Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name='password'/>
                      </div>
                      <button type="submit" class="button button-block" name="register" />
                          Register</button>
                  </form>
                </div>
            </div>       
        </div>  
    </section>  
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
