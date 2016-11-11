<?php
    //jedyna klasa w której muszę coś tłumaczyć - generalnie ta klasa obsługuje wszystkie przekierowania i
    //dzięki temu nazwy metod z kontrolerów wywołuje się przez GETa prosto z adresu
    //KONIECZNIE musi być htaccess taki jaki jest w folderze z index.php, inaczej nie zadziała!
    class Application {
        private $url_controller = null;
        private $url_action = null;
        private $url_params = array();

        public function __construct() {
            //rozbijam adres - p. komentarz w splitUrl();
            $this->splitUrl();

            //jesli nie ma wybranego kontrolera (tj. wpisany adres typu http://localhost/), to ładuje domyslny
            //kontroler Home i wywoluje metode index (ktora przekierowuje na Orders - musiałem to zrobić pośrednio
            //żeby uniknć copy-paste w Javascripcie)
            if (!isset($this->url_controller)) {
                require APP.'controller/home.php';
                $page = new Home();
                $page->index();
            }
            //jeśli jest wybrana jakaś podstrona, sprawdzamy czy jest dla niej kontroler
            elseif (file_exists(APP.'controller/'.$this->url_controller.'.php')) {
                //jest, wiec go ładujemy
                require APP.'controller/'.$this->url_controller.'.php';
                //nazwa już niepotrzebna, więc w polu url_controller trzymamy obiekt typu aktywnego kontrolera
                $this->url_controller = new $this->url_controller();

                //sprawdzamy czy istnieje metoda klasy aktywnego kontrolera
                if (method_exists($this->url_controller, $this->url_action)) {
                    //wywolujemy ja z parametrami lub bez (zalezy czy sa - empty() to sprawdza)
                    if (!empty($this->url_params)) {
                        call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                    } 
                    else {
                        $this->url_controller->{$this->url_action}();
                    }
                }
                else {
                    //nie ma takiej metody, może w ogóle nie było żadnej?
                    if (strlen($this->url_action) == 0) {
                        //tak bylo wiec wywolujemy index (bo to logiczne)
                        $this->url_controller->index();
                    }
                    else {
                        //tak nie bylo, ale nie wywalamy bledu tylko od razu przekierowuje do orders bo jestem leniwy
                        header('location: '.URL.'orders');
                    }
                }
            } 
            //wszystko sie popsulo i tu powinno być przekierowanie na strone ze wystapil blad,
            //ale olewamy je i idziemy po prostu do orders
            else {
                header('location: '.URL.'orders');
            }
        }

        private function splitUrl() {
            if (isset($_GET['url'])) {
                //adres ma postać typu index.php?url=... - przynajmniej dla serwera (dzieki .htaccess wywalamy
                //wszystko przed "=" dla czytelnosci), wiec rozbijam to co jest po = w powyzszym adresie,
                //a ma to postac kontroler/metoda/parametry, np. index.php?url=orders/details/3
                $url = explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));

                //mam teraz tablice url n-elementowa, pod indeksem 0 zawsze jest kontroler, pod 1 zawsze metoda,
                //w kolejnych parametr lub wiele parametrow, wiec przypisuje to do pól klasy
                $this->url_controller = isset($url[0]) ? $url[0] : null;
                $this->url_action = isset($url[1]) ? $url[1] : null;

                //usuwam z tablicy nazwe kontrolera i metody...
                unset($url[0], $url[1]);

                //...żeby mieć tablicę z parametrami (już numerowane od 0!)
                $this->url_params = array_values($url);
            }
        }
}
