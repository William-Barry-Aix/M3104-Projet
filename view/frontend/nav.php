<?php ob_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-toggleable-sm navbar-dark">
	    <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon custom-toggler"></span>
            </button>
	            <div class="collapse navbar-collapse navbar-toggleable-md justify-content" id="navbarSupportedContent">
	                <ul class="nav nav-pills navbar-nav ml-auto ">
                        <?php if (!isset($_SESSION['type'])): ?>
                            <li class="nav-item py-1">
                                <a class="nav-link px-3" href="index.php?action=signup"><?= $tradList["Sign up"]?></a>
                            </li>
                            <li class="nav-item py-1">
                                <a class="nav-link px-3" href="index.php?action=signin"><?= $tradList["Sign in"] ?></a>
                            </li>
                        <?php endif; ?>
	                    <li class="nav-item py-1 ">
                            <a class="nav-link px-3" href="index.php?action=translation"><?= $tradList["Translate"] ?></a>
	                    </li>
                        <?php if (isset($_SESSION['type'])): ?>
                            <?php if ($_SESSION['type'] == 0): ?>
                                <li class="nav-item dropdown py-1">
                                    <a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?=$tradList["Options"]?><b class="caret"></b></a>
                                    <ul class="dropdown-menu py-0  my-0 border-0">
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=compte"><?= $tradList["Account"]?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=deconnexion"><?= $tradList["Disconnection"] ?></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if ($_SESSION['type'] == 1): ?>
                                <li class="nav-item dropdown py-1">
                                    <a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?= $tradList["Options"] ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu py-0  my-0 border-0">
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=compte"><?= $tradList["Account"]?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=deconnexion"><?= $tradList["Disconnection"] ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=visuDemandes"><?= $tradList["Mes Demandes"] ?></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if ($_SESSION['type'] == 2): ?>
                                <li class="nav-item dropdown py-1">
                                    <a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?= $tradList["Options"] ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu py-0  my-0 border-0">
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=compte"><?= $tradList["Account"] ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=manageTranslations"><?= $tradList["Manage translations"] ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=deconnexion"><?= $tradList["Disconnection"] ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=manageUsers"><?= $tradList["Manage Users"] ?></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if ($_SESSION['type'] == 3): ?>
                                <li class="nav-item dropdown py-1">
                                    <a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?= _("Options") ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu py-0  my-0 border-0">
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=compte"><?= $tradList["Account"] ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=manageTranslations"><?= $tradList["Manage translations"] ?></a></li>
                                        <li class="px-3  nav-item"><a class="nav-link" href="index.php?action=deconnexion"><?= $tradList["Disconnection"] ?></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                        <?php endif; ?>
	                    <li class="nav-item dropdown py-1">
							<a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><?= $tradList["Lang"] ?><b class="caret"></b></a>
							<ul class="dropdown-menu py-0  my-0 border-0">
                                <?php
                                $before = '';
                                if (isset($_GET['action'])){
                                    $before = $_GET['action'];
                                }
                                ?>
								<li class="px-3  nav-item"><a class="nav-link" href="index.php?action=swap&lang=FR&before=<?= $before ?>">FR</a></li>
								<li class="px-3  nav-item"><a class="nav-link" href="index.php?action=swap&lang=US&before=<?= $before ?>">US</a></li>
							</ul>
						</li>
                    </ul>
	            </div>
        </nav>
<?php $nav = ob_get_clean(); ?>