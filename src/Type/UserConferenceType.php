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
                array('label' => 'Pseudonyme',
                      'required' => true
                )
            )
            ->add(
                'firstname',
                'text',
                array('label' => 'Prénom',
                    'required' => true
                )
            )
            ->add(
                'lastname',
                'text',
                array('label' => 'Nom',
                    'required' => true
                )
            )
            ->add(
                'mobile',
                'text',
                array('label' => 'Téléphone Mobile',
                    'required' => true
                )
            )
            ->add(
                'email',
                'text',
                array('label' => 'eMail',
                    'required' => true
                )
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
