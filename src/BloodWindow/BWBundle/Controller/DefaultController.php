<?php

namespace BloodWindow\BWBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\ORM\EntityRepository;



class DefaultController extends Controller
{
    public function indexAction()
    {
    	$cortoHome = $this->getDoctrine()->getRepository('BloodWindowBWBundle:Corto');
    	$cortos = $cortoHome->findAll();

        return $this->render('BloodWindowBWBundle:Default:index.html.php');
    }

    public function detalleCortoAction()
    {

        // Recibo el JSON con el filtro
        $parametros = array();
        $jsonRequest = $this->get("request")->getContent();
        if (!empty($jsonRequest))
        {
            $parametros = json_decode($jsonRequest, true);
        }
        
        $id = $parametros['id'];

        // Voy a la base de datos y busco el corto

        $cortoHome = $this->getDoctrine()->getRepository('BloodWindowBWBundle:Corto');
        $corto = $cortoHome->find($id);

        // Transformo el objeto corto a JSON y lo devuelvo

    	$encoders = array(new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);

    	
    	$jsonContent = $serializer->serialize($corto, 'json');

    	$response = new Response($jsonContent);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
    }

    public function obtenerCortosAction()
    {
         // Recibo el JSON con el filtro
        $parametros = array();
        $jsonRequest = $this->get("request")->getContent();
        if (!empty($jsonRequest))
        {
            $parametros = json_decode($jsonRequest, true);
        }

        $genero = $parametros['genero'];
        $director = $parametros['director'];
        $anio = $parametros['ano'];
        $titulo = $parametros['titulo'];
        $festival = $parametros['festival'];
      
        // set doctrine

        $cortoHome = $this->getDoctrine()->getManager()->getConnection();

        // prepare statement

        $sql = "SELECT c.id, c.titulo, c.anio, f.id as festival, g.id as genero FROM corto c
        JOIN festival f ON c.festivalFk = f.id
        JOIN genero g ON c.generoFk = g.id
        WHERE 
        (c.titulo LIKE CONCAT('%', " . $titulo . " ,'%')
        OR c.director LIKE CONCAT('%', " . $director . " ,'%')
        OR c.anio = " . $anio . ")";

        empty($festival)?:$sql .= " AND f.id = " . $festival;
        empty($genero)?:$sql .= " AND g.id = " . $genero;
        
        $sql .= ";";

        $sth = $cortoHome->prepare($sql);

        // execute and fetch
        $sth->execute();
        $result = $sth->fetchAll();    

        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function obtenerFestivalesAction()
    {
         // Voy a la base de datos y busco los festivales

        $festivalHome = $this->getDoctrine()->getRepository('BloodWindowBWBundle:Festival');
        $festivales = $festivalHome->findAll();

        // Transformo el objeto corto a JSON y lo devuelvo

        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        
        $jsonContent = $serializer->serialize($festivales, 'json');

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;   
    }

    public function obtenerGenerosAction()
    {
         // Voy a la base de datos y busco los festivales

        $generoHome = $this->getDoctrine()->getRepository('BloodWindowBWBundle:Genero');
        $generos = $generoHome->findAll();

        // Transformo el objeto corto a JSON y lo devuelvo

        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        
        $jsonContent = $serializer->serialize($generos, 'json');

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;   
    }
}
