<?php

namespace FondOfSpryker\Zed\JellyfishB2B\Business\Model\Expander;

use Generated\Shared\Transfer\JellyfishOrderTransfer;
use Orm\Zed\Sales\Persistence\Base\SpySalesOrder;

class OrderCustomReferenceJellyfishOrderExpander implements OrderCustomReferenceJellyfishOrderExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\JellyfishOrderTransfer $jellyfishOrderTransfer
     * @param \Orm\Zed\Sales\Persistence\Base\SpySalesOrder $spySalesOrder
     *
     * @return \Generated\Shared\Transfer\JellyfishOrderTransfer
     */
    public function expand(
        JellyfishOrderTransfer $jellyfishOrderTransfer,
        SpySalesOrder $spySalesOrder
    ): JellyfishOrderTransfer {
        if ($spySalesOrder->getOrderCustomReference() === null) {
            return $jellyfishOrderTransfer;
        }

        $jellyfishOrderTransfer->setCustomReference($spySalesOrder->getOrderCustomReference());

        return $jellyfishOrderTransfer;
    }
}
