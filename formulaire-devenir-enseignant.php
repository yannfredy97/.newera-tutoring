<?php 
    $page_title='Formulaire devenir enseignant | soutien et accompagnement scolaire';
    include('includes/header.php'); 
?>
	<!-- End Header-->
        <section class="title-section">
            <div class="container">
                <!-- crumbs --> 
                <div class="row crumbs">
                        <center>
                        	<h2>Candidature : Professeur particulier</h2>
                        </center>
                </div>
                <!-- End crumbs -->               
            </div>
        </section>
	<section class="paddings">
	<div class="container">	
		<div class="row">
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
$nom_error = $prenom_error = $adress_error = $ville_error = $phone_error = $email_error = $situation_error = $date_de_naissance_error = $matiere1_error = $attachment_error = "";
$nom = $prenom = $adress = $ville = $phone = $email = $situation = $date_de_naissance = $matiere1 = "";

//form is submitted with POST method
if (isset($_POST['submit'])) {
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

  if (empty($_POST["adress"])) {
	$adress_error = "La ville est requise";
  } else {
  	$adress = $_POST["adress"];
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
  
  if (empty($_POST["situation"])) {
	$situation_error = "La situation professionnelle est requise";
  } else {
  	$situation = $_POST["situation"];
  	if ($situation == 'Votre situation actuelle') {
  		$situation_error = "La situation professionnelle est requise";
  	} 
  }

  if (empty($_POST["date_de_naissance"])) {
	$date_de_naissance_error = "La date de naissance est requise";
  } else {
  	$date_de_naissance = $_POST["date_de_naissance"];
  }
  
  if (empty($_POST["matiere1"])) {
	$matiere1_error = "La Matière 1 est requise";
  } else {
  	$matiere1 = $_POST["matiere1"];
	if ($matiere1 == 'Sélectionnez une matière') {
  		$matiere1_error = "La Matière 1 est requise";
  	} 
  }
  
  $matiere2 = $_POST["matiere2"];
  $matiere3 = $_POST["matiere3"];
  
  if (empty($_FILES['attachment']['name'])) {
	$attachment_error = "Le CV est requis";
  } else {
  	//store some variables
	$file_name = $_FILES['attachment']['name'];
	$temp_name = $_FILES['attachment']['tmp_name'];
	$file_type = $_FILES['attachment']['type'];
	
	// get the extension of the file
	$base = basename($file_name);
	$extension = substr($base, strlen($base)-4, strlen($base));
	
	// only these file types will be allowed
	$allowed_extensions = array(".doc", "docx", ".pdf");
	
	// check that this file type is allowed
	if(!array($extension,$allowed_extensions)) {
		$attachment_error = "Type de fichier non autorisé";
	}
  } 
  if ($civilite_error == '' and $nom_error == '' and $prenom_error == '' and $adress_error == '' and $ville_error == '' and $phone_error == '' and $email_error == '' and $situation_error == '' and $date_de_naissance_error == '' and $matiere1_error == '' and $attachment_error == ''){

      // mail essential
      $from = "no-reply@newera-tutoring.cm";
      $to = $_POST["email"];
      $subject = "Devenir enseignant NEWERA TUTORING";
      $message = "NewEra Tutoring\n\n";
      $message .= "Bonjour ".$civilite." ".$prenom." ".$nom."\n\n";
      $message .= "Nous avons bien reçu votre candidature et nous vous en remercions.\n";
      $message .= "Nous reprendrons très rapidement contact avec vous à ce sujet.\n\n";
      $message .= "Veuillez noter que dans le cadre du traitement de votre dossier de candidature, un extrait de\n";
      $message .= "casier judiciaire vous sera demandé. Afin de le recevoir dans les plus brefs délais, nous vous\n";
      $message .= "recommandons fortement d’en effectuer la demande dès à présent.\n\n";
      $message .= "Vous pouvez dès à présent nous contacter par téléphone afin de joindre nos chargés de\n";
      $message .= "recrutement ou nos conseillers pédagogiques. Ils sont à votre disposition pour toute question\n";
      $message .= "concernant les possibilités d’enseigner chez NewEra Tutoring.\n\n";
      $message .= "Bien sincèrement,\n";
      $message .= "Le Service de Recrutement Enseignants.\n\n";
      $message .= "NewEra Tutoring\n\n";
      $message .= "Ce mail vous a été envoyé automatiquement, merci de ne pas y répondre.\n";
      
      $message2 = "Réception d'une nouvelle candidature\n\n";
      $message2 .= "Civilité :".$civilite."\n\n";
      $message2 .= "Nom :".$nom."\n\n";
      $message2 .= "Prénom :".$prenom."\n\n";
      $message2 .= "Quartier :".$adress."\n\n";
      $message2 .= "Ville de résidence :".$ville."\n\n";
      $message2 .= "Numéro de téléphone :".$phone."\n\n";
      $message2 .= "Adresse mail :".$email."\n\n";
      $message2 .= "Date de naissance :".$date_de_naissance."\n\n";
      $message2 .= "Situation professionnelle :".$situation ."\n\n";
      $message2 .= "Choix de matières\n\n";
      $message2 .= "Matière principale :".$matiere1."\n\n";
      $message2 .= "Matière secondaire 1 :".$matiere2."\n\n";
      $message2 .= "Matière secondaire 2 :".$matiere3."\n\n";
      
      $file = $temp_name;
      $content = chunk_split(base64_encode(file_get_contents($file)));
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
      $emessage2 .= "--".$uid."\n";
      $emessage2 .= "Content-type: ".$file_type."; name=\"".$file_name."\"\n";
      $emessage2 .= "Content-Transfer-Encoding: base64\n";
      $emessage2 .= "Content-Disposition: attachment; filename=\"".$file_name."\"\n\n";
      $emessage2 .= $content."\n\n";   
      $emessage2 .= "--".$uid."--";
         
      mail( "recrutement@newera-tutoring.cm", "Nouvelle candidature", $emessage2, $header2 ); //Mail to NEWERA TUTORING
      mail( $to, $subject, $emessage, $header ); //MAIL to the candidate
      $civilite = $nom = $prenom = $adress = $ville = $phone = $email = $situation = $date_de_naissance = $matiere1 = $cv = '';
?>
	<h5>Votre candidature a été prise en compte. Cliquez <a href="/">ici</a> pour retourner à la page d'accueil.</h5>
<?php } else { ?>
					<form id="contact" action="" method="post" enctype="multipart/form-data">
						<div class="container">
						<h2>1. Vous êtes :</h2>
						<div class="form-group">
							<label>Civilité<span class="required">*</span></label>
							<p>
							<input type="radio" name="civilite" value="Monsieur" id="Monsieur" onClick="submit();" <?php echo (!$_SESSION['r1'] || $_SESSION['r1'] == "o") ? 'checked="checked"' : ''; ?> />  
							<label for="Monsieur"><strong>Monsieur</strong></label>
							<input type="radio" name="civilite" value="Madame" id="Madame">
							<label for="Madame"><strong>Madame</strong></label>
							</p>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="prenom">Prénom<span class="required">*</span></label>
								<input placeholder="prenom" type="text" class="form-control" name="prenom" value="<?= $prenom ?>" id="prenom">
								<span class="error"><?= $prenom_error ?></span>
							</div>
							<div class="form-group  col-sm-6">
								<label for="nom">Nom<span class="required">*</span></label>
								<input placeholder="nom" type="text" class="form-control" name="nom" value="<?= $nom ?>" id="nom">
								<span class="error"><?= $nom_error ?></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="adress">Adresse (quartier de résidence)<span class="required">*</span></label>
								<input placeholder="exemple: Biyem-Assi" type="text" class="form-control" name="adress" value="<?= $adress ?>" id="adress">
								<span class="error"><?= $adress_error ?></span>
							</div>
							<div class="form-group col-sm-6">
								<label for="ville">Ville<span class="required">*</span></label>
								<input placeholder="ville" type="text" class="form-control" name="ville" value="<?= $ville ?>" id="ville">
								<span class="error"><?= $ville_error ?></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="phone">Téléphone<span class="required">*</span></label>
								<input placeholder="numéro de téléphone" type="text" class="form-control" name="phone" value="<?= $phone ?>" id="phone">
								<span class="error"><?= $phone_error ?></span>
							</div>
							<div class="form-group col-sm-6">
								<label for="email">E-mail<span class="required">*</span></label>
								<input placeholder="johnn@exemple.com" type="text" class="form-control" name="email" value="<?= $email ?>" id="email">
								<span class="error"><?= $email_error ?></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="situation">Situation actuelle<span class="required">*</span></label>
								<select class="form-control" type="text" name="situation" id="situation">						
									<option selected hidden>Votre situation actuelle</option>			
									<option value="étudiant" <?php if($situation == "étudiant") echo selected;?>>Étudiant</option>
									<option value="enseignant" <?php if($situation == "enseignant") echo selected;?>>Enseignant/formateur</option>
									<option value="salarié" <?php if($situation == "salarié") echo selected;?>>Salarié</option>
									<option value="autre" <?php if($situation == "autre") echo selected;?>>Autre</option>
								</select>
								<span class="error"><?= $situation_error ?></span>
							</div>
							<div class="form-group col-sm-6">
								<label for="date_de_naissance">Date de naissance<span class="required">*</span></label>
								<input placeholder="dd/mm/yyyy" type="text" class="form-control" name="date_de_naissance" value="<?= $date_de_naissance ?>" id="date_de_naissance">
								<span class="error"><?= $date_de_naissance_error ?></span>
							</div>
						</div>
						<h2>2. Votre demande :</h2>
						<h4><span class="text-info">Matière(s) que vous souhaitez enseigner :</span> </h4>
						<div class="row">
							<div class="form-group  col-sm-4">
								<label for="matiere1">Matière 1 (Principale)<span class="required">*</span></label>
								<select class="form-control" type="text" name="matiere1" value="<?= $matiere1 ?>" id="matiere1">
									<option hidden>Sélectionnez une matière</option>
									<optgroup label="Sciences et Techniques">
									<option value="SVT">Biologie / SVT / Sciences Naturelles</option>
									<option value="chimie">Chimie</option>									
									<option value="maths">Mathématiques</option>
									<option value="physique">Physique</option>
									<option value="informatique">Informatique</option>                                 
									</optgroup>
									<optgroup label="Lettre - Littérature">
									<option value="anglais">Anglais</option>
									<option value="francais">Français</option>
									<option value="philosophie">Philosophie</option>								
									</optgroup>
									<optgroup label="Langues étrangères">
									<option value="allemand">Allemand</option>
									<option value="espagnol">Espagnol</option>								
									</optgroup>
									<optgroup label="Economie - Management - Gestion">
									<option value="comptabilite">Comptabilité</option>
									<option value="econometrie">Econométrie</option>
									<option value="economie">Economie</option>
									<option value="Gestion">Gestion / Finance</option>
									<option value="Gestion">Management</option>
									</optgroup>
									<optgroup label="Sciences Humaines">
									<option value="geographie">Géographie</option>
									<option value="histoire">Histoire</option>
									<option value="EC">Education à la Citoyenneté</option>
									</optgroup>
									<optgroup label="Enseignement professionnel">
									<option value="Mécanique">Mécanique</option>
									<option value="Electicité">Electicité</option>
									<option value="Electronique">Electronique</option>
									<option value="TM">Technologie des matériaux</option>
									<option value="DI">Dessin industriel</option>
									<option value="Hydraulique">Hydraulique</option>
									</optgroup>					
								</select>
								<span class="error"><?= $matiere1_error ?></span>
							</div>
							<div class="form-group  col-sm-4">
								<label for="matiere2">Matière 2 (Optionnelle)</label>
								<select class="form-control" type="text" name="matiere2"  id="matiere2">
									<option hidden>Sélectionnez une matière</option>
									<optgroup label="Sciences et Techniques">
									<option value="SVT">Biologie / SVT / Sciences Naturelles</option>
									<option value="chimie">Chimie</option>										
									<option value="maths">Mathématiques</option>
									<option value="physique">Physique</option>    
									<option value="informatique">Informatique</option>                                    
									</optgroup>
									<optgroup label="Lettre - Littérature">
									<option value="anglais">Anglais</option>
									<option value="francais">Français</option>
									<option value="philosophie">Philosophie</option>								
									</optgroup>
									<optgroup label="Langues étrangères">
									<option value="allemand">Allemand</option>
									<option value="espagnol">Espagnol</option>								
									</optgroup>
									<optgroup label="Economie - Management - Gestion">
									<option value="comptabilite">Comptabilité</option>
									<option value="econometrie">Econométrie</option>
									<option value="economie">Economie</option>
									<option value="Gestion">Gestion / Finance</option>
									<option value="Gestion">Management</option>
									</optgroup>
									<optgroup label="Sciences Humaines">
									<option value="geographie">Géographie</option>
									<option value="histoire">Histoire</option>
									<option value="EC">Education à la Citoyenneté</option>
									</optgroup>
									<optgroup label="Enseignement professionnel">
									<option value="Mécanique">Mécanique</option>
									<option value="Electicité">Electicité</option>
									<option value="Electronique">Electronique</option>
									<option value="TM">Technologie des matériaux</option>
									<option value="DI">Dessin industriel</option>
									<option value="Hydraulique">Hydraulique</option>
									</optgroup>	
								</select>
							</div>
							<div class="form-group col-sm-4">
								<label for="matiere3">Matière 3 (Optionnelle)</label>
								<select class="form-control" type="text" name="matiere3"  id="matiere3">
									<option hidden>Sélectionnez une matière</option>
									<optgroup label="Sciences et Techniques">
									<option value="SVT">Biologie / SVT / Sciences Naturelles</option>
									<option value="chimie">Chimie</option>						
									<option value="maths">Mathématiques</option>
									<option value="physique">Physique</option> 
									<option value="informatique">Informatique</option>                                       
									</optgroup>
									<optgroup label="Lettre - Littérature">
									<option value="anglais">Anglais</option>
									<option value="francais">Français</option>
									<option value="philosophie">Philosophie</option>								
									</optgroup>
									<optgroup label="Langues étrangères">
									<option value="allemand">Allemand</option>
									<option value="espagnol">Espagnol</option>								
									</optgroup>
									<optgroup label="Economie - Management - Gestion">
									<option value="comptabilite">Comptabilité</option>
									<option value="econometrie">Econométrie</option>
									<option value="economie">Economie</option>
									<option value="Gestion">Gestion / Finance</option>
									<option value="Gestion">Management</option>
									</optgroup>
									<optgroup label="Sciences Humaines">
									<option value="geographie">Géographie</option>
									<option value="histoire">Histoire</option>
									<option value="EC">Education à la Citoyenneté</option>
									</optgroup>
									<optgroup label="Enseignement professionnel">
									<option value="Mécanique">Mécanique</option>
									<option value="Electicité">Electicité</option>
									<option value="Electronique">Electronique</option>
									<option value="TM">Technologie des matériaux</option>
									<option value="DI">Dessin industriel</option>
									<option value="Hydraulique">Hydraulique</option>
									</optgroup>	
								</select>
							</div>
						</div>
						<h2>3. Votre profil :</h2>
						<h4><span class="text-info">Joindre votre CV</span><span class="required">*</span> </h4>
						<div class="form-group">
							<input type="file" name="attachment">
							<span class="error"><?= $attachment_error ?></span>
						</div>
						<button name="submit" type="submit" value="Send mail" class="btn btn-primary">Valider</button>
					</div>
				</form>
				
				<?php } ?>
				
				<?php } else { ?>
					<form id="contact" action="" method="post" enctype="multipart/form-data">
						<div class="container">
						<h2>1. Vous êtes :</h2>
						<div class="form-group">
							<label>Civilité<span class="required">*</span></label>
							<p>
							<input type="radio" name="civilite" value="Monsieur" id="Monsieur" onClick="submit();" <?php echo (!$_SESSION['r1'] || $_SESSION['r1'] == "o") ? 'checked="checked"' : ''; ?> />  
							<label for="Monsieur"><strong>Monsieur</strong></label>
							<input type="radio" name="civilite" value="Madame" id="Madame">
							<label for="Madame"><strong>Madame</strong></label>
							</p>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="prenom">Prénom<span class="required">*</span></label>
								<input placeholder="prenom" type="text" class="form-control" name="prenom" value="<?= $prenom ?>" id="prenom">
								<span class="error"><?= $prenom_error ?></span>
							</div>
							<div class="form-group  col-sm-6">
								<label for="nom">Nom<span class="required">*</span></label>
								<input placeholder="nom" type="text" class="form-control" name="nom" value="<?= $nom ?>" id="nom">
								<span class="error"><?= $nom_error ?></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="adress">Adresse (quartier de résidence)<span class="required">*</span></label>
								<input placeholder="exemple: Biyem-Assi" type="text" class="form-control" name="adress" value="<?= $adress ?>" id="adress">
								<span class="error"><?= $adress_error ?></span>
							</div>
							<div class="form-group col-sm-6">
								<label for="ville">Ville<span class="required">*</span></label>
								<input placeholder="ville" type="text" class="form-control" name="ville" value="<?= $ville ?>" id="ville">
								<span class="error"><?= $ville_error ?></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="phone">Téléphone<span class="required">*</span></label>
								<input placeholder="numéro de téléphone" type="text" class="form-control" name="phone" value="<?= $phone ?>" id="phone">
								<span class="error"><?= $phone_error ?></span>
							</div>
							<div class="form-group col-sm-6">
								<label for="email">E-mail<span class="required">*</span></label>
								<input placeholder="johnn@exemple.com" type="text" class="form-control" name="email" value="<?= $email ?>" id="email">
								<span class="error"><?= $email_error ?></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="situation">Situation actuelle<span class="required">*</span></label>
								<select class="form-control" type="text" name="situation" value="<?= $situation ?>" id="situation">
									<option hidden>Votre situation actuelle</option>
									<option value="étudiant">Étudiant</option>
									<option value="enseignant">Enseignant/formateur</option>
									<option value="salarié">Salarié</option>
									<option value="autre">Autre</option>
								</select>
								<span class="error"><?= $situation_error ?></span>
							</div>
							<div class="form-group col-sm-6">
								<label for="date_de_naissance">Date de naissance<span class="required">*</span></label>
								<input placeholder="dd/mm/yyyy" type="text" class="form-control" name="date_de_naissance" value="<?= $date_de_naissance ?>" id="date_de_naissance">
								<span class="error"><?= $date_de_naissance_error ?></span>
							</div>
						</div>
						<h2>2. Votre demande :</h2>
						<h4><span class="text-info">Matière(s) que vous souhaitez enseigner :</span> </h4>
						<div class="row">
							<div class="form-group  col-sm-4">
								<label for="matiere1">Matière 1 (Principale)<span class="required">*</span></label>
								<select class="form-control" type="text" name="matiere1" value="<?= $matiere1 ?>" id="matiere1">
									<option hidden>Sélectionnez une matière</option>
									<optgroup label="Sciences et Techniques">
									<option value="SVT">Biologie / SVT / Sciences Naturelles</option>
									<option value="chimie">Chimie</option>									
									<option value="maths">Mathématiques</option>
									<option value="physique">Physique</option>
									<option value="informatique">Informatique</option>                                 
									</optgroup>
									<optgroup label="Lettre - Littérature">
									<option value="anglais">Anglais</option>
									<option value="francais">Français</option>
									<option value="philosophie">Philosophie</option>								
									</optgroup>
									<optgroup label="Langues étrangères">
									<option value="allemand">Allemand</option>
									<option value="espagnol">Espagnol</option>								
									</optgroup>
									<optgroup label="Economie - Management - Gestion">
									<option value="comptabilite">Comptabilité</option>
									<option value="econometrie">Econométrie</option>
									<option value="economie">Economie</option>
									<option value="Gestion">Gestion / Finance</option>
									<option value="Gestion">Management</option>
									</optgroup>
									<optgroup label="Sciences Humaines">
									<option value="geographie">Géographie</option>
									<option value="histoire">Histoire</option>
									<option value="EC">Education à la Citoyenneté</option>
									</optgroup>
									<optgroup label="Enseignement professionnel">
									<option value="Mécanique">Mécanique</option>
									<option value="Electicité">Electicité</option>
									<option value="Electronique">Electronique</option>
									<option value="TM">Technologie des matériaux</option>
									<option value="DI">Dessin industriel</option>
									<option value="Hydraulique">Hydraulique</option>
									</optgroup>					
								</select>
								<span class="error"><?= $matiere1_error ?></span>
							</div>
							<div class="form-group  col-sm-4">
								<label for="matiere2">Matière 2 (Optionnelle)</label>
								<select class="form-control" type="text" name="matiere2"  id="matiere2">
									<option hidden>Sélectionnez une matière</option>
									<optgroup label="Sciences et Techniques">
									<option value="SVT">Biologie / SVT / Sciences Naturelles</option>
									<option value="chimie">Chimie</option>										
									<option value="maths">Mathématiques</option>
									<option value="physique">Physique</option>    
									<option value="informatique">Informatique</option>                                    
									</optgroup>
									<optgroup label="Lettre - Littérature">
									<option value="anglais">Anglais</option>
									<option value="francais">Français</option>
									<option value="philosophie">Philosophie</option>								
									</optgroup>
									<optgroup label="Langues étrangères">
									<option value="allemand">Allemand</option>
									<option value="espagnol">Espagnol</option>								
									</optgroup>
									<optgroup label="Economie - Management - Gestion">
									<option value="comptabilite">Comptabilité</option>
									<option value="econometrie">Econométrie</option>
									<option value="economie">Economie</option>
									<option value="Gestion">Gestion / Finance</option>
									<option value="Gestion">Management</option>
									</optgroup>
									<optgroup label="Sciences Humaines">
									<option value="geographie">Géographie</option>
									<option value="histoire">Histoire</option>
									<option value="EC">Education à la Citoyenneté</option>
									</optgroup>
									<optgroup label="Enseignement professionnel">
									<option value="Mécanique">Mécanique</option>
									<option value="Electicité">Electicité</option>
									<option value="Electronique">Electronique</option>
									<option value="TM">Technologie des matériaux</option>
									<option value="DI">Dessin industriel</option>
									<option value="Hydraulique">Hydraulique</option>
									</optgroup>	
								</select>
							</div>
							<div class="form-group col-sm-4">
								<label for="matiere3">Matière 3 (Optionnelle)</label>
								<select class="form-control" type="text" name="matiere3"  id="matiere3">
									<option hidden>Sélectionnez une matière</option>
									<optgroup label="Sciences et Techniques">
									<option value="SVT">Biologie / SVT / Sciences Naturelles</option>
									<option value="chimie">Chimie</option>						
									<option value="maths">Mathématiques</option>
									<option value="physique">Physique</option> 
									<option value="informatique">Informatique</option>                                       
									</optgroup>
									<optgroup label="Lettre - Littérature">
									<option value="anglais">Anglais</option>
									<option value="francais">Français</option>
									<option value="philosophie">Philosophie</option>								
									</optgroup>
									<optgroup label="Langues étrangères">
									<option value="allemand">Allemand</option>
									<option value="espagnol">Espagnol</option>								
									</optgroup>
									<optgroup label="Economie - Management - Gestion">
									<option value="comptabilite">Comptabilité</option>
									<option value="econometrie">Econométrie</option>
									<option value="economie">Economie</option>
									<option value="Gestion">Gestion / Finance</option>
									<option value="Gestion">Management</option>
									</optgroup>
									<optgroup label="Sciences Humaines">
									<option value="geographie">Géographie</option>
									<option value="histoire">Histoire</option>
									<option value="EC">Education à la Citoyenneté</option>
									</optgroup>
									<optgroup label="Enseignement professionnel">
									<option value="Mécanique">Mécanique</option>
									<option value="Electicité">Electicité</option>
									<option value="Electronique">Electronique</option>
									<option value="TM">Technologie des matériaux</option>
									<option value="DI">Dessin industriel</option>
									<option value="Hydraulique">Hydraulique</option>
									</optgroup>	
								</select>
							</div>
						</div>
						<h2>3. Votre profil :</h2>
						<h4><span class="text-info">Joindre votre CV</span><span class="required">*</span> </h4>
						<div class="form-group">
							<input type="file" name="attachment">
							<span class="error"><?= $attachment_error ?></span>
						</div>
						<button name="submit" type="submit" value="Send mail" class="btn btn-primary">Valider</button>
					</div>
				</form>				
				<?php } ?>
			</div>
		</div>
	</div>
	</section>
	<!-- End Container-->
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