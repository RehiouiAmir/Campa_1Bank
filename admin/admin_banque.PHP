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
            if(isset($_POST['a_nombanque']))  {
                    $a_nombanque=$_POST['a_nombanque'];}
                else{$a_nombanque="";}
            if(isset($_POST['a_nomcomplet']))  {
                    $a_nomcomplet=$_POST['a_nomcomplet'];}
                else{$a_nomcomplet="";}
            if(isset($_POST['a_adrbanque']))  {
                    $a_adrbanque=$_POST['a_adrbanque'];}
                else{$a_adrbanque="";}
            if(isset($_POST['a_telbanque']))  {
                     $a_telbanque=$_POST['a_telbanque'];}
                else{$a_telbanque="";}
            if(isset($_POST['a_faxbanque']))  {
                    $a_faxbanque=$_POST['a_faxbanque'];}
                else{$a_faxbanque="";}
            if(isset($_POST['a_logo']))  {
                    $a_logo=$_POST['a_logo'];}
                else{$a_logo="";}            
                           
            if(empty($a_nombanque) OR empty($a_nomcomplet) OR empty($a_adrbanque) OR empty($a_telbanque) OR empty($a_faxbanque) OR empty($a_logo)) 
            { 

            } else{
            
            $a_sql = "INSERT INTO banque (nombanque,nomcomplet,adrbanque,telbanque,faxbanque,logo)
            VALUES ('$a_nombanque','$a_nomcomplet','$a_adrbanque','$a_telbanque','$a_faxbanque','$a_logo');";
            $result = mysqli_query($conn, $a_sql);           
              }             
        ?> 
       <?php
            if(isset($_POST['m_idbanque']))  {
                    $m_idbanque=$_POST['m_idbanque'];}
                else{$m_idbanque="";}
            if(isset($_POST['m_nombanque']))  {
                    $m_nombanque=$_POST['m_nombanque'];}
                else{$m_nombanque="";}
            if(isset($_POST['m_nomcomplet']))  {
                    $m_nomcomplet=$_POST['m_nomcomplet'];}
                else{$m_nomcomplet="";}
            if(isset($_POST['m_adrbanque']))  {
                    $m_adrbanque=$_POST['m_adrbanque'];}
                else{$m_adrbanque="";}
            if(isset($_POST['m_telbanque']))  {
                     $m_telbanque=$_POST['m_telbanque'];}
                else{$m_telbanque="";}
            if(isset($_POST['m_faxbanque']))  {
                    $m_faxbanque=$_POST['m_faxbanque'];}
                else{$m_faxbanque="";}
            if(isset($_POST['m_logo']))  {
                    $m_logo=$_POST['m_logo'];}
                else{$m_logo="";}            
                           
            if(empty($m_idbanque) OR empty($m_nombanque) OR empty($m_nomcomplet) OR empty($m_adrbanque) OR empty($m_telbanque) OR empty($m_faxbanque) OR empty($m_logo)) 
            { 

            } else{
            
            $a_sql = "UPDATE banque SET  nombanque='$m_nombanque',nomcomplet='$m_nomcomplet',adrbanque='$m_adrbanque',telbanque='$m_telbanque',faxbanque='$m_faxbanque',
                          logo='$m_logo' where idbanque='$m_idbanque';";
            $result = mysqli_query($conn, $a_sql);           
              }             
        ?> 

<?php       $sup='0';     
            if(isset($_POST['sup']))  {
                $sup=$_POST['sup'];
                                       
            } 
            if(empty($sup)) 
            { 
    
            } 

            $s_sql = "DELETE FROM banque where idbanque=$sup ; "; 
            $result = mysqli_query($conn, $s_sql);           
            
