<?php

namespace BloodWindow\BWBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$cortoHome = $this->getDoctrine()->getRepository('BloodWindowBWBundle:Corto');
    	$cortos = $cortoHome->findAll();

        return $this->render('BloodWindowBWBundle:Default:landingPage.html.php');
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

        $id = $parametros['id'];
        $genero = $parametros['genero'];
        $director = $parametros['director'];
        $ano = $parametros['ano'];
        $titulo = $parametros['titulo'];
        $festival = $parametros['festival'];
      
        // set doctrine
        $cortoHome = $this->getContainer()->get('doctrine')->getManager()->getConnection();

        // prepare statement
        $sth = $cortoHome->prepare("CALL JobQueueGetJob(1)");

        // execute and fetch
        $sth->execute();
        $result = $sth->fetch();

        // DEBUG
        if ($input->getOption('verbose')) {
            $output->writeln(var_dump($result));
        }

        var_dump($result);die;
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
