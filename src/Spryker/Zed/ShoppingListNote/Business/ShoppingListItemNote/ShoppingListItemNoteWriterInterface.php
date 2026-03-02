<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote;

use Generated\Shared\Transfer\ShoppingListItemCollectionTransfer;
use Generated\Shared\Transfer\ShoppingListItemNoteTransfer;
use Generated\Shared\Transfer\ShoppingListItemTransfer;

interface ShoppingListItemNoteWriterInterface
{
    public function deleteShoppingListItemNoteById(ShoppingListItemNoteTransfer $shoppingListItemNoteTransfer): void;

    public function saveShoppingListItemNoteForShoppingListItem(ShoppingListItemTransfer $shoppingListItemTransfer): ShoppingListItemTransfer;

    public function saveShoppingListItemNoteForShoppingListItemBulk(
        ShoppingListItemCollectionTransfer $shoppingListItemCollectionTransfer
    ): ShoppingListItemCollectionTransfer;
}
