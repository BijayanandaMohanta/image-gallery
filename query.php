<?php 

class operation{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "test";
    public $con;

    public function __construct(){
        try{
            $this->con = new mysqli($this->host,$this->username, $this->password,$this->dbname);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function saveImage($file){
        echo "<pre>";
        print_r($file);
        // die();
        $format = array('jpg', 'jpeg', 'png');
        $exntension = explode('.', $file['name']);
        // print_r($exntension);
        // die();
        $fileActExt = strtolower(end($exntension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'collection-img/'.$fileNew; 

        if(in_array($fileActExt,$format)){
            if($file['size']>0 && $file['error']==0){
                if(move_uploaded_file($file['tmp_name'], $filePath)){
                    $query = "INSERT INTO img (`path`) VALUES ('$filePath')";
                    $sql = $this->con->query($query);
                    if($sql==true){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }
        }
    }
    public function displayImages(){
        $query = "SELECT * FROM img";
        $sql = $this->con->query($query);
        $data = array();
        if($sql->num_rows > 0){
            while($row = $sql->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else{
            return false;
        }
    }
}

?>