<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alojamiento;
use Faker\Factory as Faker;

class AlojamientoFactory extends Factory
{
    protected $model = Alojamiento::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        $faker = Faker::create();
        
        $phone=$faker->e164PhoneNumber();
        $typeLiteral=$faker->randomElement(['Hotel', 'Hostal', 'Apartamento', 'Casa','Habitación']);
        $name=' '.$typeLiteral.' '.$faker->name();
        $town=$faker->city();
        
        $type=5;
        switch ($typeLiteral){
            case 'Hotel':
                $type=1;
                break;
            case 'Hostal':
                $type=2;
                break;
            case 'Apartamento':
                $type=3;
                break;
            case 'Casa':
                $type=4;
                break;
        }
        
        
        return [
            //
            'phone'=>$phone,
            'name'=>$name,
            'town'=>$town,
            'type'=>$type,
        ];
    }
}
