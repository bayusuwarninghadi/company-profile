<?php

function isEmail($email)
{
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function quarterMonthArray()
{
	return array(
		array('id' => '3', 'name' => 'Maret'),
		array('id' => '6', 'name' => 'Juny'),
		array('id' => '9', 'name' => 'September'),
		array('id' => '12', 'name' => 'December')
	);
}

function monthArray()
{
	return array(
		array('id' => '1', 'name' => 'January'),
		array('id' => '2', 'name' => 'February'),
		array('id' => '3', 'name' => 'Maret'),
		array('id' => '4', 'name' => 'April'),
		array('id' => '5', 'name' => 'Mey'),
		array('id' => '6', 'name' => 'Juny'),
		array('id' => '7', 'name' => 'July'),
		array('id' => '8', 'name' => 'August'),
		array('id' => '9', 'name' => 'September'),
		array('id' => '10', 'name' => 'October'),
		array('id' => '11', 'name' => 'November'),
		array('id' => '12', 'name' => 'December')
	);
}

function escape_string($string)
{
	$string = preg_replace('/^([0-9])/', '\\\\\\\\\1', $string);
	$string = preg_replace('/([a-z])/i', '\\\\\1', $string);
	return $string;
}

function randomPassword($lenght = 5)
{
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	$pass = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < $lenght; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	return implode($pass); //turn the array into a string
}

function format_date($date, $dateformat = 'j F Y')
{

	$month = array('', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$month_short = array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	$day = array('', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	$day_short = array('', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
	$ampm = array('AM' => 'AM', 'PM' => 'PM', 'am' => 'am', 'pm' => 'pm');


	$time = strtotime($date);
	$dateformat = preg_replace('|(?<!\\\)F|', escape_string($month[date('n', $time)]), $dateformat);
	$dateformat = preg_replace('|(?<!\\\)M|', escape_string($month_short[date('n', $time)]), $dateformat);
	$dateformat = preg_replace('|(?<!\\\)l|', escape_string($day[date('N', $time)]), $dateformat);
	$dateformat = preg_replace('|(?<!\\\)D|', escape_string($day_short[date('N', $time)]), $dateformat);
	$dateformat = preg_replace('|(?<!\\\)A|', escape_string($ampm[date('A', $time)]), $dateformat);
	$dateformat = preg_replace('|(?<!\\\)a|', escape_string($ampm[date('a', $time)]), $dateformat);
	return date($dateformat, $time);
}

function format_money($number)
{
	return "Rp. " . number_format($number, 2);
}

function mail_replace_data($content, $replace = array())
{
	foreach ($replace as $key => $data) {
		if (!is_array($data)) {
			$content = str_replace('{#' . $key . '}', $data, $content);
		}
	}
	return $content;
}

function mail_beauty($content, $signature)
{
	$return = "
		<div style='border-bottom: 1px solid #000;'>
            <img style='margin: 10px;' src='http://www.flowlace.com/images/logo-image.png' />
        </div>
        <div style='margin: 10px'>";

	$return .= $content;

	if ($signature) {
		$return .= $signature;
	}

	$return .=
		"</div>
        <div style='padding: 10px; background: #000; color: #fff; padding: 20px; '>
            Copyright flowlace 2014 - present
        </div>";
	return $return;
}

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' / ', $home = 'Home', $url = '') {
    $url = $url == '' ? $_SERVER['REQUEST_URI'] : $url;
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($url, PHP_URL_PATH)));

    $base = 'http://'.$_SERVER['HTTP_HOST'] . '/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<li><a href=\"$base\">$home</a></li>");

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));

    // Build the rest of the breadcrumbs
    $url = '';
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));
        $url = $url == '' ? $url.=$crumb : $url.= '/'.$crumb;
        // If we are not on the last index, then display an <a> tag
        $breadcrumbs[] = "<a href=\"$base$url\">$title</a>";

    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}


?>