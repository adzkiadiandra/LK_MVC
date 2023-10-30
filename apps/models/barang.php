<?php
class barang{
    private $id;
    private $nama;
    private $qty;

    public function __construct(){
        $this->id = "B01";
        $this->nama = "beras";
        $this->qty = "100";
    }

    public function getdata(){
        return "data yang diminta dari model barang : $this->nama, $this->id, $this->qty";
    }
    public function getdataone(){
        $data =['id' =>$this->id,
                'nama' =>$this->nama,
                'qty' =>$this->qty,
    ];
    return $data;
}
}