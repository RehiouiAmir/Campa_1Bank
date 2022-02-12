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

<link rel="stylesheet" href="../css/style_admin.css">

</head>
<body >
   
        <div id="menu_horizontal">
                    <ul>
                        <li><a style="margin-right: 180px" href="logout.php">Deconnexion</a></li>
                        <li><a class="active" href="admin_banque.php">Admin</a></li>
                        <li><img style="float:left ; margin-left: 10% ; width:20% ; height:100%"   src="../images/logo.jpg" alt="Logo"/></li>
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
     <?php
            if(isset($_POST['a_num']))  {
                    $a_num=$_POST['a_num'];}
                else{$a_num="";}
            if(isset($_POST['a_DESIGNATION']))  {
                    $a_DESIGNATION=$_POST['a_DESIGNATION'];}
                else{$a_DESIGNATION="";}
            if(isset($_POST['a_COMMISSION']))  {
                    $a_COMMISSION=$_POST['a_COMMISSION'];}
                else{$a_COMMISSION="";}
            if(isset($_POST['a_m_frais']))  {
                     $a_g_frais=$_POST['a_m_frais'];}
                else{$a_m_frais="";}
            if(isset($_POST['a_m_banque']))  {
                    $a_m_banque=$_POST['a_m_banque'];}
                else{$a_m_banque="";}
                     
            if(empty($a_num) OR empty($a_DESIGNATION) OR empty($a_COMMISSION) OR empty($a_m_frais) OR empty($a_m_banque)) 
            { 

            } else{
            
            $a_sql = "INSERT INTO monetique (num,DESIGNATION,COMMISSION_FRAIS_HT,m_frais,m_banque)
            VALUES ('$a_num','$a_DESIGNATION','$a_COMMISSION','$a_m_frais','$a_m_banque');";
            $result = mysqli_query($conn, $a_sql);           
                
           }
            
        ?> 
    <div class="contenu">
            
        <div>
            <div>
                <p>Tables<p>
            </div> 
            <div>
                <ul>
                    <li><a href="admin_banque.php">Banque</a></li>
                    <li><a href="admin_gestion.php">Gestion</a></li>
                    <li><a href="admin_operation.php">Operation</a></li>
                    <li><a class="active" href="admin_monetique.php">Monétique</a></li>
                </ul>
            </div>
           
            
        </div>

        <div class="bankinfo">
        <?php
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }               
                            $sql = "SELECT column_name FROM information_schema.columns WHERE table_name ='monetique'  AND table_schema='compa_banque';";
                            $sql1 = "SELECT * FROM monetique ;";
                    
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {

                                    echo "  <div> <form action='admin_monetique.php' method='POST'>
                                                <label style='margin-bottom:-15px'> > Choisissez  une colonne :</label>
                                                <select name='rech'>";
                                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "      <option>".$row["column_name"]."</option>"; }
                                    echo "      </select>
                                                    <input type='text' name='col' placeholder='Votre champ *' required='required' >                                    
                                                    <input type='submit' name='rechercher'   value='Rechercher' />
                                                    </form>     
                                                    ";
                                                } 
                                                ?>
                                                <button onclick="document.getElementById('id01').style.display='block'">Ajouter</button>
                                                <button class="button_1"><a href="admin_gestion.php">Refresh</a></button>
                                                  </div>
                                                <?php 
                            if(isset($_POST['rech']) and isset($_POST['col']))  {
                                $rech=$_POST['rech'];
                                $col=$_POST['col']; 
                                $where_rech= "where $rech LIKE '%$col%';";                               
                                $sql1 = "SELECT * FROM monetique $where_rech";                        
                            } 
                            else{
                            $sql1 = "SELECT * FROM monetique ;"; 
                            } 
                            if(empty($rech) OR empty($col)) 
                            { 
    
                            } 
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                   
                        echo "<div class=\"invisible\">
                        <h2> Table: monetique </h2>
                            <table>
                            <thead>
                                <tr>
                                <th>idmonetique</th>
                                <th>Numéro</th>
                                <th>DESIGNATION</th>
                                <th>COMMISSION/FRAIS</th>
                                <th>m_frais</th>
                                <th>m_banque</th>
                                <th>BANQUE</th>
                                <th></th>                                    
                                <th></th>
                                <th></th> 
                                </tr>
                            </thead>
                            <tbody>";
                    do{      $sql2 = "SELECT nombanque FROM banque where idbanque='$row1[m_banque]' ;";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            echo "
                            <tr>
                                <td>".$row1["idmonetique"]."</td>
                                <td>".$row1["num"]."</td>
                                <td>".$row1["DESIGNATION"]."</td>
                                <td>".$row1["COMMISSION_FRAIS"]."</td>
                                <td>".$row1["m_frais"]."</td>
                                <td>".$row1["m_banque"]."</td> 
                                <td>".$row2["nombanque"]."</td>               
                                <form action='monetique/monetique_modi.php' method='POST'>
                                <input type='hidden' name='sup' value=".$row1["idmonetique"].">";?>
                                <td><button class='button_m' type="sumbit">Modifier</button></td>
                                </form>
                                <?php
                                       echo" <form action='gestion/gestion_sup.php' method='POST'>
                                        <input type='hidden' name='sup' value=".$row1["idmonetique"].">"; ?>
                                        <td><button class='button_s' type="sumbit">Supprimer</button></td>
                                </form>
              <?php    
                        echo "
                        </tr> 
                       ";
                                }while($row1 = mysqli_fetch_assoc($result1) or $row2 = mysqli_fetch_assoc($result2));
                            echo "
                            </tbody>
                        </table>
                    </div>";  
                   
                                                   
                ?>
                
                <div class="w3-container">
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'" class="exit">&times;</span>
                    <form action="admin_monetique.php" method="POST" class="ajouter">
                    <label >Numéro_prestation</label>
                    <input style="width:100%;" type="number"  name="a_num" placeholder="Numéro_prestation.." required='required'>
                    <label >DESIGNATION</label>
                    <input type="text"  name="a_DESIGNATION" placeholder="Frais de.." required='required'>
                    <label >COMMISSION / FRAIS HT</label>
                    <input type="text"  name="a_COMMISSION" placeholder="..DA/AN" required='required'>
                    <label >frais_numérique</label>
                    <input style="width:100%;" type="number"  name="a_m_frais" placeholder="Chifre.." required='required'>
                    <label >id_banque</label>
                    <input style="width:100%;" type="number"  name="a_m_banque" placeholder=".." required='required'>
                    <input type="submit" name='ajouter' value="Ajouter">
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
    <div id="menu_horizontal">
	<ul>
    <li><a style="margin-right: 180px" href="logout.php">Deconnexion</a></li>
    <li><a class="active" href="admin.php">Admin</a></li>
	</ul>
</div>
    
    
</body>
</html>
