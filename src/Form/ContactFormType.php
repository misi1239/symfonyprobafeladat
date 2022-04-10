<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [

                "attr" => array(
                    "placeholder" => "Név",
                    "class" => "form-input-attr"
                ),

                'row_attr' => array(
                    'class' => 'form-floating',
                ),

                "label" => "Név",
                "required" => false
            ])

            ->add('email', TextType::class, [

                "attr" => array(
                    "placeholder" => "Email",
                    "class" => "form-input-attr"       
                ),

                
                'row_attr' => array(
                    'class' => 'form-floating',
                ),

                "label" =>"Email",
                "required" => false,
            ])
            ->add('message', TextareaType::class, [

                "attr" => array(
                    "placeholder" => "Üzenet...",
                    "class" => "form-input-attr message-attr"
                ),

                
                'row_attr' => array(
                    'class' => 'form-floating',
                ),

                "label" =>"Üzenet...",
                "required" => false,

            ])
            //->add('created_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
