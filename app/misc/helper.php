<?php
	//pomocnicze funkcje statyczne
	class Helper {
		//czyści stringi ze zbędnych śmieci i zapobiega atakom typu injection, formatuje liczby, zwraca tekst lub wypisuje go
		static public function cln($text, $isNum=false, $echo=true) {
			if($isNum == true) {
				if($echo == true) echo htmlspecialchars(number_format(trim($text), 2, ",", " "), ENT_QUOTES, 'UTF-8');
				else return htmlspecialchars(number_format(trim($text), 2, ",", " "), ENT_QUOTES, 'UTF-8');
			}
			else {
				if($echo == true) echo htmlspecialchars(trim($text), ENT_QUOTES, 'UTF-8');
				else return htmlspecialchars(trim($text), ENT_QUOTES, 'UTF-8');
			}
		}

		//zwraca aktywna strone - do obslugi JS i podswietlenia w menu
		static public function activePage() {
			if (isset($_GET['url'])) {
           		$url = explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        		return isset($url[0]) ? $url[0] : null;
        	}
		}
	}
?>