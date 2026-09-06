<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = "Responsables";

    public $incrementing = false;

      protected $keyType = 'int';

    protected $fillable = [
        'id',
        'admin_id',
        'user_id'
    ];

    protected $guarded = [
        'id'
    ];


    public function personne()
    {
        return $this->belongsTo(Personne::class, 'id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function adherent()
    {
        return $this->hasMany(Adherent::class);
    }

    public function abonnement()
    {
        return $this->hasMany(Abonnement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
