<?php 
    $page_title='Nous contacter | soutien et accompagnement scolaire';
    include('includes/header.php'); 
?>       
        <!-- Works -->
        <section class="title-section">
            <div class="container">
                <!-- crumbs --> 
                <div class="row crumbs">
                        <center>
                        	<h2>Demande de documentation</h2>
                        </center>
                </div>
                <!-- End crumbs -->               
            </div>
        </section> 
        <section class="paddings">
            <div class="container">
	       <div class="row">   
            		<p style="text-align: justify;">Vous souhaitez recevoir la documentation sur nos prestations. Complétez ce formulaire, nos conseillers pédagogiques vous l’adresseront dans les plus brefs délais par email.</p> 
            		<h3>Pourquoi choisir <span style = "color : #88C425">NEWERA TUTORING?</span> </h3> 
   
            	</div> 
                <div class="row">
	                <div class="col-sm-6">
		                <ul>
	                         	<li><i class="fa fa-check-square-o" aria-hidden="true"></i> Des tuteurs sélectionnés au terme d'un processus innovant, objectif et rigoureux</li>
		                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> 1er cours et rencontre avec l’enseignant sans engagement</li>
		                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Une évaluation des connaissances pour détecter les points forts et faibles</li>
		                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Une bibliothèque virtuelle avec plus de 100 000 exercices, 10 000 résumés de cours, 1000 vidéos</li>
	                        </ul>                 
	                </div>  
	                <div class="col-sm-6">
		                <ul>
		                	<li><i class="fa fa-check-square-o" aria-hidden="true"></i> Une plateforme digitale d'échange avec les tuteurs et les conseillers pédagogiques</li>
		                        <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Une offre complète de cours particuliers et cours collectifs</li>
	                         	<li><i class="fa fa-check-square-o" aria-hidden="true"></i> Un réseau mondial de mentors pour aider nos élèves à réaliser leurs rêves</li>
	                         	<li><i class="fa fa-check-square-o" aria-hidden="true"></i> Des séminaires gratuits d'orientation académique</li>
	                        </ul>                                 
	                </div>                                                                    
                </div>
             </div>
        </section>
        <section>
             <div class="container">
                <div class="jumbotron justify" id="box-wrapper-2">                           
<?php 
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	function has_header_injection($str){
		return preg_match("/[\r\n]/", $str);
	}

// define variables and set to empty values
$profil_error = $civilite_error = $nom_error = $prenom_error = $ville_error = $phone_error = $email_error = "";
$profil = $civilite = $nom = $prenom = $ville = $phone = $email = "";

