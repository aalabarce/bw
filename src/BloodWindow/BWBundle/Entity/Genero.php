<?php

namespace BloodWindow\BWBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genero
 */
class Genero
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $nombreIngles;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Genero
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set nombreIngles
     *
     * @param string $nombreIngles
     * @return Genero
     */
    public function setNombreIngles($nombreIngles)
    {
        $this->nombreIngles = $nombreIngles;
    
        return $this;
    }

    /**
     * Get nombreIngles
     *
     * @return string 
     */
    public function getNombreIngles()
    {
        return $this->nombreIngles;
    }
}
