<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/stats_region.button" );
include( "../buttons/stats_type.button" );
include( "../buttons/stats_exp1.button" );
include( "../buttons/stats_exp2.button" );
include( "../buttons/stats_gifs.button" );
include( "../buttons/stats_cmpexp.button" );
include( "../buttons/verbose.button" );
include( "../buttons/stats_exps.php" );
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
$exp1         = urlencode($PARAM['exp1']);
$exp2         = urlencode($PARAM['exp2']);
$gifz         = urlencode($PARAM['gifs']);
$cmpexp       = urlencode($PARAM['cmpexp']);
$verbose      = urlencode($PARAM['verbose']);
$year  = str_replace( '%2F', '/', $year );

include("globals.php");
 
$seasonUC = strtoupper($season);
$seasonLC = strtolower($season);


// **********************************************************************************
// ***************                Page Base and Buttons                   ***********
// **********************************************************************************

$content = <<<EOF

<title>
$expid
</title>

<H1 align=center >
<font color=darkred>
EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
Forecast Statistics
<br>
<br>
</font> </H1>
EOF;
echo $content;

// **********************************************************************************
// Create HEADING Table
// **********************************************************************************

$content1 = <<<EOF
<form name="myform">
<center>
<table cellspacing=1 cellpadding=3 border=2 bordercolor=#497fbf width=85%>
<font color=darkblue> 
<tr>
   <th align=center                  >  YEAR    </th>
   <th align=center bgcolor = #dddddd>  MONTH   </th>
   <th align=center                  >  TYPE    </th>
   <th align=center bgcolor = #dddddd>  REGION  </th>
EOF;
if( $cmpexp == "0" ) {
$content2 = <<<EOF
   <th align=center                  >  EXPS    </th>
</tr>
</font>
EOF;
}
if( $cmpexp == "1" ) {
$content2 = <<<EOF
   <th align=center                  >  EXP1/EXP2 </th>
</tr>
</font>
EOF;
}
echo "$content1 $content2";

// **********************************************************************************
// **********************************************************************************

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

// set TYPE Button
// ---------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_type( $type );
$content = <<<EOF
</th>
EOF;
echo $content;

// set REGION Button
// -----------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_region( $region );
$content = <<<EOF
</th>
EOF;
echo $content;

// set EXP1 Button
// ---------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_exp1( $exp1 );
$content = <<<EOF
</th>
EOF;
echo $content;

// set 2nd-Row of Buttons
// ----------------------
if( $cmpexp == "1" | $type == "syscmp" | $type == "all" ) 

{ 
$content = <<<EOF
       </tr> 
  <tr>
EOF;
echo $content;

// set Animate/Static Button
// ------------------------
if($type == "syscmp" | $type == "all" ) 

{ $content = <<<EOF
   <th> </th>
   <th> </th>
   <th>
EOF;
echo $content;
set_gifs( $gifz );
$content = <<<EOF
        </th>
   <th> </th>
EOF;
echo $content; }

else

{ $content = <<<EOF
   <th> </th>
   <th> </th>
   <th> </th>
   <th> </th>
EOF;
echo $content; }

// set EXP2 Button
// ---------------
if( $cmpexp == "1" ) 

{ $content = <<<EOF
<th>
EOF;
echo $content;
set_exp2( $exp2 );
$content = <<<EOF
</th>
EOF;
echo $content; }

else

{ $content = <<<EOF
<th> </th>
EOF;
echo $content; }

}
// ---------------

$content = <<<EOF
</tr>
</table>
</center>
<br>
EOF;
echo $content;

// **********************************************************************************
// **********************************************************************************

if($gifz == "" | $gifz == "Animated" | $type == "rmsdcmp" ) { $gifs = ".gif"; }
else                                                        { $gifs = ""    ; }

if( $verbose == "1" ) {
  print "<br>";
  print "<br>";
  print "YEAR: <b> $year </b> <br>";
  print "SEASON: <u> $season </u> <br>";
  print "TYPE: $type <br>";
  print "REGION: $region <br>";
  print "EXP1: $exp1 <br>";
  print "EXP2: $exp2 <br>";
  print "CMPEXP: $cmpexp <br>";
  print "GIFS: $gifs <br>";
}

