<?php

$wgExtensionCredits['parserhook'][] = array(
        'name' => 'Flattr 1.0',
        'url' => 'http://de.wikiunity.com',
        'author' => '[http://de.community.wikiunity.com/wiki/User:McCouman <span style="color:#000;">Michael McCouman jr.</span>]',
        'description' => 'Einbinden des Flattr Buttons f&uuml;r Wikiunity',
		'version' => 'version 0.1',
);


$wgHooks['BeforePageDisplay'][] = 'wfColFlattrJS';

function wfColFlattrJS() {
 global $wgOut;
 $wgOut->addHeadItem("flattr.js",'<script type="text/javascript" src="/w/extensions/Flattr/flattr.js"></script>');
 return true;
}

/*Flattr Tag (Großer Zähler)*/
$wgHooks['ParserFirstCallInit'][] = 'wfFlattrTag';
function wfFlattrTag(&$parser) {
	$parser->setHook( 'Flattrbutton', 'wfFlattrInclude' );	
	return true;}
function wfFlattrInclude( $contents, $attributes, $parser ) {
	$title = Title::newFromText('Flattr', 4 /*project*/, 177);
	return wfFlattrTagInclude( $title->getFullURL(), "Flattr me!" );}
function wfFlattrTagInclude($href, $title, $iurl=null) {
	global $wgStylePath;
	if( empty($iurl) ) {	}
	return '
	<a class="FlattrButton" style="display:none;" href="http://de.wikiunity.com"></a>
<noscript><a href="http://flattr.com/thing/455985/Wikiunity" target="_blank">
<img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a></noscript>
';}

/*Flattr Tag (Kompakter Zähler)*/
$wgHooks['ParserFirstCallInit'][] = 'wfFlattrCompactTag';
function wfFlattrCompactTag(&$parser) {
	$parser->setHook( 'Flattrcompact', 'wfFlattrCompactInclude' );	
	return true;}
function wfFlattrCompactInclude( $contents, $attributes, $parser ) {
	$title = Title::newFromText('Flattr', 4 /*project*/, 177);
	return wfFlattrCompactTagInclude( $title->getFullURL(), "Flattr me!" );}
function wfFlattrCompactTagInclude($href, $title, $iurl=null) {
	global $wgStylePath;
	if( empty($iurl) ) {	}
	return '
<a class="FlattrButton" style="display:none;" rev="flattr;button:compact;" href="http://de.wikiunity.com"></a>
<noscript><a href="http://flattr.com/thing/455985/Wikiunity" target="_blank">
<img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a></noscript>
';}

/*Flattr Tag (Statisch)*/
$wgHooks['ParserFirstCallInit'][] = 'wfFlattrStaticTag';
function wfFlattrStaticTag(&$parser) {
	$parser->setHook( 'flattrstatic', 'wfFlattrStaticInclude' );	
	return true;}
function wfFlattrStaticInclude( $contents, $attributes, $parser ) {
	$title = Title::newFromText('Flattr', 4 /*project*/, 177);
	return wfFlattrStaticTagInclude( $title->getFullURL(), "Flattr me!" );}
function wfFlattrStaticTagInclude($href, $title, $iurl=null) {
	global $wgStylePath;
	if( empty($iurl) ) {	}
	return '
<a href="http://flattr.com/thing/455985/Wikiunity" target="_blank">
<img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a>
';}


/*Flattr Tag (McCouman1)*/
$wgHooks['ParserFirstCallInit'][] = 'wfFlattrMCTag';
function wfFlattrMCTag(&$parser) {
	$parser->setHook( 'flattrmcstatic', 'wfFlattrMCInclude' );	
	return true;}
function wfFlattrMCInclude( $contents, $attributes, $parser ) {
	$title = Title::newFromText('Flattr', 4 /*project*/, 177);
	return wfFlattrMCTagInclude( $title->getFullURL(), "Flattr me!" );}
function wfFlattrMCTagInclude($href, $title, $iurl=null) {
	global $wgStylePath;
	if( empty($iurl) ) {	}
	return '
<a class="FlattrButton" style="display:none;" href="https://flattr.com/profile/McCouman">Flattr McCouman</a>
<noscript><a href="http://flattr.com/thing/257518/McCouman-on-Flattr" target="_blank">
<img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a></noscript>
';}

/*Flattr Tag (McCouman2 Kompakt)*/
$wgHooks['ParserFirstCallInit'][] = 'wfFlattrMCcompactTag';
function wfFlattrMCcompactTag(&$parser) {
	$parser->setHook( 'flattrmc', 'wfFlattrMCcompactInclude' );	
	return true;}
function wfFlattrMCcompactInclude( $contents, $attributes, $parser ) {
	$title = Title::newFromText('Flattr', 4 /*project*/, 177);
	return wfFlattrMCcompactTagInclude( $title->getFullURL(), "Flattr me!" );}
function wfFlattrMCcompactTagInclude($href, $title, $iurl=null) {
	global $wgStylePath;
	if( empty($iurl) ) {	}
	return '
<a class="FlattrButton" style="display:none;" rev="flattr;button:compact;" href="https://flattr.com/profile/McCouman">Flattr McCouman</a>
<noscript><a href="http://flattr.com/thing/257518/McCouman-on-Flattr" target="_blank">
<img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a></noscript>';}

/*Flattr Tag (QR-Code)*/
#Siehe Code als PDF für Wikiunity: http://upload.wikiunity.com/wikiunity/pdf/455985.pdf
#Finde mehr auf der App: https://flattr.com/offline

