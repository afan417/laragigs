<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return [
            ['id' => '1', 'title' => 'Learn Laravel', 'description' => 'Learn Laravel today'],
            ['id' => '2', 'title' => 'Learn RubyOnRails', 'description' => 'Learn RubyOnRails today'],
            ['id' => '3', 'title' => 'Learn PHP', 'description' => 'Learn PHP today'],
            ['id' => '4', 'title' => 'Learn Python', 'description' => 'Learn Python today'],
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
