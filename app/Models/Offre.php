<?php

namespace App\Models;

use App\Models\Mission;
use App\Models\Candidature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends Model
{
    use HasFactory;
    public function candidature(){
        return $this->hasMany(Candidature::class,"parent_id");
    }
    public function missions(){
        return $this->hasMany(Mission::class,"parent_id");
    }
}
