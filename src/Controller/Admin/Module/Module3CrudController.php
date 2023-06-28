<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module\Module3;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class Module3CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Module3::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->setHelp('Nom du module dans la zone d\'administration'),
            TextEditorField::new('text', 'Texte')
                ->setFormType(CKEditorType::class)
                ->onlyOnForms(),
            TextField::new('buttonText', 'Texte du bouton'),
            TextField::new('buttonUrl', 'URL du bouton'),
            ChoiceField::new('position')->setChoices([
                'Page d\'accueil - Haut' => Module3::POSITION_HOME_TOP,
                'Page d\'accueil - Bas' => Module3::POSITION_HOME_BOTTOM
            ])->setRequired(true),
            BooleanField::new('isUrlNewWindow', 'Nouvelle fenêtre?')
                ->setHelp('Ouvrir le lien dans une nouvelle fenêtre?'),
            Field::new('image1File','Image 1')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('(768px x 768px)')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),   
            Field::new('image2File','Image 2')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('768px x 768px)')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),
            Field::new('image3File','Image 3')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('(768px x 768px)')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
