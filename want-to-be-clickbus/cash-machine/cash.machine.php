<?php

class CashMachine {

    protected static $_availableBills = array(
	100,
	50,
	20,
	10
    );

    public static function getBillsOfAmount($amount){
    
	if($amount < 0) {
	    throw new InvalidArgumentException('Invalid negative amount: '.$amount);
	}

	$resultBills=array();

	$leftAmount=$amount;
	$resultAmount=0;
	foreach(self::$_availableBills as $bill){    	
	    $count= (int) ($leftAmount/$bill);
	    if($count) {
	      for($i=0; $i<$count;$i++) $resultBills[]=$bill;
	      $resultAmount+=$bill*$count;	  
	      $leftAmount=$leftAmount%$bill;
	    }      
	}
	
	if($amount != $resultAmount) {
	    throw new InvalidArgumentException('Invalid input amount: '.$amount);
	}	
	
	return $resultBills;    
    }
}



