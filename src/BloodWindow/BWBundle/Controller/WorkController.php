<?php

namespace BloodWindow\BWBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BloodWindow\BWBundle\Entity\Work;
use BloodWindow\BWBundle\Form\WorkType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\Response;

/**
 * Work controller.
 *
 */
class WorkController extends Controller
{

    /**
     * Lists all Work entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BloodWindowBWBundle:Work')->findAll();

        return $this->render('BloodWindowBWBundle:Work:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Work entity.
     *
     */
    public function createAction(Request $request)
    {
        // Recibo el nombre de las imagenes subidas
        $nombreArchivo = $request->request->get('nombreArchivo');
        $nombreArchivoCaratula = $request->request->get('nombreArchivoCaratula'); 
        
        $entity = new Work();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            if (!empty($nombreArchivo))
            {

                $pathTemporal = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/temp/" . $nombreArchivo;
                $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/" . $entity->getId() . ".jpg";

                // Renombro y muevo la imagen (Le pongo de nombre el id, y de extension jpg)
                rename($pathTemporal, $path);
            }

            if (!empty($nombreArchivoCaratula))
            {

                $pathTemporal = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/caratula/temp/" . $nombreArchivoCaratula;
                $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/caratula/" . $entity->getId() . ".jpg";

                // Renombro y muevo la imagen (Le pongo de nombre el id, y de extension jpg)
                rename($pathTemporal, $path);
            }

            return $this->redirect($this->generateUrl('admin_work_show', array('id' => $entity->getId())));
        }

        return $this->render('BloodWindowBWBundle:Work:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Work entity.
     *
     * @param Work $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Work $entity)
    {
        $form = $this->createForm(new WorkType(), $entity, array(
            'action' => $this->generateUrl('admin_work_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Work entity.
     *
     */
    public function newAction()
    {
        $entity = new Work();
        $form   = $this->createCreateForm($entity);

        return $this->render('BloodWindowBWBundle:Work:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Work entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Work')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Work entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BloodWindowBWBundle:Work:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Work entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Work')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Work entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BloodWindowBWBundle:Work:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Work entity.
    *
    * @param Work $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Work $entity)
    {
        $form = $this->createForm(new WorkType(), $entity, array(
            'action' => $this->generateUrl('admin_work_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Work entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        // Recibo el nombre de las imagenes subidas
        $nombreArchivo = $request->request->get('nombreArchivo');
        $nombreArchivoCaratula = $request->request->get('nombreArchivoCaratula');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Work')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Work entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            if (!empty($nombreArchivo))
            {

                $pathTemporal = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/temp/" . $nombreArchivo;
                $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/" . $entity->getId() . ".jpg";

                // Renombro y muevo la imagen (Le pongo de nombre el id, y de extension jpg)
                rename($pathTemporal, $path);
            }

            if (!empty($nombreArchivoCaratula))
            {

                $pathTemporal = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/caratula/temp/" . $nombreArchivoCaratula;
                $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/caratula/" . $entity->getId() . ".jpg";

                // Renombro y muevo la imagen (Le pongo de nombre el id, y de extension jpg)
                rename($pathTemporal, $path);
            }

            return $this->redirect($this->generateUrl('admin_work_edit', array('id' => $id)));
        }

        return $this->render('BloodWindowBWBundle:Work:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Work entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BloodWindowBWBundle:Work')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Work entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_work'));
    }

    /**
     * Creates a form to delete a Work entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_work_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
    * Recibe un JSON de request.
    * Devuelve un JSON con el detalle del work
    * in progress
    * Route: /works
    */
    public function obtenerDetalleWorkAction()
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

        $workHome = $this->getDoctrine()->getManager()->getConnection();

        $sql = "SELECT w.id, w.titulo, w.anio, w.compania, w.director, w.estado, w.pais, w.duracion, w.cargo, w.sinopsisEspaniol, 
        w.sinopsisIngles, w.metas, w.email, w.telefono, w.urlVideo FROM wip w
                WHERE w.id = " . $id . ";"; 

        $sth = $workHome->prepare($sql);

        // execute and fetch
        $sth->execute();
        $work = $sth->fetchAll();

        // Transformo el objeto corto a JSON y lo devuelvo

        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        
        $jsonContent = $serializer->serialize($work, 'json');

        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
    * Recibe un JSON de requst.
    * Devuelve un JSON con todos los works
    * in progress.
    * Route: /industria/work
    */
    public function obtenerWorksAction()
    {
        // Voy a la base de datos y busco el work

        $workHome = $this->getDoctrine()->getManager()->getConnection();

        $sql = "SELECT w.id, w.titulo, w.anio, w.compania, w.director, w.estado, w.pais, w.duracion, w.cargo, w.sinopsisEspaniol, 
        w.sinopsisIngles, w.metas, w.email, w.telefono FROM wip w;"; 

        $sth = $workHome->prepare($sql);

        // execute and fetch
        $sth->execute();
        $works = $sth->fetchAll();

        // Transformo el objeto work a JSON y lo devuelvo

        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        
        $jsonContent = $serializer->serialize($works, 'json');

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
        $output_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/temp/";
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

    /**
    *   Sube una imagen de un corto a la carpeta temporal, para despues cuando es confirmado el cambio
    *   es movida a la ruta definitiva
    **/
    public function subirImagenCaratulaAction()
    {
        $output_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/wip/caratula/temp/";
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
