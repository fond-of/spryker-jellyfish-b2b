<?php

namespace FondOfSpryker\Zed\JellyfishB2B\Dependency\Facade;

use Generated\Shared\Transfer\CurrencyTransfer;
use Spryker\Zed\Currency\Business\CurrencyFacadeInterface;

class JellyfishB2BToCurrencyFacadeBridge implements JellyfishB2BToCurrencyFacadeInterface
{
    /**
     * @var \Spryker\Zed\Currency\Business\CurrencyFacadeInterface
     */
    protected $currencyFacade;

    /**
     * @param \Spryker\Zed\Currency\Business\CurrencyFacadeInterface $currencyFacade
     */
    public function __construct(CurrencyFacadeInterface $currencyFacade)
    {
        $this->currencyFacade = $currencyFacade;
    }

    public function getByIdCurrency(int $idCurrency): CurrencyTransfer
    {
        return $this->currencyFacade->getByIdCurrency($idCurrency);
    }
}
