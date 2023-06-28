<?php

namespace App\Controller\Admin\Module;

use App\Entity\MarketingBlock;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class MarketingBlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MarketingBlock::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title1', 'Titre 1')
                ->setHelp('Titre N°2 du bloc. (Format texte ou code HTML)'),
            TextField::new('title2', 'Titre 2')
                ->setHelp('Titre N°1 du bloc. (Format texte ou code HTML)'),
            TextField::new('icon')
                ->onlyOnForms()
                ->setHelp('(Classe CSS)'),
            TextareaField::new('text', 'Texte')
                ->onlyOnForms(),
            Field::new('imageFile','Image')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('Image présentée en mode liste (275px x 180px).')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),    
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du bloc'),
            Field::new('active', 'Actif?')
        ];
    }
}
