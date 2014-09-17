<?php

namespace BloodWindow\BWBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('generoFk')
            ->add('festivalFk')
            ->add('url')
            ->add('duracion')
            ->add('director')
            ->add('compania')
            ->add('telefono')
            ->add('sitioWeb')
            ->add('sinopsisEspaniol')
            ->add('sinopsisIngles')
            ->add('nominado')
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
