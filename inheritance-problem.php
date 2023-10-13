<?php 

// jualan produk
// komik
// game

class produk {
    public $judul ,
            $penulis  ,
            $penerbit,
            $harga ,
            $jmlhHalaman,
            $waktumain,
            $tipe;

    public function __construct($judul = "judul",$penulis = "penulis",$penerbit  = "penerbit",$harga =0, $jmlhHalaman =0, $waktumain=0, $tipe ) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlhHalaman = $jmlhHalaman;
        $this->waktumain = $waktumain;
        $this->tipe = $tipe;
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap() {
        $str = "{$this->tipe} : {$this->judul} | {$this-> getLabel()} (Rp . {$this -> harga})";
        if($this->tipe == "komik") {
            $str .= " - {$this->jmlhHalaman} Halaman.";
        }else if($this->tipe == "game") {
            $str .= " - {$this->waktumain} Jam.";
        }
        return $str; 
    }

}

class CetakinfoProduk {
    public function cetak(Produk $produk){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 = new produk("naruto","masashi kishimoto","shonen jump",30000,100,0, "komik");
$produk2 = new produk("uncharted","neil druckman","sony computer",250000,0,50, "game");


echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
?>