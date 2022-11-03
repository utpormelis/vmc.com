<?php 
class usuario{
    private $usuario;
    private $password;
    private $salt;
    private $nombre;
    public function __construct($usuario,$password,$salt,$nombre)
    {
        $this->usuario=$usuario;
        $this->password=$password;
        $this->salt=$salt;
        $this->nombre=$nombre;

    }
    
    public function valida_usuario()
    {
        $tabla[]=["usuario"=>"jperez","password"=>"7f8af1297f3fbff51cfd2040671df2ebb0f1792f","salt"=>"t8eA4DmdG$9&","nombre"=>"juan perez"];
        $tabla[]=["usuario"=>"mcastro","password"=>"59cacaf4320aaa58fe2dea485519d189fa89037a","salt"=>"5QHj@WQw4Nt8","nombre"=>"Maria Castro"];
        $tabla[]=["usuario"=>"lsanchez","password"=>"9fa7b4ffb86adf29e44821f4376777316487e2b9","salt"=>"94rop^%7Gjl","nombre"=>"Luis Sanchez"];
        foreach($tabla as $t)
        {
            $pass=sha1($this->password.$t["salt"]);
            if($this->usuario==$t["usuario"] && $pass == $t["password"])
            return $t;
        }
        return [];
    }

    
}
?>