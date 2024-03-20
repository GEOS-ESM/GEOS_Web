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
      <span class="page-title"><?php echo $expid ?>: Surface Heat Fluxes</span> |
      <a href="../../pages/iceocn/misc.php?expid=<?php echo $expid ?>">Next &#x21E8</a> | 
      <div class="dropdown">
	<button>Subplots</button>
	<div class="dropdown-content">
	  <a href="#SWFLX">Net Surface Short Wave Flux</a>
	  <a href="#LWFLX">Net Surface Long Wave Flux</a>
	  <a href="#SHFLX">Sensible Heat Flux</a>
	  <a href="#LHFLX">Latent Heat Flux</a>
	  <a href="#POLARSW">Polar Shortwave Flux</a>
	  <a href="#POLARLW">Polar Longwave Flux</a>
	  <a href="#POLAR">Polar Radiative Flux</a>
	</div>
      </div> |
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure id="SWFLX">
	<figcaption>Net Surface Short Wave Flux</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/swflx_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swflx_am.png" alt="SWFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/swflx-obs_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swflx-obs_am.png" alt="SWFLX-OBS ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/swflx_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swflx_djf.png" alt="SWFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/swflx-obs_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swflx-obs_djf.png" alt="SWFLX-OBS ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/swflx_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swflx_jja.png" alt="SWFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/swflx-obs_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swflx-obs_jja.png" alt="SWFLX-OBS ANN">
	  </a>
	</div>
      </figure>

      <figure id="LWFLX">
	<figcaption>Net Surface Long Wave Flux</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/lwflx_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwflx_am.png" alt="LWFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwflx-obs_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwflx-obs_am.png" alt="LWFLX-OBS ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwflx_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwflx_djf.png" alt="LWFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwflx-obs_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwflx-obs_djf.png" alt="LWFLX-OBS ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwflx_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwflx_jja.png" alt="LWFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwflx-obs_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwflx-obs_jja.png" alt="LWFLX-OBS ANN">
	  </a>
	</div>
      </figure>

      <figure id="SHFLX">
	<figcaption>Sensible Heat Flux</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/shflx_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/shflx_am.png" alt="SHFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/shflx-obs_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/shflx-obs_am.png" alt="SHFLX-OBS ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/shflx_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/shflx_djf.png" alt="SHFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/shflx-obs_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/shflx-obs_djf.png" alt="SHFLX-OBS ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/shflx_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/shflx_jja.png" alt="SHFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/shflx-obs_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/shflx-obs_jja.png" alt="SHFLX-OBS ANN">
	  </a>
	</div>
      </figure>

      <figure id="LHFLX">
	<figcaption>Latent Heat Flux</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/lhflx_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lhflx_am.png" alt="LHFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lhflx-obs_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lhflx-obs_am.png" alt="LHFLX-OBS ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lhflx_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lhflx_djf.png" alt="LHFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lhflx-obs_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lhflx-obs_djf.png" alt="LHFLX-OBS ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lhflx_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lhflx_jja.png" alt="LHFLX ANN">
	  </a>
	  <a href="<?php echo $plotdir ?>/lhflx-obs_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lhflx-obs_jja.png" alt="LHFLX-OBS ANN">
	  </a>
	</div>
      </figure>

      <figure id="POLARSW">
	<figcaption>Polar Shortwave Flux</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/swgdwn_nha_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swgdwn_nha_jja.png" alt="SWDOWN NP JJA">
	  </a>
	  <a href="<?php echo $plotdir ?>/swgdwn_diff_jra55do_nha_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swgdwn_diff_jra55do_nha_jja.png" alt="SWDOWN-OBS NP JJA">
	  </a>
	  <a href="<?php echo $plotdir ?>/swgdwn_nha_mam.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swgdwn_nha_mam.png" alt="SWDOWN NP MAM">
	  </a>
	  <a href="<?php echo $plotdir ?>/swgdwn_diff_jra55do_nha_mam.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swgdwn_diff_jra55do_nha_mam.png" alt="SWDOWN-OBS NP MAM">
	  </a>
	  <a href="<?php echo $plotdir ?>/swgdwn_sha_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swgdwn_sha_djf.png" alt="SWDOWN SP DJF">
	  </a>
	  <a href="<?php echo $plotdir ?>/swgdwn_diff_jra55do_sha_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/swgdwn_diff_jra55do_sha_djf.png" alt="SWDOWN-OBS SP DJF">
	  </a>
	</div>
      </figure>

      <figure id="POLARLW">
	<figcaption>Polar Longwave Flux</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/lwgdwn_nha_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwgdwn_nha_jja.png" alt="LWDOWN NP JJA">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwgdwn_diff_jra55do_nha_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwgdwn_diff_jra55do_nha_jja.png" alt="LWDOWN-OBS NP JJA">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwgdwn_nha_mam.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwgdwn_nha_mam.png" alt="LWDOWN NP MAM">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwgdwn_diff_jra55do_nha_mam.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwgdwn_diff_jra55do_nha_mam.png" alt="LWDOWN-OBS NP MAM">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwgdwn_sha_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwgdwn_sha_djf.png" alt="LWDOWN SP DJF">
	  </a>
	  <a href="<?php echo $plotdir ?>/lwgdwn_diff_jra55do_sha_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/lwgdwn_diff_jra55do_sha_djf.png" alt="LWDOWN-OBS SP DJF">
	  </a>
	</div>
      </figure>

      <figure id="POLAR">
	<figcaption>Polar Radiative Flux (LW+SW DOWN)</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/rad_diff_jra55do_sha_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/rad_diff_jra55do_sha_djf.png" alt="SW+LWDOWN-OBS SP DJF">
	  </a>
	</div>
      </figure>
    </div>

  </body>

</html>
