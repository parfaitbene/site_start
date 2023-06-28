<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module\ModuleMarketingBlock;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ModuleMarketingBlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModuleMarketingBlock::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->setHelp('Nom du module dans la zone d\'administration'),
            AssociationField::new('blocks', 'Blocs'),
            ChoiceField::new('position')->setChoices([
                'Page d\'accueil - Haut' => ModuleMarketingBlock::POSITION_HOME_TOP,
                'Page d\'accueil - Bas' => ModuleMarketingBlock::POSITION_HOME_BOTTOM
            ])->setRequired(true),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
