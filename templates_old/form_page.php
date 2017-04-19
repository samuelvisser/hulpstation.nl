<?php include('includes/document_start.php'); ?>
<?php
	$PageSegment = end($Segment);
	$PageQuery = "SELECT * FROM `CMS_PAGES` WHERE UNIQUE_NAME = '{$PageSegment}'"; 
	$PageResult = @ $Mysqli->query($PageQuery);
	$PageRow = $PageResult->fetch_array();

	$PageTitle = $PageRow['NAME'];
	$PageID = $PageRow['ID'];
	
	
	
?>
<div class="Wrap BodyWrap">
	<div class="Wrap">
		<div class="Row">
			<section class="Col OneOfOne">	
				<div class="Col FiveOfEight MessageField">
					<div class="BorderSpace Wysiwyg">
						<h3>Waar kunnen wij u mee helpen?</h3>
											</div>
						<fieldset class="FormWrap Form">
							<form name="Request" method="POST">
								<input class="Field" type="hidden" value="<?php echo $PageID; ?>" attrType="Hidden" AttrValidate="true" name="ID"/>
								
								<div class="FieldWrap Wysiwyg">
									<div class="Col OneOfTwo">
										<div class="BorderSpace">
											<p>Aanvraag</p>
										</div>
									</div>
									<div class="Col OneOfTwo">
										<div class="BorderSpace">
											<label class="FieldLabel">
												<input class="Field Input" type="text" value="<?php echo CleanTitle(strtolower($PageTitle)); ?>" attrValue="" attrType="Name" AttrValidate="true" name="Aanvraag"/>
											</label>
										</div>
									</div>
								</div>
								
								<div class="FieldWrap Wysiwyg">
									<div class="Col OneOfOne">
										<div class="BorderSpace">
											<label class="FieldLabel Textarea">
												<textarea class="Field Textarea Placeholder" attrValue="Probleem omschrijving" attrType="Message" AttrValidate="true" name="Omschrijving">Probleem omschrijving</textarea>
											</label>
										</div>
									</div>
								</div>
								
								
								<div class="FieldWrap Selector TypeClient">
									<div class="BorderSpace">
										<div class="SelectField" attrStatus="Closed">
											<input class="Field" type="hidden" value="" attrType="Hidden" AttrValidate="true" name="Klant"/>
											<span class="SelectValue" attrValue="">Heeft u een klantennummer?</span>
											<div class="SelectArrow"></div>
										</div>
										<div class="SelectUlWrap">
											<ul class="SelectUl">
												<span class="SelectDecorate"></span>
												<li class="SelectOption DropLi" attrValue="Ja, ik heb een klantennummer" attrName="Klant">Ja, ik heb een klantennummer</li>
												<li class="SelectOption DropLi" attrValue="Ja, maar ik ben deze kwijt" attrName="Klant">Ja, maar ik ben deze kwijt</li>
												<li class="SelectOption DropLi" attrValue="Nee, ik heb geen klantennummer" attrName="Klant">Nee, ik heb geen klantennummer</li>
												<span class="SelectDecorate"></span>
											</ul>
										</div>
									</div>
								</div>
								
								<div class="ExtraForm Space">
								</div>
								
								<div class="FieldWrap Wysiwyg">
									<div class="BorderSpace ">
										<label class="CheckboxLabel">
											<input class="Checkbox" type="checkbox" value="Akkoord" name="voorwaarden" attrChecked="Unchecked"/>
											<p>Ja, ik ga bij het aanmelden akkoord met de 
											<a href="http://192.168.33.10/hulpstation.nl/pdf/voorwaarden.pdf">Algemene voorwaarden</a> van Hulpstation.nl</p>
										</label>
									</div>
								</div>
								
								<div class="FieldWrap">
									<div class="BorderSpace">
										<input class="ActionButton" type="submit" value="verzenden"/>
									</div>
								</div>
							</form>
						</fieldset>
						
						
						<!-- Google Code for Afspraak formulier Conversion Page -->
						<script type="text/javascript">
						/* <![CDATA[ */
						var google_conversion_id = 954870279;
						var google_conversion_language = "en";
						var google_conversion_format = "3";
						var google_conversion_color = "ffffff";
						var google_conversion_label = "tVEaCIP8lWAQh9SoxwM";
						var google_remarketing_only = false;
						/* ]]> */
						
						</script>
						<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
						</script>
						<noscript>
						<div style="display:inline;">
						<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/954870279/?label=tVEaCIP8lWAQh9SoxwM&amp;guid=ON&amp;script=0"/>
						</div>
						</noscript>
						
						
				</div>
				<?php include('includes/sidebar.php'); ?>
				
			</section>

		</div>
	</div>
	
	<?php include('includes/footer.php'); ?>
	<?php include('includes/header.php'); ?>
</div>
<?php include('includes/document_end.php'); ?>