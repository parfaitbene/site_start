<?php

namespace App\Form\PJ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Entity\PieceJointe;

class PJModule5SliderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'Titre de la photo', 
                'help' => 'Décrivez la photo',
                'attr' => [
                    'class' => 'form-control',
                    'required' => false
                ]
            ])
            ->add('pjFile', VichFileType::class, 
                array(
                    'label' => 'Photo',
                    'required' => false,
                    'help' => '(280px x 400px)',
                    'by_reference' => false,
                    'allow_delete' => false,
                )
            )
            ->add('urlText', null, [
                'label' => 'Texte du lien'
            ])
            ->add('url', UrlType::class)
            ->add('isUrlNewWindow', CheckboxType::class, [
                'required' => false,
                'label' => 'Nouvelle fenêtre?',
                'help' => 'Ouvrir le lien dans une nouvelle fenêtre?'
            ])
            ->add('sequence', IntegerType::class, [
                'required' => false
            ])
            ->add('active', CheckboxType::class, [
                'required' => false,
                'label' => 'Actif?'
            ])
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PieceJointe::class,
        ]);
    }
}
