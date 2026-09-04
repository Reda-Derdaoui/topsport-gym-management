<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $table = "Adherents";

    protected $fillable = [
        'Assurance',
        'responsable_id'
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
