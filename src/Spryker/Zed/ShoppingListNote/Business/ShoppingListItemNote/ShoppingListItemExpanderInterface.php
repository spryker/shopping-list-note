<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote;

use Generated\Shared\Transfer\ShoppingListItemCollectionTransfer;
use Generated\Shared\Transfer\ShoppingListItemTransfer;

interface ShoppingListItemExpanderInterface
{
    /**
     * @deprecated Use {@link \Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote\ShoppingListItemExpanderInterface::expandItemCollection()} instead.
     *
     * @param \Generated\Shared\Transfer\ShoppingListItemTransfer $shoppingListItemTransfer
     *
     * @return \Generated\Shared\Transfer\ShoppingListItemTransfer
     */
    public function expandItem(ShoppingListItemTransfer $shoppingListItemTransfer): ShoppingListItemTransfer;

    public function expandItemCollection(ShoppingListItemCollectionTransfer $shoppingListItemCollectionTransfer): ShoppingListItemCollectionTransfer;
}
