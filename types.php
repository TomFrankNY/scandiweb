<body>
    <?php
        class Dvd {
            var $sku;
            var $name;
            var $price;
            var $size;

            function __construct($sku, $name, $price, $size){
                $this -> sku = $sku;
                $this -> name = $name ;
                $this -> price = $price; 
                $this -> weight = $size; 
            }
        }
        class Book {
            var $sku;
            var $name;
            var $price;
            var $weight;
          
            function __construct($sku, $name, $price, $weight){
                $this -> sku = $sku;
                $this -> name = $name ;
                $this -> price = $price; 
                $this -> weight = $weight; 
            }
        }
        class Furniture {
            var $sku;
            var $name;
            var $price;
            var $H;
            var $W;
            var $L;

            function __construct($sku, $name, $price, $H, $W, $L){
                $this -> sku = $sku;
                $this -> name = $name ;
                $this -> price = $price; 
                $this -> H = $H;
                $this -> W = $W;
                $this -> L = $L;
            }
        }
        // $Book1 = new Book;
        // $Book1 -> title = ;
        // $Book1 -> price = ;
        // $Book1 -> weight = ;
    ?>
</body>