// **********************************************************************************
// ***************                     Page Contents                      ***********
// **********************************************************************************

if($type == "all"     ) { $region = "GLO"; }
if($type == "syscmp"  ) { $region = "GLO";  }

                          $SYSCMP = false;
if($type == "syscmp"  ) { $SYSCMP = true; }

                          $rmsmontage = "";
if($type == "rmsdcmp" ) { $rmsmontage = "_montage";
                          $typez      = "rmscmp"; }

                                          $experiment = $exp1;
      if( $type == "corcmp"  | 
          $type == "rmscmp"  |
          $type == "rmsdcmp" |
          $type == "rmscmp_RANDOM"    | 
          $type == "rmscmp_BIAS"      | 
          $type == "rmscmp_AMPLITUDE" | 
          $type == "rmscmp_PHASE"     ) { $experiment = "corcmp"; }

// **********************************************************************************
// **********************************************************************************

if( $SYSCMP ) { 

    $experiment = "{$expid}.{$exp1}";

if( $cmpexp  == "0" ) {
    $cmpdir1 = "{$exp1}.{$expid}";
    $cmpdir2 = "{$expid}.{$exp1}"; }

if( $cmpexp  == "1" ) {
    $cmpdir1 = "{$exp1}.{$exp2}";
    $cmpdir2 = "{$exp2}.{$exp1}";
    $experiment = "{$cmpdir1}";
                      }

$pwd = exec('/bin/pwd');
chdir("$exppath/$year/$season");
$content = scandir("./");
foreach( $content as $file )
         if( is_dir( $file ) ) 
           { if( $file === "$cmpdir1" ) { $experiment = "$cmpdir1"; }
             if( $file === "$cmpdir2" ) { $experiment = "$cmpdir2"; } }
chdir("$pwd");
}

// **********************************************************************************
// ***************                    Montage Plots                       ***********
// **********************************************************************************

      $loc1 = "$exppath/$year/$experiment";
      $loc2 = "$exppath/$year/$seasonUC/$experiment";

      $fileID = "${type}_${seasonUC}";

      if( $type == "corcmp"           | 
          $type == "rmscmp"           |    
          $type == "rmscmp_RANDOM"    |
          $type == "rmscmp_BIAS"      |
          $type == "rmscmp_AMPLITUDE" |
          $type == "rmscmp_PHASE"     )  

        { if( file_exists("$loc1/${exp1}_${exp2}_${fileID}_montage.gif") |
              file_exists("$loc2/${exp1}_${exp2}_${fileID}_montage.gif") ) { $fileID = "${exp1}_${exp2}_$fileID"; }
          if( file_exists("$loc1/${exp2}_${exp1}_${fileID}_montage.gif") |
              file_exists("$loc2/${exp2}_${exp1}_${fileID}_montage.gif") ) { $fileID = "${exp2}_${exp1}_$fileID"; }
        }


                                                              $montage_plots = "";
          if( file_exists("$loc1/${fileID}_montage.gif" ) |
              file_exists("$loc2/${fileID}_montage.gif" ) ) { $montage_plots = "Linear 100-mb"; }
          if( file_exists("$loc1/${fileID}_montage2.gif") |
              file_exists("$loc2/${fileID}_montage2.gif") ) { $montage_plots = "${montage_plots}, Log 10-mb"; }
          if( file_exists("$loc1/${fileID}_montage3.gif") |
              file_exists("$loc2/${fileID}_montage3.gif") ) { $montage_plots = "${montage_plots}, Log 1-mb";  }

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=3 border=2 bordercolor=#497fbf width=40%>
<tr>
   <th align=center> Montage (${montage_plots}) </th>
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","$experiment","${fileID}_montage.gif",
                                                  "${fileID}_montage2.gif",
                                                  "${fileID}_montage3.gif" , "#dddddd");

$content = <<<EOF
</tr>
</table>
</center>
EOF;
echo $content;

