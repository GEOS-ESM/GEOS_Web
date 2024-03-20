<?php

// *************************************************************************************
// ***************    Function to include Comparison Experiments             ***********
// ***************                                                           ***********
// ***************  For each experiment to compare, include an entry in      ***********
// ***************  the function array.  For multiple experiments, use       ***********
// ***************  a comma as delimeter.                                    ***********
// ***************                                                           ***********
// ***************  Examples:                                                ***********
// ***************   0 Experiments:  $cmpexps = array();                     ***********
// ***************   1 Experiments:  $cmpexps = array( e0001 );              ***********
// ***************   2 Experiments:  $cmpexps = array( e0001,e0002 );        ***********
// ***************   3 Experiments:  $cmpexps = array( e0001,e0002,e0003 );  ***********
// ***************                                                           ***********
// *************************************************************************************

function set_exps ($verification) {
$cmpexps = array( "v11.3.2_L072_C180_EMIP" );
foreach ( $cmpexps as $exp ) 
        { if( "$exp" != "" ) set_item ( $verification,"$exp","$exp" ); }
return; }

?>
