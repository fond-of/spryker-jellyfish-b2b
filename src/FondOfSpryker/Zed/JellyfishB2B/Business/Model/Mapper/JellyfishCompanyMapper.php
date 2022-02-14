<?php

namespace FondOfSpryker\Zed\JellyfishB2B\Business\Model\Mapper;

use FondOfSpryker\Zed\JellyfishB2B\Dependency\Facade\JellyfishB2BToLocaleFacadeInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\JellyfishCompanyTransfer;
use Generated\Shared\Transfer\JellyfishPriceListTransfer;

class JellyfishCompanyMapper implements JellyfishCompanyMapperInterface
{
    /**
     * @var \FondOfSpryker\Zed\JellyfishB2B\Dependency\Facade\JellyfishB2BToLocaleFacadeInterface
     */
    protected $localeFacade;

    /**
     * @param \FondOfSpryker\Zed\JellyfishB2B\Dependency\Facade\JellyfishB2BToLocaleFacadeInterface $localeFacade
     */
    public function __construct(JellyfishB2BToLocaleFacadeInterface $localeFacade)
    {
        $this->localeFacade = $localeFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\JellyfishCompanyTransfer
     */
    public function fromCompany(CompanyTransfer $companyTransfer): JellyfishCompanyTransfer
    {
        $jellyfishCompany = new JellyfishCompanyTransfer();
        $jellyfishCompany->setId($companyTransfer->getIdCompany())
            ->setUuid($companyTransfer->getUuid())
            ->setExternalReference($companyTransfer->getExternalReference())
            ->setName($companyTransfer->getName())
            ->setPriceList($this->mapCompanyToPriceList($companyTransfer))
            ->setDebtorNumber($companyTransfer->getDebtorNumber())
            ->setBlockedFor($companyTransfer->getBlockedFor())
            ->setStatus($companyTransfer->getStatus())
            ->setIsActive($companyTransfer->getIsActive())
            ->setLocale($this->mapCompanyToLocale($companyTransfer));

        return $jellyfishCompany;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\JellyfishPriceListTransfer|null
     */
    protected function mapCompanyToPriceList(CompanyTransfer $companyTransfer): ?JellyfishPriceListTransfer
    {
        $jellyfishPriceList = new JellyfishPriceListTransfer();

        $priceList = $companyTransfer->getPriceList();

        if ($priceList === null) {
            return null;
        }

        $jellyfishPriceList->setIdPriceList($priceList->getIdPriceList())
            ->setName($priceList->getName());

        return $jellyfishPriceList;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return string
     */
    protected function mapCompanyToLocale(CompanyTransfer $companyTransfer): string
    {
        $companyTransfer->requireFkLocale();

        return $this->localeFacade
            ->getLocaleById($companyTransfer->getFkLocale())
            ->getLocaleName();
    }
}
