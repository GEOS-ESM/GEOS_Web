<!DOCTYPE html>

<html>
  <head>
    <?php 
       include "globals.php";
    ?>
    <title> GMAO Experiment: <?php echo $expid ?> </title>
    <link style="text/css" href="main.css" rel="stylesheet">
  </head>

  <body>
    <div style="text-align: center; color: DarkRed">
      <h1><?php echo $expid ?>: Coupled Diagnostics</h1> 
    </div>
    
    <ul class="main-menu">
      <?php echo '
      <li><a href="sst.php?expid='.$expid.'">Sea Surface Temperature</a></li>
      <li><a href="sss.php?expid='.$expid.'">Sea Surface Salinity</a></li>
      <li><a href="precip.php?expid='.$expid.'">Precipitation</a></li>
      <li><a href="stress.php?expid='.$expid.'">Surface Wind Stress</a></li>
      <li><a href="temp-salt.php?expid='.$expid.'">Temperature-Salinity Vertical Profiles</a></li>
      <li><a href="ice.php?expid='.$expid.'">Sea Ice</a></li>
      <li><a href="currents.php?expid='.$expid.'">Ocean Currents</a></li>
      <li><a href="transport_mass.php?expid='.$expid.'">Ocean Mass Transport</a></li>
      <li><a href="surf_heat_flux.php?expid='.$expid.'">Surface Heat Fluxes</a></li>
      <li><a href="misc.php?expid='.$expid.'">Miscellaneous Coupled Diagnostics</a></li>
      <li><a href="'.$expdir.'/pages/index.php?dir=plots_ocn&expid='.$expid.'">Image sources</a></li>
      <li><a href="../../expfront.php">&#x21E6 Home</a></li>
      ' ?>
    </ul>
  </body>

</html>
