<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Teacher onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Teacher whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Teacher withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Teacher withoutTrashed()
 */
class Teacher extends Model
{
    use SoftDeletes;

    public $incrementing = false;


    protected $fillable = [
        'id',
        'first_name', 'middle_name', 'last_name',
        'image_url',
        'department_id',
    ];

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

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
    }

}
