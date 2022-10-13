<?php

include "../utilities/FileManger.php";

echo "labas";
if(!is_file("klientai.json")){
    touch("klientai.json");

}
class ClientSeeder {
    use FileManager;
    public $pavardeX = "Bar";
    public $vardasX = "Povilas";

    public function seedAClient() {
        $skaicius = rand(111,999);
         $this->naujasKlientas = array(
            "vardas" => $this->vardasX.$skaicius,
            "pavarde"=> $this->pavardeX.$skaicius,
            "amzius" => rand(10,99),
            "miestas"=>"Kaunas"
         );
         $this->data[] = $this->naujasKlientas;
        // writeJson("klientai.json", $this->data);
        return $this->data;
        }
        // public function readAClient($file) {
        //     public $json = file_get_contents($file);
        //    public $result = json_decode($json, true);
        //     return $this->result;
        
        // }
        // public function writeAClient($file) {
        //     $json = json_encode($array);
        //     file_put_contents($file, $json);
        // }
        

    


    
    }


$SeederC = new ClientSeeder();

for($i = 0; $i<100; $i++){
$SeederC->file = "klientai.json";
$SeederC->readFile("klientai.json");
$SeederC->seedAClient();
var_dump($SeederC->naujasKlientas);
$SeederC->writeFile($SeederC->data);
}



?>