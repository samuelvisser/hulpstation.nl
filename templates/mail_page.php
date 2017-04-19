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
					<div class="BorderSpace Wysiwyg">
						<div class="_wysiwyg">
							<h1>We horen graag van u.</h1>
						</div>
					</div>
						<fieldset class="FormWrap Form">
							<form name="Contact" method="POST">
								
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
									<div class="Col OneOfOne">
										<div class="BorderSpace">
											<label class="FieldLabel Textarea">
												<textarea class="Field Textarea Placeholder" attrValue="Uw bericht" attrType="Message" AttrValidate="true" name="Bericht">Uw bericht</textarea>
											</label>
										</div>
									</div>
								</div>
								
								
								<div class="FieldWrap">
									<div class="BorderSpace">
										<input class="ActionButton" type="submit" value="verzenden"/>
									</div>
								</div>
							</form>
						</fieldset>
				</div>
				<div class="Col ThreeOfEight SideBar Wysiwyg">
					<section class="BorderSpace">
											
						
					</section>
					
				</div>
				<?php include('includes/sidebar.php'); ?>
			</section>

		</div>
	</div>
	
	<div class="_new-style-guide">
	<?php include('includes/new/footer.php'); ?>
	</div>
	
</div>
<?php include('includes/document_end.php'); ?>