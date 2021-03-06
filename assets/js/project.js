var $BaseUrl = 'http://192.168.33.10/hulpstation.nl'
	$Window = $(window),
	$Body = $('body'),
	$RegexName = /^[a-zA-Zл лал╒л?лёл╢─и─Ю─╙л╛л╘л╩лглбл?л╗лЬ│Б│Цл?л?л╚л╕л╣лЭл?л╪лхл?люл?│?│╪л╠л╓─?│а│?лшл?лБлЦлдли─Ц─═─ВлЖлДл?лэлнл?л?л?│?│длулрлслпл╔лВл╙л?лщло│Эл?│х│?лтлылЮ│ул═─н│ │?┴ЖБл║ ,.'-]+$/,
	$RegexMail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
	$RegexMessage = /[a-z0-9A-Z]{1,}/,
	$RegexPhone = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/,
	$RegexZip = /^[0-9]{4}[a-zA-Z]{2}$/,
	$RegexAddress = /^([1-9][e][\s])*([a-zA-Z]+(([\.][\s])|([\s]))?)+[1-9][0-9]*(([-][1-9][0-9]*)|([\s]?[a-zA-Z]+))?$/i,
	$RegexStreet = /^[a-zA-Zл лал╒л?лёл╢─и─Ю─╙л╛л╘л╩лглбл?л╗лЬ│Б│Цл?л?л╚л╕л╣лЭл?л╪лхл?люл?│?│╪л╠л╓─?│а│?лшл?лБлЦлдли─Ц─═─ВлЖлДл?лэлнл?л?л?│?│длулрлслпл╔лВл╙л?лщло│Эл?│х│?лтлылЮ│ул═─н│ │?┴ЖБл║ ,.'-]+$/,
	$RegexHouseNumber = /^\d+[a-zA-Z]*$/,
	$RegexNumber = /^\d+$/,
	$RegexClientNumber = /^[a-zA-Z]{2}[0-9]{3,6}$/;


/*==========================================================
Grid
==========================================================*/


$Body.on('keypress', '' ,function($E){
	var $Grid = $('#Grid'),
		$GridStatus = $Grid.attr('attrActive');
	
	if(($E.which == 59)) {
		if($GridStatus == 'Off'){
			$Grid.attr({'attrActive'	: 'On'});
			$Grid.css({'display'	:	'block'});
		}else{
			$Grid.attr({'attrActive'	: 'Off'});
			$Grid.css({'display'	:	'none'});
		}
	}
});

/*==========================================================
Menu
==========================================================*/

$Body.on('click', '.Burger' ,function(){
	var $AttrStatus = $(this).attr('attrStatus');
	
	switch($AttrStatus){
		case 'Closed':
			$(this).attr({'attrStatus'	:	'Open'});
			$('.MobileDropDown').addClass('Open');
			$('.MobileDarkness').addClass('Open');
		break;
		case 'Open':
			CloseMobileMenu();
		break;
	}
	
	return false;
});

$Body.on('click', '.MobileDarkness' ,function(){
	CloseMobileMenu ();
	return false;
});

function CloseMobileMenu (){
	$('.Burger').attr({'attrStatus'	:	'Closed'});
	$('.MobileDropDown').removeClass('Open');
	$('.MobileDarkness').removeClass('Open');	
}

/*==========================================================
Menu
==========================================================*/

$Body.on('click', '.NoScroll .NavA.Dropdown' ,function(){
	var $AttrStatus = $(this).attr('attrStatus');
	
	switch($AttrStatus){
		case 'Closed':
			CloseDropDowns ();
			$(this).closest('.NavLi').addClass('Open');
			$('.TotalDarkness').css({'display' : 'block'});
			$(this).attr({'attrStatus'	:	'Open'});
			$('#Header').attr({'attrStatus'	:	'Open'});
		break;
		case 'Open':
			CloseDropDowns ();
		break;
	}
	
	return false;
});

$Body.on('keyup', '' ,function($E){
	if($E.which == 27){
		CloseDropDowns ();
	}
});

$Body.on('click', '.TotalDarkness' ,function(){
	CloseDropDowns ();
	return false;
});


function CloseDropDowns (){
	$('.TotalDarkness').css({'display' : 'none'});
	$('.NavLi.Open .NavA').attr({'attrStatus'	:	'Closed'});
	$('#Header').attr({'attrStatus'	:	'Closed'});
	$('.NavLi.Open').removeClass('Open');
};




$Window.bind('scroll', function () {
    var $AttrStatus = $('#Header').attr('attrStatus');
        
        if($('.MobileHeader').css('display') == 'none'){
		
			if ( $Window.scrollTop() > 280 & $AttrStatus == 'Closed'){
	           $('#Header').addClass('Scroll');
	           $('#Header').removeClass('NoScroll');
	           
	           
	           $DistanceHeader = (-200 + ($Window.scrollTop() - 280));
	           
	           if($DistanceHeader > -100){
		           $DistanceHeader = -100;
	           }
	           
	           $('#Header').css({'top': $DistanceHeader+'px'});
	           
	           $DistanceLogo = (-100 + ($Window.scrollTop() - 280));
	           
	           if($DistanceLogo > 0){
		           $DistanceLogo = 0;
	           }
	
	           
	           $('#Logo').css({'top': $DistanceLogo+'px'});
	        }
	        
	    
	        if ( $Window.scrollTop() < 280){
	        	$('#Header').css({'top': '0px'});
	        	$('#Logo').css({'top': '0px'})
	        
	            $('#Header').addClass('NoScroll');
	            $('#Header').removeClass('Scroll');
	        };
		
		}else{
			 $('#Header').removeClass('Scroll');
			 $('#Header').css({'top': '0px'});
		}
     
});


/*==========================================================
Grid



$Body.on('keypress', '' ,function($E){
	var $Grid = $('#Grid'),
		$GridStatus = $Grid.attr('attrActive');
	
	if(($E.which == 59)) {
		if($GridStatus == 'Off'){
			$Grid.attr({'attrActive'	: 'On'});
			$Grid.css({'display'	:	'block'});
		}else{
			$Grid.attr({'attrActive'	: 'Off'});
			$Grid.css({'display'	:	'none'});
		}
	}
});
==========================================================*/

/*==========================================================
FAQ
==========================================================*/

$Body.on('click', '.FaqLi .Question' ,function(){
	var $AttrStatus = $(this).attr('attrStatus');
	
	switch($AttrStatus){
		case 'Closed':
			$(this).closest('.FaqLi').addClass('Open');
			$(this).attr({'attrStatus'	:	'Open'});
		break;
		case 'Open':
			$(this).closest('.FaqLi').removeClass('Open');
			$(this).attr({'attrStatus'	:	'Closed'});
		break;
	};
	
	return false;
});

/*==========================================================
Filter
==========================================================*/

$Body.on('click', '.FilterA.Filter' ,function(){
	var $AttrStatus = $(this).attr('attrStatus');
	
	switch($AttrStatus){
		case 'Closed':
			CloseFilter ();
			$(this).closest('.FilterLi').addClass('Open');
			$(this).attr({'attrStatus'	:	'Open'});
		break;
		case 'Open':
			CloseFilter ();
		break;
	};
	
	return false;
});

function CloseFilter(){
	$('.FilterLi.Open .FilterA').attr({'attrStatus'	:	'Closed'});
	$('.FilterLi.Open').removeClass('Open');
}

/*==========================================================
Filter Open
==========================================================*/

$Body.on('mouseup', '.SelectField' ,function(){
	var $AttrStatus = $(this).attr('attrStatus');
	
	$(this).removeClass('Error');
	
	switch($AttrStatus){
		case 'Closed':
			CloseSelectField ();
			$(this).addClass('Open');
			$(this).next('.SelectUlWrap').addClass('Open');
			$(this).attr({'attrStatus'	:	'Open'});
		
		break;
		case 'Open':
			CloseSelectField ();
		break;
	};
	
	return false;
});


$Body.on('mouseup',function($E){
	var $Options = $('.SelectUl');
	
	if(!$Options.has($E.target).length){
		CloseSelectField ();
	}
});


function CloseSelectField(){
	$('.SelectField').attr({'attrStatus'	:	'Closed'});
	$('.SelectUlWrap.Open').removeClass('Open');
	$('.SelectField.Open').removeClass('Open');
}


/*==========================================================
Filter Select
==========================================================*/

$Body.on('click', '.FilterRight .SelectOption' ,function(){
	var $AttrHref = $(this).attr('attrHref'),
		$Value = $(this).text(),
		$Field = $('.SelectField[attrStatus="Open"] .SelectValue'),
		$Button = $(this).closest('.FilterRight').find('.ActionButton');
		
		$Field.text($Value);
		$Field.attr({'attrHref' : $AttrHref});
		
		$Button.attr({'href' : $AttrHref});
		$Button.attr({'title' : $Value});
	
		CloseSelectField ();
	
	return false;
});

$Body.on('click', '.Form .SelectOption' ,function(){
	var $AttrValue = $(this).attr('attrValue'),
		$Value = $(this).text(),
		$Field = $('.SelectField[attrStatus="Open"] .SelectValue'),
		$HiddenField = $(this).closest('.Selector').find('input[type="hidden"]'),
		$FormName = $('form').attr('name');
		
		$Field.text($Value);
		$Field.attr({'attrValue' : $AttrValue});
		
		$HiddenField.val($AttrValue);
		
		if($FormName = 'Request'){
			AddForm($Value);
		};
		
		CloseSelectField ();
	
	return false;
});

function AddForm($Value){
	var $ClientField = $('.TypeClient'),
		$ExtraForm = $('.ExtraForm');

	switch($Value){
		case 'Ja, ik heb een klantennummer':
			$Choice = 'Yes';
		break;
		case 'Ja, maar ik ben deze kwijt':
			$Choice = 'Maybe';
		break;
		case 'Nee, ik heb geen klantennummer':
			$Choice = 'No';
		break;
	};
	
	var $Post = $.post( $BaseUrl+'ajax/extra_form', { 
			ADD: $Choice
		});
	
	$Post.done(function($Data){	
		
		$ExtraForm.remove();
		$ClientField.after($Data);
	});
};

/*==========================================================
Checked
==========================================================*/

$Body.on('click', '.Checkbox' ,function(){
	$Checked = $(this).attr('attrChecked');
	
	$('.CheckboxLabel').removeClass('Error');
	
	switch($Checked){
		case 'Checked':
			$(this).attr({'attrChecked' : 'Unchecked' });
		break;
		case 'Unchecked':
			$(this).attr({'attrChecked' : 'Checked' });
		break;
	};
});

/*==========================================================
PlaceHolder
==========================================================*/

$Body.on('click', 'input.Field, textarea.Field' ,function(){
	var $Value = $(this).val(),
		$AttrValue = $(this).attr('attrValue');
		
	if($Value == $AttrValue){
		$(this).val('');
		$(this).removeClass('Placeholder');
	}
	
	$(this).closest('.FieldLabel').removeClass('Error');
});


$Body.on('focus', 'input.Field, textarea.Field' ,function(){
	var $Value = $(this).val(),
		$AttrValue = $(this).attr('attrValue');
		
	if($Value == $AttrValue){
		$(this).val('');
		$(this).removeClass('Placeholder');
	}
	
	$(this).closest('.FieldLabel').removeClass('Error');
});



$Body.on('blur', 'input.Field, textarea.Field' ,function(){
	var $Value = $(this).val(),
		$AttrValue = $(this).attr('attrValue');
		
	if($Value == ''){
		$(this).val($AttrValue);
		$(this).addClass('Placeholder');
	}
});


/*==========================================================
Validate
==========================================================*/

$Body.on('submit', 'form' ,function(){
	var $FormName = $(this).attr('name'),
		$NameVal = '',
		$PhoneVal = '',
		$Error = false;
	
	
	$('form[name="'+$FormName+'"] .Field').each(function(){
		$AttrValue = $(this).attr('attrValue'),
		$AtrrType = $(this).attr('attrType');
		
		
		switch($AtrrType){
			case 'Name':
				if(!$(this).val().match($RegexName) || $(this).val() == $AttrValue){
					$(this).closest('.FieldLabel').addClass('Error');
					
					$Error = true;
				}else if($FormName == 'BelMeTerug'){
					$NameVal = $(this).val();
				}
			break;
			case 'Mail':
				if(!$(this).val().match($RegexMail) || $(this).val() == $AttrValue){
					$(this).closest('.FieldLabel').addClass('Error');
					
					$Error = true;
				}
			break;
			case 'Phone':
				if(!$(this).val().match($RegexPhone) || $(this).val() == $AttrValue){
					$(this).closest('.FieldLabel').addClass('Error');
					
					$Error = true;
				}else if($FormName == 'BelMeTerug'){
					$PhoneVal = $(this).val();
				}
			break;
			case 'ZipCode':
				if(!$(this).val().match($RegexZip) || $(this).val() == $AttrValue){
					$(this).closest('.FieldLabel').addClass('Error');
					
					$Error = true;
					
				}
			break;
			case 'Address':
				if(!$(this).val().match($RegexAddress) || $(this).val() == $AttrValue){
					$(this).closest('.FieldLabel').addClass('Error');
					
					$Error = true;
				}
			break;
			case 'HouseNumber':
				if(!$(this).val().match($RegexHouseNumber) || $(this).val() == $AttrValue){
					$(this).closest('.FieldLabel').addClass('Error');
					
					$Error = true;
				}
			break;
			case 'Street':
				if(!$(this).val().match($RegexStreet) || $(this).val() == $AttrValue){
					$(this).closest('.FieldLabel').addClass('Error');
					
					$Error = true;
				}
			break;
			case 'Date':
				$SplitDate = $(this).val().split('-'),
				$ValDate = new Date($MonthNames[$SplitDate[1] - 1] + ' ' + $SplitDate[0] + ' ' + $SplitDate[2]);
				
				if($ValDate == 'Invalid Date' || $(this).val() == $AttrValue){
					$(this).closest('.FieldLabel').addClass('Error');
					
					$Error = true;
				}				
			break;			
			case 'Number':
				if(isNaN($(this).val()) || $(this).val() == $AttrValue){
					$(this).parent().addClass('Error');
					
					$Error = true;
				}
			break;
			case 'ClientNumber':
				if(!$(this).val().match($RegexClientNumber) || $(this).val() == $AttrValue){
					$(this).parent().addClass('Error');
					
					$Error = true;
				}
			break;
			case 'Message':
				if(!$(this).val().match($RegexMessage) || $(this).val() == $AttrValue){
					$(this).parent().addClass('Error');
					
					$Error = true;
				}
			break;
			case 'Hidden':
				if($(this).val() == ''){
					$(this).parent('.SelectField').addClass('Error');
					
					$Error = true;
				}
			break;
			case 'Search':
				if(!$(this).val().match($RegexMessage)){
					$(this).parent('.SelectField').addClass('Error');
					
					$Error = true;
				}
			break;
		}
	});
	
	
	if($Error){
		return false;
	}else if($FormName == 'Apply'){ 
		return true;	
	}else if($FormName == 'Request'){
		$Checked = $('.Checkbox').attr('attrChecked');
		
		switch($Checked){
			case 'Checked':
				
				$Message = '';
				$Page = '';
				
				$('form[name="'+$FormName+'"] .Field').each(function(){
					var $EachName = $(this).attr('name'),
						$EachValue = $(this).val();
						
						
						if($EachName == 'ID'){
							$Page = $EachValue;
						}else{
							$Message += $EachName + ': ' + $EachValue + '\r\n';
						}
					
						
				});
				
				var $Post = $.post( $BaseUrl+'ajax/request', { 
						PAGE: $Page,
						MESSAGE: $Message
					});
				
				$Post.done(function($Data){	
					$('.MessageField').empty();
					$('.MessageField').append($Data);
					
				});
			
				
			break;
			case 'Unchecked':
				$('.CheckboxLabel').addClass('Error');
			break;
		};
		
	
		
		return false;
		
		
	}else if($FormName == 'Contact'){
		
		$Message = '';
		
		$('form[name="'+$FormName+'"] .Field').each(function(){
			var $EachName = $(this).attr('name'),
				$EachValue = $(this).val();
				
				$Message += $EachName + ': ' + $EachValue + '\r\n';				
		});
		
		var $Post = $.post( $BaseUrl+'ajax/contact', { 
				MESSAGE: $Message
			});
		
		$Post.done(function($Data){	
			$('.MessageField').empty();
			$('.MessageField').append($Data);
			
		});
		
		
		return false;
		
	}else if($FormName == 'Phone'){
		
		$Message = '';
		
		$('form[name="'+$FormName+'"] .Field').each(function(){
			var $EachName = $(this).attr('name'),
				$EachValue = $(this).val();
				
				$Message += $EachName + ': ' + $EachValue + '\r\n';				
		});
		
		var $Post = $.post( $BaseUrl+'ajax/phone', { 
				MESSAGE: $Message
			});
		
		$Post.done(function($Data){	
			$('.ActionBlock').empty();
			$('.ActionBlock').append($Data);
			
		});
		
		
		return false;
	}
});