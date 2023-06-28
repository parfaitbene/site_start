<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module\Module2;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class Module2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Module2::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->setHelp('Nom du module dans la zone d\'administration'),
            TextField::new('title', 'Titre')
            ->setHelp('Titre du bloc. (Format texte ou code HTML)'),
            TextEditorField::new('text', 'Texte')
                ->setFormType(CKEditorType::class)
                ->onlyOnForms(),
            ChoiceField::new('position')->setChoices([
                'Page d\'accueil - Haut' => Module2::POSITION_HOME_TOP,
                'Page d\'accueil - Bas' => Module2::POSITION_HOME_BOTTOM
            ])->setRequired(true),
            Field::new('imageFile','Image')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('(760px x 760px)')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),  
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
