<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Collection;
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
 * @property int $type
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
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioField ordered()
 */
class PortfolioField extends Model
{
    const TYPE_EMPTY = 0;
    const TYPE_STRING = 1;
    const TYPE_ENUM = 2;
    const TYPE_LIST = 3;
    const TYPE_LIST_WITH_DATE = 4;
    const TYPE_LIST_WITH_DATE_AND_URL = 5;
    const TYPE_URL = 6;

    public $timestamps = false;

    protected $casts = [
        'type' => 'integer',
        'allow_description' => 'boolean',
        'config' => 'array',
    ];

    protected static $typesConfig = [
        self::TYPE_EMPTY => [
            'bladeComponent' => 'empty',
        ],

        self::TYPE_STRING => [
            'bladeComponent' => 'string',
        ],

        self::TYPE_ENUM => [
            'bladeComponent' => 'enum',
        ],

        self::TYPE_LIST => [
            'bladeComponent' => 'list',
        ],

        self::TYPE_LIST_WITH_DATE => [
            'bladeComponent' => 'list_with_date',
        ],

        self::TYPE_LIST_WITH_DATE_AND_URL => [
            'bladeComponent' => 'list_with_date_and_url',
        ],

        self::TYPE_URL => [
            'bladeComponent' => 'url',
        ],

    ];

    protected $typeConfig;

    public function portfolioCategory()
    {
        return $this->belongsTo(__NAMESPACE__ . '\PortfolioCategory');
    }

    public function portfolioValues()
    {
        return $this->hasMany(__NAMESPACE__ . '\PortfolioValue');
    }

    public function formatValues(Collection $values = null)
    {
        if(!$values || !$values->count()) {
            return '';
        }

        return $values->first()->value;
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order_index', 'ASC');
    }
    
    public function getTypeConfig($key = null)
    {
        if(null === $this->typeConfig) {
            $this->typeConfig =& self::$typesConfig[ isset(self::$typesConfig[$this->type]) ? $this->type : 0 ];
        }

        if(null === $key) {
            return $this->typeConfig;
        } else {
            return isset($this->typeConfig[$key]) ? $this->typeConfig[$key] : null;
        }
    }

    public function getBladeViewComponent()
    {
        return 'fields.show.empty'; // . $this->getTypeConfig('bladeComponent');
    }

    public function getBladeEditComponent()
    {
        return 'fields.edit.' . $this->getTypeConfig('bladeComponent');
    }

    public function getFirstValue ()
    {
        return $this->portfolioValues->isEmpty() ? null : $this->portfolioValues->first()->value;
    }

    public function getFormFieldName(Teacher $teacher)
    {
        return 'portfolio[' . $teacher->id . '][' . $this->id . ']';
    }

}
