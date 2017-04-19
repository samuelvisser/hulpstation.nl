<?php
function AddForm($Mysqli, $POST){

	$Choice = $POST['ADD'];
	
	switch($Choice){
		case 'Yes':
?>

<!-- Show als klant is -->
<div class="ExtraForm OldClient Wysiwyg">
	<div class="FieldWrap">
		<div class="Col OneOfTwo">
			<div class="BorderSpace">
				<p>Klantennummer</p>
			</div>
		</div>
		<div class="Col OneOfTwo">
			<div class="BorderSpace">
				<label class="FieldLabel">
					<input class="Field Input Placeholder" type="text" value="AB12345" attrValue="AB12345" attrType="ClientNumber" maxlength="8" AttrValidate="true" name="Klantennummer"/>
				</label>
			</div>
		</div>
	</div>
</div>

<?php
		break;
		case 'No':
?>

<div class="ExtraForm NewClient">
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
				<p>Bezoekersadres</p>
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
</div>

<?php			
		break;
		case 'Maybe':
?>

<div class="ExtraForm ForgetClient">
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
</div>
	
<?php			
		break;
	};
};
?>