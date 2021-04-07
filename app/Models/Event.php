<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'title', 'name', 'text'];

    public function getPrevItemAttribute() {
        $previous = Event::where('id', '<', $this->id)->max('id');
        if (!$previous) {
            return null;
        }
        return $previous;
    }

    public function getNextItemAttribute() {
        $next = Event::where('id', '>', $this->id)->min('id');
        if (!$next) {
            return null;
        }
        return $next;
    }

    public function getList() {
        return $this->orderBy('date', 'DESC')->paginate(10);
    }

    public function storeData($input) {
        return $this->create($input);
    }

}
