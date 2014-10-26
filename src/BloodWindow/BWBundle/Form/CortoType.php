<?php

namespace BloodWindow\BWBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use BloodWindow\BWBundle\Controller\DefaultController;

class CortoType extends AbstractType
{

    private $generos;
    private $festivales;

    public function __construct($generos, $festivales)
    {
        $this->generos = $generos;
        //var_dump($festivales);
        $this->festivales = $festivales;   
    }

     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

            $builder
            ->add('anio')
            ->add('titulo')
            ->add('generoFk', 'choice', array(
    'choices' => $this->generos
))
            ->add('festivalFk', 'choice', array(
    'choices' => $this->festivales
))
            ->add('url')
            ->add('duracion')
            ->add('director')
            ->add('compania')
            ->add('telefono')
            ->add('sitioWeb')
            ->add('sinopsisEspaniol','textarea')
            ->add('sinopsisIngles','textarea')
            ->add('carousel', 'choice', array(
    'choices' => array('0' => 'No', '1' => 'Si')
));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BloodWindow\BWBundle\Entity\Corto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bloodwindow_bwbundle_corto';
    }

}
  