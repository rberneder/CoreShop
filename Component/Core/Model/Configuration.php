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

namespace CoreShop\Component\Core\Model;

use CoreShop\Component\Configuration\Model\Configuration as BaseConfiguration;

class Configuration extends BaseConfiguration implements ConfigurationInterface
{
    /**
     * @var StoreInterface
     */
    protected $store;

    /**
     * {@inheritdoc}
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * {@inheritdoc}
     */
    public function setStore(StoreInterface $store)
    {
        $this->store = $store;
    }
}