// **********************************************************************************
// ***************                Individual Level Plots                  ***********
// **********************************************************************************

     $levels = array( "1000", "975", "950", "925", "900", "850", "800", "750", "700",
                       "600", "500", "400", "300", "250", "200", "150", "100", "70",
                        "50",  "30",  "10",   "7",   "5",   "3",   "1", "0.7", "0.5", "0.3", "0.1" );

     $loc1 = "$exppath/$year/$experiment";
     $loc2 = "$exppath/$year/$season/$experiment";

// Header Levels
// -------------
     $zref  = "";
     $color = "";
     foreach( $levels as $level ) 

          if( $level < 100 ) { if( file_exists("$loc1/stats_uwnd_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc1/stats_vwnd_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc1/stats_tmpu_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc1/stats_sphu_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc1/stats_hght_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                     
                                   file_exists("$loc2/stats_uwnd_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc2/stats_vwnd_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc2/stats_tmpu_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc2/stats_sphu_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc2/stats_hght_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") )

                                    { $zref = "${zref} <th align=center bgcolor = $color > $level mb </th>";
                                      if( "$color" == "" ) { $color = "#dddddd"; }
                                      else                 { $color = ""       ; } } 
                             }

          else { $zref = "${zref} <th align=center bgcolor = $color > $level mb </th>";
                 if( "$color" == "" ) { $color = "#dddddd"; }
                 else                 { $color = ""       ; } }

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=100%>
<tr>
   <th align=center                  > Field       </th>
   <th align=center bgcolor = #dddddd> Zonal Means </th>
   $zref
</tr>
EOF;
echo $content;



// Sea-Level Pressure
// ------------------
$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> Sea-Level Pressure </font> </th> 
   <th align=center bgcolor = #dddddd> &nbsp; </th>
EOF;
echo $content;
                                                   $filename = "stats_slp_${type}_${region}";
      mk_link ("$year","$seasonUC","$experiment","${filename}_1000_${seasonUC}${rmsmontage}${gifs}", ""       );

     $levels = array(         "975", "950", "925", "900", "850", "800", "750", "700",
                       "600", "500", "400", "300", "250", "200", "150", "100", "70",
                        "50",  "30",  "10",   "7",   "5",   "3",   "1", "0.7", "0.5", "0.3", "0.1" );

     $zref  = "";
     $color = "#dddddd";
     foreach( $levels as $level ) 
  
          if( $level < 100 ) { if( file_exists("$loc1/stats_uwnd_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc1/stats_vwnd_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc1/stats_tmpu_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc1/stats_sphu_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc1/stats_hght_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                     
                                   file_exists("$loc2/stats_uwnd_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc2/stats_vwnd_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc2/stats_tmpu_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc2/stats_sphu_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") |
                                   file_exists("$loc2/stats_hght_${type}_${region}_${level}_${seasonUC}${rmsmontage}${gifs}") )

                                    { $zref = "${zref} <th align=center bgcolor = $color > &nbsp; </th>";
                                      if( "$color" == "" ) { $color = "#dddddd"; }
                                      else                 { $color = ""       ; } } 
                             }

          else { $zref = "${zref} <th align=center bgcolor = $color > &nbsp </th>";
                 if( "$color" == "" ) { $color = "#dddddd"; }
                 else                 { $color = ""       ; } }

$content = <<<EOF
 $zref
</tr>
EOF;
echo $content;


     $levels = array( "1000", "975", "950", "925", "900", "850", "800", "750", "700",
                       "600", "500", "400", "300", "250", "200", "150", "100", "70",
                        "50",  "30",  "10",   "7",   "5",   "3",   "1", "0.7", "0.5", "0.3", "0.1" );

// U-wind
// ------
$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> Zonal U-Wind </font> </th> 
EOF;
echo $content;

      mk_stats("uwnd",$year,$seasonUC,$type,$region,$experiment,$levels,$exp1,$exp2,$rmsmontage,$cmpexp,$gifs) ;

// V-wind
// ------
$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Meridional V-Wind </font> </th> 
EOF;
echo $content;

      mk_stats("vwnd",$year,$seasonUC,$type,$region,$experiment,$levels,$exp1,$exp2,$rmsmontage,$cmpexp,$gifs) ;

// Heights
// -------
$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Heights      </font> </th> 
EOF;
echo $content;

      mk_stats("hght",$year,$seasonUC,$type,$region,$experiment,$levels,$exp1,$exp2,$rmsmontage,$cmpexp,$gifs) ;

// Temperature
// -----------
$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Temperature </font> </th> 
EOF;
echo $content;

      mk_stats("tmpu",$year,$seasonUC,$type,$region,$experiment,$levels,$exp1,$exp2,$rmsmontage,$cmpexp,$gifs) ;

// Specific Humidity
// -----------------
$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Specific Humidity </font> </th> 
EOF;
echo $content;

      mk_stats("sphu",$year,$seasonUC,$type,$region,$experiment,$levels,$exp1,$exp2,$rmsmontage,$cmpexp,$gifs) ;

$content = <<<EOF
</tr>

</table>
<br> <br>
</ul>
<br>
EOF;
echo $content;

// **********************************************************************************
// **********************************************************************************

// set CMPEXP Button
// -----------------
$content = <<<EOF
<center>
<th>
EOF;
echo $content;
set_cmpexp( $cmpexp );
$content = <<<EOF
</th>
</center>
EOF;
echo $content;

// set VERBOSE Button
// ------------------
$content = <<<EOF
<center>
<th>
EOF;
echo $content;
set_verbose( $verbose );
$content = <<<EOF
</th>
</center>
<br> <br>
EOF;
echo $content;

// Link to Animation of RMS Errors
// -------------------------------
$content = <<<EOF
<center>
 <li> <a href="$expurl/../takacs/misc/Animated_RMS_Errors.gif"> <b><font color=darkred>RMS Decomposition Definitions (Animated gif)</font></a> </b> </li>
 <li> <a href="$expurl/../takacs/misc/A_Review_of_Anomaly_Correlation_and_RMS_Error.pdf"> <b><font color=darkred>A Review of Anomaly Correlation and RMS Error (pdf)</font></a> </b> </li>
</center>
<br> <br>
EOF;
echo $content;

// **********************************************************************************
// **********************************************************************************

$content = <<<EOF
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</center>
EOF;
echo $content;

// **********************************************************************************
// **********************************************************************************

if( $cmpexp == "0" & $type != "all" & $type != "syscmp" ) {
$content = <<<EOF
<script language="javascript">
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var region       = form.region.selectedIndex ;
        var type         = form.type.selectedIndex ;
        var exp1         = form.exp1.selectedIndex ;
        var cmpexp       = form.cmpexp.selectedIndex ;
        var verbose      = form.verbose.selectedIndex ;
        window.location  = "stats.php?" 
                         + "&expid=$expid"
                         + "&year="      + (form.year.options[year].value)
                         + "&region="    + (form.region.options[region].value)
                         + "&type="      + (form.type.options[type].value)
                         + "&exp1="      + (form.exp1.options[exp1].value)
                         + "&cmpexp="    + (form.cmpexp.options[cmpexp].value)
                         + "&verbose="   + (form.verbose.options[verbose].value)
                         + "&season="    + (form.season.options[season].value); }
</script>
</form>
EOF;
echo $content; }

if( $cmpexp == "0" & ( $type == "all" | $type == "syscmp" ) ) {
$content = <<<EOF
<script language="javascript">
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var region       = form.region.selectedIndex ;
        var type         = form.type.selectedIndex ;
        var exp1         = form.exp1.selectedIndex ;
        var gifs         = form.gifs.selectedIndex ;
        var cmpexp       = form.cmpexp.selectedIndex ;
        var verbose      = form.verbose.selectedIndex ;
        window.location  = "stats.php?" 
                         + "&expid=$expid"
                         + "&year="      + (form.year.options[year].value)
                         + "&region="    + (form.region.options[region].value)
                         + "&type="      + (form.type.options[type].value)
                         + "&exp1="      + (form.exp1.options[exp1].value)
                         + "&gifs="      + (form.gifs.options[gifs].value)
                         + "&cmpexp="    + (form.cmpexp.options[cmpexp].value)
                         + "&verbose="   + (form.verbose.options[verbose].value)
                         + "&season="    + (form.season.options[season].value); }
</script>
</form>
EOF;
echo $content; }

