<?php
class M_stringlib extends CI_Model {
 
    public function __construct(){
	date_default_timezone_set('Asia/Bangkok');
        parent::__construct();
	}
	
	public function useMD5($str1, $str2) {
		return hash("MD5", $str1 . $str2, FALSE);
	}
	
	public function uniqueNum10 () {
		$random = substr(number_format(time() * rand(),0,'',''),0,10);
		return $random;
	}
	
	public function uniqueNum6 () {
		$random = substr(number_format(time() * rand(),0,'',''),0,6);
		return $random;
	}
	public function uniqueAlphaNum6 () {
		$random = substr(md5(time() * rand()),0,6);
		return $random;
	}
	
	public function uniqueAlphaNum10 () {
		$random = substr(md5(time() * rand()),0,10);
		return $random;
	}
	
	public function uniqueAlphaNum20 () {
		$random = substr(md5(time() * rand()),0,20);
		return $random;
	}
	
	public function isBlank ($str) {
		
	}
	
	public function isnot_sql_injection ($str) {
		$is_valid = true;
		
		if(preg_match('/SELECT/i',$str))
			$result = false;
		if(preg_match('/DELETE/i',$str))
			$result = false;
		if(preg_match('/UPDATE/i',$str))
			$result = false;
		if(preg_match('/INSERT/i',$str))
			$result = false;
		if(preg_match('/UNION/i',$str))
			$result = false;
		
		return $result;
	}
	public function changeFormatTimeForShow($time){
		$month	=	substr($time,5,2);
		switch($month){
			case 01: case '01': return substr($time,8,2).' Jan.';
				break;
			case 02: case '02':	return substr($time,8,2).' Feb '.substr($time,0,4);
				break;
			case 03: case '03':	return substr($time,8,2).' Mar '.substr($time,0,4);
				break;
			case 04: case '04':	return substr($time,8,2).' Apr '.substr($time,0,4);
				break;
			case 05: case '05':	return substr($time,8,2).' May '.substr($time,0,4);
				break;
			case 06: case '06':	return substr($time,8,2).' Jun '.substr($time,0,4);
				break;
			case 07: case '07':	return substr($time,8,2).' Jul '.substr($time,0,4);
				break;
			case 08: case '08':	return substr($time,8,2).' Aug '.substr($time,0,4);
				break;
			case 09: case '09':	return substr($time,8,2).' Sep '.substr($time,0,4);
				break;
			case 10: case '10':	return substr($time,8,2).' Oct '.substr($time,0,4);
				break;
			case 11: case '11':	return substr($time,8,2).' Nov '.substr($time,0,4);
				break;
			case 12: case '12':	return substr($time,8,2).' Dec '.substr($time,0,4);
				break;
			
		}
	}
	
	public function changeFormatTimeForShowAndTime($time){
		$month	=	substr($time,5,2);
		switch($month){
			case 01: case '01': return substr($time,8,2).' Jan.';
				break;
			case 02: case '02':	return substr($time,8,2).' Feb '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 03: case '03':	return substr($time,8,2).' Mar '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 04: case '04':	return substr($time,8,2).' Apr '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 05: case '05':	return substr($time,8,2).' May '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 06: case '06':	return substr($time,8,2).' Jun '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 07: case '07':	return substr($time,8,2).' Jul '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 08: case '08':	return substr($time,8,2).' Aug '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 09: case '09':	return substr($time,8,2).' Sep '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 10: case '10':	return substr($time,8,2).' Oct '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 11: case '11':	return substr($time,8,2).' Nov '.substr($time,0,4).' '.substr($time,11,5);
				break;
			case 12: case '12':	return substr($time,8,2).' Dec '.substr($time,0,4).' '.substr($time,11,5);
				break;
			
		}
	}
	
	function timeAgo ($time){
	    $time = time() - $time; // to get the time since that moment
	    $tokens = array (
		31536000 => $this->lang->line('yearsAgo'),
		2592000 => $this->lang->line('monthsAgo'),
		604800 => $this->lang->line('weeksAgo'),
		86400 => $this->lang->line('daysAgo'),
		3600 => $this->lang->line('hoursAgo'),
		60 => $this->lang->line('minutesAgo'),
		1 => $this->lang->line('secondsAgo')
	    );
	    foreach ($tokens as $unit => $text) {
		if ($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		//echo $numberOfUnits.' '.$text.' ';
		if($time > 86400 && $time < 172800){
		    return $this->lang->line('yesterday');
		}
		else{
		    return $numberOfUnits.' '.$text/*.(($numberOfUnits>1)?'s':'')*/;
		}
	    }
	}
	
	function timeOfWeek(){
	    $time=time();
	    $num_cur_day=(int)date("N",$time);
	    $day_to_end_week=7-$num_cur_day;
	    $day_to_start_week=$num_cur_day-1;
	    $start_cur_week  = mktime(0, 0, 0, date("m",$time),   date("d",$time)-$day_to_start_week,   date("Y",$time));
	    $end_cur_week  = mktime(0, 0, 0, date("m",$time),   date("d",$time)+$day_to_end_week,   date("Y",$time));
	    $start = date("Y-m-d H:i:s",$start_cur_week);
	    $end = date("Y-m-d H:i:s",$end_cur_week);
	    return array('start'=>$start,'end'=>$end);
	}
	
	function month_word_to_int($month){
	    $_month['Jan']	=	1;
	    $_month['Feb']	=	2;
	    $_month['Mar']	=	3;
	    $_month['Apr']	=	4;
	    $_month['May']	=	5;
	    $_month['Jun']	=	6;
	    $_month['Jul']	=	7;
	    $_month['Aug']	=	8;
	    $_month['Sep']	=	9;
	    $_month['Oct']	=	10;
	    $_month['Nov']	=	11;
	    $_month['Dec']	=	12;
	    return substr($month,7,4).'-'.$_month[substr($month,3,3)].'-'.substr($month,0,2);
	}
	
}
?>