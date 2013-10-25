<?php
$wgHooks['ParserFirstCallInit'][] = 'wfFlattrTag';

function wfFlattrTag(&$parser) {
	$parser->setHook( 'FlattrTag', 'wfFlattrInclude' );
	
	return true;
}

function wfFlattrInclude( $contents, $attributes, $parser ) {
	$title = Title::newFromText('Flattr', 4 /*project*/, 177);
	return wfFlattrTagInclude( $title->getFullURL(), "Flattr me!" );
}

function wfFlattrTagInclude($href, $title, $iurl=null) {
	global $wgStylePath;

	if( empty($iurl) ) {	}
	return '<a class="FlattrButton" style="display:none;" href="http://de.wikiunity.com"></a>
<noscript><a href="http://flattr.com/thing/455985/Wikiunity" target="_blank">
<img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a></noscript>';
}
