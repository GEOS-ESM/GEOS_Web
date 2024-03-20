<?php

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

include( "unregister_globals.php" );

// **********************************************************************************
// ***************                    Page Variables                      ***********
// **********************************************************************************

unregister_globals();

$PARAM = array_merge($_GET, $_POST);
$dir   = urlencode($PARAM['dir']);
$expid = urlencode($PARAM['expid']);
$usrid = urlencode($PARAM['usrid']);
$dir   = str_replace( '%2F', '/', $dir );

include("globals.php");

// **********************************************************************************
// ***************                Page Base and Buttons                   ***********
// **********************************************************************************

// $usrid = exec ( '/bin/cat usrid' );

if( $expid == "" ) { 
                     if( $usrid == "" ) $usrid = exec ( '/bin/cat ../usrid' );
                     $content = <<<EOF
                     <title>
                     USRID: $usrid
                     </title>
                     <H1 align=center >
                     <font color=darkred>
                     USRID: $usrid <br>
                     Directory: $dir
                     </font> </H1>
EOF;
}

if( $usrid == "" ) { $content = <<<EOF
                     <title>
                      $expid
                     </title>
                     <H1 align=center >
                     <font color=darkred>
                     EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
                     Directory: $dir
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

$basedir = "$exppath/$dir";  
$space  = " &nbsp; ";
$space2 = " &nbsp;&nbsp; ";
$space3 = " &nbsp;&nbsp;&nbsp; ";
$space4 = " &nbsp;&nbsp;&nbsp;&nbsp; ";

             chdir("$basedir");
$content = scandir("$basedir");

// **********************************************************************************
// ***************                  List Directories                      ***********
// **********************************************************************************

foreach( $content as $file )
       { if( $file != "."  &&
             $file != ".." &&
             $file != "CVS" )

                if( is_dir($file) ) { 
                    $date = exec( "/usr/bin/stat $basedir/$file | grep Modify | cut -d' ' -f2" );
                    echo "<li> <a href=index.php?&dir=$dir/$file&expid=$expid> <u> <font color=darkred> <b>(Directory)</b> $space $date $space3 $file </font> </u> </a> </li>"; 
                                    } 
       }

// **********************************************************************************
// ***************                      List Files                        ***********
// **********************************************************************************

foreach( $content as $file )
       { if( $file != "."  &&
             $file != ".." &&
             $file != "CVS" )  

                if( !is_dir($file) ) { 
                    $date = exec( "/usr/bin/stat $basedir/$file | grep Modify | cut -d' ' -f2" );
                    echo "<li> <a href=$expurl/$dir/$file> <u> (File) $space $date $space3 $file </u> </a> </li>"; 
                                     }
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
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</ul>
</center>

EOF;

// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************
echo $content; 
return;

?>
