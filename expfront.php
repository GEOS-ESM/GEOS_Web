<!DOCTYPE html>

<?php
   function getexp($path){
        $file=fopen($path,"r") or die("Unable to open file!");
        $ss=fread($file,filesize($path));
        fclose($file);
        return $ss;
   }
   $expid=$_GET["expid"];
   $basepath="../../$expid/";
   $tag     = getexp($basepath."TAG");
   $usrid   = getexp($basepath."usrid");
   $expid   = getexp($basepath."expid");
   $exptype = getexp($basepath."exptype");
   $expdesc = getexp($basepath."expdesc");
   $regtest = getexp($basepath."regress_test");
   $year    = getexp($basepath."YEAR");
   $month   = getexp($basepath."MONTH");
?>

<html>
  <head>
    <title> GMAO Experiment: <?php echo $expid ?> </title>
    
    <style>
      .outer-list {
      /*display: inline-block;*/
      /* vertical-align: text-top;*/
      /*text-align: left;*/
      /*background-color:grey;*/
      }

      .main-menu{
      display: flex;
      width: 27rem; 
      margin: 2rem auto; 
      padding: 1rem;
      /*font-weight: bold;*/
      border-style: outset;
      border-width: 5px;
      border-color: #2d73b9;
      /*line-height: 150%;*/
      }
      
      .center{
      text-align: center;
      }
    </style>
  </head>

  <body>
    <header>
      <?php echo '
      <h1 class="center"> GMAO Experiment: '.$expid.'</h1> 
 
      <strong> Description:   </strong> '.$expdesc.' <br>
      <strong> UserID (misc): </strong> '.$usrid.' <br>
      <strong> Results:       </strong> <br>
      <strong> Regression:    </strong> '.$regtest.' <br>
      <strong> TAG:           </strong> <a "href=pages/index.php?&dir=SRC&expid='.$expid.'"> '.$tag.'</a> <br>
      '?>
    </header>

    <strong>
    <div class="main-menu">
    <?php echo '
    <ul> 
      <li>  Prognostics
	<ul>
          <li> <a href="pages/zonal.php?&year='.$year.'&season='.$month.'&verification=MERRA-2&expid='.$expid.'"> Zonal Mean Plots </a> </li>
          <li> <a href="pages/horiz.php?&year='.$year.'&season='.$month.'&verification=MERRA-2&closeness=none&type=_MEAN&expid='.$expid.'"> 
	      Horizontal Plots </a> </li>
          <li> <a href="pages/quads.php?&year='.$year.'&season='.$month.'&verification=MERRA-2&type=p&expid='.$expid.'"> Quadratics Plots </a> </li>
	</ul>
      </li>
      
      <li> <a href="pages/aerosols_2d.php?&year='.$year.'&season='.$month.'&verification=MERRA-2&closeness=none&expid='.$expid.'&cmpexp=none&math=LINEAR"> 
	  Aerosols (2d) </a> </li>
      <li> <a href="pages/tseries.php?&year='.$year.'&expid='.$expid.'&precip_obs=GPCPv2.1&tpw_obs=ssmi&rad_obs=CERES_EBAF"> Time-Series </a> </li>
      <li> <a href="pages/stats.php?&year='.$year.'&season='.$month.'&region=NHE&type=corcmp&expid='.$expid.'&cmpexp=1&exp1='.$expid.'&exp2='.$expid.'&gifs=Animated&verbose=0"> 
	  Forecast Statistics </a> </li>
      <li><a href="pages/index.php?&dir=RC&expid='.$expid.'"> RC Files </a></li>
      <li><a href="pages/index.php?&dir=CCM_Diagnostics&expid='.$expid.'"> CCM Diagnostics </a></li>
    </ul>

    <ul>
      <li>  AGCM Diagnostics
        <ul>
          <li> <a href="pages/tendency.php?&year='.$year.'&season='.$month.'&expid='.$expid.'&cmpexp=none&closeness=none"> Tendencies </a> </li>
          <li> <a href="pages/moist.php?&year='.$year.'&season='.$month.'&precip_obs=GPCP&tpw_obs=SRB&region=_GLOBAL&closeness=none&expid='.$expid.'"> 
	      Moist Processes </a> </li>
          <li> <a href="pages/radiation.php?&year='.$year.'&season='.$month.'&verification=cc5_CERES_EBAF-4&expid='.$expid.'"> Radiation </a> </li>
          <li> <a href="pages/gwd.php?&year='.$year.'&season='.$month.'&expid='.$expid.'"> Gravity-Wave Drag </a> </li>
          <li> <a href="pages/turbulence.php?&year='.$year.'&season='.$month.'&expid='.$expid.'&cmpexp=none&closeness=none"> Turbulence </a> </li>
          <li> <a href="pages/clouds.php?&year='.$year.'&season='.$month.'&verification=SRB&closeness=none&expid='.$expid.'"> Clouds </a> </li>
          <li> <a href="pages/surf.php?&year='.$year.'&season='.$month.'&verification=none&closeness=none&expid='.$expid.'"> Surface/2-D </a> </li>
          <li> <a href="pages/energy.php?&year='.$year.'&season='.$month.'&expid='.$expid.'"> Energetics </a> </li>
          <li> <a href="pages/taylor.php?&year='.$year.'&expid='.$expid.'"> Taylor Diagrams </a> </li>
	  <li> <a href="pages/index.php?&dir=misc&expid='.$expid.'"> Miscellaneous </a>  </li>
	</ul>
      </li>
      
      <li> <a href="pages/IAU_Error_Analysis.php?&year='.$year.'&season='.$month.'&expid='.$expid.'&cmpexp=MERRA-2&closeness=none"> IAU Error Analysis </a> </li>
      <li> <a href="pages/3CH_Error_Analysis.php?&year='.$year.'&season='.$month.'&expid='.$expid.'&corners=none"> 3CH Error Analysis </a> </li>
      <li><a href="pages/iceocn/index.php?expid='.$expid.'"> OGCM Coupled Diagnostics </a></li>
    </ul>
    '?>
    </div>

    <nav class="center">
      <a href="../index.php"> Home </a> (EXP List) | 
      <a href=/intranet/personnel/stassi/ChangeLog> DAS_ChangeLog </a> |
      <a href="../AGCM_ChangeLog"> AGCM_ChangeLog </a> |
      <a href=/intranet/personnel/aconaty/g5stats> GEOS_Util </a> (Doc)
    </nav>
    </strong>

    <footer>
      <a href="mailto:yury.vikhliaev@nasa.gov">Send email for support</a> 
    </footer>

  </body>
</html>
