<?php

namespace App\Controller\Admin;

use App\Entity\Equipe;
use Vich\UploaderBundle\Form\Type\VichImageType;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipe::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [   
            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('Nom'),
            TextField::new('service'),
            
            ImageField::new('imageFile')
            ->setFormType(VichImageType::class)
            ->setBasePath("/products/images")
                ->setLabel('Image'),

        ];
    }
    
}
