<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $table = "personne";

    protected $fillable = [
        "Nom",
        "Prenom",
        "Tele",
        "DateNaissance"
    ];

    protected $guarded = [
        'id'
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'id');
    }

    public function adherent()
    {
        return $this->hasOne(Adherent::class, 'id', 'id');
    }

    public function responsable()
    {
        return $this->hasOne(Responsable::class, 'id', 'id');
    }

    public function entraineur()
    {
        return $this->hasOne(Entraineur::class, 'id', 'id');
    }
}
