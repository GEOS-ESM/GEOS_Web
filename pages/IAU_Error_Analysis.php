<?php

    $verbose = "0";

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/set_cmpexp.button" );
include( "../buttons/set_exps.php" );
include( "../buttons/set_item.php" );

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

include( "unregister_globals.php" );

// **********************************************************************************
// ***************                    Page Variables                      ***********
// **********************************************************************************

unregister_globals();

$PARAM = array_merge($_GET, $_POST);
$expid        = urlencode($PARAM['expid']);
$year         = urlencode($PARAM['year']);
$season       = urlencode($PARAM['season']);
$type         = urlencode($PARAM['type'  ]);
$region       = urlencode($PARAM['region']);
$cmpexp       = urlencode($PARAM['cmpexp']);

include("globals.php");

$seasonUC = strtoupper($season);
$seasonLC = strtolower($season);

// **********************************************************************************
// ***************                Page Header and Buttons                 ***********
// **********************************************************************************

$content = <<<EOF
 <title>
$expid
</title>

<H1 align=center >
<font color=darkred>
EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
IAU Error Analysis
</font> </H1>
EOF;
echo $content;

// **********************************************************************************
// Create LEAPTO Function
// **********************************************************************************

$content = <<<EOF
<form name="myform">
<script language="javascript">
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var cmpexp       = form.cmpexp.selectedIndex ;
        window.location  = "IAU_Error_Analysis.php?"
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&season="       + (form.season.options[season].value)
                         + "&cmpexp="       + (form.cmpexp.options[cmpexp].value); }

</script>
EOF;
echo $content;

// **********************************************************************************
// Create HEADING Table
// **********************************************************************************

$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=3 border=2 bordercolor=#497fbf width=60%>
<font color=darkblue>
<br>
EOF;
echo $content;

// First Row:  Headings
// --------------------
$content = <<<EOF
<tr>
   <th align=center bgcolor = #edf6ff> Year                 </th>
   <th align=center bgcolor = #edf6ff> Season               </th>
   <th align=center bgcolor = #edf6ff> <font color=darkred> Comparison </font> <img src=../check.jpg border=0> </th>
</tr>
</font>
EOF;
echo $content;

// Second Row:  Buttons
// --------------------
$content = <<<EOF
<tr>
EOF;
echo $content;

// set YEAR Button
// ---------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_year( $year );
$content = <<<EOF
</th>
EOF;
echo $content;

// set SEASON Button
// -----------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_season( $season );
$content = <<<EOF
</th>
EOF;
echo $content;

// set VERIFICATION Button
// -----------------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_cmpexp( $cmpexp );
$content = <<<EOF
EOF;
echo $content;

$content = <<<EOF
</tr>
</table>
</center>
<br>
EOF;
echo $content;

if( $verbose == "1" ) {
  print "<br>";
  print "<br>";
  print "YEAR: $year <br>";
  print "SEASON: $season <br>";
  print "EXP1: $cmpexp <br>"; }

// **********************************************************************************
// **********************************************************************************

   IAU_Error_Template ($year,$seasonUC,"BIAS",$cmpexp,$verbose);
   IAU_Error_Template ($year,$seasonUC,"STD" ,$cmpexp,$verbose);
   IAU_Error_Template ($year,$seasonUC,"RMS" ,$cmpexp,$verbose);

// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************

$content = <<<EOF
<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</ul>
</center>

</form>
EOF;
echo $content;
return; 

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function IAU_Error_Template ($year,$season,$stat,$cmpexp,$verbose) {

     $statcmpexp = "${stat}_${cmpexp}";

// =====================================================================================
// =====         Construct Level Headings based on scanning ALL Fields
// =====================================================================================

 $all_fields = array( "DMDTANA.DYN", "DUDT_ANA.AGCM", "DVDT_ANA.AGCM", "DTDT_ANA.AGCM", "DQVDT_ANA.AGCM" );

 $all_levels = array(  1000 , 975 , 950 , 925 , 900 , 875 , 850 , 825 , 800 , 775 , 750 , 725 , 700 , 
                              650 , 600 , 550 , 500 , 450 , 400 , 350 , 300 , 250 , 200 , 150 , 100 , 
                               70 ,  50 ,  30 ,  20 ,  10 ,   7 ,   5 ,   3 ,   2 , 1 );

 $mas_levels = array(     0 , 975 , 950 , 925 , 900 , 875 , 850 , 825 , 800 , 775 , 750 , 725 , 700 , 
                              650 , 600 , 550 , 500 , 450 , 400 , 350 , 300 , 250 , 200 , 150 , 100 , 
                               70 ,  50 ,  30 ,  20 ,  10 ,   7 ,   5 ,   3 ,   2 , 1 );

// =====================================================================================
// =====         Set Field and Zonal X-Section Headings
// =====================================================================================

$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field                </th> 
   <th align=center bgcolor = #dddddd> Zonal <br> X-Section </th>
EOF;
echo $content;

// =====================================================================================
// =====         Construct Level Headings based on scanning ALL Fields
// =====================================================================================

           $color = "";
foreach( $all_levels as $level )
 {
    $flag  = "false";
    foreach( $all_fields as $field )
     { $file = "hdiag_${statcmpexp}_${field}_${level}.${season}.gif"; 
             if (file_exists("$exppath/$year/$file"))      { $flag = "true"; }
             if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; } 
     }

       if( $flag == "true" )
       { 
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th> 
EOF;
echo $content; 
       if( "$color" == "#dddddd" ) { $color = "";        }
       else                        { $color = "#dddddd"; } 
       }
 }

