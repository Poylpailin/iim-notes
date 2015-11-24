<?php

namespace AppBundle\Form;

use AppBundle\Repository\StudentRepository;
use AppBundle\Repository\ExamRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class GradeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('grade')
            //->add('student_id', 'entity', array(
                //'class' => 'AppBundle:Student',
                //'query_builder' => function(StudentRepository $er) {
                //    return $er->findCatchAll('s')->orderBy('s.id', 'ASC');
                //},
                //'multiple' => false,
                //'label_attr' => array(
                //    'class' => 'browser-default'
                //),
            //))
            ->add('student', 'entity', array(
                'class' => 'AppBundle:Student',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('s')->orderBy('s.firstName', 'ASC');
                },
                'multiple' => false,
                'label_attr' => array(
                    'class' => 'input-field browser-default'
                ),
            ))

            ->add('exam', 'entity', array(
                'class' => 'AppBundle:Exam',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('e')->orderBy('e.name', 'ASC');
                },
                'multiple' => false,
                'label_attr' => array(
                    'class' => 'input-field browser-default'
                ),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Grade'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_grade';
    }
}
