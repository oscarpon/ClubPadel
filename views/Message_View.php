<?php

/*	Función: vista de un mensaje(message) realizada con una clase donde se muestra el mensaje deseado
*/
class MessageView { // declaración de la función

	function __construct( $text, $ruta ) {
		$this->text = $text;
		$this->ruta = $ruta;
		$this->render();
	}

	function render() {

		include '../views/Header.php';
?>
		<br>
		<br>
		<br>
		<div class="fondoMsg">
		<div id="confirmacionEliminar">
			<?php
				echo $this->text; // se muestra por pantalla el texto
			?>
		</div>
		<br>
		<br>
		<br>

		<form action='<?php $this->ruta?>'>
			<button id="atrasMsg" type="submit">Atrás</button>
		</form>
	</div>


<?php
	include '../views/Footer.php';
	}
}
?>
