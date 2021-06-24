<h2 class="title-10 m-b-35"></h2>
<h2 class="title-10 m-b-35">
<?php if ($titulo == "Hashtags" || $titulo == "Hashtags seguidos" || $titulo == "Información hashtag" || $titulo == "Seguimiento") {?><i class="fas fa-hashtag"></i> <?php }?>
<?php if ($titulo == "Posteadores" || $titulo == "Posteadores seguidos" || $titulo == "Información posteador" ) {?><i class="fab fa-twitter"></i> <?php }?>
<?php if ($titulo == "Menciones" || $titulo == "Menciones seguidos" || $titulo == "Información mencion") {?><i class="fas fa-at"></i> <?php }?>
<?php if ($titulo == "Enlaces" || $titulo == "Información enlace"){?><i class="fas fa-link"></i> <?php }?>
<?php echo $titulo ?> <?php if ($titulo == "Información enlace"){?><span class="badge badge-light"><?php echo $nombreEnlace;  if ($verificado == 1){?> <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2; font-size: 19px;"></i></span>  <?php }?> </span> 
<?php }?> <?php if ($titulo == "Información hashtag"){?><span class="badge badge-light"><?php echo $nombreH ?></span> <?php }?>
<?php if ($titulo == "Información mencion"){?><span class="badge badge-light"><?php echo $nombreM; if ($verificado == 1){?> <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2; font-size: 19px;"></i></span><?php }?></span>  <?php }?>
<?php if ($titulo == "Información posteador"){?><span class="badge badge-light"><?php echo $nombreP; if ($verificado == 1){?> <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2; font-size: 19px;"></i></span><?php }?></span>  <?php }?>
</h2>
