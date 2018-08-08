<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShoppingListNote\Persistence;

use Generated\Shared\Transfer\ShoppingListItemNoteTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \Spryker\Zed\ShoppingListNote\Persistence\ShoppingListNotePersistenceFactory getFactory()
 */
class ShoppingListNoteRepository extends AbstractRepository  implements ShoppingListNoteRepositoryInterface
{
    /**
     * @param int $idShoppingListItem
     *
     * @return \Generated\Shared\Transfer\ShoppingListItemNoteTransfer|null
     */
    public function findShoppingListItemNoteByFkShoppingListItem(int $idShoppingListItem): ?ShoppingListItemNoteTransfer
    {
        $shoppingListItemNoteQuery = $this
            ->getFactory()
            ->createShoppingListItemNoteQuery()
            ->filterByFkShoppingListItem($idShoppingListItem);

        $shoppingListItemNoteEntityTransfer = $this->buildQueryFromCriteria($shoppingListItemNoteQuery)->find();

        if ($shoppingListItemNoteEntityTransfer) {
            return $this->getFactory()
                ->createShoppingListItemNoteMapper()
                ->mapShoppingListItemNoteTransfer($shoppingListItemNoteEntityTransfer, new ShoppingListItemNoteTransfer());
        }

        return null;
    }
}
