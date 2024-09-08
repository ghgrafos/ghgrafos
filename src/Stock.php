<?php
namespace Doctrine\Tests\Models\StockExchange;

use Doctrine\ORM\Mapping as ORM;

#[Entity]
#[Table(name: 'exchange_stocks')]
class Stock
{
    #[Id, Column(type: 'integer'), GeneratedValue]
    private int|null $id = null;

    #[Column(type: 'string', unique: true)]
    private string $symbol;

    #[ManyToOne(targetEntity: Market::class, inversedBy: 'stocks')]
    private Market|null $market;

    public function __construct(string $symbol, Market $market)
    {
        $this->symbol = $symbol;
        $this->market = $market;
        $market->addStock($this);
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }
}