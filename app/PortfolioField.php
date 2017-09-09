<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;

/**
 * Kneu\Portfolio\Portfolio\PortfolioField
 *
 * @property-read \Kneu\Portfolio\Portfolio\PortfolioCategory $portfolioCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\Kneu\Portfolio\Portfolio\PortfolioValue[] $portfolioValues
 * @mixin \Eloquent
 * @property int $id
 * @property int $portfolio_category_id
 * @property string $name
 * @property int $value_Type
 * @property string $hint
 * @property array $config
 * @property bool $allow_description
 * @property int $date_type
 * @property int $order_index
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereAllowDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereDateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereHint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereOrderIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField wherePortfolioCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereValueType($value)
 * @property int $value_type
 */
class PortfolioField extends Model
{
    public $timestamps = false;

    protected $casts = [
        'allow_description' => 'boolean',
        'config' => 'array',
    ];

    public function portfolioCategory()
    {
        return $this->belongsTo(__NAMESPACE__ . '\PortfolioCategory');
    }

    public function portfolioValues()
    {
        return $this->hasMany(__NAMESPACE__ . '\PortfolioValue');
    }
}
