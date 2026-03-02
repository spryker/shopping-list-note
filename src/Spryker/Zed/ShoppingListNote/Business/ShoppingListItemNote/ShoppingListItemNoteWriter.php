<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote;

use Generated\Shared\Transfer\ShoppingListItemCollectionTransfer;
use Generated\Shared\Transfer\ShoppingListItemNoteTransfer;
use Generated\Shared\Transfer\ShoppingListItemTransfer;
use Spryker\Zed\ShoppingListNote\Persistence\ShoppingListNoteEntityManagerInterface;

class ShoppingListItemNoteWriter implements ShoppingListItemNoteWriterInterface
{
    /**
     * @var \Spryker\Zed\ShoppingListNote\Persistence\ShoppingListNoteEntityManagerInterface
     */
    protected $shoppingListNoteEntityManager;

    public function __construct(ShoppingListNoteEntityManagerInterface $shoppingListNoteEntityManager)
    {
        $this->shoppingListNoteEntityManager = $shoppingListNoteEntityManager;
    }

    public function deleteShoppingListItemNoteById(ShoppingListItemNoteTransfer $shoppingListItemNoteTransfer): void
    {
        $this->deleteShoppingListItemNoteTransfer($shoppingListItemNoteTransfer);
    }

    public function saveShoppingListItemNoteForShoppingListItem(ShoppingListItemTransfer $shoppingListItemTransfer): ShoppingListItemTransfer
    {
        $shoppingListItemNote = $shoppingListItemTransfer->getShoppingListItemNote();

        if (!$shoppingListItemNote) {
            return $shoppingListItemTransfer;
        }

        $shoppingListItemNote->setFkShoppingListItem($shoppingListItemTransfer->getIdShoppingListItem());
        $this->saveShoppingListItemNoteTransfer($shoppingListItemNote);

        return $shoppingListItemTransfer;
    }

    public function saveShoppingListItemNoteForShoppingListItemBulk(
        ShoppingListItemCollectionTransfer $shoppingListItemCollectionTransfer
    ): ShoppingListItemCollectionTransfer {
        return $this->saveShoppingListItemNoteTransfersInBulk($shoppingListItemCollectionTransfer);
    }

    protected function saveShoppingListItemNoteTransfer(ShoppingListItemNoteTransfer $shoppingListItemNoteTransfer): ?ShoppingListItemNoteTransfer
    {
        if (!$shoppingListItemNoteTransfer->getNote()) {
            $this->deleteShoppingListItemNoteTransfer($shoppingListItemNoteTransfer);

            return null;
        }

        return $this->shoppingListNoteEntityManager->saveShoppingListItemNote($shoppingListItemNoteTransfer);
    }

    protected function deleteShoppingListItemNoteTransfer(ShoppingListItemNoteTransfer $shoppingListItemNoteTransfer): void
    {
        if ($shoppingListItemNoteTransfer->getIdShoppingListItemNote()) {
            $this->shoppingListNoteEntityManager->deleteShoppingListItemNoteById($shoppingListItemNoteTransfer->getIdShoppingListItemNote());
        }
    }

    protected function deleteShoppingListItemNotesWithoutNoteValueInBulk(ShoppingListItemCollectionTransfer $shoppingListItemCollectionTransfer): void
    {
        $shoppingListItemNoteIds = [];
        foreach ($shoppingListItemCollectionTransfer->getItems() as $shoppingListItemTransfer) {
            $shoppingListItemNoteTransfer = $shoppingListItemTransfer->getShoppingListItemNote();
            if (!$shoppingListItemNoteTransfer || $shoppingListItemNoteTransfer->getNote() || !$shoppingListItemNoteTransfer->getIdShoppingListItemNote()) {
                continue;
            }

            $shoppingListItemNoteIds[] = $shoppingListItemNoteTransfer->getIdShoppingListItemNote();
        }

        $this->shoppingListNoteEntityManager->deleteShoppingListItemNoteByShoppingListItemNoteIds($shoppingListItemNoteIds);
    }

    protected function saveShoppingListItemNoteTransfersInBulk(
        ShoppingListItemCollectionTransfer $shoppingListItemCollectionTransfer
    ): ShoppingListItemCollectionTransfer {
        $this->deleteShoppingListItemNotesWithoutNoteValueInBulk($shoppingListItemCollectionTransfer);

        return $this->shoppingListNoteEntityManager->saveShoppingListItemNoteInBulk($shoppingListItemCollectionTransfer);
    }
}
