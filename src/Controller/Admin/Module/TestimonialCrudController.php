<?php

namespace App\Controller\Admin\Module;

use App\Entity\Testimonial;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class TestimonialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimonial::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title1', 'Nom(s) & Prénom(s)')
                ->setHelp('Format texte ou code HTML'),
            TextField::new('title2', 'Signature')
                ->setHelp('Format texte ou code HTML'),
            TextEditorField::new('text', 'Texte')
                ->setFormType(CKEditorType::class)
                ->onlyOnForms(),
            Field::new('imageFile','Photo')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('Dimensions: 250px x 250px')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),    
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du bloc'),
            Field::new('active', 'Actif?')
        ];
    }
}
