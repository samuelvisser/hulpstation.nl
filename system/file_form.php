<?php 



$Submitted = false;

if(isset($_POST['Submit'])){



	$mailto = 'solliciteren@hulpstation.nl';
    $subject = 'Sollicitatie Hulpstation'; 

	$file = $_FILES['cv']['tmp_name'];
	$content = file_get_contents( $file);
	$content = chunk_split(base64_encode($content));
	$uid = md5(uniqid(time()));
	$filename = $_FILES['cv']['name'];
	
	$message = "";
	
	foreach ($_POST as $Name => $Val){
		if($Name != 'Submit'){
		     $message .= htmlspecialchars($Name . ': ' . $Val) . "\n";
	     }
	}
	
	// header
	$header = "From: Hulpstation <noreply@hulpstation.nl>\r\n";
	$header .= "Reply-To: info@hulpstation.nl\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	
	// message & attachment
	$nmessage = "--".$uid."\r\n";
	$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
	$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
	$nmessage .= $message."\r\n\r\n";
	$nmessage .= "--".$uid."\r\n";
	$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
	$nmessage .= "Content-Transfer-Encoding: base64\r\n";
	$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
	$nmessage .= $content."\r\n\r\n";
	$nmessage .= "--".$uid."--";
	
	if (mail($mailto, $subject, $nmessage, $header)) {
         
        $Submitted = true;
        
    } else {
        echo "Bericht niet verzonden. Mail uw sollicitatie naar solliciteren@hulpstation.nl. Excuses voor het ongemak.";
        print_r( error_get_last() );
    }



}

?>