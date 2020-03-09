<?php

class Hebergement {

    private $id;
    private $code;
    private $nom;
    private $paye;
    private $ville;
    private $adress;
    private $adressMap;
    private $responsable;
    private $description;
    private $logo;
    private $telephon;
    private $email;
    private $password;

    function __construct($code, $nom, $paye, $ville, $adress, $adressMap, $responsable, $description, $logo, $telephon, $email, $password) {
        $this->code = $code;
        $this->nom = $nom;
        $this->paye = $paye;
        $this->ville = $ville;
        $this->adress = $adress;
        $this->adressMap = $adressMap;
        $this->responsable = $responsable;
        $this->description = $description;
        $this->logo = $logo;
        $this->telephon = $telephon;
        $this->email = $email;
        $this->password = $password;
    }

    function getId() {
        return $this->id;
    }

    function getCode() {
        return $this->code;
    }

    function getNom() {
        return $this->nom;
    }

    function getPaye() {
        return $this->paye;
    }

    function getVille() {
        return $this->ville;
    }

    function getAdress() {
        return $this->adress;
    }

    function getAdressMap() {
        return $this->adressMap;
    }

    function getResponsable() {
        return $this->responsable;
    }

    function getDescription() {
        return $this->description;
    }

    function getLogo() {
        return $this->logo;
    }

    function getTelephon() {
        return $this->telephon;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPaye($paye) {
        $this->paye = $paye;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setAdress($adress) {
        $this->adress = $adress;
    }

    function setAdressMap($adressMap) {
        $this->adressMap = $adressMap;
    }

    function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setTelephon($telephon) {
        $this->telephon = $telephon;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}
