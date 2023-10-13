<?php 

// jualan produk
// komik
// game

use FFI\Exception;

class produk {
    private $judul ,
            $penulis,
            $penerbit,
            $harga,
            $diskon = 0;

   



    public function __construct($judul = "judul", $penulis = "penulis", $penerbit  = "penerbit", $harga =0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function setJudul($judul){
        
        $this->judul = $judul;
    }

    public function setPenulis($penulis){
        
        $this->penulis = $penulis;
    }

    public function setPenerbit($penerbit){
        
        $this->penerbit = $penerbit;
    }

    public function setHarga($harga){
        
        $this->harga = $harga;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;

    }

    public function getJudul(){
        return $this->judul;
    }

    public function getPenulis(){
        return $this->penulis;
    }

    public function getPenerbit(){
        return $this->penerbit;
    }


    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getDiskon(){
        return $this->diskon;
    }


    public function getLabels() {
        return "$this->penulis, $this->penerbit," ;
    }

    public function getInfoProduk() {
        $str = " {$this->judul} | {$this-> getLabels()} (Rp . {$this -> harga})";
        return $str; 
    }
    
}

class komik extends produk {
    public $jmlhHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlhHalaman = 0) {

        parent::__construct($judul ,$penulis ,$penerbit, $harga );

        $this->jmlhHalaman = $jmlhHalaman;
    }

    public function getInfoProduk() {
        $str = "Komik :". parent::getInfoProduk() ." - {$this->jmlhHalaman} Halaman.)";
        return $str; 
    }
}

class game extends produk {
    public $waktumain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit  = "penerbit", $harga = 0, $waktumain = 0) {

        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->waktumain = $waktumain;
    }

    

    public function getInfoProduk() {
        $str = "Komik :". parent::getInfoProduk() ." ~ {$this->waktumain} Jam.)";
        return $str; 
    }
}

class infoProduk {
    
    public function cetak(Produk $produk) {
        $str = "{$produk -> judul} | {$produk -> getLabels()}  (Rp . {$produk -> harga}) | ";
        return $str;
    }
}

$produk1 = new komik("naruto","masashi kishimoto","shonen jump",30000,100);
$produk2 = new game("uncharted","neil druckman","sony computer",250000,50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();
echo "<hr>";

echo $produk1->setPenulis("Rahma");
echo $produk1->getPenulis();

?>