$content = <<<EOF
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
EOF;
echo $content;

// =====================================================================================
// =====================================================================================
//     print "FILE: $file  FLAG: $flag <br>";

     mk_horizontal_entry (              "SLP <br> $stat Error",   "DMDTANA.DYN",$mas_levels,$year,$season,$statcmpexp,$verbose);
     mk_horizontal_entry (           "U-Wind <br> $stat Error", "DUDT_ANA.AGCM",$all_levels,$year,$season,$statcmpexp,$verbose);
     mk_horizontal_entry (           "V-Wind <br> $stat Error", "DVDT_ANA.AGCM",$all_levels,$year,$season,$statcmpexp,$verbose);
     mk_horizontal_entry (      "Temperature <br> $stat Error", "DTDT_ANA.AGCM",$all_levels,$year,$season,$statcmpexp,$verbose);
     mk_horizontal_entry ("Specific Humidity <br> $stat Error","DQVDT_ANA.AGCM",$all_levels,$year,$season,$statcmpexp,$verbose);

$content = <<<EOF
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
</table>
<br>
<br>
EOF;
echo $content;
return; }

// =====================================================================================

  function mk_horizontal_entry ($label,$plot,$levels,$year,$season,$statcmpexp,$verbose) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $label </font> </th> 
EOF;
echo $content;

 $fields = array( "DMDTANA.DYN", "DUDT_ANA.AGCM", "DVDT_ANA.AGCM", "DTDT_ANA.AGCM", "DQVDT_ANA.AGCM" );

// =====================================================================================
// =====                    Check for Zonal X-Sections
// =====================================================================================

                                 $color = "#dddddd";

    mk_link_z ($year,$season,"hdiag_${statcmpexp}_${plot}","z",$color,$verbose); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; }

// =====================================================================================
// =====                    Check for Horizontal Levels
// =====================================================================================

    foreach( $levels as $level ) 
     {
        $flag  = "false";
         foreach( $fields as $field )

           { $file = "hdiag_${statcmpexp}_${field}_${level}.${season}.gif"; 
             if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
             if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
           }

           if( $flag == "true" ) 
             { mk_link ($year,$season,"hdiag_${statcmpexp}_${plot}_${level}",$color,$verbose); 
                  if( "$color" == "#dddddd" ) { $color = "";        }
                  else                        { $color = "#dddddd"; } 
              }
      }
return; }

// =====================================================================================

function mk_link_z ($year,$season,$name,$level,$color,$verbose) {

     $filename1 = "${name}_z.$season.gif";
     $filename2 = "${name}_zlog30.$season.gif";
     $filename3 = "${name}_zlog0.1.$season.gif";

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];

                                                     { $zref  = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename1"))         { $zref  = "<a href=$expurl/$year/$filename1         target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename1")) { $zref  = "<a href=$expurl/$year/$season/$filename1 target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; }

                                                     { $zref2 = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename2"))         { $zref2 = "<a href=$expurl/$year/$filename2         target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename2")) { $zref2 = "<a href=$expurl/$year/$season/$filename2 target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; }

                                                     { $zref3 = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename3"))         { $zref3 = "<a href=$expurl/$year/$filename3         target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename3")) { $zref3 = "<a href=$expurl/$year/$season/$filename3 target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; }

     if( $zref2 != "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; $zref2"; }
     if( $zref3 != "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; $zref3"; }

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

// =====================================================================================

function mk_link ($year,$season,$name,$color,$verbose) {

   $check = "../check.jpg";

   $filename = "${name}.${season}.gif";

if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "FILENAME: <b> $filename </b> <br>"; }

   $exppath=$GLOBALS["exppath"];
   $expurl=$GLOBALS["expurl"];

                                                  { $zref = "&nbsp;"; }
   if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''><img src=$check border=0> </a>"; }

   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

// =====================================================================================

?>

