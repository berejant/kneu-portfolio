<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;

/**
 * Kneu\Portfolio\Teacher
 *
 * @property-read \Kneu\Portfolio\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection|\Kneu\Portfolio\PortfolioValue[] $portfolioValues
 * @property-read \Kneu\Portfolio\User $user
 * @mixin \Eloquent
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property int $department_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Teacher whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Teacher whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Teacher whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Teacher whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Teacher whereUpdatedAt($value)
 */
class Teacher extends Model
{
    public $incrementing = false;

    public function portfolioValues()
    {
        return $this->hasMany(__NAMESPACE__ . '\PortfolioValue');
    }

    public function user()
    {
        return $this->hasOne(__NAMESPACE__ . '\User');
    }

    public function department()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Department');
    }

}