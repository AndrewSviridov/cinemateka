<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
// use Propaganistas\LaravelCacheSupport\Traits\EloquentCacheable;

class MenuItem extends Model
{
    use CrudTrait;
    // use EloquentCacheable;

    protected $table    = 'menu_items';
    protected $fillable = ['name', 'type', 'link', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo('App\Models\MenuItem', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\MenuItem');
    }

    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getTree()
    {
        $menu = self::orderBy('lft')->get();

        if ($menu->count())
        {
            foreach ($menu as $k => $menu_item)
            {
                $menu_item->children = collect([]);

                foreach ($menu as $i => $menu_subitem)
                {
                    if ($menu_subitem->parent_id == $menu_item->id)
                    {
                        $menu_item->children->push($menu_subitem);

                        // remove the subitem for the first level
                        $menu = $menu->reject(function ($item) use ($menu_subitem)
                        {
                            return $item->id == $menu_subitem->id;
                        });
                    }
                }
            }
        }

        return $menu;
    }

    public function url()
    {
        switch ($this->type)
        {
            case 'external_link':
                return $this->link;
                break;

            case 'internal_link':
                return url($this->link);
                break;

            default: //page_link
                return url($this->page->slug);
                break;
        }
    }
}
