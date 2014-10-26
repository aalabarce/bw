<?php

namespace BloodWindow\BWBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 */
class Proyecto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tituloEspaniol;

    /**
     * @var string
     */
    private $tituloIngles;

    /**
     * @var string
     */
    private $pais;

    /**
     * @var integer
     */
    private $duracion;

    /**
     * @var string
     */
    private $sinopsisEspaniol;

    /**
     * @var string
     */
    private $sinopsisIngles;

    /**
     * @var float
     */
    private $presupuesto;

    /**
     * @var string
     */
    private $financiacionEspaniol;

    /**
     * @var string
     */
    private $financiacionIngles;

    /**
     * @var string
     */
    private $objetivoEspaniol;

    /**
     * @var string
     */
    private $objetivoIngles;

    /**
     * @var string
     */
    private $estadoEspaniol;

    /**
     * @var string
     */
    private $estadoIngles;

    /**
     * @var string
     */
    private $visionEspaniol;

    /**
     * @var string
     */
    private $visionIngles;

    /**
     * @var string
     */
    private $cvProdEspaniol;

    /**
     * @var string
     */
    private $cvProdIngles;

    /**
     * @var string
     */
    private $cvDirEspaniol;

    /**
     * @var string
     */
    private $cvDirIngles;

    /**
     * @var string
     */
    private $director;

    /**
     * @var string
     */
    private $productor;

    /**
     * @var string
     */
    private $compania;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $telefono;

    /**
     * @var string
     */
    private $website;

    /**
     * @var integer
     */
    private $presupuestoAdquirido;

    /**
     * @var integer
     */
    private $anio;


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
     * Set tituloEspaniol
     *
     * @param string $tituloEspaniol
     * @return Proyecto
     */
    public function setTituloEspaniol($tituloEspaniol)
    {
        $this->tituloEspaniol = $tituloEspaniol;
    
        return $this;
    }

    /**
     * Get tituloEspaniol
     *
     * @return string 
     */
    public function getTituloEspaniol()
    {
        return $this->tituloEspaniol;
    }

    /**
     * Set tituloIngles
     *
     * @param string $tituloIngles
     * @return Proyecto
     */
    public function setTituloIngles($tituloIngles)
    {
        $this->tituloIngles = $tituloIngles;
    
        return $this;
    }

    /**
     * Get tituloIngles
     *
     * @return string 
     */
    public function getTituloIngles()
    {
        return $this->tituloIngles;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return Proyecto
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
     * Set duracion
     *
     * @param integer $duracion
     * @return Proyecto
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
     * Set sinopsisEspaniol
     *
     * @param string $sinopsisEspaniol
     * @return Proyecto
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
     * @return Proyecto
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
     * Set presupuesto
     *
     * @param float $presupuesto
     * @return Proyecto
     */
    public function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;
    
        return $this;
    }

    /**
     * Get presupuesto
     *
     * @return float 
     */
    public function getPresupuesto()
    {
        return $this->presupuesto;
    }

    /**
     * Set financiacionEspaniol
     *
     * @param string $financiacionEspaniol
     * @return Proyecto
     */
    public function setFinanciacionEspaniol($financiacionEspaniol)
    {
        $this->financiacionEspaniol = $financiacionEspaniol;
    
        return $this;
    }

    /**
     * Get financiacionEspaniol
     *
     * @return string 
     */
    public function getFinanciacionEspaniol()
    {
        return $this->financiacionEspaniol;
    }

    /**
     * Set financiacionIngles
     *
     * @param string $financiacionIngles
     * @return Proyecto
     */
    public function setFinanciacionIngles($financiacionIngles)
    {
        $this->financiacionIngles = $financiacionIngles;
    
        return $this;
    }

    /**
     * Get financiacionIngles
     *
     * @return string 
     */
    public function getFinanciacionIngles()
    {
        return $this->financiacionIngles;
    }

    /**
     * Set objetivoEspaniol
     *
     * @param string $objetivoEspaniol
     * @return Proyecto
     */
    public function setObjetivoEspaniol($objetivoEspaniol)
    {
        $this->objetivoEspaniol = $objetivoEspaniol;
    
        return $this;
    }

    /**
     * Get objetivoEspaniol
     *
     * @return string 
     */
    public function getObjetivoEspaniol()
    {
        return $this->objetivoEspaniol;
    }

    /**
     * Set objetivoIngles
     *
     * @param string $objetivoIngles
     * @return Proyecto
     */
    public function setObjetivoIngles($objetivoIngles)
    {
        $this->objetivoIngles = $objetivoIngles;
    
        return $this;
    }

    /**
     * Get objetivoIngles
     *
     * @return string 
     */
    public function getObjetivoIngles()
    {
        return $this->objetivoIngles;
    }

    /**
     * Set estadoEspaniol
     *
     * @param string $estadoEspaniol
     * @return Proyecto
     */
    public function setEstadoEspaniol($estadoEspaniol)
    {
        $this->estadoEspaniol = $estadoEspaniol;
    
        return $this;
    }

    /**
     * Get estadoEspaniol
     *
     * @return string 
     */
    public function getEstadoEspaniol()
    {
        return $this->estadoEspaniol;
    }

    /**
     * Set estadoIngles
     *
     * @param string $estadoIngles
     * @return Proyecto
     */
    public function setEstadoIngles($estadoIngles)
    {
        $this->estadoIngles = $estadoIngles;
    
        return $this;
    }

    /**
     * Get estadoIngles
     *
     * @return string 
     */
    public function getEstadoIngles()
    {
        return $this->estadoIngles;
    }

    /**
     * Set visionEspaniol
     *
     * @param string $visionEspaniol
     * @return Proyecto
     */
    public function setVisionEspaniol($visionEspaniol)
    {
        $this->visionEspaniol = $visionEspaniol;
    
        return $this;
    }

    /**
     * Get visionEspaniol
     *
     * @return string 
     */
    public function getVisionEspaniol()
    {
        return $this->visionEspaniol;
    }

    /**
     * Set visionIngles
     *
     * @param string $visionIngles
     * @return Proyecto
     */
    public function setVisionIngles($visionIngles)
    {
        $this->visionIngles = $visionIngles;
    
        return $this;
    }

    /**
     * Get visionIngles
     *
     * @return string 
     */
    public function getVisionIngles()
    {
        return $this->visionIngles;
    }

    /**
     * Set cvProdEspaniol
     *
     * @param string $cvProdEspaniol
     * @return Proyecto
     */
    public function setCvProdEspaniol($cvProdEspaniol)
    {
        $this->cvProdEspaniol = $cvProdEspaniol;
    
        return $this;
    }

    /**
     * Get cvProdEspaniol
     *
     * @return string 
     */
    public function getCvProdEspaniol()
    {
        return $this->cvProdEspaniol;
    }

    /**
     * Set cvProdIngles
     *
     * @param string $cvProdIngles
     * @return Proyecto
     */
    public function setCvProdIngles($cvProdIngles)
    {
        $this->cvProdIngles = $cvProdIngles;
    
        return $this;
    }

    /**
     * Get cvProdIngles
     *
     * @return string 
     */
    public function getCvProdIngles()
    {
        return $this->cvProdIngles;
    }

    /**
     * Set cvDirEspaniol
     *
     * @param string $cvDirEspaniol
     * @return Proyecto
     */
    public function setCvDirEspaniol($cvDirEspaniol)
    {
        $this->cvDirEspaniol = $cvDirEspaniol;
    
        return $this;
    }

    /**
     * Get cvDirEspaniol
     *
     * @return string 
     */
    public function getCvDirEspaniol()
    {
        return $this->cvDirEspaniol;
    }

    /**
     * Set cvDirIngles
     *
     * @param string $cvDirIngles
     * @return Proyecto
     */
    public function setCvDirIngles($cvDirIngles)
    {
        $this->cvDirIngles = $cvDirIngles;
    
        return $this;
    }

    /**
     * Get cvDirIngles
     *
     * @return string 
     */
    public function getCvDirIngles()
    {
        return $this->cvDirIngles;
    }

    /**
     * Set director
     *
     * @param string $director
     * @return Proyecto
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
     * Set productor
     *
     * @param string $productor
     * @return Proyecto
     */
    public function setProductor($productor)
    {
        $this->productor = $productor;
    
        return $this;
    }

    /**
     * Get productor
     *
     * @return string 
     */
    public function getProductor()
    {
        return $this->productor;
    }

    /**
     * Set compania
     *
     * @param string $compania
     * @return Proyecto
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
     * Set email
     *
     * @param string $email
     * @return Proyecto
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
     * @return Proyecto
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

    /**
     * Set website
     *
     * @param string $website
     * @return Proyecto
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set presupuestoAdquirido
     *
     * @param integer $presupuestoAdquirido
     * @return Proyecto
     */
    public function setPresupuestoAdquirido($presupuestoAdquirido)
    {
        $this->presupuestoAdquirido = $presupuestoAdquirido;
    
        return $this;
    }

    /**
     * Get presupuestoAdquirido
     *
     * @return integer 
     */
    public function getPresupuestoAdquirido()
    {
        return $this->presupuestoAdquirido;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     * @return Proyecto
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
    
        return $anio;
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
}
