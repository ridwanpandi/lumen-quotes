<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Manipulate your quotes here
 */
class Quotes extends Model
{

    /**
     * Table Name
     *
     * @var string
     */
    protected $table = "quotes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "quotes", "tags", "user_id"
    ];

    /**
     * quotes belongs to user
     *
     * @var object
     */
    public function user()
    {
        return $this->belongsTo("App\User", "user_id", "user_id");
    }

}
