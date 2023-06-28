<?php

namespace App\Form\PJ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use App\Entity\PieceJointe;

class PieceJointeType extends AbstractType
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
            ->add('pj', VichFileType::class, 
                array(
                    'label' => 'Photo',
                    'required' => true,
                    'by_reference' => false,
                    'allow_delete' => false,
                )
            )
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PieceJointe::class,
        ]);
    }
}
