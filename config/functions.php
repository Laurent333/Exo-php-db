<?php

function getMonth( $monthNum ){
	
	$listMonth = array( 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre' );
	
	return $listMonth[ ( $monthNum - 1 ) ];
		
}


function getDay( $day ){
	
	if( $day == '01' || $day == '1' ) return '1<sup>er</sup>';
	else return $day;
	
}


function datetimeFormat( $datetime, $format = 'dd mm YYYY' ){

	list( $dateData, $timeData ) = explode( ' ', $datetime );
	list( $year, $month, $day ) = explode( '-', $dateData );
	list( $hours, $minutes, $secondes ) = explode( ':', $timeData );
	
	switch ($format) {

        case 'dd mm YYYY' : $dateFormat = getDay($day) . ' ' . getMonth($month) . ' ' . $year;
            break;

        case 'mm YYYY' : $dateFormat = getMonth($month) . ' ' . $year;
            break;

        case 'dd mm YYYY hh:mm:ss' : $dateFormat = getDay($day) . ' ' . getMonth($month) . ' ' . $year . ' ' . $hours . ':' . $minutes . ':' . $secondes;
            break;

        default : $dateFormat = getDay($day) . ' ' . getMonth($month) . ' ' . $year;
            break;
    }

    return $dateFormat;
}


function dateFormat( $date, $format = 'dd mm YYYY' ){
	
	list( $year, $month, $day ) = explode( '-', $date );
	
	switch( $format ){
		
		case 'dd mm YYYY' : $dateFormat = getDay( $day ).' '.getMonth( $month ).' '.$year; break;
		
		case 'mm YYYY' : $dateFormat = getMonth( $month ).' '.$year; break;
		
		default : $dateFormat = getDay( $day ).' '.getMonth( $month ).' '.$year; break;
		
	}
	
	return $dateFormat;
}



function getProcessClass($process, $field, $mainId, $localId)
{
    if (isset($process->result['error'][$field]) && $mainId == $process->result[$localId]) {
        return $process->result['error'][$field];
    }
    return '';
}

function getProcessValue($process, $field, $mainId, $localId)
{
    if (isset($process->result[$field]) && $mainId == $process->result[$localId]) {
        return $process->result[$field];
    }
    return '';
}

/**
 * Display singular or plural
 * @param count $count Number of object
 * @param string $singular Text singular
 * @param string $plural Text plural
 */
function displayPluralText($count = 0, $singular = '', $plural = '')
{
    echo (intval($count) > 1)
        ? str_replace('##', $count, $plural)
        : str_replace('##', $count, $singular)
    ;
}

/**
 * Display the text with formated tag, only if text have changed
 * @staticvar string $writeText Hold the last text displayed
 * @param string $id ID to identify the list
 * @param string $tag Tag where the text is displayed
 * @param string $text Text to display in the tag
 */
function displayTextIfChanged($id, $tag, $text)
{
    static $writeText = array();
    
    if (!isset($writeText[$id]) || $writeText[$id] != $text){
        $writeText[$id] = $text;
        echo str_replace("##", $text, $tag);
    }
}

/**
 * Display the process result message
 * @param process $process Result returned from a Query
 */
function displayProcessResultMessage($process)
{
    if ($process === true){
        echo '<div id="processMessage" class="process_message success"><img src="images/cross.png" />Action effectuée avec succès.</div>';
    } else {
        echo '<div id="processMessage" class="process_message error"><img src="images/cross.png" />Une erreur est survenue:<br>'.$process->result['displayMessage'].'</div>';
    }
}
