<?php

namespace App\Form;

use App\Entity\News;
use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Projekttitel',
                'attr' => ['class' => 'w-full px-3 py-2 border rounded']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Beskrivelse',
                'required' => false,
                'attr' => ['class' => 'w-full px-3 py-2 border rounded']
            ])

            ->add('news', EntityType::class, [
                'class' => News::class,
                'choice_label' => 'title',
                'label' => 'Vælg den nyhed dette projekt tilhøre',
                'attr' => ['class' => 'w-full px-3 py-2 border rounded']
            ])

            ->add('imageFile', FileType::class, [
                'label' => 'Upload Billede',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'w-full px-3 py-2 border rounded'],
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Upload en gyldig billedfil (JPEG/PNG)'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
