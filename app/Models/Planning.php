<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $table = "Plannings";

    protected $fillable = [
        "heure_debut",
        "heure_fin",
        "jour_semain",
    ];

    protected $guarded = [
        "id",
    ];

    public function activite()
    {
        return $this->belongsToMany(
            Activite::class,
            "planifier",
            "planning_id",
            "activite_id"
        );
    }
}
