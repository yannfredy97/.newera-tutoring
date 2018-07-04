<?php 


// define variables and set to empty values
$nom_error = $prenom_error = $adress_error = $ville_error = $phone_error = $email_error = $situation_error = $date_de_naissance_error = $matiere1_error = $attachment_error = "";
$nom = $prenom = $adress = $ville = $phone = $email = $situation = $date_de_naissance = $matiere1 = "";

//form is submitted with POST method
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
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
  }
  
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
		$cv_error = "Type de fichier non autorisé";
	}
  }
 
  if ($civilite == '' and $nom_error == '' and $prenom_error == '' and $adress_error == '' and $ville_error == '' and $phone_error == '' and $email_error == '' and $situation_error == '' and $date_de_naissance_error == '' and $matiere1_error == '' and $attachment_error == ''){
     
      // mail essential
      $from = "recrutement@newera-tutoring.com";
      $to = $_POST["email"];
      $subject = "Devenir enseignant NEWERA TUTORING";
      $message = "Votre candidature a été prise en compte";
      
      $file = $temp_name;
      $content = chunk_split(base64_encode(file_get_contents($file)));
      $uid = md5(uniqid(time()));
      
      //standard mail headers
      $header = "From: ".$from."\r\n";
      $header .= "Reply-To: ".$replyto."\r\n";
      $header .= "MIME-Version: 1.0\r\n";
      
      $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
      $header .= "This is a multi-part message in MIME format.\r\n";
      
      	//plain text part
      $header .= "--".$uid."\r\n";
      $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
      $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
      $header .= $message."\r\n\r\n";
	
	//file attachment
      $header .= "--".$uid."\r\n";
      $header .= "Content-type: ".$file_type."; name=\"".$file_name."\"\r\n";
      $header .= "Content-Transfer-Encoding: base64\r\n";
      $header .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n\r\n";
      $header .= $content."\r\n\r\n";
      
      if (mail($to, $subject, "",$header)){
          echo 'Message sent, thank you for contacting us!';
          $civilite = $nom = $prenom = $adress = $ville = $phone = $email = $situation = $date_de_naissance = $matiere1 = $cv = '';
      } else {
      echo '<h4 class="error">fail</h4>';
      }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}