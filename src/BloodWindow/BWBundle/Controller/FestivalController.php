<?php

namespace BloodWindow\BWBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BloodWindow\BWBundle\Entity\Festival;
use BloodWindow\BWBundle\Form\FestivalType;

/**
 * Festival controller.
 *
 */
class FestivalController extends Controller
{

    /**
     * Lists all Festival entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BloodWindowBWBundle:Festival')->findAll();

        return $this->render('BloodWindowBWBundle:Festival:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Festival entity.
     *
     */
    public function createAction(Request $request)
    {
        // Recibo el nombre de las imagenes subidas
        $nombreArchivo = $request->request->get('nombreArchivo');

        $entity = new Festival();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            if (!empty($nombreArchivo))
            {

                $pathTemporal = $_SERVER['DOCUMENT_ROOT'] . "/uploads/festival/temp/" . $nombreArchivo;
                $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/festival/" . $entity->getId() . ".jpg";

                // Renombro y muevo la imagen (Le pongo de nombre el id, y de extension jpg)
                rename($pathTemporal, $path);
            }

            return $this->redirect($this->generateUrl('admin_festival_show', array('id' => $entity->getId())));
        }

        return $this->render('BloodWindowBWBundle:Festival:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Festival entity.
     *
     * @param Festival $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Festival $entity)
    {
        $form = $this->createForm(new FestivalType(), $entity, array(
            'action' => $this->generateUrl('admin_festival_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Festival entity.
     *
     */
    public function newAction()
    {
        $entity = new Festival();
        $form   = $this->createCreateForm($entity);

        return $this->render('BloodWindowBWBundle:Festival:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Festival entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Festival')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Festival entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BloodWindowBWBundle:Festival:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Festival entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Festival')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Festival entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BloodWindowBWBundle:Festival:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Festival entity.
    *
    * @param Festival $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Festival $entity)
    {
        $form = $this->createForm(new FestivalType(), $entity, array(
            'action' => $this->generateUrl('admin_festival_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Festival entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        // Recibo el nombre de las imagenes subidas
        $nombreArchivo = $request->request->get('nombreArchivo');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Festival')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Festival entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            if (!empty($nombreArchivo))
            {

                $pathTemporal = $_SERVER['DOCUMENT_ROOT'] . "/uploads/festival/temp/" . $nombreArchivo;
                $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/festival/" . $entity->getId() . ".jpg";

                // Renombro y muevo la imagen (Le pongo de nombre el id, y de extension jpg)
                rename($pathTemporal, $path);
            }

            return $this->redirect($this->generateUrl('admin_festival_edit', array('id' => $id)));
        }

        return $this->render('BloodWindowBWBundle:Festival:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Festival entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BloodWindowBWBundle:Festival')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Festival entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_festival'));
    }

    /**
     * Creates a form to delete a Festival entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_festival_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
    *   Sube una imagen de un corto a la carpeta temporal, para despues cuando es confirmado el cambio
    *   es movida a la ruta definitiva
    **/
    public function subirImagenAction()
    {
        $output_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/festival/temp/";
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
