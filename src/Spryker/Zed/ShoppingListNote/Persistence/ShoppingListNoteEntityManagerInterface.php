<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShoppingListNote\Persistence;

use Generated\Shared\Transfer\ShoppingListItemCollectionTransfer;
use Generated\Shared\Transfer\ShoppingListItemNoteTransfer;

interface ShoppingListNoteEntityManagerInterface
{
    public function saveShoppingListItemNote(ShoppingListItemNoteTransfer $shoppingListItemNoteTransfer): ShoppingListItemNoteTransfer;

    public function deleteShoppingListItemNoteById(int $idShoppingListItemNote): void;

    /**
     * @param array<int> $shoppingListItemNoteIds
     *
     * @return void
     */
    public function deleteShoppingListItemNoteByShoppingListItemNoteIds(array $shoppingListItemNoteIds): void;

    public function saveShoppingListItemNoteInBulk(ShoppingListItemCollectionTransfer $shoppingListItemCollectionTransfer): ShoppingListItemCollectionTransfer;
}
