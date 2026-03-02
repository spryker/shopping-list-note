<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ShoppingListNote;

use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\ShoppingListNote\Dependency\Client\ShoppingListNoteToCartClientInterface;
use Spryker\Client\ShoppingListNote\Mapper\ShoppingListItemToItemMapper;
use Spryker\Client\ShoppingListNote\Mapper\ShoppingListItemToItemMapperInterface;

class ShoppingListNoteFactory extends AbstractFactory
{
    public function getShoppingListItemToItemMapper(): ShoppingListItemToItemMapperInterface
    {
        return new ShoppingListItemToItemMapper(
            $this->getCartClient(),
        );
    }

    public function getCartClient(): ShoppingListNoteToCartClientInterface
    {
        return $this->getProvidedDependency(ShoppingListNoteDependencyProvider::CLIENT_CART);
    }
}