if( $cmpexp == "1" & $type != "all" & $type != "syscmp" ) {
$content = <<<EOF
<script language="javascript">
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var region       = form.region.selectedIndex ;
        var type         = form.type.selectedIndex ;
        var exp1         = form.exp1.selectedIndex ;
        var exp2         = form.exp2.selectedIndex ;
        var cmpexp       = form.cmpexp.selectedIndex ;
        var verbose      = form.verbose.selectedIndex ;
        window.location  = "stats.php?" 
                         + "&expid=$expid"
                         + "&year="      + (form.year.options[year].value)
                         + "&region="    + (form.region.options[region].value)
                         + "&type="      + (form.type.options[type].value)
                         + "&exp1="      + (form.exp1.options[exp1].value)
                         + "&exp2="      + (form.exp2.options[exp2].value)
                         + "&cmpexp="    + (form.cmpexp.options[cmpexp].value)
                         + "&verbose="   + (form.verbose.options[verbose].value)
                         + "&season="    + (form.season.options[season].value); }
</script>
</form>
EOF;
echo $content; }

if( $cmpexp == "1" & ( $type == "all" | $type == "syscmp" ) ) {
$content = <<<EOF
<script language="javascript">
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var region       = form.region.selectedIndex ;
        var type         = form.type.selectedIndex ;
        var exp1         = form.exp1.selectedIndex ;
        var exp2         = form.exp2.selectedIndex ;
        var gifs         = form.gifs.selectedIndex ;
        var cmpexp       = form.cmpexp.selectedIndex ;
        var verbose      = form.verbose.selectedIndex ;
        window.location  = "stats.php?" 
                         + "&expid=$expid"
                         + "&year="      + (form.year.options[year].value)
                         + "&region="    + (form.region.options[region].value)
                         + "&type="      + (form.type.options[type].value)
                         + "&exp1="      + (form.exp1.options[exp1].value)
                         + "&exp2="      + (form.exp2.options[exp2].value)
                         + "&gifs="      + (form.gifs.options[gifs].value)
                         + "&cmpexp="    + (form.cmpexp.options[cmpexp].value)
                         + "&verbose="   + (form.verbose.options[verbose].value)
                         + "&season="    + (form.season.options[season].value); }
