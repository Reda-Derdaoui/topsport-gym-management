<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Abonnement extends Model
{
<<<<<<< HEAD
    protected $table = "type_abonnement";
=======
    protected $table = "type_Abonnement";
>>>>>>> 6555ff0 (feat: change the models table names)

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
