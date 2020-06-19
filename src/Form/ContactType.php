<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom' , TextType::class, array('label' => 'Prénom', 'attr' => array('placeholder' => 'Prénom')))
            ->add('nom', TextType::class, array('label' => 'Nom', 'attr' => array('placeholder' => 'Nom')))
            ->add('email' ,EmailType::class,array('label' => 'E-mail', 'attr' => array('placeholder' => 'E-mail')))
            ->add('message',TextareaType::class, array('label' => 'Message', 'attr' => array('placeholder' => 'Votre Message Ici...')))
          //  ->add('createdAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
