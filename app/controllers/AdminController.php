<?php

class AdminController extends BaseController
{

    public function test()
    {

        $sectors = Sector::all();

        foreach($sectors as $sector){
            echo '<p style="tab-index: 10px">';
            echo 'Id : '. $sector->id . ', Name: ' . $sector->name . ', Description: ' . $sector->description . '</br>';
            $stars = $sector->stars;
            foreach ($stars as $star){
                echo '<p style="tab-index: 20px">';
                echo 'Id : '. $star->id . ', Name: ' . $star->name . ', Description: ' . $star->description . '</br>';

                $planets = $star->planets;
                foreach ($planets as $planet) {
                    echo '<p style="tab-index: 30px">';
                    echo 'Id : ' . $planet->id . ', Name: ' . $planet->planet . '</br>';

                    $author = $planet->author;

                    echo 'Id : ' . $author->id . ', UserName: ' . $author->username . '</br>';
                }
                echo '<hr>';
                echo '<br>';
            }
            echo '<hr>';
            echo '<hr>';
        }

        /*
               $planets = Sector::find(17)->planets;


               foreach ($planets as $planet)
               {
                   echo 'Id : '. $planet->id . ', Name: ' . $planet->planet . '</br>';
               }

       */



        return null;
    }


}