</script>
</form>
EOF;
echo $content; }

// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************

return; 

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function mk_stats($field,$year,$season,$type,$region,$experiment,$levels,$exp1,$exp2,$rmsmontage,$cmpexp,$gifs) {

      $exppath=$GLOBALS["exppath"];

      $loc1 = "$exppath/$year/$experiment";
      $loc2 = "$exppath/$year/$season/$experiment";

                               $filename = "stats_${field}_${type}_${region}";
                               $fileID   = "stats_${field}_${type}_${region}_z_${season}${gifs}"; 
                               $fileID2  = "stats2_${field}_${type}_${region}_z_${season}${gifs}"; 
                               $fileID3  = "stats3_${field}_${type}_${region}_z_${season}${gifs}"; 

      if( $type == "all" | $type == "syscmp" ) { $fileID2 = "stats_${field}_${type}_${region}_zlog10_${season}${gifs}"; 
                                                 $fileID3 = "stats_${field}_${type}_${region}_zlog1_${season}${gifs}" ; }

      if( $type != "all" & $type != "syscmp" ) 
        { if( ${exp1} == ${exp2} ) { $fileID  = "${filename}_z_${season}${gifs}"; }
          else                     { $fileID  = "stats_${field}_${type}_${region}_z_${season}.gif"; } }



      if( $type == "corcmp"           |
          $type == "rmscmp"           |   
          $type == "rmscmp_RANDOM"    |
          $type == "rmscmp_BIAS"      |
          $type == "rmscmp_AMPLITUDE" |
          $type == "rmscmp_PHASE"     )

        { if( $cmpexp  == "0" ) { $exp2 = $exp1 ; }

          if( file_exists("$loc1/${exp1}_${exp2}_$fileID") |
              file_exists("$loc2/${exp1}_${exp2}_$fileID") ) { $fileID  = "${exp1}_${exp2}_$fileID" ; 
                                                               $fileID2 = "${exp1}_${exp2}_$fileID2"; 
                                                               $fileID3 = "${exp1}_${exp2}_$fileID3"; }

          if( file_exists("$loc1/${exp2}_${exp1}_$fileID") |
              file_exists("$loc2/${exp2}_${exp1}_$fileID") ) { $fileID  = "${exp2}_${exp1}_$fileID" ; 
                                                               $fileID2 = "${exp2}_${exp1}_$fileID2"; 
                                                               $fileID3 = "${exp2}_${exp1}_$fileID3"; }

                                                                                      $montID  = "${type}_${season}";
                                                                                      $montID2 = "${type}_${season}";
                                                                                      $montID3 = "${type}_${season}";
          if( file_exists("$loc1/${exp1}_${exp2}_${field}_${montID}_montage.gif") |
              file_exists("$loc2/${exp1}_${exp2}_${field}_${montID}_montage.gif") ) { $montID  = "${exp1}_${exp2}_${field}_$montID" ; 
                                                                                      $montID2 = "${exp1}_${exp2}_${field}_$montID2"; 
                                                                                      $montID3 = "${exp1}_${exp2}_${field}_$montID3"; }

          if( file_exists("$loc1/${exp2}_${exp1}_${field}_${montID}_montage.gif") |
              file_exists("$loc2/${exp2}_${exp1}_${field}_${montID}_montage.gif") ) { $montID  = "${exp2}_${exp1}_${field}_$montID" ; 
                                                                                      $montID2 = "${exp2}_${exp1}_${field}_$montID2"; 
                                                                                      $montID3 = "${exp2}_${exp1}_${field}_$montID3"; }
        }


      mk_link6("$year","$season","$experiment","${fileID}" ,
                                               "${fileID2}",
                                               "${fileID3}",
                                               "${montID}_montage.gif"  ,
                                               "${montID2}_montage2.gif",
                                               "${montID3}_montage3.gif", "#dddddd");


     $color = "";
     foreach( $levels as $level )
       { if( ( ${field} == "uwnd" & ${level} == 200 ) |
             ( ${field} == "hght" & ${level} == 500 ) ) { $color = "#d5eae9"; }

         if( $level < 100 ) { if( file_exists("$loc1/${filename}_${level}_${season}${rmsmontage}${gifs}") |
                                  file_exists("$loc2/${filename}_${level}_${season}${rmsmontage}${gifs}") ) 

                                  { mk_link ("$year","$season","$experiment","${filename}_${level}_${season}${rmsmontage}${gifs}","$color");
                                    if( "$color" == "" | "$color" == "#d5eae9" ) { $color = "#dddddd"; }
                                    else                                         { $color = ""       ; } } 
                            }

          else { mk_link ("$year","$season","$experiment","${filename}_${level}_${season}${rmsmontage}${gifs}","$color");
                 if( "$color" == "" | "$color" == "#d5eae9" ) { $color = "#dddddd"; }
                 else                                         { $color = ""       ; } }

       }

return; }

