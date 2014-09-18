<?php

class GroupByInterval {

	public static function withRangeAndSet( $range, $numberSet=array() ){
	
		if(is_null($range)){
		      return array();
		}
	
		$result=array();
	
		foreach($numberSet as $number){
		
		      if(!is_int($number)) {		      
			   throw new InvalidArgumentException('Invalid item in number set: '.$number);	
		      }
		
		      $ceil=ceil($number/$range);
		      $result[$ceil][]=$number;
		}
		
		foreach($result as $k => $v){
		      $result[$k]=self::quicksort($v);
		}	
		
		$orderedRanges=self::quicksort( array_keys($result) );
		
		$allRanges=array();
		foreach($orderedRanges as $i) {
		    $allRanges[]=$result[ $i ];
		}
		
		return $allRanges;
	}

	protected static function quicksort($seq) {
	    if(!count($seq)) return $seq;
	    $pivot= $seq[0];
	    $low = $high = array();
	    $length = count($seq);
	    for($i=1; $i < $length; $i++) {
		if($seq[$i] <= $pivot) {
		    $low [] = $seq[$i];
		} else {
		    $high[] = $seq[$i];
		}
	    }
	    return array_merge(self::quicksort($low), array($pivot), self::quicksort($high));
	}	
}