<?php

namespace DigressivePrice\Listener;

use DigressivePrice\Event\DigressivePriceEvent;
use DigressivePrice\Event\DigressivePriceFullEvent;
use DigressivePrice\Event\DigressivePriceIdEvent;
use DigressivePrice\Model\DigressivePrice;
use DigressivePrice\Model\DigressivePriceQuery;
use DigressivePrice\Model\Map\DigressivePriceTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Thelia\Action\BaseAction;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Core\Event\Cart\CartEvent;
use Thelia\Core\Event\Product\ProductEvent;
use Thelia\Model\ProductPriceQuery;

/**
 * Class CartAddListener
 * Manage actions when adding a product to a pack
 *
 * @package DigressivePrice\Listener
 * @author Nexxpix
 */
class DigressivePriceListener extends BaseAction implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            TheliaEvents::BEFORE_DELETEPRODUCT => array("beforeRemoveDigressivePrices", 128),
            TheliaEvents::CART_ADDITEM => array("itemAddedToCart", 128),
            TheliaEvents::CART_UPDATEITEM => array("itemAddedToCart", 128),
            'action.createDigressivePrice' => array("createDigressivePrice", 128),
            'action.updateDigressivePrice' => array("updateDigressivePrice", 128),
            'action.deleteDigressivePrice' => array("deleteDigressivePrice", 128));
    }

    /**
     * @param ProductEvent $event
     * @throws \Exception
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function beforeRemoveDigressivePrices(ProductEvent $event)
    {
        $productId = $event->getProduct()->getId();

        DigressivePriceQuery::create()
            ->filterByProductId($productId)
            ->delete();
    }

    /**
     * Set the good item's price when added to cart
     *
     * @param CartEvent $event
     * @throws \Exception
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function itemAddedToCart(CartEvent $event)
    {
        $cartItem = $event->getCartItem();

        // Check if the product has some digressive prices
        $digressivePrice = DigressivePriceQuery::create()
            ->filterByProductId($cartItem->getProductId())
            // Ensure that the digressive price specific to the product sale elements is considered first
            ->orderByProductSaleElementsId(Criteria::DESC)
            ->filterByQuantityFrom($cartItem->getQuantity(), Criteria::LESS_EQUAL)
            ->filterByQuantityTo($cartItem->getQuantity(), Criteria::GREATER_EQUAL)
            // Include the digressive prices applying to all pse...
            ->where(
                DigressivePriceTableMap::PRODUCT_SALE_ELEMENTS_ID . Criteria::EQUAL . "?",
                $event->getProductSaleElementsId()
            )
            ->_or()
            // ...as well as this specific pse
            ->where(
                DigressivePriceTableMap::PRODUCT_SALE_ELEMENTS_ID . Criteria::ISNULL
            )
            ->findOne();

        if (!is_null($digressivePrice)) {
            // Change cart item's prices with those from the corresponding range
            $cartItem
                ->setPrice($digressivePrice->getPrice())
                ->setPromoPrice($digressivePrice->getPromoPrice())
                ->save();
        } else {
            // Change cart item's prices with the default out of range ones
            $prices = ProductPriceQuery::create()
                ->findOneByProductSaleElementsId($cartItem->getProductSaleElementsId());

            $cartItem
                ->setPrice($prices->getPrice())
                ->setPromoPrice($prices->getPromoPrice())
                ->save();
        }
    }

    /**
     * @param DigressivePriceEvent $event
     * @throws \Exception
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function createDigressivePrice(DigressivePriceEvent $event)
    {
        $digressivePrice = new DigressivePrice();

        $digressivePrice
            ->setProductId($event->getProductId())
            ->setProductSaleElementsId($event->getProductSaleElementsId())
            ->setPrice($event->getPrice())
            ->setPromoPrice($event->getPromoPrice())
            ->setQuantityFrom($event->getQuantityFrom())
            ->setQuantityTo($event->getQuantityTo())
            ->save();
    }

    /**
     * @param DigressivePriceFullEvent $event
     * @throws \Exception
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function updateDigressivePrice(DigressivePriceFullEvent $event)
    {
        $digressivePrice = DigressivePriceQuery::create()->findOneById($event->getId());

        $digressivePrice
            ->setProductId($event->getProductId())
            ->setProductSaleElementsId($event->getProductSaleElementsId())
            ->setPrice($event->getPrice())
            ->setPromoPrice($event->getPromoPrice())
            ->setQuantityFrom($event->getQuantityFrom())
            ->setQuantityTo($event->getQuantityTo())
            ->save();
    }

    /**
     * @param DigressivePriceIdEvent $event
     * @throws \Exception
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function deleteDigressivePrice(DigressivePriceIdEvent $event)
    {
        DigressivePriceQuery::create()
            ->filterById($event->getId())
            ->delete();
    }
}
