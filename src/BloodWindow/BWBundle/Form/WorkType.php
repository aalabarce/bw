<?php

namespace BloodWindow\BWBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('anio')
            ->add('director')
            ->add('pais')
            ->add('compania')
            ->add('estado')
            ->add('duracion')
            ->add('cargo')
            ->add('sinopsisEspaniol')
            ->add('sinopsisIngles')
            ->add('metas')
            ->add('email')
            ->add('telefono')
            ->add('urlVideo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BloodWindow\BWBundle\Entity\Work'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bloodwindow_bwbundle_work';
    }
}
