<?php

namespace App\Models;

use App\Http\Jambasangsang\Traits\updatableAndCreatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class bed extends Model
{
  use HasFactory;
  use updatableAndCreatable;

  protected $fillable  = [
    'bed_no', 'name',
    'price', 'image',
    'room_id', 'bed_type_id', 'image',
    'status', 'created_by_id', 'updated_by_id',
  ];
  public function room(): BelongsTo
  {
    return $this->belongsTo(Room::class, 'room_id', 'id');
  }
  public function bed_type(): BelongsTo
  {
    return $this->belongsTo(BedType::class, 'bed_type_id', 'id');
  }
  public function createdBy(): BelongsTo
  {
    return $this->belongsTo(User::class, 'created_by_id', 'id');
  }
  public function updatedBy(): BelongsTo
  {
    return $this->belongsTo(User::class, 'updated_by_id', 'id');
  }
}
