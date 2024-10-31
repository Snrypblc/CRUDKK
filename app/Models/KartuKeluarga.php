<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $dates = ["created_at", "updated_at"];
    protected $guarded = ["id"];

    public function ktp()
    {
        return $this->hasMany(KartuTandaPenduduk::class, "kartu_keluarga_id");
    }
}
