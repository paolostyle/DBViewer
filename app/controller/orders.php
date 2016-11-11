<?php
	class Orders extends Controller {
		public function index() {
			$orders = $this->model->getOrdersList();
			$value = $this->model->valueOfOrders();
			$avg = $this->model->avgValueOfOrder();

			//ładowanie widoków
			require APP.'view/templates/header.php';
			require APP.'view/orders/index.php';
			require APP.'view/templates/footer.php';
		}

		public function details($id) {
			$details = $this->model->getOrderedItems($id);
			require APP.'view/orders/details.php';
		}

		public function remove($id) {
			$this->model->removeOrder($id);
		}
	}
?>