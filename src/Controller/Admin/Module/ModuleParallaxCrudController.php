<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module\ModuleParallax;
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

class ModuleParallaxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModuleParallax::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->setHelp('Nom du module dans la zone d\'administration'),
            TextField::new('title1', 'Titre 1')
                ->setHelp('Titre 1 (Format texte ou code HTML).'),
            TextField::new('title2', 'Titre 2')
                ->setHelp('Titre 2 (Format texte ou code HTML).'),
            TextEditorField::new('text', 'Texte')
                ->setFormType(CKEditorType::class)
                ->onlyOnForms(),
            ChoiceField::new('position')->setChoices([
                'Page d\'accueil - Haut' => ModuleParallax::POSITION_HOME_TOP,
                'Page d\'accueil - Bas' => ModuleParallax::POSITION_HOME_BOTTOM
            ])->setRequired(true),
            Field::new('imageFile','Image')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('(1800px x 700px)')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),  
            BooleanField::new('addMask', 'Masque?')
                ->setHelp('Ajouter un masque sur l\'image?'),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
