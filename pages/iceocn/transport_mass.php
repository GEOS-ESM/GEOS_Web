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
      <a href="../../pages/iceocn/currents.php?expid=<?php echo $expid ?>"> &#x21E6 Prev</a> | 
      <span class="page-title"><?php echo $expid ?>: Ocean Mass Transport</span> |
      <a href="../../pages/iceocn/surf_heat_flux.php?expid=<?php echo $expid ?>">Next &#x21E8</a> | 
      <div class="dropdown">
	<button>Subplots</button>
	<div class="dropdown-content">
	  <a href="#AMOC">AMOC Stream Function</a>
	  <a href="#PSI">Barotropic Stream Function</a>
	</div>
      </div> |
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure id="AMOC">
	<figcaption>Atlantic Meridional Overturning Stream Function</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/amoc_ind.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/amoc_ind.png" alt="AMOC index">
	  </a>
	  <a href="<?php echo $plotdir ?>/atl_moc.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/atl_moc.png" alt="AMOC">
	  </a>
	</div>
      </figure>

      <figure id="PSI">
	<figcaption>Batotropic Stream Function</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/PSI.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/PSI.png" alt="Baropropic Stream Function">
	  </a>
	</div>
      </figure>
    </div>

  </body>
</html>
