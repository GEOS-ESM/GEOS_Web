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
      <a href="../../pages/iceocn/transport_mass.php?expid=<?php echo $expid ?>"> &#x21E6 Prev</a> | 
      <span class="page-title"><?php echo $expid ?>: Miscellaneous Plots</span> |
      <div class="dropdown">
	<button>Subplots</button>
	<div class="dropdown-content">
	  <a href="#ANN">Mixed Layer Depth</a>
	  <a href="#DJF">Sea Surface Height</a>
	</div>
      </div> | 
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure id="MLD">
	<figcaption>Mixed Layer Depth</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/mld_jfm.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/mld_jfm.png" alt="Mixed layer depth, JFM">
	  </a>
	  <a href="<?php echo $plotdir ?>/mld_jas.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/mld_jas.png" alt="Mixed layer depth, JAS">
	  </a>
	</div>
      </figure>

      <figure id="SSH">
	<figcaption>Sea Surface Height</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/ssh_gm.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/ssh_gm.png" alt="Sea surface height, global mean">
	  </a>
	</div>
      </figure>
    </div>

  </body>
</html>
