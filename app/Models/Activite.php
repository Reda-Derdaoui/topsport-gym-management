<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $table = "Activites";

    protected $fillable = [
        "id_admin",
        "entraineur_id",
        'type_activite_id',
        "Libelle"
    ];

    protected $guarded = [
        "id",
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function entraineur()
    {
        return $this->belongsTo(Entraineur::class);
    }

    public function type_activite()
    {
        return $this->belongsTo(Type_Activite::class);
    }

    public function planning()
    {
        return $this->belongsToMany(
            Planning::class,
            "planifier",
            "planning_id",
            "activite_id"
        );
    }

    public function adherent()
    {
        return $this->belongsToMany(Adherent::class, 'participer');
    }
}
