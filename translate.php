<?php
if(isset($_GET['lang'])) //check if ?lang is set, this is the way we use to switch language
{
    $lang = $_GET['lang'];

    $_SESSION['lang'] = $lang;
    session_set_cookie_params('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isset($_SESSION['lang'])) //check if there is a $_SESSION['lang'] to use that language
{
    $lang = $_SESSION['lang'];
}
else if(isset($_COOKIE['lang'])) //check if there is a Cookie with a slected language, to use that language
{
    $lang = $_COOKIE['lang'];
    $_SESSION['lang'] = $lang;
}
else //if nothing, set the lang to out default ('en'), also set $_SESSION['lang'] and create a cookie
{
    $lang = 'en';
	
    $_SESSION['lang'] = $lang;
    session_set_cookie_params('lang', $lang, time() + (3600 * 24 * 30));
}

//Check if there is need to translate
if($lang!='en'){
	global $phrases;
	$lang_path=("translations/".$lang.".xml"); //dir to all xml files
	$xml=simplexml_load_file($lang_path); 
    //get phrases and store them into array
    foreach($xml->children() as $phrase) {
    	$phrase_name = $phrase->name;
		$value = $phrase->value;
    	$phrases[''.$phrase_name] = $value; //''.$phrase_name is here instead of simply $phrase_name, because I encountered an issue in wamp php version. Alter freely and check for warning & errors.
    }
}

function tr($text){
	global $phrases; //get phrases
	if(is_numeric($text)){
		$translated_text = $text; //if the text is numeric, then no need to translate it
	} else {
	$lang = $_SESSION['lang'];
	if($lang == "en"){
		$translated_text = $text; //Check if there is need to translate
	} else {
		if(!isset($phrases[$text])){
			//TODO: ADD WORD FOR TRANSLATION!
			//Probably just add to a file.
			$translated_text = "_".$text."_";
		} else {
			$translated_text = $phrases[$text]; //Translate from xml
		}
	} }
	return $translated_text;
}
?>
