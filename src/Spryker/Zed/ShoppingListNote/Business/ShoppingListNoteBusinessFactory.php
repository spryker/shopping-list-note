<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShoppingListNote\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote\ShoppingListItemNoteReader;
use Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote\ShoppingListItemNoteReaderInterface;
use Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote\ShoppingListItemNoteWriter;
use Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote\ShoppingListItemNoteWriterInterface;

/**
 * @method \Spryker\Zed\ShoppingListNote\Persistence\ShoppingListNoteEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\ShoppingListNote\Persistence\ShoppingListNoteRepositoryInterface getRepository()
 */
class ShoppingListNoteBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote\ShoppingListItemNoteReaderInterface
     */
    public function createShoppingListNoteReader(): ShoppingListItemNoteReaderInterface
    {
        return new ShoppingListItemNoteReader(
            $this->getRepository()
        );
    }

    /**
     * @return \Spryker\Zed\ShoppingListNote\Business\ShoppingListItemNote\ShoppingListItemNoteWriterInterface
     */
    public function createShoppingListNoteWriter(): ShoppingListItemNoteWriterInterface
    {
        return new ShoppingListItemNoteWriter(
            $this->getEntityManager()
        );
    }
}
