<?php

namespace App\Controller\Admin;

use App\Entity\Velo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class VeloCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Velo::class;
    }

    public function configureCrud(Crud $crud): Crud 
    {
        return $crud
            ->setEntityLabelInPlural('Vélos')
            ->setEntityLabelInSingular('Vélo')

            ->setPageTitle("index", "Administration des Vélos")

            ->setPaginatorPageSize(15)
            
            ->setDateFormat('short');
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('marque'),
            TextField::new('modele'),
            TextField::new('num_serie'),
            DateTimeField::new('date_achat'),
            TextField::new('couleur'),
            TextField::new('type_velo'),
            TextField::new('fonctionnement'),
            TextField::new('photo'),
            TextField::new('document'),

        ];
    }
    
}
