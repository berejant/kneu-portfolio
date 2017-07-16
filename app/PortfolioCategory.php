<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;

/**
 * Kneu\Portfolio\Portfolio\PortfolioCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Kneu\Portfolio\Portfolio\PortfolioField[] $portfolioFields
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereUpdatedAt($value)
 */
class PortfolioCategory extends Model
{
    public function portfolioFields()
    {
        return $this->hasMany(__NAMESPACE__ .  '\PortfolioField');
    }

}
