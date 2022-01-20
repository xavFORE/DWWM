<?php

namespace App\Form;

use App\Entity\Patronyme;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;   
//use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatronymeType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(  'prenom', 
                    TextType::class, 
                    [
                        'required'   =>  true, 
                        'label'      =>  'TON PRENOM',
                        'label_attr' =>  [ 'class' => 'jp_label' ],
                        'attr'       =>  [ 'class' => 'jp_input', 'placeholder' => 'ton prénom', 'maxlength' => '5'  ]
                    ] )
            ->add('profession',
                    TextType::class, 
                    [
                        'required'   => true, 
                        'label'      =>  'METIER',
                        'label_attr' =>  [ 'class' => 'jp_label' ],
                        'attr'       =>  [ 'class' => 'jp_input', 'placeholder' => 'métier', 'maxlength' => '5'  ]
                    ] )
            ->add('jour',  
                    TextType::class, 
                    [
                        'required'   =>  true, 
                        'label'      =>  'JOUR',
                        'label_attr' =>  [ 'class' => 'jp_label' ],
                        'attr'       =>  [ 
                                            'class' => 'jp_input', 
                                            'placeholder' => 'jour', 
                                            'maxlength' => '5'  
                                         ]
                    ] )
            ->add( 'enregistrer', SubmitType::class )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patronyme::class,
        ]);
    }
}
