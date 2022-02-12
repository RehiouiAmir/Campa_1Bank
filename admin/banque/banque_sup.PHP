
<!DOCTYPE HTML>
<html>
<head>
<title>COMPA-BANQUE|Admin</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style_sup.css">
<link rel="stylesheet" href="css/style_sup_2.css">

</head>
<body>
<?php
   		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "PTDW";
			// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
?>  
<div id="menu_horizontal">
                    <ul>
                        <li><img style="float:left ; margin-left: 10% ; width:20% ; height:100%"   src="../../images/logo.jpg" alt="Logo"/></li>
                    </ul>
        </div>
   
        <div class="contenu">
	   
	   <div class="login-page">
							<div class="form">
								
				<form class="login-form" action="../admin_banque.php" method="post"  >
					<label>Voulez-vous vraiment supprimer cette banque?<label>
                <?php                                                           
                            if(isset($_POST['sup']))  {
                                $sup=$_POST['sup'];
                                                    
                            } 
                            if(empty($sup)) 
                            { 
                    
                            }  
                            $sql = "SELECT * FROM banque where idbanque=$sup ; ";
                            $result = mysqli_query($conn, $sql);
                            $row= mysqli_fetch_assoc($result);    
                            echo"<input type='hidden' value='".$row['idbanque']."' name='sup'>";
                            ?>
					<button name="login" type="submit" value="OUI" >OUI</button>
                </form>
                <button style="  background-color: #3399CC;color: white;padding: 6px 40px;border: none;border-radius: 4px;cursor: pointer;" >
                <a href="../admin_banque.php">Annuler</a></button>
			</div>
		</div>
 </div>
 
 </body> 
 </html>
