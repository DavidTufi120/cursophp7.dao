
<?php

include ("Sql.php");

class Usuario
{


    private $id;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDeslogin()
    {
        return $this->deslogin;
    }

    /**
     * @param mixed $deslogin
     */
    public function setDeslogin($deslogin): void
    {
        $this->deslogin = $deslogin;
    }

    /**
     * @return mixed
     */
    public function getDessenha()
    {
        return $this->dessenha;
    }

    /**
     * @param mixed $dessenha
     */
    public function setDessenha($dessenha): void
    {
        $this->dessenha = $dessenha;
    }

    /**
     * @return mixed
     */
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    /**
     * @param mixed $dtcadastro
     */
    public function setDtcadastro($dtcadastro): void
    {
        $this->dtcadastro = $dtcadastro;
    }


    public function loadById($id)
    {

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID" => $id

        ));
        if (count($result) > 0) {

            $row = $result[0];

            $this->setId($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));


        }

    }

    public static function getList(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }

    public static function search($login){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios where deslogin LIKE :SEARCH  ORDER BY deslogin",array(
                ':SEARCH'=>"%".$login."%"
        ));

    }

    public function login($login,$password){

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password

        ));
        if (count($result) > 0) {

            $row = $result[0];

            $this->setId($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));

        }else{


            throw new Exception("Login e/ou senha inválidos.");

        }



    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getId(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()



        ));
    }
}





?>