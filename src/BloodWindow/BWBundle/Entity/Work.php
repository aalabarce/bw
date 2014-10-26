<?php

namespace BloodWindow\BWBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 */
class Work
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var integer
     */
    private $anio;

    /**
     * @var string
     */
    private $director;

    /**
     * @var string
     */
    private $pais;

    /**
     * @var string
     */
    private $compania;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var integer
     */
    private $duracion;

    /**
     * @var string
     */
    private $cargo;

    /**
     * @var string
     */
    private $sinopsisEspaniol;

    /**
     * @var string
     */
    private $sinopsisIngles;

    /**
     * @var string
     */
    private $metas;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $telefono;

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
     * Set titulo
     *
     * @param string $titulo
     * @return Work
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     * @return Work
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
    
        return $this;
    }

    /**
     * Get anio
     *
     * @return integer 
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set director
     *
     * @param string $director
     * @return Work
     */
    public function setDirector($director)
    {
        $this->director = $director;
    
        return $this;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return Work
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set compania
     *
     * @param string $compania
     * @return Work
     */
    public function setCompania($compania)
    {
        $this->compania = $compania;
    
        return $this;
    }

    /**
     * Get compania
     *
     * @return string 
     */
    public function getCompania()
    {
        return $this->compania;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Work
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return Work
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    
        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Work
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    
        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set sinopsisEspaniol
     *
     * @param string $sinopsisEspaniol
     * @return Work
     */
    public function setSinopsisEspaniol($sinopsisEspaniol)
    {
        $this->sinopsisEspaniol = $sinopsisEspaniol;
    
        return $this;
    }

    /**
     * Get sinopsisEspaniol
     *
     * @return string 
     */
    public function getSinopsisEspaniol()
    {
        return $this->sinopsisEspaniol;
    }

    /**
     * Set sinopsisIngles
     *
     * @param string $sinopsisIngles
     * @return Work
     */
    public function setSinopsisIngles($sinopsisIngles)
    {
        $this->sinopsisIngles = $sinopsisIngles;
    
        return $this;
    }

    /**
     * Get sinopsisIngles
     *
     * @return string 
     */
    public function getSinopsisIngles()
    {
        return $this->sinopsisIngles;
    }

    /**
     * Set metas
     *
     * @param string $metas
     * @return Work
     */
    public function setMetas($metas)
    {
        $this->metas = $metas;
    
        return $this;
    }

    /**
     * Get metas
     *
     * @return string 
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Work
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Work
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }


}
