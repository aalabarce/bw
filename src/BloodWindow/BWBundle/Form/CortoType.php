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
              'choice_list' => new ChoiceList($this->generos[0], $this->generos[1]
            )))
            ->add('festivalFk', 'choice', array(
              'choice_list' => new ChoiceList($this->festivales[0], $this->festivales[1]
            )))
            ->add('url')
            ->add('duracion')
            ->add('director')
            ->add('compania')
            ->add('telefono')
            ->add('sitioWeb')
            ->add('sinopsisEspaniol','textarea')
            ->add('sinopsisIngles','textarea')
            ->add('carousel', 'choice', array(
  'choice_list' => new ChoiceList(array(1, 0), array('Si', 'No')
)))
        ;
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
  