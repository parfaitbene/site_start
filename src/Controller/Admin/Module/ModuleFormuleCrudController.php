<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module\ModuleFormule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class ModuleFormuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModuleFormule::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->setHelp('Nom du module dans la zone d\'administration'),
            TextField::new('title', 'Titre')
            ->setHelp('Titre du bloc. (Format texte ou code HTML)'),
            ChoiceField::new('position')->setChoices([
                'Page d\'accueil - Haut' => ModuleFormule::POSITION_HOME_TOP,
                'Page d\'accueil - Bas' => ModuleFormule::POSITION_HOME_BOTTOM
            ])->setRequired(true),
            AssociationField::new('formules', 'Formules')
                ->onlyOnForms(),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
