<div class="navbar-fixed">
	<nav>
	    <div class="nav-wrapper">
	      <a href="index.php" class="brand-logo"><img src="../images/logo.png"></img></a>
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul class="right hide-on-med-and-down fontSizeNav">
	        <li class="<?= $_SERVER["PHP_SELF"]=="/enviroment.php"?active:''?>"><a href="enviroment.php">Ambiente</a></li>
	        <li class="<?= $_SERVER["PHP_SELF"]=="/history.php"?active:''?>"><a href="history.php">Historicos</a></li>
	        <li class="<?= $_SERVER["PHP_SELF"]=="/activator.php"?active:''?>"><a href="activator.php">Activadores</a></li>
<!--	        <li><a href="mobile.html">Mobile</a></li>
-->	      </ul>
	      <ul class="side-nav" id="mobile-demo">
	        <li class="active class="<?= $_SERVER["PHP_SELF"]=="/enviroment.php"?active:''?>""><a href="enviroment.php">Ambiente</a></li>
	        <li class="<?= $_SERVER["PHP_SELF"]=="/history.php"?active:''?>"><a href="history.php">Historicos</a></li>
	        <li class="<?= $_SERVER["PHP_SELF"]=="/activator.php"?active:''?>"><a href="activator.php">Activadores</a></li>
<!--	        <li><a href="mobile.html">Mobile</a></li>
-->	      </ul>
	    </div>
	</nav>		
</div>	