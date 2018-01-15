<?php ob_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-toggleable-sm navbar-dark">

	            <a class="navbar-brand" href="#">Navbar</a>
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon custom-toggler"></span>
	            </button>
	            <div class="collapse navbar-collapse navbar-toggleable-md justify-content" id="navbarSupportedContent">
	                <ul class="nav nav-pills navbar-nav ml-auto ">
                        <?php if (!isset($_SESSION['type'])): ?>
                        <li class="nav-item py-1">
	                        <a class="nav-link px-3" href="#">Sign up</a>
	                    </li>
	                    <li class="nav-item py-1">	                        
	                        <a class="nav-link px-3" href="index.php?action=signin">Sign in</a>
	                    </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['type'])): ?>
                            <li class="nav-item py-1">
                                <a class="nav-link px-3" href="index.php?action=deconnexion">Deconnexion</a>
                            </li>
                        <?php endif; ?>
	                    <li class="nav-item py-1 ">
	                        <a class="nav-link px-3" href="#">Translate</a>
	                    </li>
	                    <li class="nav-item dropdown py-1">
							<a href="#" class="nav-link px-3 dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i>Lang<b class="caret"></b></a>
							<ul class="dropdown-menu py-0  my-0 border-0">
								<li class="px-3  nav-item"><a class="nav-link" href="#">Fra</a></li>
								<li class="px-3  nav-item"><a class="nav-link" href="#">Ang</a></li>
							</ul>
						</li>
	                </ul>                
	            </div>
        </nav>
<?php $nav = ob_get_clean(); ?>