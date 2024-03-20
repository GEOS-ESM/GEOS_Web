<!DOCTYPE html>

<html>
  <head>
    <?php 
       include "globals.php";
    ?>
    <title> GMAO Experiment: <?php echo $expid ?></title>
    <link style="text/css" href="main.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="../../pages/iceocn/index.php?expid=<?php echo $expid ?>"> &#x21E7 Up</a> |
      <a href="../../pages/iceocn/temp-salt.php?expid=<?php echo $expid ?>"> &#x21E6 Prev</a> |
      <span class="page-title"><?php echo $expid ?>: Sea Ice</span> |
      <a href="../../pages/iceocn/currents.php?expid=<?php echo $expid ?>">Next &#x21E8</a> |
      <div class="dropdown">
	<button>Subplots</button>
	<div class="dropdown-content">
	  <a href="#AICE">Ice Fraction</a>
	  <a href="#HICE">Ice Thickness</a>
	  <a href="#VOLICE">Ice Volume</a>
	  <a href="#ICECAT">Ice Category</a>
	  <a href="#ICEVEL">Ice Drift</a>
	</div>
      </div> | 
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure id="AICE">
	<figcaption>Ice Fraction</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/aice_clim_N.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/aice_clim_N.png" alt="Ice fraction, northern hemisphere, MAR, SEP">
	  </a>
	  <a href="<?php echo $plotdir ?>/aice_clim_S.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/aice_clim_S.png" alt="Ice fraction, southern hemisphere, FEB, SEP">
	  </a>
	  <a href="<?php echo $plotdir ?>/extent_anncycle.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/extent_anncycle.png" alt="Ice extent, NH SH annual cycle">
	  </a>
	  <a href="<?php echo $plotdir ?>/extent_ts.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/extent_ts.png" alt="Ice extent and volume, NH, SH integrated" style="width:80%">
	  </a>
	</div>
      </figure>

      <figure id="HICE">
	<figcaption>Ice Thickness</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/seaice_nhh_jfm.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/seaice_nhh_jfm.png" alt="Ice thickness, northern hemisphere, JFM">
	  </a>
	  <a href="<?php echo $plotdir ?>/seaice_shh_jfm.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/seaice_shh_jfm.png" alt="Ice thickness, southern hemisphere, JFM">
	  </a>
	  <a href="<?php echo $plotdir ?>/seaice_nhh_jas.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/seaice_nhh_jas.png" alt="Ice thickness, northern hemisphere, JAS">
	  </a>
	  <a href="<?php echo $plotdir ?>/seaice_shh_jas.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/seaice_shh_jas.png" alt="Ice thickness, southern hemisphere, JAS">
	  </a>
	  <a href="<?php echo $plotdir ?>/hice.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/hice.png" alt="Ice thickness, global mean">
	  </a>
	  <a href="<?php echo $plotdir ?>/hice_icesat.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/hice_icesat.png" alt="Ice thickness, northern hemisphere ICESAT" style="width:70%">
	  </a>
	</div>
      </figure>

      <figure id="VOLICE">
	<figcaption>Ice Volume</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/volume_anncycle.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/volume_anncycle.png" alt="Ice volume, NH, SH annual cycle">
	  </a>
	</div>
      </figure>

      <figure id="ICECAT">
	<figcaption>Ice Category</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/cat_area_vol_N.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/cat_area_vol_N.png" alt="Ice category area, volume, NH">
	  </a>
	  <a href="<?php echo $plotdir ?>/cat_area_vol_ls_N.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/cat_area_vol_ls_N.png" alt="Ice category area, volume, NH">
	  </a>
	  <a href="<?php echo $plotdir ?>/cat_area_vol_S.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/cat_area_vol_S.png" alt="Ice category area, volume, SH">
	  </a>
	  <a href="<?php echo $plotdir ?>/cat_area_vol_ls_S.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/cat_area_vol_ls_S.png" alt="Ice category area, volume, SH">
	  </a>
	</div>
      </figure>

      <figure id="ICEVEL">
	<figcaption>Ice Drift</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/drift_speed_anncycle.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/drift_speed_anncycle.png" alt="Ice drift speed, Arctic annual cycle">
	  </a>
	</div>
      </figure>

    </div>

  </body>
</html>
