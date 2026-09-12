<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Activite extends Model
{
<<<<<<< HEAD
    protected $table = "type_activite";
=======
    protected $table = "type_Activite";
>>>>>>> 6555ff0 (feat: change the models table names)

    protected $fillable = [
        "Libelle"
    ];

    protected $guarded = [
        "id"
    ];

    public function activite()
    {
        return $this->hasMany(Activite::class);
    }
}
