<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 22/07/2018
 * Time: 14:37
 */

namespace App\Models;

class Category extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * @param Item $item
     * @return false|\Illuminate\Database\Eloquent\Model
     */
    public function addItem(Item $item)
    {
        return $this->items()->save($item);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
