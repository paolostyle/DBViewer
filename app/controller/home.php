<?php
	// tylko przekierowuje na orders jako stronę główna zeby js dzialal jak nalezy
	class Home extends Controller {
		public function index() {
			header('location: '.URL.'orders');
		}
	}
?>