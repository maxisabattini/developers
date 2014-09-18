<?php
/*
*	Run in command line: php test.group.php
*/
require_once "group.php";

$input = array( 10, 1, -20,  14, 99, 136, 19, 20, -15, 117, 22, 93,  120, 131 );
print "\nInput:" . implode(",",$input);
print "\nOutput:";
print_r( GroupByInterval::withRangeAndSet(10, $input ) );

$input = array( 10, 1, -20,  14, 99, 136, 19, 20, 117, 22, 93, 120, 131 );
print "\nInput:" . implode(",",$input);
print "\nOutput:";
print_r( GroupByInterval::withRangeAndSet(15, $input ) );

try {
    $input = array( 10, 1, "A",  14, 99, 133, 19, 20, 117, 22, 93,  120, 131 );
    print "\nInput:" . implode(",",$input);
    print "\nOutput:";
    print_r( GroupByInterval::withRangeAndSet(15, $input ) );
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

print "\nInput: NULL";
print "\nOutput:";
print_r( GroupByInterval::withRangeAndSet(null, array() ) );
