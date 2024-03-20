<?php

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

include( "unregister_globals.php" );

// **********************************************************************************
// ***************                    Page Variables                      ***********
// **********************************************************************************

unregister_globals();

$pwd      = exec ( '/bin/pwd' );
$basename = exec ( "/bin/basename $pwd" );

// **********************************************************************************
// ***************                Page Base and Buttons                   ***********
// **********************************************************************************

$expid = exec ( '/bin/cat ../../../../expid' );

if( $usrid == "" ) { $content = <<<EOF
                     <title>
                     EXPID: $expid
                     </title>
                     <H1 align=center >
                     <font color=darkred>
                     GMAO Experiment: $expid <br>
                     Directory: $basename
                     </font> </H1>
EOF;
}

echo $content;

// **********************************************************************************
// ***************                     Page Contents                      ***********
// **********************************************************************************

$content = <<<EOF

<center>
<br>

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left> <ul> </ul>
      <ul>
EOF;
echo $content;

             chdir("$pwd");
$content = scandir("$pwd");

// **********************************************************************************
// ***************                      List Files                        ***********
// **********************************************************************************

foreach( $content as $file )
       { if( $file != "."  &&
             $file != ".." &&
             $file != "CVS" )  
                if( !is_dir($file) ) { echo "<li> <a href=$file> <u> (File) $file </u> </a> </li>"; }
       }

// **********************************************************************************
// ***************                      End Table                         ***********
// **********************************************************************************

$content = <<<EOF
     </ul>
      <ul> </ul> </td>
</tr>
</table>
<br> <br>
 <li> <a href="../../../../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</ul>
</center>

EOF;

// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************
echo $content; 
return;

?>