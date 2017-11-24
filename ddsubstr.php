<?php
/**
 * @package    DD_SubStr
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
**/

defined('_JEXEC') or die;

$X_string = '';

if(isset($displayData['X_length']) && !empty($displayData['X_length']))
{
	$X_length = $displayData['X_length'];
}
$M_length     = $displayData['M_length'];
$S_length     = $displayData['S_length'];

$str          = trim($displayData['String']);
$str          = html_entity_decode($str, ENT_COMPAT | ENT_HTML5,'utf-8');

// Get Length
$orgStringLen = strlen(trim($str));

// Result
// Lorem ipsums dolor <span class="hiddenstring-m">sit amet </span>...
// more than $M_length characters, cut and add ...
if ($orgStringLen > $S_length)
{
	if(isset($X_length))
	{
		// Cut $M_length character
		$X_string = mb_substr($str, $M_length, $X_length - $M_length);

		// Collect each word to an array
		$X_string = explode(" ", $X_string );

		if ($orgStringLen > $X_length)
		{
			// Remove last word
			array_splice( $X_string, -1 );
		}

		// Build new string;
		$X_string = implode( " ", $X_string );
	}

	// Cut $M_length character
	$str = mb_substr($str, 0, $M_length);

	// Collect each word to an array
	$str = explode(" ", $str );

	if(isset($X_length)){
		$X_string = '<span class="hiddenstring-x"> ' . end($str) . htmlspecialchars($X_string, ENT_QUOTES, 'UTF-8') . '</span>';
		reset($str);
	}

	// Remove last word
	array_splice( $str, -1 );

	// Build new string;
	$str = implode( " ", $str );

	// more than $S_length characters, cut and add ...
	if ($orgStringLen > $M_length)
	{
		// Cut $S_length character
		$strp1 = mb_substr($str, 0, $S_length);

		// Collect each word to an array
		$strp1 = explode(" ", $strp1 );

		// Get last word
		$strp2 = end($strp1);

		// Cut $S_length-$M_length character
		$strp3 = mb_substr($str, $S_length, $M_length);

		// Remove last word
		array_splice( $strp1, -1 );

		// Build new string1;
		$strp1 = implode( " ", $strp1 );

		echo htmlspecialchars($strp1, ENT_QUOTES, 'UTF-8');
		echo ' <span class="hiddenstring-m">';
			echo htmlspecialchars($strp2, ENT_QUOTES, 'UTF-8');
			echo htmlspecialchars($strp3, ENT_QUOTES, 'UTF-8');
			echo $X_string;
		echo '</span> ...';
	}
	else
	{
		echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8') . ' ...';
	}
	unset($X_length);
}
else
{
	echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
