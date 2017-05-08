/*
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

pimcore.registerNS('pimcore.plugin.coreshop.stores.panel');
pimcore.plugin.coreshop.stores.panel = Class.create(pimcore.plugin.coreshop.abstract.panel, {

    /**
     * @var string
     */
    layoutId: 'coreshop_stores_panel',
    storeId : 'coreshop_stores',
    iconCls : 'coreshop_icon_store',
    type : 'stores',

    url : {
        add : '/admin/CoreShop/stores/add',
        delete : '/admin/CoreShop/stores/delete',
        get : '/admin/CoreShop/stores/get',
        list : '/admin/CoreShop/stores/list'
    }
});
