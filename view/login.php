<?php if(!empty($db->userdata("id"))){ $sys->redirect($sys->base_url()."/Dashboard"); }?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <title>login-page</title>
        <link href="<?php echo $sys->base_url() ?>/bootstrap/css/style_login.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="icon" href="images/ico.jpg" type="image/x-icon">
        <link rel="shortcut icon" href="img/ico.jpg" type="image/x-icon" />
		<style type="text/css">
            *{
                box-sizing: border-box;
            }      
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <br/>
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method="POST" id="formLogin"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" > Email</label>
                                    <input id="username" name="email" required="required" type="text" placeholder="mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. abcdefghi" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="hidden" name="formaction" value="login">
                                    <input type="submit" name="action" value="Login" /> 
								</p>
                                <p class="change_link">
									Belum menjadi member ?
									<a href="#toregister" class="to_register">Daftarkan diri</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  method="POST" id="formRegister"> 
                                <h1> Pendaftaran Diri </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Email</label>
                                    <input id="usernamesignup" name="add_email" required="required" type="text" placeholder="myusername" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Password </label>
                                    <input id="passwordsignup" name="add_password" required="required" type="password" placeholder="eg. abcdefghi"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" >Tulis Kembali Password </label>
                                    <input id="passwordsignup_confirm" name="add_password_confirm" required="required" type="password" placeholder="eg. abcdefghi"/>
                                </p>
                                <p class="signin button"> 
                                    <input type="hidden" name="formaction" value="register">
									<input type="submit" name="action" value="Daftar"/> 
								</p>
                                <p class="change_link">  
									Sudah memiliki akun ?
									<a href="#tologin" class="to_register"> Log in </a>
								</p>
                                
                            </form>

                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
        <div id="alert" style="position: fixed; z-index: 9999 !important; top: 10%; width: 100%; box-sizing: border-box; text-align: center;"></div>
        <script type="text/javascript" src="<?php echo $sys->base_url() ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script type="text/javascript">
            <?php echo $helper->jquery_ajaxform("formRegister", $sys->base_url()."/action/login", "alert") ?>
            <?php echo $helper->jquery_ajaxform("formLogin", $sys->base_url()."/action/login", "alert") ?>
        </script>
    </body>
</html>