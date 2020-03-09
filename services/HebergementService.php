<?php

include_once '../../connection/connection.php';

class hebergementService
{

    private $conn;

    function __construct()
    {
        $this->conn = new Connection();
    }

    function creatAccount($obj)
    {
        $sql = "INSERT INTO hebergements(code,nom,paye,ville,adresse,adresseMap,responsable,description,logo,telephone,email,password)"
            . " VALUES(:code,:nom,:paye,:ville,:adresse,:adresseMap,:responsable,:description,:logo,:telephone,:email,:password)";
        $code = $obj->getCode().rand(100,999);
        $nom = $obj->getNom();
        $paye = $obj->getPaye();
        $ville = $obj->getVille();
        $adress = $obj->getAdress();
        $adressMap = $obj->getAdressMap();
        $responsable = $obj->getResponsable();
        $description = $obj->getDescription();
        $logo = $obj->getLogo();
        $telephon = $obj->getTelephon();
        $email = $obj->getEmail();
        $password = $obj->getPassword();
        //  $obj->getPassword();


        $stmt = $this->conn->getConn()->prepare($sql);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':paye', $paye);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':adresse', $adress);
        $stmt->bindParam(':adresseMap', $adressMap);
        $stmt->bindParam(':responsable', $responsable);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':logo', $logo);
        $stmt->bindParam(':telephone', $telephon);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // $stmt->execute(['codehebergements' => $obj->getCodehebergements(), 'nom' => $obj->getNom(), 'paye' => $obj->getPaye(), 'ville' => $obj->getVille(), 'adress' => $obj->getAdress(), 'adressMap' => $obj->getAdressMap(), 'responsable' => $obj->getResponsable(), 'description' => $obj->getDescription(), 'logo' => $obj->getLogo(), 'telephon' => $obj->getTelephon(), 'email' => $obj->getEmail(), 'password' => $obj->getPassword(),]) or die();
        $stmt->execute();

        return 'ca march a la base donne :';
    }
    public function inscription($obj)
    {
        $email = $obj->getEmail();
        $result = array("success" => false, "message" => "valid");
        $req = "SELECT email FROM hebergements where email = :email";
        $stmt = $this->conn->getConn()->prepare($req);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount()) {
            $result['success'] = false;
            $result['message'] = "Email existe deja";
        } else if (!$stmt->rowCount()) {
            $this->creatAccount($obj);
            $result['success'] = true;
            $result['message'] = "Compte cree avec succes ";
            $result['etat'] = true;
        }
        return $result;
    }

    public function login($username, $password)
    {
        $result = array("success" => false, "message" => "valid");
        $sql = 'SELECT * FROM hebergements WHERE  email = :username AND password = :password';
        $stmt = $this->conn->getConn()->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($stmt->rowCount()) {
            $result['success'] = true;
            $result['message'] = "les information est correct";
            $result['user'] = $row;
        } else if (!$stmt->rowCount()) {
            $result['success'] = false;
            $result['message'] = "password or email incorrect ";
        }

        // send result back to android
        return $result;
    }
}
