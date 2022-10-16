<?php

include "../utilities/FileManger.php";

echo "<h1>KOMPANIJOS2.json kurimas ir seedinimas</h1>";
//Kompanijos stulpeliai: pavadinimas, tipas(UAB, MB, AB), aprašymas, miestas

class CompanySeeder {
    use FileManager;
    public $pavadinimas = "DebesuPuga";
    public $tipas = ["UAB","MB","AB"];
    public $miestas = ["Vilnius", "Kaunas", "Klaipeda", "Alytus"];

    public function createACompany() {
        $skaicius = rand(111,999);
         $this->naujasDemuo = array(
            "pavadinimas" => $this->miestas[rand(0,2)],
            "tipas"=> $this->tipas[rand(0,2)],
            "aprasymas" => "Labai gera puga",
            "miestas"=> $this->miestas[rand(0,3)]
         );
         $this->data[] = $this->naujasDemuo;
        return $this->data;
        }
        
    public function    seedACompany() {
        if(!is_file("../kompanijos2.json")){
            touch("../kompanijos2.json");
        }
        for($i = 0; $i<100; $i++){
            $this->file = "../kompanijos2.json";
            $this->readFile("../kompanijos2.json");
            // $this->naujasDemuo["aprasymas"] = $this->naujasDemuo["aprasymas"] . $i; // neveikia, turbut reikia keisti createACompany() 
            $this->createACompany();
            var_dump($this->naujasDemuo);
            $this->writeFile($this->data);
            }
    }
  }


$SeederC = new CompanySeeder();
$SeederC->seedACompany();

?>