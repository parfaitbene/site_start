<?php

namespace App\Controller\Admin\Blog;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Titre')->setHelp('Moins de 255 caratères'),
            SlugField::new('slug')->setTargetFieldName('name')->onlyOnForms(),
            AssociationField::new('category', 'Catégorie'),
            TextEditorField::new('text', 'Texte')
                ->setFormType(CKEditorType::class)
                ->onlyOnForms(),
            DateTimeField::new('createDate', 'Date création')
                ->setRequired(false),
            DateTimeField::new('updateDate', 'Date de mise à jour')
                ->setRequired(false)
                ->onlyOnForms(),
            Field::new('imageFile','Image')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('Image présentée en mode liste (540px x 360px).')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),   
            Field::new('bgImageFile','Grande image')
                ->setFormType(VichFileType::class)
                ->setRequired(true)
                ->setHelp('Image présentée en mode détail (1800px x 700px).')
                ->setFormTypeOptions(['allow_delete' => false, 'by_reference' => false])
                ->onlyOnForms(),
            IntegerField::new('views', 'Nombre de vues')
                ->setHelp('Ordre d\'affichage du module')
                ->setFormTypeOption('disabled', true),
            Field::new('isPublished', 'Publié?')
        ];
    }
}
