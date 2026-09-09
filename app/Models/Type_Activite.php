<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Activite extends Model
{
    protected $table = "type_activite";

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
