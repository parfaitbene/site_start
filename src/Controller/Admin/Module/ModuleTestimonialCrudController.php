<?php

namespace App\Controller\Admin\Module;

use App\Entity\Module\ModuleTestimonial;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ModuleTestimonialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModuleTestimonial::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->setHelp('Nom du module dans la zone d\'administration'),
            TextField::new('title', 'Titre'),
            AssociationField::new('testimonials', 'Témoignages'),
            ChoiceField::new('position')->setChoices([
                'Page d\'accueil - Haut' => ModuleTestimonial::POSITION_HOME_TOP,
                'Page d\'accueil - Bas' => ModuleTestimonial::POSITION_HOME_BOTTOM
            ])->setRequired(true),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du module'),
            Field::new('active', 'Actif?')
        ];
    }
}
