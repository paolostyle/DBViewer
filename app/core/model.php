<?php
	class Model {
		function __construct($db) { // konstruktor wywoluje polaczenie z baza za pomoca PDO
			try {
				$this->db = $db;
			} catch (PDOException $e) {
				exit("Nie można połaczyć z baza danych");
			}
		}

		public function getOrdersList() {
			$sql = "SELECT o.id, c.name, c.surname, o.order_date, o.amount, d.name AS delivery FROM clients c JOIN orders o ON c.id=o.ordered_by JOIN delivery_method d ON d.id=o.delivery_method_id ORDER BY o.id";
			$query = $this->db->prepare($sql);
			$query->execute();
			
			return $query->fetchAll();

		}

		public function getOrderedItems($orderId) {
			//ceny przedmiotow
			$sql = "SELECT name, price FROM items WHERE id IN (SELECT items_id FROM orders_has_items WHERE orders_id=:id);";
			$query = $this->db->prepare($sql);
			$query->bindParam(':id', $orderId, PDO::PARAM_INT);
			$query->execute();
			$items = $query->fetchAll();

			//cena dostawy
			$sql = "SELECT cost AS price FROM delivery_method WHERE id IN (SELECT delivery_method_id FROM orders WHERE id=:id);";
			$query = $this->db->prepare($sql);
			$query->bindParam(':id', $orderId, PDO::PARAM_INT);
			$query->execute();
			$delivery = $query->fetchAll();

			return array_merge($items, $delivery);
		}

		public function removeOrder($orderId) {
			$sql = "DELETE FROM orders_has_items WHERE orders_id=:id";
			$query = $this->db->prepare($sql);
			$query->bindParam(':id', $orderId, PDO::PARAM_INT);
			$query->execute();

			$sql = "DELETE FROM orders WHERE id=:id";
			$query = $this->db->prepare($sql);
			$query->bindParam(':id', $orderId, PDO::PARAM_INT);
			$query->execute();
		}

		//funkcje dodatkowe
		public function valueOfOrders() {
			$sql = "SELECT SUM(amount) AS sum FROM orders";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetch();
		}

		public function avgValueOfOrder() {
			$sql = "SELECT AVG(amount) AS avg FROM orders";
			$query = $this->db->prepare($sql);
			$query->execute();

			return $query->fetch();
		}

		public function getItemsList() {
			$sql = "SELECT id, name, price FROM items";
			$query = $this->db->prepare($sql);
			$query->execute();
			
			return $query->fetchAll();
		}

		public function getItemDetails($itemId) {
			$sql = "SELECT id, name, price, `desc` FROM items WHERE id=:id";
			$query = $this->db->prepare($sql);
			$query->bindParam(':id', $itemId, PDO::PARAM_INT);
			$query->execute();

			return $query->fetch();
		}

		public function removeItem($itemId) {
			$sql = "DELETE FROM orders_has_items WHERE items_id=:id";
			$query = $this->db->prepare($sql);
			$query->bindParam(':id', $itemId, PDO::PARAM_INT);
			$query->execute();

			$sql = "DELETE FROM items WHERE id=:id";
			$query = $this->db->prepare($sql);
			$query->bindParam(':id', $itemId, PDO::PARAM_INT);
			$query->execute();
		}

		//INSERT i UPDATE w jednym - chyba może tak być?
		public function addEditItem($itemId, $itemName, $itemPrice, $itemDesc) {
			$sql = "INSERT INTO items (id, name, price, `desc`) 
					VALUES(:id, :name, :price, :descr) ON DUPLICATE KEY UPDATE name=:name, price=:price, `desc`=:descr";
			$query = $this->db->prepare($sql);
			$query->bindParam(':id', $itemId, PDO::PARAM_INT);
			$query->bindParam(':name', $itemName, PDO::PARAM_STR);
			$query->bindParam(':price', $itemPrice, PDO::PARAM_STR);
			$query->bindParam(':descr', $itemDesc, PDO::PARAM_STR);
			$query->execute();
		}
	}
?>