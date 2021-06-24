<li>
	<button type="submit" data-toggle="modal" data-target="#modalregla" class="au-btn au-btn-icon au-btn--green au-btn--small" style="width: 100%; margin: 2px;line-height: 35px;font-size: 14px;">
	<i class="fas fa-plus"></i>Añadir seguimiento</button>
</li>
<li class=<?php if ($titulo == "Hashtags") {?>class="active"<?php }?> class="has-sub">
	<a class="js-arrow" href="#">
	<i class="fas fa-hashtag"></i>Hashtags</a>
	<ul class="list-unstyled navbar__sub-list js-sub-list">
		<li>
			<a href="hashtag.php">Recopilados</a>
		</li>
		<li>
			<a href="seguimientoh.php">Monitorizando</a>
		</li>
			<li>
			<a href="historicoh.php">Historicos</a>
		</li>
	</ul>
</li>
<li class=<?php if ($titulo == "Posteadores") {?>class="active"<?php }?> class="has-sub">
	<a class="js-arrow" href="#">
	<i class="fab fa-twitter"></i>Posteadores</a>
	<ul class="list-unstyled navbar__sub-list js-sub-list">
		<li>
			<a href="posteadores.php">Recopilados</a>
		</li>
		<li>
			<a href="seguimientop.php">Monitorizando</a>
		</li>
			<li>
			<a href="seguimientop.php">Historicos</a>
		</li>
	</ul>
</li>
<li <?php if ($titulo == "Menciones") {?>class="active"<?php }?>>
	<a href="menciones.php">
	<i class="fas fa-at"></i>Menciones</a>
</li>
<li <?php if ($titulo == "Enlaces") {?>class="active"<?php }?>>
	<a href="enlaces.php">
	<i class="fas fa-link"></i>Enlaces</a>
</li>