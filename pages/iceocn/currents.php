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
      <a href="../../pages/iceocn/ice.php?expid=<?php echo $expid ?>"> &#x21E6 Prev</a> | 
      <span class="page-title"><?php echo $expid ?>: Ocean Currents</span> |
      <a href="../../pages/iceocn/transport_mass.php?expid=<?php echo $expid ?>">Next &#x21E8</a> | 
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure>
	<figcaption>Currents</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/Usurf_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/Usurf_djf.png" alt="U surface, DJF">
	  </a>
	  <a href="<?php echo $plotdir ?>/Usurf_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/Usurf_jja.png" alt="U surface, JJA">
	  </a>
	  <a href="<?php echo $plotdir ?>/U_eq_depth.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/U_eq_depth.png" alt="Equatorial undercurrent">
	  </a>
	</div>
      </figure>
    </div>

  </body>
</html>
