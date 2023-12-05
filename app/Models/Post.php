<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model {
  use HasFactory;

  public function user(): BelongsTo {
    return $this->belongsTo(User::class);
  }

  public function category(): BelongsTo {
    return $this->belongsTo(Category::class);
  }

  public function comments(): MorphMany {
    return $this->morphMany(Comment::class, 'commentable');
  }

  public function image(): MorphOne {
    return $this->morphOne(Image::class, 'imageable');
  }

  public function tags(): MorphToMany {
    return $this->morphToMany(Tag::class, 'taggable');
  }
}
