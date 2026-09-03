<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Abonnement extends Model
{
    protected $table = "Type_Abonnement";

    protected $fillable = [
        "Libelle"
    ];

    protected $guarder = [
        "id"
    ];

    public function abonnement()
    {
        return $this->hasMany(Abonnement::class);
    }
}
