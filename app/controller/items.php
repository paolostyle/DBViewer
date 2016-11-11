<?php
	class Items extends Controller {
		public function index() {
			$items = $this->model->getItemsList();

			//ładowanie widoków
			require APP.'view/templates/header.php';
			require APP.'view/items/index.php';
			require APP.'view/items/form.php';
			require APP.'view/templates/footer.php';
		}

		public function edit($id) {
			$itemEd = $this->model->getItemDetails($id);
			require APP.'view/items/form.php';
		}

		public function send() {
			//pozostałe metody sa oczywiste, to niby też ale na wszelki wypadek: 
			//czyszczę tu dane z formularza (te surowe siedza w $_POST[]) i przekazuję je do modelu
			$id = Helper::cln($_POST['id'], false, false);
			$name = Helper::cln($_POST['name'], false, false);
			$price = Helper::cln($_POST['price'], false, false);
			$desc = Helper::cln($_POST['desc'], false, false);

			$this->model->addEditItem($id, $name, $price, $desc);

			header('location: '.URL.'items');
		}

		public function remove($id) {
			$this->model->removeItem($id);
		}
	}
?>