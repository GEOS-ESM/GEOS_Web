<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/set_cmpexp.button" );
include( "../buttons/closeness.button" );
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
$closeness    = urlencode($PARAM['closeness']);

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
Turbulence Matrix
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
        var closeness    = form.closeness.selectedIndex ;
        window.location  = "turbulence.php?"
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&season="       + (form.season.options[season].value)
                         + "&closeness="    + (form.closeness.options[closeness].value)
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
   <th align=center bgcolor = #edf6ff> <font color=darkred> Comparison </font> <img src=../check.jpg border=0> &nbsp; / &nbsp; <font color=darkgreen> Closeness </font> <img src=../green_check.jpg border=0> </th>
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

// set CLOSENESS Button
// -----------------------
$content = <<<EOF
&nbsp; &nbsp;
EOF;
echo $content;
set_closeness( $closeness );
$content = <<<EOF
</th>
EOF;
echo $content;

$content = <<<EOF
</tr>
</table>
</center>
<br>
EOF;
echo $content;

    $verbose =  "0";
if( $verbose == "1" ) {
  print "<br>";
  print "<br>";
  print "YEAR: $year <br>";
  print "SEASON: $season <br>";
  print "EXP1: $cmpexp <br>"; }

// **********************************************************************************
// ***************                     Page Contents                      ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>

<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field      </th> 
   <th align=center bgcolor = #dddddd> Zonal Mean </th>
   <th align=center                  > 1000 mb    </th> 
   <th align=center bgcolor = #dddddd>  975 mb    </th> 
   <th align=center                  >  950 mb    </th> 
   <th align=center bgcolor = #dddddd>  925 mb    </th> 
   <th align=center                  >  900 mb    </th> 
   <th align=center bgcolor = #dddddd>  850 mb    </th> 
   <th align=center                  >  800 mb    </th> 
   <th align=center bgcolor = #dddddd>  750 mb    </th> 
   <th align=center                  >  700 mb    </th> 
   <th align=center bgcolor = #dddddd>  650 mb    </th> 
   <th align=center                  >  600 mb    </th> 
   <th align=center bgcolor = #dddddd>  550 mb    </th> 
   <th align=center                  >  500 mb    </th> 
   <th align=center bgcolor = #dddddd>  450 mb    </th> 
   <th align=center                  >  400 mb    </th>
   <th align=center bgcolor = #dddddd>  350 mb    </th>
   <th align=center                  >  300 mb    </th>
<!--th align=center bgcolor = #dddddd>  250 mb    </th>
   <th align=center                  >  200 mb    </th>
   <th align=center bgcolor = #dddddd>  150 mb    </th>
   <th align=center                  >  100 mb    </th>
   <th align=center bgcolor = #dddddd>   70 mb    </th>
   <th align=center                  >   50 mb    </th>
   <th align=center bgcolor = #dddddd>   30 mb    </th-->
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
EOF;
echo $content;

     $levels = array( "z", "1000", "975", "950", "925", "900", "850", "800", "750", "700", "650", "600", "550", "500", "450", "400", "350", "300", "250", "200", "150", "100" );
     $levels = array( "z", "1000", "975", "950", "925", "900", "850", "800", "750", "700", "650", "600", "550", "500", "450", "400", "350", "300" );

      mk_entry ("KM",        "KM.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("KH",        "KH.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("KMLS",    "KMLS.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("KHLS",    "KHLS.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("KHSFC",  "KHSFC.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("KHRAD",  "KHRAD.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("EKH",      "EKH.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("EKM",      "EKM.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("RI",        "RI.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("INTDIS","INTDIS.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);
      mk_entry ("TOPDIS","TOPDIS.TURBULENCE",$levels,$year,$season,$cmpexp,$closeness);

$content = <<<EOF
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
</table>
<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</ul>
</center>
</form>
EOF;
echo $content;

// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************

return; 

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function mk_entry ($heading,$plot,$levels,$year,$season,$cmpexp,$closeness) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $heading </font> </th>
EOF;
echo $content;

  $color = "#dddddd";
  foreach( $levels as $level )
   {  mk_link4 ("$year","$season","${plot}_${level}",$cmpexp,$closeness,$color);
      if( "$color" == "#dddddd" ) { $color = ""; }
      else                        { $color = "#dddddd"; } }

return; }

// =====================================================================================

function mk_link4 ($year,$season,$name,$verification,$closeness,$color) {

   if( $closeness == "none" ) { $check = "../check.jpg";   }
   else                       { $check = "../green_check.jpg"; }

   if( $closeness == "none" ) { $filename = "hdiag_${verification}_${name}.${season}.gif"; }
   else                       { $filename = "hdiag_${closeness}_${name}_closeness_${verification}.${season}.gif"; }

   if( $closeness == "none" & $verification == "none" ) { $filename = "hdiag_${name}.${season}.gif"; }

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "GCs: <b> $gc </b> <br>";
   print "VERIFICATION: <b> $verification </b> <br>";
   print "CLOSENESS: <b> $closeness </b> <br>";
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

?>
