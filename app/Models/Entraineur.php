<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entraineur extends Model
{
    protected $table = "entraineurs";
    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        "id",
        "admin_id",
        "Specialite",
    ];

    protected $guarded = [
        "id",
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class, 'id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function activite()
    {
        return $this->hasMany(Activite::class);
    }
}
