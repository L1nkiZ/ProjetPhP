<?php
session_start();

/*
 * Charge le frontController
 */
require_once 'controllers/FrontController.php';


/*
 * instancie FrontController
 * Si un controller match avec la $_GET['page'],
 * on charge le bon controller avec la fonction controllerChargeur
 */
$frontController = new FrontController();
$controller = $frontController->controllerChargeur();
?>

<!DOCTYPE html>
<html>

    <?php include_once 'views/head.php'; ?>
    <body>

    	<?php include_once 'views/menu.php'; ?>

    	<div class="container">
    		<div class="mt-4">
		    	<?php
		    		/*
		    		 * Récupère la bonne vue en fonction de la $_GET['page']
		    		 * Si vide, on affiche la page accueil.php
		    		 */
		    		$controller->render(isset($_GET['page']) ? $_GET['page'] : '');
		    	?>
		    </div>
	    </div>
	</body>
</html>