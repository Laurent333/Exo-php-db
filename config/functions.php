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
	list( $hour, $minutes, $secondes ) = explode( ':', $timeData );
	
	switch( $format ){
		
		case 'dd mm YYYY' : 			$dateFormat = getDay( $day ).' '.getMonth( $month ).' '.$year; break;
		
		case 'mm YYYY' : 				$dateFormat = getMonth( $month ).' '.$year; break;
		
		case 'dd mm YYYY hh:mm:ss' : 	$dateFormat = getDay( $day ).' '.getMonth( $month ).' '.$year.' '.$hours.':'.$minutes.':'.$secondes; break;	
		
		default : $dateFormat = getDay( $day ).' '.getMonth( $month ).' '.$year; break;
		
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

?>