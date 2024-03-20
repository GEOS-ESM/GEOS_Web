<!DOCTYPE html>

<html>
  <head>
    <?php 
       include "globals.php";
       $obsplotdir=$obsdir."/levitus/pics";
    ?>
    <title> GMAO Experiment: <?php echo $expid ?></title>
    <link style="text/css" href="main.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="../../pages/iceocn/index.php?expid=<?php echo $expid ?>"> &#x21E7 Up</a> | 
      <a href="../../pages/iceocn/stress.php?expid=<?php echo $expid ?>"> &#x21E6 Prev</a> | 
      <span class="page-title"><?php echo $expid ?>: Temperature-Salinity Profiles</span> |
      <a href="../../pages/iceocn/ice.php?expid=<?php echo $expid ?>">Next &#x21E8</a> | 
      <div class="dropdown">
	<button>Subplots</button>
	<div class="dropdown-content">
	  <a href="#T">Temperature</a>
	  <a href="#S">Salinity</a>
	</div>
      </div> | 
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure id="T">
	<figcaption>Temperature Profiles (zonal mean, equatorial)</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/T_lat_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/T_lat_depth.png" alt="T zonal mean">
	  </a>
	  <a href="<?php echo $plotdir ?>/T-obs_lat_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/T-obs_lat_depth.png" alt="T-OBS zonal mean">
	  </a>
	  <a href="<?php echo $plotdir ?>/T_eq_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/T_eq_depth.png" alt="T equatorial">
	  </a>
	  <a href="<?php echo $plotdir ?>/T-obs_eq_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/T-obs_eq_depth.png" alt="T-OBS equatorial">
	  </a>
	  <a href="<?php echo $plotdir ?>/temp_gvm.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/temp_gvm.png" alt="T global volume mean">
	  </a>
	  <a href="<?php echo $plotdir ?>/temp_gm.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/temp_gm.png" alt="T global mean">
	  </a>
	</div>
	<p>
	  <a href="<?php echo $obsplotdir?>/temp_lat_depth.png" target="_blanc">Levitus T, zonal mean</a> | 
	  <a href="<?php echo $obsplotdir?>/temp_eq_depth.png" target="_blanc">Levitus T, equatorial</a>
	</p>
      </figure>

      <figure id="S">
	<figcaption>Salinity Profiles (zonal mean, equatorial)</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/S_lat_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/S_lat_depth.png" alt="S zonal mean">
	  </a>
	  <a href="<?php echo $plotdir ?>/S-obs_lat_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/S-obs_lat_depth.png" alt="S-OBS zonal mean">
	  </a>
	  <a href="<?php echo $plotdir ?>/S_eq_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/S_eq_depth.png" alt="S equatorial">
	  </a>
	  <a href="<?php echo $plotdir ?>/S-obs_eq_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/S-obs_eq_depth.png" alt="S-OBS equatorial">
	  </a>
	</div>
	<p>
	  <a href="<?php echo $obsplotdir?>/salt_lat_depth.png" target="_blanc">Levitus S, zonal mean</a> | 
	  <a href="<?php echo $obsplotdir?>/salt_eq_depth.png" target="_blanc">Levitus S, equatorial</a>
	</p>
      </figure>

    </div>

  </body>
</html>
