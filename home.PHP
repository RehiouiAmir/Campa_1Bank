<!DOCTYPE HTML>
<html>
<head>
<title>COMPA-BANQUE | Home</title>
<meta charset="utf-8"
<meta name="viewport" content="initial-scale=1.0">
<!-- Méta -->
<meta charset="utf-8">
<meta name="author" content="Réhioui Amir" />
<meta name="description" content="Vous ne savez pas quelle banque choisir ?
                                 Que Choisir vous aide à comparer et trouver la banque la moins chère près de chez vous et adaptée à vos besoins personnels" />

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_diaporama.css">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/aff_masq.js"></script>

</head>
<body >
   
        <div id="menu_horizontal">
                    <ul>
                        <li><a style="margin-right: 180px" href="#qui sommes-nous">Qui sommes-nous</a></li>
                        <li><a href="comparatif.php">Comparatif</a></li>
                        <li><a class="active" href="home.php">Principale</a></li>
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
		$dbname = "PTDW";
			// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
    ?>
    
    <div class="contenu">
            
        <div>
            <div>
            <p>Classer<p>
              <form action="home.php" method="POST">
                        <label for="classification" > > Classer par ordre croissant des tarifs les banques selon :</label>
                               <select id="Modepai" name="field1"  style=" width: 100%;">
                               <option value="nomcomplet">Aucun</option>
                                <option value="g_total">Gestion et tenue de compte(Totale)</option>
                                <option value="o_total">Opération de paiement(Totale)</option>
                                <option value="m_total">Monétique(Totale)</option>
                                <input type="submit" name="Ok"   value="OK" />
              </form>
                              </select>
                              <form action="home.php" method="POST">
                              <label>Gestion et tenue de compte:</label>
                              <select  name="g_f"  style=" width: 100%;">
                                <option value="1">Ouverture de compte et délivrance chéquier</option>
                                <option value="2">Frais de tenue de compte courant</option>
                                <option value="3">Frais de tenue de compte professionnel</option>
                                <option value="4">Frais de tenue de compte chèque</option>
                                <option value="5">Frais de tenue de compte sur livret</option>
                                <option value="6">Tenue de compte en devise</option>
                                <option value="7">Fermeture compte courant</option>
                                <option value="8">Fermeture compte chèque</option>
                                <option value="9">Fermeture compte sur livret</option>
                                <option value="10">Fermeture compte devise</option>                        
                             </select>
                             <input type="submit" name="Ok"   value="OK" />
              </form>
                        <form action="home.php" method="POST">
                             <label>Opération de paiement:</label>
                             <select  name="o_f" style=" width: 100%;">
                                <option value="1">Versement espèces (Client agence)</option>
                                <option value="2">Versement espèces (Tiers)</option>
                                <option value="3">Versement espèces déplacé (Client autre agence)</option>
                                <option value="4">Virement reçu d'un compte de la même agence</option>
                                <option value="5">Virement reçu d'un compte d'une autre agence de la même banque</option>
                                <option value="6">Virement devise reçu de l'étranger</option>
                                <option value="7">Rertait espéces</option>
                                <option value="8">Retrait espéces aux guichets d'une autre agence</option>
                                <option value="9">Emission de chèque de banque</option>
                                <option value="10">Emission Chèque de banque déplacé</option>
                                <option value="11">Annulation de chèque de banque (Client)</option>
                                <option value="12">Virement de compte à compte (même agence)</option>
                                <option value="13">Virement ordonné en faveur client d'une autre agence</option>                              
                            </select>
                            <input type="submit" name="Ok"   value="OK" />
              </form>
              <form action="home.php" method="POST">
                            <label>Monétique:</label>
                            <select  name="m_f"  style=" width: 100%;">
                                <option value="1">Emission de la première carte</option>
                                <option value="2">Renouvelement</option>
                                <option value="3">Reconfection</option>
                                <option value="4">Réédition du code secret</option>
                                <option value="5">Comission de retrait Sur DAB de la banque</option>
                                <option value="6">Comission de retrait Sur DAB confrère</option>
                                <option value="7">Commission de paiement sur TPE/Client</option>
                                <option value="8">Commission de paiement sur TPE/Commerçant</option>
                                <option value="9">Octroi</option>
                                <option value="10">Mise en opposition</option>
                                <option value="11">Re-confection</option>
                                <option value="12">Réédition du code secret</option>                              
                                <option value="13">Changement de code PIN</option>                            
                            </select>          
                              <input type="submit" name="Ok"   value="OK" />
              </form>
              
            </div>
            <div>
                <p>Filtrer</p>
            </div>
            <div>
                <p>Gestion et tenue de compte</p>
                <form action="home.php" method="POST">
                    <select id="Modepai" name="g_field"  style=" width: 100%;">
                        <option value="1">Ouverture de compte et délivrance chéquier</option>
                        <option value="2">Frais de tenue de compte courant</option>
                        <option value="3">Frais de tenue de compte professionnel</option>
                        <option value="4">Frais de tenue de compte chèque</option>
                        <option value="5">Frais de tenue de compte sur livret</option>
                        <option value="6">Tenue de compte en devise</option>
                        <option value="7">Fermeture compte courant</option>
                        <option value="8">Fermeture compte chèque</option>
                        <option value="9">Fermeture compte sur livret</option>
                        <option value="10">Fermeture compte devise</option>                        
                    </select>      
                    <input type="number" name="g_min_v" placeholder="valeur minimal">
                    <input type="number" name="g_max_v" placeholder="Valeur maximal">                    
                    <input type="submit" name="Ok"   value="OK" />
                </form>       
            </div> 
          
            <div>
                <p>Opération de paiement</p>
                <form action="home.php" method="POST">
                    <select id="Modepai" name="o_field"  style=" width: 100%;">
                        <option value="1">Versement espèces (Client agence)</option>
                        <option value="2">Versement espèces (Tiers)</option>
                        <option value="3">Versement espèces déplacé (Client autre agence)</option>
                        <option value="4">Virement reçu d'un compte de la même agence</option>
                        <option value="5">Virement reçu d'un compte d'une autre agence de la même banque</option>
                        <option value="6">Virement devise reçu de l'étranger</option>
                        <option value="7">Rertait espéces</option>
                        <option value="8">Retrait espéces aux guichets d'une autre agence</option>
                        <option value="9">Emission de chèque de banque</option>
                        <option value="10">Emission Chèque de banque déplacé</option>
                        <option value="11">Annulation de chèque de banque (Client)</option>
                        <option value="12">Virement de compte à compte (même agence)</option>
                        <option value="13">Virement ordonné en faveur client d'une autre agence</option>                              
                              
                    </select>      
                    <input type="number" name="o_min_v" placeholder="valeur minimal">
                    <input type="number" name="o_max_v" placeholder="Valeur maximal">                    
                    <input type="submit" name="Ok"   value="OK" />
                </form>         
            </div> 
            <div>
                <p>Monétique</p>
                <form action="home.php" method="POST">
                    <select id="Modepai" name="m_field"  style=" width: 100%;">
                        <option value="1">Emission de la première carte</option>
                        <option value="2">Renouvelement</option>
                        <option value="3">Reconfection</option>
                        <option value="4">Réédition du code secret</option>
                        <option value="5">Comission de retrait Sur DAB de la banque</option>
                        <option value="6">Comission de retrait Sur DAB confrère</option>
                        <option value="7">Commission de paiement sur TPE/Client</option>
                        <option value="8">Commission de paiement sur TPE/Commerçant</option>
                        <option value="9">Octroi</option>
                        <option value="10">Mise en opposition</option>
                        <option value="11">Re-confection</option>
                        <option value="12">Réédition du code secret</option>                              
                        <option value="13">Changement de code PIN</option>                              
                    </select>      
                    <input type="number" name="m_min_v" placeholder="valeur minimal">
                    <input type="number" name="m_max_v" placeholder="Valeur maximal">                    
                    <input type="submit" name="Ok"   value="OK" />
                </form>         
            </div>  
        </div>

        <div class="bankinfo">
                
                    <?php
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }               
                      
                    $sql = "SELECT * FROM banque_data ORDER BY nomcomplet ASC";

                    if(isset($_POST['field1']))  {
                        $classer=$_POST['field1'];
                        $sql = "SELECT * FROM banque_data ORDER BY $classer ASC";
                    }else 
                    if(isset($_POST['o_f']))  {
                        $o_f=$_POST['o_f'];
                        $sql = "SELECT * FROM o_banque where num=$o_f ORDER BY o_frais ASC";
                    }else
                    if(isset($_POST['m_f']))  {
                        $m_f=$_POST['m_f'];
                        $sql = "SELECT * FROM m_banque where num=$m_f ORDER BY m_frais ASC";
                    } else
                    if(isset($_POST['g_f']))  {
                        $g_f=$_POST['g_f'];
                        $sql = "SELECT * FROM g_banque where num=$g_f ORDER BY g_frais ASC";
                    } 
                    else  if(isset($_POST['g_field']) and $_POST['g_min_v'] and $_POST['g_max_v'])  {
                        $g_filtrer=$_POST['g_field'];
                        $g_min_v=$_POST['g_min_v'];
                        $g_max_v=$_POST['g_max_v'];
                        $sql = "SELECT idbanque,nombanque,nomcomplet,adrbanque,telbanque,
                                    faxbanque,logo FROM banque_data1 where num= $g_filtrer and g_frais between '$g_min_v' and '$g_max_v'";
                    }  
                    else  if(isset($_POST['o_field']) and $_POST['o_min_v'] and $_POST['o_max_v'])  {
                        $o_filtrer=$_POST['o_field'];
                        $o_min_v=$_POST['o_min_v'];
                        $o_max_v=$_POST['o_max_v'];
                        $sql = "SELECT idbanque,nombanque,nomcomplet,adrbanque,telbanque,
                                    faxbanque,logo FROM banque_data_o where num= $o_filtrer and o_frais between '$o_min_v' and '$o_max_v'";
                    }   
                    else  if(isset($_POST['m_field']) and $_POST['m_min_v'] and $_POST['m_max_v'])  {
                        $m_filtrer=$_POST['m_field'];
                        $m_min_v=$_POST['m_min_v'];
                        $m_max_v=$_POST['m_max_v'];
                        $sql = "SELECT idbanque,nombanque,nomcomplet,adrbanque,telbanque,
                                    faxbanque,logo FROM banque_data_m where num= $m_filtrer and m_frais between '$m_min_v' and '$m_max_v'";
                    }   
                    else      {
                        $sql = "SELECT * FROM banque_data ORDER BY nomcomplet ASC";
                    }
                    if(empty($classer) OR empty($filtrer) OR empty($min_v) OR empty($max_v)) 
                    { 
                      
                    } 
                
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                    
                                    echo "<div >
                                                <div>
                                                    <img src=".$row["logo"].">                                                
                                                    <h1>".$row["nombanque"]."</h1>
                                                </div>
                                                    <p><span>Nom :</span> ".$row["nomcomplet"]."</p>
                                                    <p><span>Siège Social :</span> ".$row["adrbanque"]."</p>
                                                    <p><span>Télephone :</span> ".$row["telbanque"]."</p>
                                                    <p><span>Fax :</span> ".$row["faxbanque"]."</p>";?>
                                                    
                                                    <button style="background-color: #3399CC;color: white;
                                                    float:left ; margin-left: 10% ; width:20% ; height:100% ;border: none;border-radius: 4px;cursor: pointer"
                                                     onclick="document.getElementById('id01').style.display='block'">Position-map</button>
                                                 
                                                          
                                            <?php
                                                echo "    <p id=\"afficher\"> détails</p>";
                        $sql = "SELECT * FROM gestion where g_banque='".$row["idbanque"]."'";
                        $result1 = mysqli_query($conn, $sql);
                        echo "<div class=\"invisible\">
                                <h2>1- Gestion et tenue de compte</h2>
                                <table>
                                    <thead>
                                        <tr>
                                        <th>GESTION ET TENUE DE COMPTE</th>
                                        <th>COMMISSION / FRAIS HT</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                        echo "
                                                <tr>
                                                    <td>".$row1["GESTION_ET_TENUE_DE_COMPTE"]."</td>
                                                    <td>".$row1["COMMISSION_FRAIS_HT"]."</td>
                                                </tr>";
                                        }
                                        echo "
                                    </tbody>
                                </table>
                            </div>";                                       

                                                
                        $sql = "SELECT * FROM operation where o_banque='".$row["idbanque"]."'";
                        $result1 = mysqli_query($conn, $sql);
                        echo "<div class=\"invisible\">
                                <h2>2- Opération de paiement</h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES</th>
                                            <th>COMMISSION / FRAIS HT</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                        echo "
                                        <tr>
                                            <td>".$row1["OPERATIONS_AU_CREDIT_DU_COMPTE_DINARS_DEVISES"]."</td>
                                            <td>".$row1["COMMISSION_FRAIS_HT"]."</td>
                                        </tr>";
                                        }
                                        echo "
                                    </tbody>
                                </table>
                            </div>";                                      
                            
                        $sql = "SELECT * FROM monetique where m_banque='".$row["idbanque"]."'";
                        $result1 = mysqli_query($conn, $sql);
                        echo "<div class=\"invisible\">
                                <h2>3- Monétique</h2>
                                <table>
                                    <thead>
                                    <tr>
                                        <th>DESIGNATION</th>
                                        <th>COMMISSION / FRAIS</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                        echo "
                                        <tr>
                                            <td>".$row1["DESIGNATION"]."</td>
                                            <td>".$row1["COMMISSION_FRAIS"]."</td>
                                        </tr>";
                                        }
                                        echo "
                                    </tbody>    
                                </table>    
                        </div>";
                echo "<p class=\"invisible\" id=\"masquer\">moins de détails</p>";
                echo "</div>";
                        }
                    } 
                ?>  
        </div>
    </div>
    <div class="w3-container">
           <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
            <div class="w3-container">
           <span onclick="document.getElementById('id01').style.display='none'" class="exit">&times;</span>
           <iframe src="https://www.google.com/maps/d/embed?mid=10lyk3QBzaITe0w6vyV6e85NeoK_vQMyG" width="540" height="420"></iframe>
          </div>
        </div>
        </div></div>                                                 
    <br><br>  
    <hr  />
    <br>
    <div id="menu_horizontal">
            <ul>
                <li><a style="margin-right: 180px" href="#qui sommes-nous">Qui sommes-nous</a></li>
                <li><a href="comparatif.php">Comparatif</a></li>
                <li><a class="active" href="home.php">Principale</a></li>
            </ul>
    </div>
    
</body>
</html>