//form is submitted with POST method
if (isset($_POST['submit'])) {
  if (empty($_POST["profil"])) {
	$profil_error = "Le profil est requis";
  } else {
  	$profil = $_POST["profil"];
  }

  if (empty($_POST["civilite"])) {
	$civilite_error = "La civilité est requise";
  } else {
  	$civilite = $_POST["civilite"];
  }

  if (empty($_POST["nom"])) {
    $nom_error = "Le nom est requis";
  } else {
    $nom = test_input($_POST["nom"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
      $nom_error = "Seuls les lettres et les espaces sont autorisés"; 
    }
  }

  if (empty($_POST["prenom"])) {
	$prenom_error = "Le prénom est requis";
  } else {
	$prenom = test_input($_POST["prenom"]);
	// check if name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
	$prenom_error = "Seuls les lettres et les espaces sont autorisés"; 
    }
  }
  
  if (empty($_POST["ville"])) {
	$ville_error = "La ville est requise";
  } else {
  	$ville = $_POST["ville"];
  }

  if (empty($_POST["email"])) {
    $email_error = "L'adresse mail est requise";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "L'adresse mail est incorrecte"; 
    }
  }
  
  if (empty($_POST["phone"])) {
	$phone_error = "Le numéro de téléphone est requis";
  } else{
  	$phone = $_POST["phone"];
  }
  
  if ($profil_error == '' and $civilite_error == '' and $nom_error == '' and $prenom_error == '' and $ville_error == '' and $phone_error == '' and $email_error == ''){

      // mail essential
      $from = "no-reply@newera-tutoring.cm";
      $to = $_POST["email"];
      $subject = "Demande de brochure - NEWERA TUTORING";
      $message = "Bonjour,\n\n";
      $message .= "Nous avons bien pris en compte votre demande qui sera traitée dans les meilleurs délais.\n\n";
      $message .= "Nous vous invitons à consulter notre documentation.\n";
      $message .= "Elle vous donnera des premiers éléments sur nos différentes solutions de soutien scolaire.\n\n";
      $message .= "Nos conseillers sont à votre disposition pour faire le point et répondre à toutes vos questions sur la scolarité de chaque élève : \n";
      $message .= "N’hésitez pas à contacter dès maintenant votre agence en appelant au +237 650 49 61 77 ou +237 656 57 92 22 (numéro national). \n\n";
      $message .= "Bien sincèrement,\n";
      $message .= "L'équipe NewEra Tutoring\n";
      $message .= "https://newera-tutoring.cm\n\n";
      $message .= "Ce mail vous a été envoyé automatiquement, merci de ne pas y répondre.\n";
      
      $message2 = "Réception d'une nouvelle demande de brochure\n\n";
      $message2 .= "Profil :".$profil."\n\n";
      $message2 .= "Civilité :".$civilite."\n\n";
      $message2 .= "Nom :".$nom."\n\n";
      $message2 .= "Prénom :".$prenom."\n\n";
      $message2 .= "Ville de résidence :".$ville."\n\n";
      $message2 .= "Numéro de téléphone :".$phone."\n\n";
      $message2 .= "Adresse mail :".$email."\n\n";
      
      //$file = $temp_name;
      //$content = chunk_split(base64_encode(file_get_contents($file)));
      $uid = md5(uniqid(time()));
      
      //standard mail headers
      $header = "From: ".$from."\n";
      $header .= "Reply-To: ".$replyto."\n";
      $header .= "MIME-Version: 1.0\n";    
      $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\n\n";
      
      $header2 = "From: ".$to."\n";
      $header2 .= "Reply-To: ".$replyto."\n";
      $header2 .= "MIME-Version: 1.0\n";    
      $header2 .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\n\n";
            
      	//plain text part
      $emessage = "--".$uid."\n";
      $emessage .= "Content-type:text/plain; charset=UTF-8\n";
      $emessage .= "Content-Transfer-Encoding: 7bit\n\n";
      $emessage .= $message."\n\n";
	
      $emessage2 = "--".$uid."\n";
      $emessage2 .= "Content-type:text/plain; charset=UTF-8\n";
      $emessage2 .= "Content-Transfer-Encoding: 7bit\n\n";
      $emessage2 .= $message2."\n\n";
      
	//file attachment
      //$emessage .= "--".$uid."\n";
      //$emessage .= "Content-type: ".$file_type."; name=\"".$file_name."\"\n";
      //$emessage .= "Content-Transfer-Encoding: base64\n";
      //$emessage .= "Content-Disposition: attachment; filename=\"".$file_name."\"\n\n";
      //$emessage .= $content."\n\n";   
      //$emessage .= "--".$uid."--";
         
      mail( "contact@newera-tutoring.cm", "Demande de brochure", $emessage2, $header2 ); //Mail to NEWERA TUTORING
      mail( $to, $subject, $emessage, $header ); //MAIL to the candidate
      $profil = $civilite = $nom = $prenom = $ville = $phone = $email = '';
?>
	<h5>Votre demande a été prise en compte.</h5> 
	<p>
		Vous recevrez un mail de nos équipes et vous serez contacté par un de nos conseillers pédagogiques.
		<br>
		Cliquez <a href="/">ici</a> pour retourner à la page d'accueil.
	</p>
<?php } else { ?>
                                    <form id="contact" action="" method="post" enctype="multipart/form-data">
                            		<div class="row">                               
	                                    	<div class="form-group col-sm-6">
		                                    <label for="profil">Votre Profil<span class="required">*</span></label>
		                                    <select class="form-control" type="text" name="profil" id="profil">
		                                        <option selected hidden>Sélectionnez votre profil</option>
		                                        <option value="parent" <?php if($profil == "parent") echo selected;?>>Parent</option>
		                                        <option value="eleve" <?php if($profil == "eleve") echo selected;?>>Élève</option>
		                                        <option value="etudiant" <?php if($profil == "etudiant") echo selected;?>>Étudiant</option>
		                                    </select>  
		                                    <span class="error"><?= $profil_error ?></span> 
		                               </div> 
		                               <div class="form-group col-sm-6">
		                                    <label for="civilite">Votre civilité<span class="required">*</span></label>
		                                    <select class="form-control" type="text" name="civilite" id="civilite">
		                                        <option selected hidden>Sélectionnez votre civilité</option>
		                                        <option value="madame" <?php if($civilite == "madame") echo selected;?>>Madame</option>
		                                        <option value="monsieur" <?php if($civilite == "monsieur") echo selected;?>>Monsieur</option>
		                                    </select>
		                                    <span class="error"><?= $civilite_error ?></span>
		                                <!--//form-group-->
		                                </div>	               	                                                
                            		</div>                                                             
		                        <div class="row">                                   
		                                <div class="form-group col-sm-6">
		                                    <label for="prenom">Prénom<span class="required">*</span></label>
		                                    <input id="prenom" type="text" placeholder="votre prénom" class="form-control" name="prenom" value="<?= $prenom ?>">
		                                    <span class="error"><?= $prenom_error ?></span>
		                                </div><!--//form-group-->  
		                                <div class="form-group col-sm-6">
		                                    <label for="nom">Nom<span class="required">*</span></label>
		                                    <input id="nom" type="text" placeholder="votre nom" class="form-control" name="nom" value="<?= $nom ?>">
		                                    <span class="error"><?= $nom_error ?></span>
		                                </div> 	                                                                                                    
		                        </div>                                                             
		                        <div class = "row">                                    
		                                <div class="form-group col-sm-6">
		                                    <label for="email">Email<span class="required">*</span></label>
		                                    <input id="email" type="text" placeholder="votre email" class="form-control" name="email" value="<?= $email ?>">
		                                    <span class="error"><?= $email_error ?></span>
		                                </div><!--//form-group--> 
	                                        <div class="form-group col-sm-6">
	                                            <label for="phone">Téléphone<span class="required">*</span></label>
	                                            <input id="phone" type="text" placeholder="votre numéro de Téléphone" class="form-control" name="phone" value="<?= $phone ?>">
	                                            <span class="error"><?= $phone_error ?></span>
	                                        </div>                                                                                                 
		                        </div>
	                                <div class="row">                                    
	                                    <div class="form-group col-sm-6">
		                                    <label for="ville">Ville<span class="required">*</span></label>
		                                    <select class="form-control" type="text" name="ville" id="ville">
		                                        <option selected hidden>Sélectionnez votre ville</option>
		                                        <option value="douala" <?php if($ville == "douala") echo selected;?>>Douala</option>
		                                        <option value="yaounde" <?php if($ville == "yaounde") echo selected;?>>Yaounde</option>
		                                    </select>
		                                    <span class="error"><?= $ville_error ?></span>                                
	                                    </div>
	                                </div>
	                                <div class="row"> 
		                                <div class="checkbox col-sm-6">
		                                    <label>
		                                      <input type="checkbox"> <p style="font-size: 80%;"> Je souhaite recevoir les informations de <span style = "color : #88C425">NEWERA TUTORING</span> sur les offres de cours à domicile et de cours collectifs.</p>
		                                    </label>
		                                </div>
	                                </div>
                                	<button name="submit" type="submit" value="Send mail" class="btn btn-primary">Envoyer</button>
                            </form> 
                        <?php } ?>
                        <?php } else { ?>    
                                    <form id="contact" action="" method="post">
                            		<div class="row">                               
	                                    	<div class="form-group col-sm-6">
		                                    <label for="profil">Votre Profil<span class="required">*</span></label>
		                                    <select class="form-control" type="text" name="profil" id="profil">
		                                        <option selected hidden>Sélectionnez votre profil</option>
		                                        <option value="parent" <?php if($profil == "parent") echo selected;?>>Parent</option>
		                                        <option value="eleve" <?php if($profil == "eleve") echo selected;?>>Élève</option>
		                                        <option value="etudiant" <?php if($profil == "etudiant") echo selected;?>>Étudiant</option>
		                                    </select>  
		                               </div> 
		                               <div class="form-group col-sm-6">
		                                    <label for="civilite">Votre civilité<span class="required">*</span></label>
		                                    <select class="form-control" type="text" name="civilite" id="civilite">
		                                        <option selected hidden>Sélectionnez votre civilité</option>
		                                        <option value="madame" <?php if($civilite == "madame") echo selected;?>>Madame</option>
		                                        <option value="monsieur" <?php if($civilite == "monsieur") echo selected;?>>Monsieur</option>
		                                    </select>
		                                <!--//form-group-->
		                                </div>	               	                                                
                            		</div>                                                             
		                        <div class="row">                                   
		                                <div class="form-group col-sm-6">
		                                    <label for="prenom">Prénom<span class="required">*</span></label>
		                                    <input id="prenom" type="text" placeholder="votre prénom" class="form-control" name="prenom" value="<?= $prenom ?>">
		                                </div><!--//form-group-->  
		                                <div class="form-group col-sm-6">
		                                    <label for="nom">Nom<span class="required">*</span></label>
		                                    <input id="nom" type="text" placeholder="votre nom" class="form-control" name="nom" value="<?= $nom ?>">
		                                </div> 	                                                                                                    
		                        </div>                                                             
		                        <div class = "row">                                    
		                                <div class="form-group col-sm-6">
		                                    <label for="email">Email<span class="required">*</span></label>
		                                    <input id="email" type="text" placeholder="votre email" class="form-control" name="email" value="<?= $email ?>">
		                                </div><!--//form-group--> 
	                                        <div class="form-group col-sm-6">
	                                            <label for="phone">Téléphone<span class="required">*</span></label>
	                                            <input id="phone" type="text" placeholder="votre numéro de Téléphone" class="form-control" name="phone" value="<?= $phone ?>">
	                                        </div>                                                                                                 
		                        </div>
	                                <div class="row">                                    
	                                    <div class="form-group col-sm-6">
		                                    <label for="ville">Ville<span class="required">*</span></label>
		                                    <select class="form-control" type="text" name="ville" id="ville">
		                                        <option selected hidden>Sélectionnez votre ville</option>
		                                        <option value="douala" <?php if($ville == "douala") echo selected;?>>Douala</option>
		                                        <option value="yaounde" <?php if($ville == "yaounde") echo selected;?>>Yaounde</option>
		                                    </select>                              
	                                    </div>
	                                </div>
	                                <div class="row"> 
		                                <div class="checkbox col-sm-6">
		                                    <label>
		                                      <input type="checkbox"> <p style="font-size: 80%;"> Je souhaite recevoir les informations de <span style = "color : #88C425">NEWERA TUTORING</span> sur les offres de cours à domicile et de cours collectifs.</p>
		                                    </label>
		                                </div>
	                                </div>
                                	<button name="submit" type="submit" value="Send mail" class="btn btn-primary">Envoyer</button>
                            </form> 
                        <?php } ?>                               
            </div>
            </div>
            <!-- End Container-->
        </section>
        <!-- End Works-->
   

        <!-- footer top-->
        <?php include('includes/footer.php'); ?>
	<!-- ======================= End JQuery libs =========================== -->
	
	<script>
		function m_f_hidden($str){
			document.getElementById($str).style.visibility='hidden';	
		}
	</script>
	<script>
		function m_f_visible($str){
			document.getElementById($str).style.visibility='visible';	
		}
	</script>
