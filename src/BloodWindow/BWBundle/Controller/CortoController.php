<?php

namespace BloodWindow\BWBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BloodWindow\BWBundle\Entity\Corto;
use BloodWindow\BWBundle\Form\CortoType;


/**
 * Corto controller.
 *
 */
class CortoController extends Controller
{

    /**
     * Lists all Corto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BloodWindowBWBundle:Corto')->findAll();

        return $this->render('BloodWindowBWBundle:Corto:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Corto entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Corto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('admin_corto_show', array('id' => $entity->getId())));
        }



        return $this->render('BloodWindowBWBundle:Corto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Corto entity.
     *
     * @param Corto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Corto $entity)
    {
        $form = $this->createForm(new CortoType(), $entity, array(
            'action' => $this->generateUrl('admin_corto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Corto entity.
     *
     */
    public function newAction()
    {
        $entity = new Corto();
        $form   = $this->createCreateForm($entity);

        return $this->render('BloodWindowBWBundle:Corto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Corto entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Corto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Corto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BloodWindowBWBundle:Corto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Corto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Corto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Corto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BloodWindowBWBundle:Corto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Corto entity.
    *
    * @param Corto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Corto $entity)
    {
        $form = $this->createForm(new CortoType(), $entity, array(
            'action' => $this->generateUrl('admin_corto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Corto entity.
     *
     */
    public function updateAction(Request $request, $id)
    { 
        // Muevo del path 
        move_uploaded_file($tmp_name, "$uploads_dir/$name");

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BloodWindowBWBundle:Corto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Corto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_corto_edit', array('id' => $id)));
        }

        return $this->render('BloodWindowBWBundle:Corto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Corto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BloodWindowBWBundle:Corto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Corto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_corto'));
    }

    /**
     * Creates a form to delete a Corto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_corto_delete', array('id' => $id)))
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

        // outputdir: C:\wamp\www\bw\uploads\\temp\\
        $output_dir = $_SERVER['DOCUMENT_ROOT'] . "uploads/temp/";
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
    