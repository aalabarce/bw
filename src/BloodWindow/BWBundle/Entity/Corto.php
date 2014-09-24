<?php

namespace BloodWindow\BWBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corto
 */
class Corto
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
     * @var integer
     */
    private $generoFk;

    /**
     * @var integer
     */
    private $festivalFk;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $duracion;

    /**
     * @var string
     */
    private $director;

    /**
     * @var string
     */
    private $compania;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $sitioWeb;

    /**
     * @var string
     */
    private $sinopsisEspaniol;

    /**
     * @var string
     */
    private $sinopsisIngles;

    /**
     * @var integer
     */
    private $nominado;


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
     * @return Corto
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
     * @return Corto
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
     * Set generoFk
     *
     * @param integer $generoFk
     * @return Corto
     */
    public function setGeneroFk($generoFk)
    {
        $this->generoFk = $generoFk;
    
        return $this;
    }

    /**
     * Get generoFk
     *
     * @return integer 
     */
    public function getGeneroFk()
    {
        return $this->generoFk;
    }

    /**
     * Set festivalFk
     *
     * @param integer $festivalFk
     * @return Corto
     */
    public function setFestivalFk($festivalFk)
    {
        $this->festivalFk = $festivalFk;
    
        return $this;
    }

    /**
     * Get festivalFk
     *
     * @return integer 
     */
    public function getFestivalFk()
    {
        return $this->festivalFk;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Corto
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return Corto
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
     * Set director
     *
     * @param string $director
     * @return Corto
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
     * Set compania
     *
     * @param string $compania
     * @return Corto
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
     * Set telefono
     *
     * @param string $telefono
     * @return Corto
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set sitioWeb
     *
     * @param string $sitioWeb
     * @return Corto
     */
    public function setSitioWeb($sitioWeb)
    {
        $this->sitioWeb = $sitioWeb;
    
        return $this;
    }

    /**
     * Get sitioWeb
     *
     * @return string 
     */
    public function getSitioWeb()
    {
        return $this->sitioWeb;
    }

    /**
     * Set sinopsisEspaniol
     *
     * @param string $sinopsisEspaniol
     * @return Corto
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
     * @return Corto
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
     * Set nominado
     *
     * @param integer $nominado
     * @return Corto
     */
    public function setNominado($nominado)
    {
        $this->nominado = $nominado;
    
        return $this;
    }

    /**
     * Get nominado
     *
     * @return integer 
     */
    public function getNominado()
    {
        return $this->nominado;
    }
}