?>    
    
    <div class="contenu">
            
        <div>
            <div>
                <p>Tables<p>
            </div> 
            <div>
                <ul>
                    <li><a class="active" href="admin_banque.php">Banque</a></li>
                    <li><a href="admin_gestion.php">Gestion</a></li>
                    <li><a href="admin_operation.php">Operation</a></li>
                    <li><a href="admin_monetique.php">Monétique</a></li>
                </ul>
            </div>
           
            
        </div>

        <div class="bankinfo">
        
        
        
        <?php
         
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }               
                            $sql = "SELECT column_name FROM information_schema.columns WHERE table_name ='banque'  AND table_schema='compa_banque';";
                            $sql1 = "SELECT * FROM banque ;";
                    
                    
                  
                        $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = 'banque' AND table_schema='compa_banque';";
                        $sql1 = "SELECT * FROM banque ;";                        
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {

                                    echo "  <div> <form action='admin_banque.php' method='POST'>
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
              <button class="button_1"><a href="admin_banque.php">Refresh</a></button>
                </div>
              <?php       
                            if(isset($_POST['rech']) and isset($_POST['col']))  {
                                $rech=$_POST['rech'];
                                $col=$_POST['col']; 
                                $where_rech= "where $rech LIKE '%$col%';";                               
                                $sql1 = "SELECT * FROM banque $where_rech";                        
                            } 
                            else{
                            $sql1 = "SELECT * FROM banque ;"; 
                            } 
                            if(empty($rech) OR empty($col)) 
                            { 
    
                            } 
                            
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                        echo "<div class=\"invisible\">
                        <h2> Table: banque </h2>
                            <table>
                            <thead>
                                <tr>                                                                                                     
                                    <th>idbanque</th>                                
                                    <th>nombanque</th>
                                    <th>nomcomplet</th>
                                    <th>adrbanque</th>
                                    <th>telbanque</th>
                                    <th>faxbanque</th>
                                    <th>logo</th>
                                    <th></th>                                    
                                    <th></th>
                                    <th></th>                                      
                                    </tr>
                            </thead>
                            <tbody>";
                    do{
                            echo "
                                
                                <tr>  
                                    <td >".$row1["idbanque"]."</td>
                                    <td >".$row1["nombanque"]."</td>
                                    <td>".$row1["nomcomplet"]."</td>
                                    <td>".$row1["adrbanque"]."</td>
                                    <td>".$row1["telbanque"]."</td>
                                    <td>".$row1["faxbanque"]."</td>
                                    <td>".$row1["logo"]."</td>
                                    <td style='background-color:#f2f2f2 '></td>
                                    <form action='banque/banque_modi.php' method='POST'>
                                    <input type='hidden' name='sup' value=".$row1["idbanque"].">";?>
                                    <td><button class='button_m' type="sumbit">Modifier</button></td>
                                    </form>
                                    <?php
                                           echo" <form action='banque/banque_sup.php' method='POST'>
                                            <input type='hidden' name='sup' value=".$row1["idbanque"].">"; ?>
                                            <td><button class='button_s' type="sumbit">Supprimer</button></td>
                                    </form>
                  <?php    
                            echo "
                            </tr> 
                           ";             
                           
                        
                                }while($row1 = mysqli_fetch_assoc($result1));
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
                    <form action="admin_banque.php" method="POST" class="ajouter">
                    <label >Nom_Banque</label>
                    <input type="text"  name="a_nombanque" placeholder="Nom banque.." required='required'>
                    <label >Nom_Banque_Complet</label>
                    <input type="text"  name="a_nomcomplet" placeholder="Nom banque complet.." required='required'>
                    <label >Siège_Social </label>
                    <input type="text"  name="a_adrbanque" placeholder="Siège social.." required='required'>
                    <label >Téléphone</label>
                    <input type="text"  name="a_telbanque" placeholder="021..">
                    <label >Fax</label>
                    <input type="text"  name="a_faxbanque" placeholder="021..">
                    <label >Logo</label>
                    <input type="text"  name="a_logo" placeholder="images/..">
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
