<?php
class Estudiante 
{
    public function __construct($ci, $nombre, $fecha_nac, $direccion)
    {
        $this->ci = $ci;
        $this->nombre = $nombre;
        $this->fecha_nac = $fecha_nac;
        $this->direccion = $direccion;
    }

    //==========Métodos Set===========
    public function setCI($ci)
    {
        $this->ci = $ci;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setFechaNacimiento($fecha_nac)
    {
        $this->fecha_nac = $fecha_nac;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    //=========Métodos Get==========
    public function getCI()
    {
        return $this->ci;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFechaNacimiento()
    {
        return $this->fecha_nac;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
}
?>