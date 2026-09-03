<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "Admin";


    protected $fillable = [
        'id',
        'user_id',
    ];

    protected $guarded = [
        "id",
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class, 'id', 'id');
    }

    public function responsable()
    {
        return $this->hasMany(Responsable::class);
    }

    public function entraineur()
    {
        return $this->hasMany(Entraineur::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activitie() {
        return $this->hasMany(Activite::class);
    }
}
