<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;

/**
 * Kneu\Portfolio\PortfolioValue
 *
 * @property-read \Kneu\Portfolio\PortfolioField $portfolioField
 * @property-read \Kneu\Portfolio\Teacher $teacher
 * @mixin \Eloquent
 * @property int $id
 * @property int $portfolio_field_id
 * @property int $teacher_id
 * @property string $value
 * @property string $description
 * @property string $date
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioValue whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioValue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioValue wherePortfolioFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioValue whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioValue whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioValue withPortfolioCategory()
 */
class PortfolioValue extends Model
{
    public $timestamps = false;

    protected $attributes = array(
        'description' => '',
    );

    protected $dates = [
        'date',
    ];

    public function portfolioField()
    {
        return $this->belongsTo(__NAMESPACE__ .  '\PortfolioField');
    }

    public function teacher()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Teacher');
    }

    public function scopeWithPortfolioCategory($query)
    {
        return $query->with([
            'PortfolioField' => function($portfolioField) {
                return $portfolioField->with('PortfolioCategory');
            }
        ]);
    }

}
