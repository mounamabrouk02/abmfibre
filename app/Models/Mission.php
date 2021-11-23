<?php

namespace App\Models;

use App\Models\Offre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Mission extends Model
{
    use HasFactory;
    public function offre(){
    return $this->belongSTo(Offre::class,"parent_id");
}
}
