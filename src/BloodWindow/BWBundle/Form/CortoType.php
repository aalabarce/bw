<?php

namespace BloodWindow\BWBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;


class CortoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anio')
            ->add('titulo')
            ->add('generoFk')
            ->add('festivalFk')
            ->add('url')
            ->add('duracion')
            ->add('director')
            ->add('compania')
            ->add('telefono')
            ->add('sitioWeb')
            ->add('sinopsisEspaniol','textarea')
            ->add('sinopsisIngles','textarea')
            ->add('nominado', 'choice', array(
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
