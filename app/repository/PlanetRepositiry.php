<?php

class PlanetRepository
{
    /**
     * @param $paginateCount
     * @return mixed
     */
    public static function all($paginateCount)
    {
        $user = Auth::user();

        if ($user) {
            $planets = Planet::where('user_id', '=', $user->id)->orderBy('created_at', 'DESC');

        } else {

            $planets = Planet::orderBy('created_at', 'DESC');

        }
        
        return $planets->paginate($paginateCount);
    }

    /**
     * Upload planet image and return full name image
     *
     * @param Planet $planet
     * @return null|string
     */
    public static  function uploadImage($planet = null)
    {
        if (!Input::hasFile('image')){
            return null;
        }

        $file = Input:: file('image');
        $name = 'planet_' . str_replace(" ","_", Input::get('planet'));
        $extension = str_replace('image/',"" , $file->getMimeType());
        $fullName = $name . '.' . $extension;
        if ($planet) {
            try {
                unlink('img/uploads/' . $planet->image);
            } catch (Exception $e) {

            }
        }
        $file->move('img/uploads', $fullName);

        $image = Image::make(sprintf('img/uploads/%s', $fullName))->save();

        if (!$image) {
            return null;
        }

        return $fullName;
    }
}