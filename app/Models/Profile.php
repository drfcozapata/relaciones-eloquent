<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model {
  use HasFactory;

  public function location(): HasOne {
    return $this->hasOne(Location::class);
  }

}