function mk_link ($year,$season,$type,$filename,$color) { 

      $exppath=$GLOBALS["exppath"];
      $expurl=$GLOBALS["expurl"];

      $loc1 = "$exppath/$year/$type";
      $loc2 = "$exppath/$year/$season/$type";

                                         { $zref = "&nbsp;"; }
     if (file_exists("$loc1/$filename")) { $zref = "<a href=$expurl/$year/$type/$filename target=''>        <img src=../check.jpg border=0> </a>"; }
     if (file_exists("$loc2/$filename")) { $zref = "<a href=$expurl/$year/$season/$type/$filename target=''><img src=../check.jpg border=0> </a>"; }

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }


function mk_link3($year,$season,$type,$filename1,$filename2,$filename3,$color) { 

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];

     $dir1 = "$exppath/$year/$type";
     $dir2 = "$exppath/$year/$season/$type";

     $loc1 = "$expurl/$year/$type";
     $loc2 = "$expurl/$year/$season/$type";

                                          { $zref1 = "&nbsp;"; }
     if (file_exists("$dir1/$filename1")) { $zref1 = "<a href=$loc1/$filename1 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename1")) { $zref1 = "<a href=$loc2/$filename1 target=''><img src=../check.jpg border=0> </a>"; }

                                          { $zref2 = "&nbsp;"; }
     if (file_exists("$dir1/$filename2")) { $zref2 = "<a href=$loc1/$filename2 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename2")) { $zref2 = "<a href=$loc2/$filename2 target=''><img src=../check.jpg border=0> </a>"; }

                                          { $zref3 = "&nbsp;"; }
     if (file_exists("$dir1/$filename3")) { $zref3 = "<a href=$loc1/$filename3 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename3")) { $zref3 = "<a href=$loc2/$filename3 target=''><img src=../check.jpg border=0> </a>"; }

                     $zref = "$zref1"   ;
     $plots = array( "zref2","zref3" );
      foreach( $plots as $plot )
             { if( ${$plot} != "&nbsp;" )
                                        { if( $zref != "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; ${$plot}"; }
                                          else                    { $zref = "${$plot}"; }
                                        }
             }

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

