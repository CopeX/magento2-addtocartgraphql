<?php
declare(strict_types=1);

namespace IntegerNet\AddToCartGraphQl\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class AddToCartGraphQl implements ArgumentInterface
{
    public function getAddToCartQuery(): string
    {
        return '{
        addProductsToCart(
            cartId: "%cartId"
            cartItems: [
              {
                quantity: %qty
                sku: "%sku"
                selected_options: [%selectedOptions]
                entered_options: [%enteredOptions]
              }
            ]
        ) {
        cart {
          items {
            product {
              name
              sku
            }
            ... on ConfigurableCartItem {
              configurable_options {
                configurable_product_option_uid
                option_label
                configurable_product_option_value_uid
                value_label
              }
            }
            quantity
          }
        }
      }
    }';
    }
}
