<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\Sylius\InvoicingPlugin\Entity;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\InvoicingPlugin\Entity\InvoiceInterface;
use Sylius\InvoicingPlugin\Entity\TaxItemInterface;

final class TaxItemSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith('VAT (23%)', 2300);
    }

    public function it_implements_tax_item_interface(): void
    {
        $this->shouldImplement(TaxItemInterface::class);
    }

    public function it_implements_resource_interface(): void
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    public function it_has_proper_tax_item_data(): void
    {
        $this->label()->shouldReturn('VAT (23%)');
        $this->amount()->shouldReturn(2300);
    }

    public function it_has_an_invoice(InvoiceInterface $invoice): void
    {
        $this->setInvoice($invoice);
        $this->invoice()->shouldReturn($invoice);
    }
}
