<?php
namespace AppBundle\Form;

use AppBundle\Entity\cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class coursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('nomCours',TextType::class,array('attr' => array( 'class'=>'form-control' ,'style'=>'margin-bottom:15px')))
            ->add('nomMat',ChoiceType::class,
                array( 'choices' =>
                    array(  
                        'System Administrator' => 'System Administrator',
                        'Computer Security' => 'Computer Security',
                        'IHM' => "IHM",
                        'Artificial Intelligence'=>'Artificial Intelligence',
                        'Java' => 'Java',
                        'Web Development' => 'Web Development',
                        'Networks II' => 'Networks II',
                        'Multimedia' => 'Multimedia',
                        'Distributed System' =>'Distributed System'                                               
                    ),'attr' => array( 'class'=>'form-control' ,'style'=>'margin-bottom:15px')
                ))
            ->add('pdfFile', FileType::class,array('data_class' => null,'attr' => array('class'=>'form-control' ,'style'=>'margin-bottom:15px')))
            ->add('save', SubmitType::class,array('attr' => array( 'class'=>'btn btn-success' ,'style'=>'margin-bottom:15px')))
        ;	
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => cours::class,
        ));
    }
}


