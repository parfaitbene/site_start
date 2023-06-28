<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Screen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom(s) & Prénom(s)'
            ])
            ->add('date', TextType::class, [
//                'attr' => ['class' => 'form-control form-control-sm datepicker']
            ])
            ->add('hour', TextType::class, [
                'label' => 'Heure',
//                'attr' => ['class' => 'form-control form-control-sm timepicker']
            ])
            ->add('duration', null, [
                'label' => 'Durée',
                'attr' => ['id' => 'duree', 'class' => 'form-control form-control-sm', 'min' => 1, 'max' => 8]
            ])
            ->add('console', null, [
                'expanded' => true,
                'required' => true
            ])
            ->add('screen', null, [
                'label' => 'Ecran',
                'expanded' => true,
                'required' => true,
                'choice_attr' => function(?Screen $screen) {
                    return $screen ? ['data-price' => $screen->getPrice(), 'class' => 'screen custom-control-input'] : [];
                }
            ])
            ->add('phone', null, [
                'label' => 'Téléphone',
                'trim' => true
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email (facultatif)',
                'required' => false,
            ])
            ->add('message', null, [
                'label' => 'Votre message'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
