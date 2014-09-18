<?php
/*
*	Run in command line: php test.cash.machine.php
*/
require_once "cash.machine.php";

print "\nInput: 30\n";
print_r( CashMachine::getBillsOfAmount(30) );

print "\nInput: 80\n";
print_r( CashMachine::getBillsOfAmount(80) );

print "\nInput: Null\n";
print_r( CashMachine::getBillsOfAmount(null) );

try {
    print "\nInput: -130\n";
    print_r( CashMachine::getBillsOfAmount(-130) );
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

try {
    print "\nInput: 125\n";
    print_r( CashMachine::getBillsOfAmount(125) );
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

