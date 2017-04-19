<div class="Col ThreeOfEight SideBar">
			
	<?php
	if($Segment[0] != 'studenten'){
	?>
	<section class="BorderSpace Wysiwyg">
		<div class="ActionBlock">
			<h3>Hulp nodig? Wij bellen u terug.</h3>
			<fieldset class="FormWrap">
				<form name="Phone" method="POST">
					<label class="FieldLabel PhoneForm">
						<input class="Field Input Placeholder" type="text" value="telefoonnummer" attrValue="telefoonnummer" attrType="Phone" name="Telefoonnummer"/>
					</label>
					<label class="FieldLabel PhoneForm">
						<input class="Field Input Placeholder" type="text" value="naam" attrValue="naam" attrType="Name" name="Naam"/>
					</label>
					<input class="ActionButton Form" type="submit" value="bel mij terug"/>
				</form>
			</fieldset>
		</div>
	</section>
	<?php
	};
	
	if($Segment[0] != 'veel_gestelde_vragen'){
	?>

	<section class="BorderSpace Wysiwyg">
		<?php
			
			$RelevantQuery = "SELECT * FROM `CMS_PAGES` WHERE LAYER = '{$LayerID}' AND FAVORITE = 'true' AND NOT UNIQUE_NAME = '{$PageSegment}' ORDER BY `ID` ASC LIMIT 6";
			$RelevantResult = @ $Mysqli->query($RelevantQuery);
			
			if($RelevantResult->num_rows > 0){
			
		?>
		<h3>Gerelateerde pagina</h3>
		<ul class="LinkList">
		
			<?php
				while($RelevantRow = $RelevantResult->fetch_array()){
					$RelevantName = $RelevantRow['NAME'];
					$RelevantLink = $RelevantRow['UNIQUE_NAME'];
			?>	
				<li>
					<a href="<?php echo CreateUrl($Mysqli, $RelevantLink, '/'.$RelevantLink); ?>" title="<?php echo CleanTitle($RelevantName); ?>"><?php echo CleanTitle($RelevantName); ?></a>
				</li>
			<?php
				};
			?>	
		</ul>
		
		<?php
			};
		?>
		
		
	</section>
	
	<?php
	};
	
	if($Segment[0] != 'studenten'){
	?>
	<section class="BorderSpace Wysiwyg">
		<h3>Voordelen van Hulpstation.nl</h3>
		<ul class="Checklist">
			<li><a href="http://192.168.33.10/hulpstation.nl/klantenservice/beleid_en_procedures/zo_werkt_pc_hulp_aan_huis">Bekijk onze werkwijze</a></li>
			<li>Landelijk service</li>
			<li>Pc hulp aan huis</li>
			<li>Webontwerp</li>
			<li>De goedkoopste</li>
			<li>7 dagen per week</li>
			<li>Hulp op afstand </li>
			<li>Whatsapp pc hulp</li>
			
		</ul>
	</section>
	<?php
	}else{
	?>
	<section class="BorderSpace Wysiwyg">
		<h3>Waarom werken bij Hulpstation.nl?</h3>
		<ul class="Checklist">
			<li>Mensen helpen</li>
			<li>Een goed salaris</li>
			<li>Flexible werktijden</li>
			<li>Afwisselend werk</li>
			<li>Praktijkervaring</li>
			<li>In je eigen omgeving</li>
		</ul>
	</section>
	<?php
	}
	?>
</div>