function mk_link6($year,$season,$type,$filename1,$filename2,$filename3,$filename4,$filename5,$filename6,$color) { 

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];

     $dir1 = "$exppath/$year/$type";
     $dir2 = "$exppath/$year/$season/$type";

     $loc1 = "$expurl/$year/$type";
     $loc2 = "$expurl/$year/$season/$type";

                                          { $zref1 = "&nbsp;"; }
     if (file_exists("$dir1/$filename1")) { $zref1 = "<a href=$loc1/$filename1 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename1")) { $zref1 = "<a href=$loc2/$filename1 target=''><img src=../check.jpg border=0> </a>"; }

                                          { $zref2 = "&nbsp;"; }
     if (file_exists("$dir1/$filename2")) { $zref2 = "<a href=$loc1/$filename2 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename2")) { $zref2 = "<a href=$loc2/$filename2 target=''><img src=../check.jpg border=0> </a>"; }

                                          { $zref3 = "&nbsp;"; }
     if (file_exists("$dir1/$filename3")) { $zref3 = "<a href=$loc1/$filename3 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename3")) { $zref3 = "<a href=$loc2/$filename3 target=''><img src=../check.jpg border=0> </a>"; }

                                          { $zref4 = "&nbsp;"; }
     if (file_exists("$dir1/$filename4")) { $zref4 = "<a href=$loc1/$filename4 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename4")) { $zref4 = "<a href=$loc2/$filename4 target=''><img src=../check.jpg border=0> </a>"; }

                                          { $zref5 = "&nbsp;"; }
     if (file_exists("$dir1/$filename5")) { $zref5 = "<a href=$loc1/$filename5 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename5")) { $zref5 = "<a href=$loc2/$filename5 target=''><img src=../check.jpg border=0> </a>"; }

                                          { $zref6 = "&nbsp;"; }
     if (file_exists("$dir1/$filename6")) { $zref6 = "<a href=$loc1/$filename6 target=''><img src=../check.jpg border=0> </a>"; }
     if (file_exists("$dir2/$filename6")) { $zref6 = "<a href=$loc2/$filename6 target=''><img src=../check.jpg border=0> </a>"; }

                     $ztop = "$zref1" ;
     $plots = array( "zref2","zref3" );
      foreach( $plots as $plot )
             { if( ${$plot} != "&nbsp;" )
                                        { if( $ztop != "&nbsp;" ) { $ztop = "$ztop &nbsp;/&nbsp; ${$plot}"; }
                                          else                    { $ztop = "${$plot}"; }
                                        }
             }

                     $zbot = "$zref4" ;
     $plots = array( "zref5","zref6" );
      foreach( $plots as $plot )
             { if( ${$plot} != "&nbsp;" )
                                        { if( $zbot != "&nbsp;" ) { $zbot = "$zbot &nbsp;/&nbsp; ${$plot}"; }
                                          else                    { $zbot = "${$plot}"; }
                                        }
             }

                               $zref = "$ztop" ;
     if( $zbot != "&nbsp;" ) { $zref = "$zref <br> $zbot"; }

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

?>
