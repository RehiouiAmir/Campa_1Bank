<!DOCTYPE HTML>
<html>
<head>
<title>COMPA-BANQUE|Comparatif</title>
<meta charset="utf-8">
<!-- Méta -->
<meta charset="utf-8">
<meta name="author" content="Réhioui Amir" />
<meta name="description" content="Vous ne savez pas quelle banque choisir ?
                                 Que Choisir vous aide à comparer et trouver la banque la moins chère près de chez vous et adaptée à vos besoins personnels" />

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_diaporama.css">


</head>
<body >
   
        <div id="menu_horizontal">
                    <ul>
                        <li><a style="margin-right: 180px" href="#qui sommes-nous">Qui sommes-nous</a></li>
                        <li><a class="active" href="comparatif.php">Comparatif</a></li>
                        <li><a  href="home.php">Principale</a></li>
                        <li><img style="float:left ; margin-left: 10% ; width:20% ; height:100%"   src="images/logo.jpg" alt="Logo"/></li>
                    </ul>
                </div>
        <div id="slideshow">
        <ul id="sContent"><!--
            --><li><img src="images/ph1.jpg" alt="Image 1"  /></li><!--
            --><li><img src="images/ph2.jpg" alt="Image 2"  /></li><!--
            --><li><img src="images/ph3.jpg" alt="Image 3"  /></li><!--
            --><li><img src="images/ph4.jpg" alt="Image 4"  /></li>
            <li><img src="images/ph1.jpg" alt="Image 1"  /></li>
        </ul>
    </div>
    
    <?php
   		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ptdw";
			// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
    ?>
    
    <div class="contenu">
            
        <div>
        <div>
            <p>Comparateur<p>
              <form action="comparatif.php" method="POST">
                        <label> > Séléctionnez la 1er banque:</label>
                               <select id="Modepai" name="banque1">
                               <option value="nomcomplet">Aucun</option>
                                <option value="1">----------------------« BEA »-----------------------</option>
                                <option value="2">----------------------« BNA »----------------------</option>
                                <option value="3">----------------------« BADR »---------------------</option>
                                <option value="4">----------------------« BDL »----------------------</option>
                              </select>  
                        <label> > Séléctionnez la 2eme banque:</label>
                              <select id="Modepai" name="banque2">
                              <option value="nomcomplet">Aucun</option>
                              <option value="1">----------------------« BEA »----------------------</option>
                              <option value="2">----------------------« BNA »----------------------</option>
                              <option value="3">----------------------« BADR »---------------------</option>
                              <option value="4">----------------------« BDL »----------------------</option>
                              </select>          
                              <input type="submit" name="Comparer"   value="Comparer" />
              </form>
            </div>
        </div> 
        
        <div class="bankinfo">
                <h1>Comparateur banques - Comparez les tarifs bancaires</h1>
                    <?php
                 if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }               
          
        if(isset($_POST['banque1']))  {
            $banque1=$_POST['banque1'];
        }else{
            $banque1='0';  
        }
        if(isset($_POST['banque2']))  {
            $banque2=$_POST['banque2'];
        }else{
            $banque2='0';  
        }
        if(empty($banque1) or empty($banque2)) 
        { 
          
        } 
           
            $sql1 = "SELECT * FROM g_banque where g_banque=$banque1 ORDER BY num ASC";
            $sql2 = "SELECT * FROM g_banque where g_banque=$banque2 ORDER BY num ASC";            
            $result1 = mysqli_query($conn, $sql1);
            $result2 = mysqli_query($conn, $sql2);
            $row1 = mysqli_fetch_assoc($result1);
            $row2 = mysqli_fetch_assoc($result2);
            echo "<div class=\"invisible\">
                    <h2>1- Gestion et tenue de compte</h2>
                    <table>
                        <thead>
                            <tr>
                            <th>GESTION ET TENUE DE COMPTE</th>
                            <th>".$row1["nombanque"]."</th>
                            <th>".$row2["nombanque"]."</th>
                        </tr>
                        </thead>
                        <tbody>";
                             do{
                                $r1="";
                                $r2="";
                                if ($row1["g_frais"]<$row2["g_frais"]){
                                    $r1= "id='green'";
                                    $r2= "id='roug'";
                                } else if($row1["g_frais"]>$row2["g_frais"]) {
                                    $r1="id='roug'";
                                    $r2="id='green'"; 
                                }else{
                                    $r1="";
                                    $r2=""; 
                                }                        
                                echo "
                                    <tr>
                                        <td>".$row1["GESTION_ET_TENUE_DE_COMPTE"]."</td>
                                        <td $r1>".$row1["COMMISSION_FRAIS_HT"]."</td>
                                        <td $r2>".$row2["COMMISSION_FRAIS_HT"]."</td>                                        
                                    </tr>";
                            }while($row1 = mysqli_fetch_assoc($result1) and $row2 = mysqli_fetch_assoc($result2));
                            echo "
                        </tbody>
                    </table>
                </div>";                                       

                                    
                $sql1 = "SELECT * FROM o_banque where o_banque=$banque1 ORDER BY num ASC" ;
                $sql2 = "SELECT * FROM o_banque where o_banque=$banque2 ORDER BY num ASC";            
                $result1 = mysqli_query($conn, $sql1);
                $result2 = mysqli_query($conn, $sql2);
                $row1 = mysqli_fetch_assoc($result1);
                $row2 = mysqli_fetch_assoc($result2);
            echo "<div class=\"invisible\">
                    <h2>2- Opération de paiement</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES</th>
                                <th>".$row1["nombanque"]."</th>
                                <th>".$row2["nombanque"]."</th>
                            </tr>
                        </thead>
                        <tbody>";
                            do{
                                $r1="";
                                $r2="";
                                if ($row1["o_frais"]<$row2["o_frais"]){
                                    $r1= "id='green'";
                                    $r2= "id='roug'";
                                } else if($row1["o_frais"]>$row2["o_frais"]) {
                                    $r1="id='roug'";
                                    $r2="id='green'"; 
                                }else{
                                    $r1="";
                                    $r2=""; 
                                }   
                            echo "
                            <tr>
                                <td>".$row1["OPERATIONS_AU_CREDIT_DU_COMPTE_DINARS_DEVISES"]."</td>
                                <td $r1>".$row1["COMMISSION_FRAIS_HT"]."</td>
                                <td $r2>".$row2["COMMISSION_FRAIS_HT"]."</td>                                
                            </tr>";
                            } while($row1 = mysqli_fetch_assoc($result1) and $row2 = mysqli_fetch_assoc($result2));
                            echo "
                        </tbody>
                    </table>
                </div>";                                      
                
                $sql1 = "SELECT * FROM m_banque where m_banque=$banque1 ORDER BY num ASC";
                $sql2 = "SELECT * FROM m_banque where m_banque=$banque2 ORDER BY num ASC";            
                $result1 = mysqli_query($conn, $sql1);
                $result2 = mysqli_query($conn, $sql2);
                $row1 = mysqli_fetch_assoc($result1);
                $row2 = mysqli_fetch_assoc($result2);
            echo "<div class=\"invisible\">
                    <h2>3- Monétique</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>DESIGNATION</th>
                            <th>".$row1["nombanque"]."</th>
                            <th>".$row2["nombanque"]."</th>
                        </tr>
                        </thead>
                        <tbody>";
                            do{
                                $r1="";
                                $r2="";
                                if ($row1["m_frais"]<$row2["m_frais"]){
                                    $r1= "id='green'";
                                    $r2= "id='roug'";
                                } else if($row1["m_frais"]>$row2["m_frais"]) {
                                    $r1="id='roug'";
                                    $r2="id='green'"; 
                                }else{
                                    $r1="";
                                    $r2=""; 
                                }   
                            echo "
                            <tr>
                                <td>".$row1["DESIGNATION"]."</td>
                                <td $r1>".$row1["COMMISSION_FRAIS"]."</td>
                                <td $r2>".$row2["COMMISSION_FRAIS"]."</td> 
                            </tr>";
                            }while($row1 = mysqli_fetch_assoc($result1) and $row2 = mysqli_fetch_assoc($result2)) ;
                            echo "
                        </tbody>    
                    </table>    
            </div>";
        
        
                ?>  
        </div>
    </div>

    <br><br>  
    <hr  />
    <br>
    <div id="menu_horizontal">
            <ul>
                <li><a style="margin-right: 180px" href="#qui sommes-nous">Qui sommes-nous</a></li>
                <li><a class="active" href="comparatif.php">Comparatif</a></li>
                <li><a  href="home.php">Principale</a></li>
            </ul>
    </div>
    
</body>
</html>
