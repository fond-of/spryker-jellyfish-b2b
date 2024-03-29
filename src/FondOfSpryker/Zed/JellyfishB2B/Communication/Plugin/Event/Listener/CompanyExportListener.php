<?php

namespace FondOfSpryker\Zed\JellyfishB2B\Communication\Plugin\Event\Listener;

use FondOfSpryker\Zed\JellyfishB2B\Dependency\JellyfishB2BEvents;
use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\JellyfishB2B\Business\JellyfishB2BFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\JellyfishB2B\JellyfishB2BConfig getConfig()
 */
class CompanyExportListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    /**
     * @param array<\Spryker\Shared\Kernel\Transfer\TransferInterface> $transfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $transfers, $eventName): void
    {
        if ($eventName === JellyfishB2BEvents::ENTITY_SPY_COMPANY_UPDATE) {
            $this->getFacade()->exportCompanyBulk($transfers);
        }
    }
}
