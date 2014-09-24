<?php

namespace BloodWindow\BWBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProyectoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tituloEspaniol')
            ->add('tituloIngles')
            ->add('pais')
            ->add('duracion')
            ->add('sinopsisEspaniol')
            ->add('sinopsisIngles')
            ->add('presupuesto')
            ->add('financiacionEspaniol')
            ->add('financiacionIngles')
            ->add('objetivoEspaniol')
            ->add('objetivoIngles')
            ->add('estadoEspaniol')
            ->add('estadoIngles')
            ->add('visionEspaniol')
            ->add('visionIngles')
            ->add('cvProdEspaniol')
            ->add('cvProdIngles')
            ->add('cvDirEspaniol')
            ->add('cvDirIngles')
            ->add('director')
            ->add('productor')
            ->add('compania')
            ->add('email')
            ->add('telefono')
            ->add('website')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BloodWindow\BWBundle\Entity\Proyecto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bloodwindow_bwbundle_proyecto';
    }
}
