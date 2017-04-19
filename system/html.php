<?php 
function CreatHtml($Mysqli, $Value){
		$HTMLReplacementCharacters = array(
			'"',
			'&lsquo;',
			'&rsquo;',
			'&ldquo;',
			'&rdquo;',
			'&euro;',
			'<', 
			'>',
			' ',
			' '
		);
		
		$HTMLCharacters = array(
			'[quote]',
			'[left single quote]',
			'[right single quote]',
			'[left double quote]',
			'[right double quote]',
			'[euro]',
			'[', 
			']',
			'<script',
			'<?'
		);
		
		$Value = str_replace($HTMLCharacters, $HTMLReplacementCharacters, $Value);
		
		return $Value;
}

function CleanHtml($CharacterBefore, $CharacterAfter, $Value){
		
		$Value = ' '.$Value.$CharacterAfter;
		$BeforeCharacter = strpos($Value, $CharacterBefore);
		$AfterCharacter = strpos($Value, $CharacterAfter);
		$TotalCharacters = 200;
		$NewValue = $Value;
		
		if(!empty($AfterCharacter) && !empty($BeforeCharacter)){
			$NewValue = substr($Value, 0, $BeforeCharacter);
			$NewValue .= substr($Value, ($AfterCharacter+1), $TotalCharacters);
			
			return CleanHtml($CharacterBefore, $CharacterAfter, $NewValue);
		}else{
			$RemoveCharacters = array(
				$CharacterBefore,
				$CharacterAfter
			);
			
			$NewValue = str_replace($RemoveCharacters, '', $NewValue);
			
			return $NewValue;
		}
};
?>