<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    protected $table = "Abonnements";

    protected $fillable = [
        "typeAbonnement_id",
        "adherent_id",
        "responsable_id",
        "DateDebut",
        "DateFin",
        "Prix"
    ];

    protected $guarder = [
        "id",

    ];

    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }

    public function adherent()
    {
        return $this->belongsTo(Adherent::class);
    }

    public function type_abonnement()
    {
        return $this->belongsTo(Type_Abonnement::class);
    }
}
