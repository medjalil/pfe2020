<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }
   

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('titre'),
            TextField::new('contenu'),
            DateTimeField::new('createdAt'),

            
               
             $imageField = ImageField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setBasePath("/products/images")

                                ->setLabel('Image'),
                                
                
    
            
    
                


        ];
    }
    
 
}