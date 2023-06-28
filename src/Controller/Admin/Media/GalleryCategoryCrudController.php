<?php

namespace App\Controller\Admin\Media;

use App\Entity\Media\GalleryCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class GalleryCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GalleryCategory::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
                ->setEntityLabelInSingular('Catégorie')
                ->setEntityLabelInPlural('Catégories');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Nom'),
            IntegerField::new('sequence'),
            Field::new('active', 'Actif?')
        ];
    }
}
