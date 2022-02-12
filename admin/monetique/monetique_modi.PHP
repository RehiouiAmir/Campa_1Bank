<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
     
 }  
 else  
 {  
      header("location:login.php");  
 }  
 ?>  
<!DOCTYPE HTML>
<html>
<head>
<title>COMPA-BANQUE|Admin</title>
<meta charset="utf-8">
<!-- Méta -->
<meta charset="utf-8">
<meta name="author" content="Réhioui Amir" />
<meta name="description" content="Vous ne savez pas quelle banque choisir ?
                                 Que Choisir vous aide à comparer et trouver la banque la moins chère près de chez vous et adaptée à vos besoins personnels" />

<link rel="stylesheet" href="../../css/style_admin.css">
<link rel="stylesheet" href="css/style_modi.css">


</head>
<body >
   
        <div id="menu_horizontal">
                    <ul>
                        <li><a style="margin-right: 180px" href="../logout.php">Deconnexion</a></li>
                        <li><a class="active" href="../admin_gestion.php">Admin</a></li>
                        <li><img style="float:left ; margin-left: 10% ; width:20% ; height:100%"   src="../../images/logo.jpg" alt="Logo"/></li>
                    </ul>
                </div>
       
    
    <?php
   		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "PTDW";
			// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
    ?>
    
    <div class="contenu">
            
        <div>
            <div>
                <p>Tables<p>
            </div> 
            <div>
                <ul>
                    <li><a href="../admin_banque.php">Banque</a></li>
                    <li><a class="active" href="../admin_gestion.php">Gestion</a></li>
                    <li><a href="../admin_operation.php">Operation</a></li>
                    <li><a href="../admin_monetique.php">Monétique</a></li>
                </ul>
            </div>
           
            
        </div>

        <div class="bankinfo">

        <h3>Modifier</h3>

        <?php
   		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "compa_banque";
			// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
    
    
   
            
            if(isset($_POST['sup']))  {
                $modi=$_POST['sup'];
                                       
            } 
            if(empty($modi)) 
            { 
    
            } 
            $sql = "SELECT * FROM gestion where idgestion=$modi ; ";
            $result = mysqli_query($conn, $sql);
            $row= mysqli_fetch_assoc($result);            
           echo" 
        <div class='container'>
                <form action='../admin_gestion.php' method='POST' class='ajouter'>
                <label >Numéro_préstation </label>
                <input type='number'  name='m_num' value='".$row['num']."' required='required'>
                <input type='hidden'  name='m_idgestion' value='".$row['idgestion']."' required='required'>
                <label >GESTION_ET_TENUE_DE_COMPTE</label>
                <input type='text'  name='m_GESTION' value='".$row['GESTION_ET_TENUE_DE_COMPTE']."' required='required'>
                <label >COMMISSION_FRAIS_HT</label>
                <input type='text'  name='m_COMMISSION' value='".$row['COMMISSION_FRAIS_HT']."' required='required'>
                <label >Frais_numérique </label>
                <input type='number'  name='m_g_frais' value='".$row['g_frais']."' required='required'>
                <label >Code_banque</label>
                <input type='number'  name='m_g_banque'value='".$row['g_banque']."' >
                <input type='submit' name='ajouter' value='Modifier'>
                <button style='background-color: #3399CC;color: white;padding: 6px 30px;border: none;border-radius: 4px;cursor: pointer;'><a href='../admin_gestion.php'></a>Annuler</button>
        </form>
    </div>";
    ?> 
    </div>
</div>
    <div id="menu_horizontal">
	<ul>
    <li><a style="margin-right: 180px" href="../logout.php">Deconnexion</a></li>
    <li><a class="active" href="../admin_gestion.php">Admin</a></li>
	</ul>
</div>
    
    
</body>
</html>
