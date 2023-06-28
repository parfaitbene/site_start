<?php

namespace App\Controller\Admin\ECommerce;

use App\Entity\Formule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class FormuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formule::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Nom'),
            SlugField::new('slug')->setTargetFieldName('name')->onlyOnForms(),
            TextareaField::new('intro', 'Slogan')
                ->setHelp('Texte d\'introduction'),
            TextEditorField::new('text', 'Description')
                ->setFormType(CKEditorType::class)
                ->onlyOnForms(),
            MoneyField::new('price', 'Prix')
                ->setCurrency('XAF')
                ->setNumDecimals(0)
                ->setStoredAsCents(false),
            MoneyField::new('fees', 'Frais de réservation')
                ->setCurrency('XAF')
                ->setNumDecimals(0)
                ->setStoredAsCents(false),
            AssociationField::new('bonus')
                ->onlyOnForms(),
            Field::new('imageFile','Petite image')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('Image présentée en mode liste (275px x 180px).')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),   
            Field::new('bgImageFile','Grande image')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('Image présentée en mode détail (480px x 700px).')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du bloc'),
            Field::new('canReserve', 'Réservation possible?'),                
            Field::new('active', 'Actif?')                
        ];
    }
}
