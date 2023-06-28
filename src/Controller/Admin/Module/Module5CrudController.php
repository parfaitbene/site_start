<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module\Module5;
use App\Form\PJ\PJModule5SliderType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class Module5CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Module5::class;
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
                'Page d\'accueil - Haut' => Module5::POSITION_HOME_TOP,
                'Page d\'accueil - Bas' => Module5::POSITION_HOME_BOTTOM
            ])->setRequired(true),
            CollectionField::new('images', 'Photos')
                ->setEntryType(PJModule5SliderType::class)
                ->setRequired(true)
                ->setFormTypeOption('by_reference', false)
                ->onlyOnForms(),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
