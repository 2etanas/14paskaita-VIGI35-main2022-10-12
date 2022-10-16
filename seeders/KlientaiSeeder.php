<?php

include "../utilities/FileManger.php";

echo "<h1>KLIENTAI2.json kurimas ir seedinimas</h1>";

class ClientSeeder {
    use FileManager;
    public $pavardeX = "Bar";
    public $vardasX = "Povilas";
    public function createAClient() {
        $skaicius = rand(111,999);
         $this->naujasDemuo = array(
            "vardas" => $this->vardasX.$skaicius,
            "pavarde"=> $this->pavardeX.$skaicius,
            "amzius" => rand(10,99),
            "miestas"=>"Kaunas"
         );
         $this->data[] = $this->naujasDemuo;
        return $this->data;
        }
        
    public function    seedAClient() {
        if(!is_file("../klientai2.json")){
            touch("../klientai2.json");
        }
        for($i = 0; $i<100; $i++){
            $this->file = "../klientai2.json";
            $this->readFile("../klientai2.json");
            $this->createAClient();
            var_dump($this->naujasDemuo);
            $this->writeFile($this->data);
            }
    }
  }


$SeederC = new ClientSeeder();
$SeederC->seedAClient();

?>