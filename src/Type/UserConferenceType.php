<?php
namespace Potogan\TestBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserConferenceType
 * @package Potogan\TestBundle\Entity
 */
class UserConferenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username',
                'text',
                array('label' => 'Pseudonyme')
            )
            ->add(
                'firstname',
                'text',
                array('label' => 'Prénom')
            )
            ->add(
                'lastname',
                'text',
                array('label' => 'Nom')
            )
            ->add(
                'mobile',
                'text',
                array('label' => 'Téléphone Mobile')
            )
            ->add(
                'email',
                'text',
                array('label' => 'eMail')
            )
            ->add(
                'twitter',
                'text',
                array('label' => 'Twitter')
            )
            ->add(
                'facebook',
                'text',
                array('label' => 'Facebook')
            )
            ->add('avatar', FileType::class, array('label' => 'Avatar du profil'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Potogan\TestBundle\Entity\UserConference',
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'user_conference';
    }
}
