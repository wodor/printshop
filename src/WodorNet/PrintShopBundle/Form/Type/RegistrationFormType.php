<?php

namespace WodorNet\PrintShopBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends BaseRegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('invitation', 'printshop_invitation_type');
    }

    public function getName()
    {
        return 'printshop_user_registration';
    }
}