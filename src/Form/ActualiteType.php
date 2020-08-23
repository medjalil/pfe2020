<?php

namespace App\Form;

use App\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class, array('label' => 'Titre', 'attr' => array('placeholder' => 'Titre')))
            ->add('contenu',TextType::class, array('label' => 'Contenu', 'attr' => array('placeholder' => 'Contenu')))
            ->add('image')
            //->add('createdAt')
        
       
      
   ; }
   
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actualite::class

        ]);
    }
    
}
