<?php

include "utilities/FileManger.php";
include "utilities/Sortable.php";
include "utilities/Filter.php";

class Klientai {

    use FileManager, Sortable, Filter;

    protected $klientai = [];
    protected $collumns = array(
        "vardas" => "Vardas",
        "pavarde" => "Pavarde",
        "amzius" => "Amzius",
        "miestas" => "Miestas"
    );

    public function __construct() {
        //nurodau koki faila nuskaitau
        $this->file = "klientai2.json";
        //nauskaitau faila - $data;
        $this->readFile();
        $this->klientai = $this->data;
        //rikiuojam
        $this->klientai = $this->sort($this->klientai);
        //filtruojam
        $this->klientai = $this->filter($this->klientai, "miestas" );
    }

    public function getClients() {
        return $this->klientai;
    }

    public function getCollumns() {
        return $this->collumns;
    }

}