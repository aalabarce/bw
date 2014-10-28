<?php

namespace BloodWindow\BWBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BloodWindow\BWBundle\Entity\Proyecto;
use BloodWindow\BWBundle\Form\ProyectoType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\Response;

/**
 * Proyecto controller.
 *
 */
class ProyectoController extends Controller
{

    /**
     * Lists all Proyecto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BloodWindowBWBundle:Proyecto')->findAll();

        return $this->render('BloodWindowBWBundle:Proyecto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Proyecto entity.
     *
     */
    public function createAction(Request $request)
    {
        // Recibo el nombre de las imagenes subidas
        $nombreArchivo = $request->request->get('nombreArchivo');

        $entity = new Proyecto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            if (!empty($nombreArchivo))
            {

                $pathTemporal = $_SERVER['DOCUMENT_ROOT'] . "/uploads/work/temp/" . $nombreArchivo;
                $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/work/" . $entity->getId() . ".jpg";

                // Renombro y muevo la imagen (Le pongo de nombre el id, y de extension jpg)
                rename($pathTemporal, $path);
            }

            return $this->redirect($this->generateUrl('admin_proyecto_show', array('id' => $entity->getId())));
        }

        return $this->render('BloodWindowBWBundle:Proyecto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Proyecto entity.
     *
     * @param Proyecto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Proyecto $entity)
    {
        $form = $this->createForm(new ProyectoType(), $entity, array(
            'action' => $this->generateUrl('admin_proyecto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Proyecto entity.
     *
     */
    public function newAction()
    {
        $entity = new Proyecto();
        $form   = $this->createCreateForm($entity);

        return $this->render('BloodWindowBWBundle:Proyecto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Proyecto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Proyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BloodWindowBWBundle:Proyecto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Proyecto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Proyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BloodWindowBWBundle:Proyecto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Proyecto entity.
    *
    * @param Proyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Proyecto $entity)
    {
        $form = $this->createForm(new ProyectoType(), $entity, array(
            'action' => $this->generateUrl('admin_proyecto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Proyecto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        // Recibo el nombre de las imagenes subidas
        $nombreArchivo = $request->request->get('nombreArchivo');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Proyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            if (!empty($nombreArchivo))
            {

                $pathTemporal = $_SERVER['DOCUMENT_ROOT'] . "/uploads/work/temp/" . $nombreArchivo;
                $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/work/" . $entity->getId() . ".jpg";

                // Renombro y muevo la imagen (Le pongo de nombre el id, y de extension jpg)
                rename($pathTemporal, $path);
            }

            return $this->redirect($this->generateUrl('admin_proyecto_edit', array('id' => $id)));
        }

        return $this->render('BloodWindowBWBundle:Proyecto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Proyecto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BloodWindowBWBundle:Proyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Proyecto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_proyecto'));
    }

    /**
     * Creates a form to delete a Proyecto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_proyecto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
    * Recibe un JSON de request.
    * Devuelve un JSON con el detalle del proyecto
    * en desarrollo
    * Route: /industria/proyecto
    */
    public function obtenerDetalleProyectoAction()
    {
        // Recibo el JSON con el filtro
        $parametros = array();
        $jsonRequest = $this->get("request")->getContent();
        if (!empty($jsonRequest))
        {
           $parametros = json_decode($jsonRequest, true);
        }

        $id = $parametros['id'];

        // Voy a la base de datos y busco el proyecto

        $proyectoHome = $this->getDoctrine()->getManager()->getConnection();

        $sql = "SELECT p.id, p.compania, p.cvDirEspaniol, p.cvDirIngles, p.cvProdEspaniol, p.cvProdIngles, p.director, 
                p.duracion, p.email, p.estadoEspaniol, p.estadoIngles, p.financiacionEspaniol, p.financiacionIngles, 
                p.objetivoEspaniol, p.objetivoIngles, p.pais, p.presupuesto, p.productor, p.sinopsisEspaniol, 
                p.sinopsisIngles, p.telefono, p.tituloEspaniol, p.tituloIngles, p.visionEspaniol, p.visionIngles, 
                p.website, p.anio, p.presupuestoAdquirido
                FROM proy_en_desa p
                WHERE p.id = " . $id . ";"; 

        $sth = $proyectoHome->prepare($sql);

        // execute and fetch
        $sth->execute();
        $proyecto = $sth->fetchAll();

        // Transformo el objeto corto a JSON y lo devuelvo

        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        
        $jsonContent = $serializer->serialize($proyecto, 'json');

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
    * Recibe un JSON de requst.
    * Devuelve un JSON con todos los proyectos
    * en desarrollo.
    * Route: /industria/proyectos
    */
    public function obtenerProyectosAction()
    {
        // Voy a la base de datos y busco el proyecto

        $proyectoHome = $this->getDoctrine()->getManager()->getConnection();

        $sql = "SELECT p.id, p.compania, p.cvDirEspaniol, p.cvDirIngles, p.cvProdEspaniol, p.cvProdIngles, p.director, 
                p.duracion, p.email, p.estadoEspaniol, p.estadoIngles, p.financiacionEspaniol, p.financiacionIngles, 
                p.objetivoEspaniol, p.objetivoIngles, p.pais, p.presupuesto, p.productor, p.sinopsisEspaniol, 
                p.sinopsisIngles, p.telefono, p.tituloEspaniol, p.tituloIngles, p.visionEspaniol, p.visionIngles, 
                p.website, p.anio, p.presupuestoAdquirido
                FROM proy_en_desa p;"; 

        $sth = $proyectoHome->prepare($sql);

        // execute and fetch
        $sth->execute();
        $proyectos = $sth->fetchAll();


        // Transformo el objeto corto a JSON y lo devuelvo

        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        
        $jsonContent = $serializer->serialize($proyectos, 'json');

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
    *   Sube una imagen de un corto a la carpeta temporal, para despues cuando es confirmado el cambio
    *   es movida a la ruta definitiva
    **/
    public function subirImagenAction()
    {
        $output_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/proyecto/temp/";
        if(isset($_FILES["myfile"]))
        {
            $ret = array();

            $error =$_FILES["myfile"]["error"];
            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData() 
            if(!is_array($_FILES["myfile"]["name"])) //single file
            {
                $fileName = $_FILES["myfile"]["name"];
                move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                $ret[]= $fileName;
            }
            else  //Multiple files, file[]
            {
              $fileCount = count($_FILES["myfile"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                $fileName = $_FILES["myfile"]["name"][$i];
                move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
                $ret[]= $fileName;
              }
            
            }
            $response = new Response(json_encode($ret));
            $response->headers->set('Content-Type', 'application/json'); 

            return $response;
         }
    }
}
