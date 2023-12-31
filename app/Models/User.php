<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Hamcrest\Arrays\IsArray;
//use App\Models\SkiResort;
//use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'town',
        'country',
        'bornDate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    
    // 
    public function hasRole($roleNames):bool {
        
        // Convierte en array si lo que llega es un string
        if (!is_array($roleNames)) {
            $roleNames=[$roleNames];
        };
        
        foreach ($this->roles as $role){
            if (in_array($role->role, $roleNames)) {
                return true;
            }
        }
        return false;
    }

    //
    public function remainingRoles() {
        
        // Recupera los roles que no tiene el usuario 
        $actualRoles=$this->roles;
        $allRoles=Role::all();

        return $allRoles->diff($actualRoles);
    }
    
    //
    public function skiResorts(){
        return $this->hasMany(SkiResort::class);
    }
    
    //
    public function isOwner(SkiResort $skiResort){
        return $this->id==$skiResort->user_id;
    }
}
