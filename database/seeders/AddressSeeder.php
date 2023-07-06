<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Address::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $addresses = [
            [
                'street' => 'Jack',
                'number' => '7',
                'city' => 'Vilvorde',
                'municipalitie' => '',
                'postal_code' => '1800'
            ],
            [
                'street' => 'rue Albert',
                'number' => '458',
                'city' => 'Bruxelles',
                'municipalitie' => 'Scharbeek',
                'postal_code' => '1030'
            ],
            [
                'street' => 'rue de la joix',
                'number' => '48',
                'city' => 'Bruxelles',
                'municipalitie' => 'Scharbeek',
                'postal_code' => '1030'
            ],
            [
                'street' => 'Sammuel',
                'number' => '78',
                'city' => 'Bruxelles',
                'municipalitie' => 'Anderlecht',
                'postal_code' => '1070'
            ],
            [
                'street' => 'Rue des Lilas',
                'number' => '10',
                'city' => 'Bruxelles',
                'municipality' => 'Anderlecht',
                'postal_code' => '1070'
            ],
            [
                'street' => 'Avenue du Parc',
                'number' => '45',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Rue de la Paix',
                'number' => '20',
                'city' => 'Namur',
                'municipality' => 'Namur',
                'postal_code' => '5000'
            ],
            [
                'street' => 'Boulevard Léopold III',
                'number' => '98',
                'city' => 'Bruxelles',
                'municipality' => 'Woluwe-Saint-Lambert',
                'postal_code' => '1200'
            ],
            [
                'street' => 'Rue de l\'Eglise',
                'number' => '7',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Avenue Louise',
                'number' => '123',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Rue du Marché',
                'number' => '30',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Chaussée de Charleroi',
                'number' => '55',
                'city' => 'Bruxelles',
                'municipality' => 'Saint-Gilles',
                'postal_code' => '1060'
            ],
            [
                'street' => 'Rue de la Gare',
                'number' => '15',
                'city' => 'Bruges',
                'municipality' => 'Bruges',
                'postal_code' => '8000'
            ],
            [
                'street' => 'Avenue de la Liberté',
                'number' => '5',
                'city' => 'Charleroi',
                'municipality' => 'Charleroi',
                'postal_code' => '6000'
            ],
            [
                'street' => 'Rue de la Station',
                'number' => '40',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Boulevard Anspach',
                'number' => '70',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Rue du Commerce',
                'number' => '12',
                'city' => 'Namur',
                'municipality' => 'Namur',
                'postal_code' => '5000'
            ],
                [
                'street' => 'Rue du Commerce',
                'number' => '12',
                'city' => 'Namur',
                'municipality' => 'Namur',
                'postal_code' => '5000'
                ],
            [
                'street' => 'Avenue des Champs',
                'number' => '8',
                'city' => 'Bruxelles',
                'municipality' => 'Etterbeek',
                'postal_code' => '1040'
            ],
            [
                'street' => 'Rue de l\'Université',
                'number' => '25',
                'city' => 'Louvain-la-Neuve',
                'municipality' => 'Ottignies-Louvain-la-Neuve',
                'postal_code' => '1348'
            ],
            [
                'street' => 'Chaussée de Waterloo',
                'number' => '60',
                'city' => 'Bruxelles',
                'municipality' => 'Uccle',
                'postal_code' => '1180'
            ],
            [
                'street' => 'Rue Royale',
                'number' => '90',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Avenue de la Toison d\'Or',
                'number' => '15',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Rue du Midi',
                'number' => '35',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Rue des Bouchers',
                'number' => '22',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Avenue Louise',
                'number' => '200',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Rue de la Loi',
                'number' => '155',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Chaussée de Louvain',
                'number' => '80',
                'city' => 'Bruxelles',
                'municipality' => 'Schaerbeek',
                'postal_code' => '1030'
            ],
            [
                'street' => 'Rue du Bailli',
                'number' => '50',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Boulevard de la Sauvenière',
                'number' => '59',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Rue de la Sauvenière',
                'number' => '14',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Rue de la Bourse',
                'number' => '17',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Avenue de la Gare',
                'number' => '23',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Rue Neuve',
                'number' => '6',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Avenue de l\'Exposition',
                'number' => '40',
                'city' => 'Charleroi',
                'municipality' => 'Charleroi',
                'postal_code' => '6000'
            ],
            [
                'street' => 'Rue des Carmes',
                'number' => '8',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Boulevard Adolphe Max',
                'number' => '92',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Rue de Flandre',
                'number' => '55',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Chaussée de Mons',
                'number' => '120',
                'city' => 'Bruxelles',
                'municipality' => 'Anderlecht',
                'postal_code' => '1070'
            ],
            [
                'street' => 'Rue de la Montagne',
                'number' => '11',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Avenue de Tervueren',
                'number' => '68',
                'city' => 'Bruxelles',
                'municipality' => 'Woluwe-Saint-Pierre',
                'postal_code' => '1150'
            ],
            [
                'street' => 'Rue des Bons Enfants',
                'number' => '33',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Boulevard du Jardin Botanique',
                'number' => '31',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Boulevard du Jardin Botanique',
                'number' => '18',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Rue du Midi',
                'number' => '28',
                'city' => 'Charleroi',
                'municipality' => 'Charleroi',
                'postal_code' => '6000'
            ],
            [
                'street' => 'Avenue de la Couronne',
                'number' => '9',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Rue de la Casquette',
                'number' => '13',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Boulevard Anspach',
                'number' => '80',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Rue du Marché aux Poulets',
                'number' => '25',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Avenue Louise',
                'number' => '300',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Rue du Bailli',
                'number' => '70',
                'city' => 'Bruxelles',
                'municipality' => 'Ixelles',
                'postal_code' => '1050'
            ],
            [
                'street' => 'Chaussée de Louvain',
                'number' => '120',
                'city' => 'Bruxelles',
                'municipality' => 'Schaerbeek',
                'postal_code' => '1030'
            ],
            [
                'street' => 'Rue des Fripiers',
                'number' => '21',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Avenue de la Liberté',
                'number' => '40',
                'city' => 'Namur',
                'municipality' => 'Namur',
                'postal_code' => '5000'
            ],
            [
                'street' => 'Rue de la Collégiale',
                'number' => '6',
                'city' => 'Liège',
                'municipality' => 'Liège',
                'postal_code' => '4000'
            ],
            [
                'street' => 'Boulevard de Waterloo',
                'number' => '80',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelle-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Boulevard de Waterloo',
                'number' => '80',
                'city' => 'Bruxelles',
                'municipality' => 'Bruxelles-Ville',
                'postal_code' => '1000'
            ],
            [
                'street' => 'Rue du Pot d\'Or',
                'number' => '15',
                'city' => 'Bruxelles',
                'municipality' => 'Saint-Josse-ten-Noode',
                'postal_code' => '1210'
            ],
        ];

        DB::table('addresses')->insert($addresses);
    }
}
