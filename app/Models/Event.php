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
        return self::where([['date', '<', $this->date]])->orWhere([['date', '=', $this->date],['id', '<', $this->id]])->orderByDesc('date')->orderByDesc('id')->first();
    }

    public function getNextItemAttribute() {
        return self::where([['date', '>', $this->date]])->orWhere([['date', '=', $this->date],['id', '>', $this->id]])->orderBy('date')->orderBy('id')->first();
    }

    public function getList() {
        return $this->orderBy('date', 'DESC')->orderBy('id', 'DESC')->paginate(10);
    }

    public function storeData($input) {
        return $this->create($input);
    }

}
