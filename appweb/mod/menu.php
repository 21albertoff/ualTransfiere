<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none" style="background-color: #fff;">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                           <img src="images/01 Logotipo.png" style="max-width: 125px;" alt="UALTransfiere"/>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                           <button style="width: 100%; padding: 0 35px;" type="submit" data-toggle="modal" data-target="#modalregla" class="au-btn au-btn-icon au-btn--green au-btn--small" style="padding: 0 35px;">
                           <i class="fas fa-plus"></i>Añadir seguimiento</button>
                        </li>
                        <li class=<?php if ($titulo == "Hashtags") {?>class="active"<?php }?> class="has-sub">
                           <a class="js-arrow" href="#">
                              <i class="fas fa-hashtag"></i>Hashtags</a>
                           <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                              <li>
                                 <a href="hashtag.php">Recopilados</a>
                              </li>
                              <li>
                                 <a href="seguimientoh.php">Monitorizando</a>
                              </li>
                                 <li>
                                 <a href="seguimientoh.php">Historicos</a>
                              </li>
                           </ul>
                        </li>
                        <li class=<?php if ($titulo == "Posteadores") {?>class="active"<?php }?> class="has-sub">
                           <a class="js-arrow" href="#">
                           <i class="fab fa-twitter"></i>Posteadores</a>
                           <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
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
                    </ul>
                </div>
            </nav>
        </header>
		<!-- END HEADER MOBILE-->


<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
               <a href="index.php">
               <img src="images/01 Logotipo.png" alt="UALTransfiere"/>
               </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
               <nav class="navbar-sidebar">
                  <ul class="list-unstyled navbar__list">
                     <?php require "appweb/mod/menucomponentes.php"; ?>
                  </ul>
               </nav>
            </div>
</aside>