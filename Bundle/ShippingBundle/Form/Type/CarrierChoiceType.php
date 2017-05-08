<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 *
*/

namespace CoreShop\Bundle\ShippingBundle\Form\Type;

use CoreShop\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CarrierChoiceType extends AbstractType
{
    /**
     * @var RepositoryInterface
     */
    private $carrierRepository;

    /**
     * @param RepositoryInterface $carrierRepository
     */
    public function __construct(RepositoryInterface $carrierRepository)
    {
        $this->carrierRepository = $carrierRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'choices' => function (Options $options) {
                    $carriers = $this->carrierRepository->findAll();

                    /*
                     * PHP 5.* bug, fixed in PHP 7: https://bugs.php.net/bug.php?id=50688
                     * "usort(): Array was modified by the user comparison function"
                     */
                    @usort($carriers, function ($a, $b) {
                        return $a->getName() < $b->getName() ? -1 : 1;
                    });

                    return $carriers;
                },
                'choice_value' => 'id',
                'choice_label' => 'name',
                'choice_translation_domain' => false,
                'active' => true
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return ChoiceType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'coreshop_carrier_choice';
    }
}
