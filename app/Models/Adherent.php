<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $table = "Adherents";
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'responsable_id',
        'Assurance'
    ];

    protected $guarded = [
        'id'
    ];

    public function personne()
    {
        return $this->belongsTo(
            Personne::class,
            'id',
            'id'
        );
    }

    public function responsable()
    {
        return $this->belongsTo(
            Responsable::class,
            'responsable_id'
        );
    }

    public function abonnement()
    {
        return $this->hasMany(Abonnement::class);
    }

    public function activite()
    {
        return $this->belongsToMany(
            Activite::class,
            'participer',
            'adherent_id',
            'activite_id'
        );
    }
}
