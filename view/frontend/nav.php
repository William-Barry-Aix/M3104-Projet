<?php ob_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-toggleable-sm navbar-dark">
	    <a class="navbar-brand" href="index.php">
            <img src="/public/image/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon custom-toggler"></span>
            </button>
	            <div class="collapse navbar-collapse navbar-toggleable-md justify-content" id="navbarSupportedContent">
	                <ul class="nav nav-pills navbar-nav ml-auto ">
                        <?php if (!isset($_SESSION['type'])): ?>
                            <li class="nav-item py-1">
                                <a class="nav-link px-3" href="index.php?action=signup"><?= _("Sign up")?></a>
                            </li>
                            <li class="nav-item py-1">
                                <a class="nav-link px-3" href="index.php?action=signin"><?= _("Sign in") ?></a>
                            </li>
                        <?php endif; ?>
	                    <li class="nav-item py-1 ">
                            <a class="nav-link px-3" href="index.php?action=translation"><?= _("Translate") ?></a>
	                    </li>
                        <?php if (isset($_SESSION['type'])): ?>
                            <?php if ($_SESSION['type'] == 0): ?>
                                <li class="nav-item dropdown py-1">
                                    <a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?= _("Options") ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu py-0  my-0 border-0">
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=compte"><?= _("Account") ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action="><?= _("Mes demandes") ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=deconnexion"><?= _("Disconnection") ?></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if ($_SESSION['type'] == 1): ?>
                                <li class="nav-item dropdown py-1">
                                    <a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?= _("Options") ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu py-0  my-0 border-0">
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=compte"><?= _("Account") ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=translation"><?= _("Add translation") ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=deconnexion"><?= _("Disconnection") ?></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if ($_SESSION['type'] == 2): ?>
                                <li class="nav-item dropdown py-1">
                                    <a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?= _("Options") ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu py-0  my-0 border-0">
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=compte"><?= _("Account") ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=gererSite"><?= _("Manage website") ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=deconnexion"><?= _("Disconnection") ?></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
	                    <li class="nav-item dropdown py-1">
							<a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?= _("Lang") ?><b class="caret"></b></a>
							<ul class="dropdown-menu py-0  my-0 border-0">
								<li class="px-3  nav-item"><a class="nav-link" href="#">Fra</a></li>
								<li class="px-3  nav-item"><a class="nav-link" href="#">Ang</a></li>
							</ul>
						</li>
                    </ul>
	            </div>
        </nav>
<?php $nav = ob_get_clean(); ?>