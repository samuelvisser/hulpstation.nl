<?php include('system/file_form.php'); ?>
<?php include('includes/document_start.php'); ?>

<div class="_new-style-guide">
	<?php include('includes/new/header.php'); ?>
</div>

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

<?php if(!$Submitted){ ?>
					
					<div class="BorderSpace Wysiwyg">
						<div class="_wysiwyg">
							<h1>Sollicitatieformulier</h1>
						</div>
					</div>
					<fieldset class="FormWrap Form">
						<form name="Apply" method="POST" enctype="multipart/form-data" action="<?php echo CreateUrl($Mysqli, $PageSegment, '/'.$PageSegment); ?>">								
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<p>Voornaam</p>
									</div>
								</div>
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<label class="FieldLabel">
											<input class="Field Input Placeholder" type="text" value="" attrValue="" attrType="Name" AttrValidate="true" name="Voornaam"/>
										</label>
									</div>
								</div>
							</div>
							
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<p>Achternaam</p>
									</div>
								</div>
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<label class="FieldLabel">
											<input class="Field Input Placeholder" type="text" value="" attrValue="" attrType="Name" AttrValidate="true" name="Achternaam"/>
										</label>
									</div>
								</div>
							</div>
							
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<p>Telefoonnummer</p>
									</div>
								</div>
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<label class="FieldLabel">
											<input class="Field Input Placeholder" type="text" value="0123456789" attrValue="0123456789" attrType="Phone" AttrValidate="true" name="Telefoonnummer"/>
										</label>
									</div>
								</div>
							</div>
							
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<p>Mailadres</p>
									</div>
								</div>
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<label class="FieldLabel">
											<input class="Field Input Placeholder" type="text" value="mail@mail.com" attrValue="mail@mail.com" attrType="Mail" AttrValidate="true" name="Mailadres"/>
										</label>
									</div>
								</div>
							</div>
							
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<p>Adres</p>
									</div>
								</div>
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<label class="FieldLabel">
											<input class="Field Input Placeholder" type="text" value="Straatnaam 1" attrValue="Straatnaam 1" attrType="Address" AttrValidate="true" name="Bezoekersadres"/>
										</label>
									</div>
								</div>
							</div>
							
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<p>Postcode</p>
									</div>
								</div>
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<label class="FieldLabel">
											<input class="Field Input Placeholder" type="text" value="1234AB" attrValue="1234AB" attrType="ZipCode" maxlength="6" AttrValidate="true" name="Postcode"/>
										</label>
									</div>
								</div>
							</div>
							
							
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<p>Plaats</p>
									</div>
								</div>
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<label class="FieldLabel">
											<input class="Field Input Placeholder" type="text" value="" attrValue="" attrType="Name" AttrValidate="true" name="Plaats"/>
										</label>
									</div>
								</div>
							</div>
							
							
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<p>Cv</p>
									</div>
								</div>
								<div class="Col OneOfTwo">
									<div class="BorderSpace">
										<label class="FieldLabel">
											<input class="Field Input Placeholder" type="file" value="upload uw cv" AttrValidate="false" name="cv"/>
										</label>
									</div>
								</div>
							</div>
							
							
							
							<div class="FieldWrap Wysiwyg">
								<div class="Col OneOfOne">
									<div class="BorderSpace">
										<label class="FieldLabel Textarea">
											<textarea class="Field Textarea Placeholder" attrValue="Motivatie" attrType="Message" AttrValidate="true" name="Motivatie">Motivatie</textarea>
										</label>
									</div>
								</div>
							</div>
							
							
							<div class="FieldWrap">
								<div class="BorderSpace">
									<input class="ActionButton" type="submit" value="verzenden" name="Submit"/>
								</div>
							</div>
						</form>
					</fieldset>
						
<?php }else{ ?>
					
					<div class="BorderSpace Wysiwyg">
						<div class="_wysiwyg">
							<h1>Bedankt voor je sollicitatie.</h1>
						</div>
						<p>Wij nemen zo spoedig mogelijk contact met je op.</p>
					</div>
<?php } ?>

				</div>
				<div class="Col ThreeOfEight SideBar Wysiwyg">
					<section class="BorderSpace">
					<div class="_wysiwyg">
						<h3 class="_h2-heading">Technologie nieuws</h3>
					</div>
					
					
	<p><script id="feed-1424702780359281" type="text/javascript" src="http://rss.bloople.net/?url=http%3A%2F%2Fwww.nu.nl%2Frss%2Finternet&detail=10&limit=4&showtitle=false&type=js&id=1424702780359281"></script></p>
					
							
					</section>
				</div>
			</section>

		</div>
	</div>
	
	<div class="_new-style-guide">
	<?php include('includes/new/footer.php'); ?>
	</div>
	
</div>
<?php include('includes/document_end.php'); ?>