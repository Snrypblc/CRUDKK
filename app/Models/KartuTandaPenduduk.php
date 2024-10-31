<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuTandaPenduduk extends Model
{
    protected $dates = ["created_at", "updated_at"];
    protected $guarded = ["id"];

    public function kk()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }
}
