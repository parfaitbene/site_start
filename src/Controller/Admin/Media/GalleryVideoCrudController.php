<?php

namespace App\Controller\Admin\Media;

use App\Entity\Media\GalleryVideo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class GalleryVideoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GalleryVideo::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
                ->setEntityLabelInSingular('Vidéo')
                ->setEntityLabelInPlural('Vidéos');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Titre du média'),
            TextareaField::new('description')
                ->setHelp('Description du média en quelques mots')
                ->setRequired(false),
            AssociationField::new('category', 'Catégorie')
                ->setRequired(true),
            TextField::new('videoLink', 'Url de la vidéo')
                ->setHelp('Lien Youtube, Viméo, etc.')
                ->onlyOnForms(),
            TextField::new('urlText', 'Texte de l\'url')
                ->setHelp('Texte du lien')
                ->setRequired(false)
                ->onlyOnForms(),
            TextField::new('url', 'Url')
                ->setRequired(false)
                ->onlyOnForms(),
            BooleanField::new('isUrlNewWindow', 'Nouvelle fenêtre?')
                ->setHelp('Ouvrir le lien dans une nouvelle fenêtre?')
                ->setRequired(false)
                ->onlyOnForms(),
            Field::new('pjFile','Image de couverture')
                ->setFormType(VichFileType::class)
                ->setHelp('(290px x 250px)')
                ->setRequired(true)
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),
            IntegerField::new('sequence')
                ->setHelp('Ordre d\'affichage du média'),
            Field::new('active', 'Actif?')
        ];
    }
}
