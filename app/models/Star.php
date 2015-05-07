<?php

class Star extends Eloquent {

    protected $fillable = array(

       'name',
        'description',
    );



    public static function getValidationRules() {
        $validation = array(
            'level'     => 'required',
        );

        return $validation;
    }

    /**
     * Return planets
     *
     * @return mixed
     */
    public function planets()
    {
        return $this->hasMany('Planet');
    }

    /**
     * Return sector
     *
     * @return mixed
     */
    public function sector()
    {
        return $this->belongsTo('Sector', 'sector_id');
    }

}
