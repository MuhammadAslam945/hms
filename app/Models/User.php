<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Jambasangsang\Traits\updatableAndCreatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use updatableAndCreatable, HasRoles;

    protected $fillable = [
        'title',
        'name',
        'username',
        'mobile',
        'email',
        'profile_photo_path',
        'password',
        'gender',
        'dob',
        'age',
        'religion',
        'address_1',
        'address_2',
        'image',
        'status',
        'created_by_id',
        'updated_by_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtolower($value),
        );
    }

    protected function created_at(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->toDateTimeString(),
            set: fn ($value) => strtolower($value),
        );
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%');
    }

    public function scopeUserRole(Builder $query, $request): Builder
    {
        return  $query->join('model_has_roles', function ($join) {
            $join->on('users.id', '=', 'model_has_roles.model_id')
                ->where('model_has_roles.model_type', User::class);
        })
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where(['roles.name' => $request]);
    }
  
}