<?php

namespace App\Controller\Admin\Module;

use App\Entity\Partner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PartnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partner::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Nom'),UrlField::new('url', 'Page web'),
            Field::new('imageFile','Logo')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('Dimensions: 200px x 110px')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),   
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
