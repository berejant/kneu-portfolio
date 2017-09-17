<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;

/**
 * Kneu\Portfolio\User
 *
 * @property-read \Kneu\Portfolio\Teacher $teacher
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property string $type
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string|null $role
 * @property int|null $teacher_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereType($value)
 */
class User extends Model implements AuthorizableContract, AuthenticatableContract
{
    use Authorizable;
    use Authenticatable;

    public $timestamps = false;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'type',
        'role',
        'teacher_id'
    ];

    protected $casts = [
        'teacher_id' => 'integer',
    ];

    public function teacher()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Teacher');
    }

    public function setRememberToken($value)
    {
        // nothing
    }

    public function getRememberToken()
    {
        return null;
    }

    public function getName ()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isSuperAdmin()
    {
        return 'admin' === $this->role;
    }

    public function isTeacher()
    {
        return 'teacher' === $this->type;
    }

}
