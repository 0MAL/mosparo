<?php

namespace Mosparo\Rule\Form;

use Mosparo\Util\ChoicesUtil;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class WordFormType extends AbstractRuleTypeFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $ruleType = $options['rule_type'];
        if ($ruleType === null) {
            return;
        }

        $builder
            ->add('type', ChoiceType::class, ['choices' => ChoicesUtil::buildChoices($ruleType->getSubtypes()), 'attr' => ['class' => 'form-select rule-item-type']])
            ->add('value', TextType::class, ['attr' => ['placeholder' => 'Word/Pattern', 'class' => 'rule-item-value']])
            ->add('spamRatingFactor', NumberType::class, ['required' => false, 'attr' => ['placeholder' => 'Rating', 'class' => 'rule-item-rating']])
        ;
    }
}
