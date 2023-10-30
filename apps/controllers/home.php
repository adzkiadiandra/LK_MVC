<?php

class home extends controller{
    
    private $dt;
    private $df;
    public function __construct (){
        $this->dt = $this->loadmodel("barang");
        $this->df = $this->loadmodel("daftarBarang");
    }

    public function index(){
        echo "Anda memanggil action index \n";
        }
    public function home($data1, $data2){
        echo "Anda memamggil action home dengan data1 = $data1 dan data2 = $data2 \n";
    }

    public function lihatData($id){
     $data = $this->df->getDataById($id);
        $this->loadView('template/header', ['title'=>'Detail Barang']);
        $this->loadView('homes/detailbarang',$data);
        $this->loadView('template/footer');
        
    }
    public function listBarang(){
        $data = $this->df->getDataAll();
        $this->loadView('template/header', ['title'=>'List Barang']);
        $this->loadView('homes/listbarang',$data);
        $this->loadView('template/footer');
        
    }

    public function insertbarang(){
        if(!empty($_POST)){
            if ($this->df->tambahBarang($_POST)){
                header('Location: '.BASE_URL.'index.php?r=home/listbarang');
                exit;
            }
        } 
        $this->loadView('template/header', ['title'=>'Insert Barang']);
        $this->loadView('homes/insert');
        $this->loadView('template/footer');
    }
    public function updatebarang($id){
        $data = $this->df->getDataById($id);

        if(!empty($_POST)){
            if ($this->df->updatebarang($_POST)){
                header('Location: '.BASE_URL.'index.php?r=home/listbarang');
                exit;
            }

        $this->loadView('template/header', ['title'=>'Insert Barang']);
        $this->loadView('homes/update', $data);
        $this->loadView('template/footer');
    }

}

public function deletebarang($id){
    $data = $this->df->getDataById($id);
        if ($this->df->deletebarang($id)){
            header('Location: '.BASE_URL.'index.php?r=home/listbarang');
            exit;
        }

 

}
}