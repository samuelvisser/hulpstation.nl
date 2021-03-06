/*==========================================================
Javascrip
==========================================================*/
$(function(){
	
	var $baseUrl	= 'http://192.168.33.10/hulpstation.nl/';
/*==========================================================
Add class = open and remove class = closed
==========================================================*/
	$('.js-open-close-click').on('click', function(){
		
		if($(this).hasClass('open')){
			$(this).removeClass('open');
		}else{
			$(this).addClass('open');
		}
	
		return false;
	});
	


/*==========================================================
Fader
==========================================================*/
	if($('.js-fader').length){
		
		//Variabels
		var	$faderClass					=	'.js-fader'
			$faderActiveClassName		=	'js-active',						//Class name (zonder punt) Active element
			$faderActiveClass			=	'.js-active',						//Class van Active element
			$faderIndicatorLiClass		=	'.js-fader-indicators li',			//Class van li indicator
			$faderSlideClass			=	'.js-fader-slide';
		
		
		
		$('.js-fader-indicators > li').on('click', function(){ 
			
			$faderNumber				=	$(this).data('slide-to');
			$faderTarget				=	$(this).data('target');
			
			//Clear auto slide
			clearInterval($($faderTarget).data('interval'));
			
			//Kijk naar de breedte van de site
			chooseSlide($faderTarget, $faderNumber);
			
			return false;
		});
		
		
		//Kijk naar de breedte van de site
		function chooseSlide($faderTarget, $faderNumber){
			//Update indicator
			$activeIndicator			=	$($faderTarget + ' ' + $faderIndicatorLiClass + $faderActiveClass);
			$newActiveIndicator			=	$($faderTarget + ' ' + $faderIndicatorLiClass + '[data-slide-to=' + $faderNumber + ']');
			
			$activeIndicator.removeClass($faderActiveClassName);
			$newActiveIndicator.addClass($faderActiveClassName);
			
			//Choose slides
			$activeSlide			=	$($faderTarget + ' ' + $faderSlideClass + $faderActiveClass);
			$chosenSlide			=	$($faderTarget + ' ' + $faderSlideClass + ':nth-child(' + $faderNumber + ')');
			
			//Deactiveer slide
			$activeSlide.removeClass($faderActiveClassName);
			
			//Activeer slide
			$chosenSlide.addClass($faderActiveClassName);
			
		}
		
		
		//Slide auto
		$($faderClass).each(function(){
			
			var $faderTarget		=	'#' + $(this).attr('id'),
				$faderDuration		=	$(this).data('duration');

			// Interval slide auto
			var $intervalFader	=	setInterval(function(){
				
				nextSlide($faderTarget);
				
			}, $faderDuration);
			
			$(this).attr({'data-interval'	:	$intervalFader});
			
			
		});
	
	
		//Next slide
		function nextSlide($faderTarget){
			
			$activeSlide			=	$($faderTarget + ' ' + $faderIndicatorLiClass + $faderActiveClass);
				
			//Kijk naar element ernaast die zichtbaar is
			$nextSlideAll			=	$activeSlide.nextAll($faderIndicatorLiClass + ':visible');
			
			if(typeof $nextSlideAll[0] == 'undefined'){
				$faderNumber			=	1;
			}else{
				$faderNumber			=	$nextSlideAll.data('slide-to');
			}
			
			
			chooseSlide($faderTarget, $faderNumber);
			
		}
		
		
	}
	


/*==========================================================
Regex call back form
==========================================================*/	
	if($('.js-ajax-form').length){
	
		var $regexMail 		= /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
			$regexName 		= /^[a-zA-Zл лал╒л?лёл╢─и─Ю─╙л╛л╘л╩лглбл?л╗лЬ│Б│Цл?л?л╚л╕л╣лЭл?л╪лхл?люл?│?│╪л╠л╓─?│а│?лшл?лБлЦлдли─Ц─═─ВлЖлДл?лэлнл?л?л?│?│длулрлслпл╔лВл╙л?лщло│Эл?│х│?лтлылЮ│ул═─н│ │?┴ЖБл║ ,.'-]+$/,
			$regexPhone 	= /^([(]*\+)?(\s*[(]*\d[)]*[-]*){6,30}/;
			
		
		var $form			= $('.js-ajax-form');
		
		
		
		$form.submit(function(e){
			
			$formId = $(this).attr('id');
			
			$formIdName = '#'+$formId; //Nieuw
				
			//Reset error
			$formError = false;
		
			$($formIdName +' .js-required-input').each(function(){
				$field			= $(this);
				$fieldType 		= $field.data('type');
				
				//Reset field error
				$(this).removeClass('js-error-field');
					
				switch($fieldType){
					case 'mail':
						if(!$field.val().match($regexMail)){
							$(this).addClass('js-error-field');
							
							return $formError = true;
						}
					break;
					case 'phone':
						if(!$field.val().match($regexPhone)){
							$(this).addClass('js-error-field');
							
							return $formError = true;
						}
					break;
					case 'name':
						if(!$field.val().match($regexName)){
							$(this).addClass('js-error-field');
							
							return $formError = true;
						}
					break;
				}
				
			});
				
				
			if($formError){
				return false;	
			}else{
				
				//Maak bericht
				$message = '';
		
				$($formIdName +' .input-field').each(function(){
					var $eachName = $(this).attr('name'),
						$eachValue = $(this).val();
						
						$message += $eachName + ': ' + $eachValue + '\r\n';				
				});
				
				
				var $post = $.post( $baseUrl+'ajax/phone', { 
					MESSAGE: $message
				});
		
				$post.done(function($data){	
					$($formIdName).before('<p>Wij danken u voor uw vertrouwen in Hulpstation.nl. Binnen 24 uur neemt een van onze medewerkers contact met u op.</p>');
					$($formIdName).remove();
				});
		
		
		return false;
				
				
			}
		
		});
		

	}
	
});