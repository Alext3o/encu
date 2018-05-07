<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encuesta
 *
 * @author Gaby
 */
class Encuesta {
    private $numero_encuesta;
    private $edad;
    private $sexo;
    private $tipo_de_ingreso;
    private $nivel_de_educacion;
    
    function __construct($numero_encuesta, $edad, $sexo, $tipo_de_ingreso, $nivel_de_educacion) {
        $this->numero_encuesta = $numero_encuesta;
        $this->edad = $edad;
        $this->sexo = $sexo;
        $this->tipo_de_ingreso = $tipo_de_ingreso;
        $this->nivel_de_educacion = $nivel_de_educacion;
    }
    function getNumero_encuesta() {
        return $this->numero_encuesta;
    }

    function getEdad() {
        return $this->edad;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTipo_de_ingreso() {
        return $this->tipo_de_ingreso;
    }

    function getNivel_de_educacion() {
        return $this->nivel_de_educacion;
    }

    function setNumero_encuesta($numero_encuesta) {
        $this->numero_encuesta = $numero_encuesta;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTipo_de_ingreso($tipo_de_ingreso) {
        $this->tipo_de_ingreso = $tipo_de_ingreso;
    }

    function setNivel_de_educacion($nivel_de_educacion) {
        $this->nivel_de_educacion = $nivel_de_educacion;
    }



}
