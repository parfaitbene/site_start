<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module\ModuleArticle;
use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ModuleArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModuleArticle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->setHelp('Nom du module dans la zone d\'administration'),
            TextField::new('title', 'Titre'),
            ChoiceField::new('position')->setChoices([
                'Page d\'accueil - Haut' => ModuleArticle::POSITION_HOME_TOP,
                'Page d\'accueil - Bas' => ModuleArticle::POSITION_HOME_BOTTOM
            ])->setRequired(true),
            AssociationField::new('articles')
                ->onlyOnForms()
                ->setHelp('Articles à afficher. Laisser vide pour afficher les derniers publiés.'),
            IntegerField::new('articleNbr', 'Nombre d\'article')
                ->setHelp('Nombre d\'article à afficher. <br> Ce paramètre n\'est pris en compte que si aucun article n\'a été sélectionné pour le champ "Articles" ci-dessus.')
                ->setFormTypeOption('attr', ['min' => 1]),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
