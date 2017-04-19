
<?php
			
function SendRequest($Mysqli, $POST){
	if(!empty($POST['MESSAGE'])){
		$PageID = htmlspecialchars($POST['PAGE']);	
		$Message = htmlspecialchars($POST['MESSAGE']);		
		$Header = 'From: Hulpstation.nl <noreply@hulpstation.nl>';
		
		mail('hulpaanvraag@hulpstation.nl', 'Aanvraag Hulpstation', $Message, $Header);
		
			
		echo <<<END
			<section class="BorderSpace Wysiwyg">
				<h3>Dank voor uw aanvraag.</h3>
				<p>Wij danken u voor uw vertrouwen in Hulpstation.nl. Binnen 24 uur neemt een van onze medewerkers contact met u op.</p>
				
				<p> Like onze <a href="https://www.facebook.com/hulpstation">Facebookpagina</a> om op de hoogte te blijven van alle ontwikkelingen, acties en tips rondom uw computer en multimedia apparatuur.
				
				<br/>	<br/>
				<img src="http://192.168.33.10/hulpstation.nl/uploads/acties/bedankt_computerhulp.jpg" width="100%"></a> 
			
				
				</p>
				

			</section>
			
END;
	};
};






function SendContact($Mysqli, $POST){
	if(!empty($POST['MESSAGE'])){
		$Message = htmlspecialchars($POST['MESSAGE']);		
		$Header = 'From: Hulpstation.nl <noreply@hulpstation.nl>';
		
		mail('info@hulpstation.nl', 'Contact Hulpstation', $Message, $Header);
			
		echo <<<END
			<section class="BorderSpace Wysiwyg">
				<h3>Bedankt!</h3>
				<p>Wij danken u voor uw vertrouwen in Hulpstation.nl. Binnen 24 uur neemt een van onze medewerkers contact met u op.
				
				
				
				<p> Like onze <a href="https://www.facebook.com/hulpstation">Facebookpagina</a> om op de hoogte te blijven van alle ontwikkelingen, acties en tips rondom uw computer en multimedia apparatuur.
					
					<br/>	<br/>
					<img src="http://192.168.33.10/hulpstation.nl/uploads/acties/bedankt_computerhulp.jpg" width="100%"></a> 
				
					</p>
				
				
				
				
			</section>
END;
	};
};

function SendPhone($Mysqli, $POST){
	if(!empty($POST['MESSAGE'])){
		$Message = htmlspecialchars($POST['MESSAGE']);		
		$Header = 'From: Hulpstation.nl <noreply@hulpstation.nl>'. "\r\n";
		$Header .= 'Cc: info@hulpstation.nl';
		
		mail('hulpaanvraag@hulpstation.nl', 'Bel terug Hulpstation', $Message, $Header);
			
		echo <<<END
			<h3>Bedankt!</h3>
			<p>Wij danken u voor uw vertrouwen in Hulpstation.nl. Binnen 24 uur neemt een van onze medewerkers contact met u op.
			
			<p> Like onze <a href="https://www.facebook.com/hulpstation">Facebookpagina</a> om op de hoogte te blijven van alle ontwikkelingen, acties en tips rondom uw computer en multimedia apparatuur.				
				<br/>	<br/>
				<img src="http://192.168.33.10/hulpstation.nl/uploads/acties/bedankt_computerhulp.jpg" width="100%"></a> 
			
			</p>
END;
	};
};

?>


