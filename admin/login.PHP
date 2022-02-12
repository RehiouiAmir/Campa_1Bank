<?php  
session_start();  
	$host = "localhost";  
	$username = "root";  
	$password = "";  
	$database = "PTDW";  
	$message = "";  
try  
{  
	 $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
	 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
	 if(isset($_POST["login"]))  
	 {  
		  if(empty($_POST["username"]) || empty($_POST["password"]))  
		  {  
			   $message = '<label>All fields are required</label>';  
		  }  
		  else  
		  {  
			   $query = "SELECT * FROM users WHERE username = :username AND password = sha1(:password)";  
			   $statement = $connect->prepare($query);  
			   $statement->execute(  
					array(  
						 'username'     =>     $_POST["username"],  
						 'password'     =>     $_POST["password"]  
					)  
			   );  
			   $count = $statement->rowCount();  
			   if($count > 0)  
			   {  
					$_SESSION["username"] = $_POST["username"];  
					header("location:admin_banque.php");  
			   }  
			   else  
			   {  
					$message = '<label>Wrong Data</label>';  
			   }  
		  }  
	 }  
}  
catch(PDOException $error)  
{  
	 $message = $error->getMessage();  
}  
?>  
<!DOCTYPE HTML>
<html>
<head>
<title>COMPA-BANQUE | Home</title>
<meta charset="utf-8">
<!-- Méta -->
<meta charset="utf-8">
<meta name="author" content="Réhioui Amir" />
<meta name="description" content="Vous ne savez pas quelle banque choisir ?
                                 Que Choisir vous aide à comparer et trouver la banque la moins chère près de chez vous et adaptée à vos besoins personnels" />

<link rel="stylesheet" href="../css/style_login.css">


</head>
<body >
   
        <div id="menu_horizontal">
                    <ul>
                        <li><img style="float:left ; margin-left: 10% ; width:20% ; height:100%"   src="../images/logo.jpg" alt="Logo"/></li>
                    </ul>
        </div>
   
        <div class="contenu">
	   
	   <div class="login-page">
							<div class="form">
								<?php  
									if(isset($message))  
									{  
									echo '<label class="text-danger">'.$message.'</label>';  
									}  
									?>  
									<form class="login-form" method="post"  >
											<input type="text" placeholder="Nom d'utilisateur" name="username" required autofocus/>
											<input type="password" placeholder="Mot de passe" name="password" required/>
											<button name="login" type="submit" value="Login" >login</button>
									</form>
								</div>
						</div>
        </div>

    
</body>
</html>
