<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','equipe','model_type', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plannings()
    {
        return $this->hasMany(Planning::class, 'equipe', 'equipe');
    }
   // Dans le modèle User.php

public function roles()
{
    return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
}
public function assignRole($role, $modelType = null)
{
    // Si le model_type est fourni, utilisez-le, sinon utilisez le modèle par défaut
    $modelType = $modelType ?? static::class;
    $role = is_string($role) ? Role::where('name', $role)->firstOrFail() : $role;

    if ($this->hasRole($role, $modelType)) {
        return $this;
    }

    $this->roles()->save($role, ['model_type' => $modelType]);

    return $this;
}

    

}