<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeding County
        if(DB::table('county')->get()->count() == 0){

            DB::table('county')->insert([

                [
                    'name' => 'Dublin'
                ]

            ]);

        }

        if(DB::table('expense_category')->get()->count() == 0){

            DB::table('expense_category')->insert([

                [
                    'name' => 'Admin Fees'
                ],
                [
                    'name' => 'Advertising'
                ],
                [
                    'name' => 'Cleaning'
                ],
                [
                    'name' => 'Cosmetics'
                ],
                [
                    'name' => 'Insurance'
                ],
                [
                    'name' => 'Legal'
                ],
                [
                    'name' => 'Maintainence'
                ],
                [
                    'name' => 'Management Fees'
                ],
                [
                    'name' => 'Mortgage'
                ],
                [
                    'name' => 'Repairs'
                ],
                [
                    'name' => 'Tax'
                ],

            ]);

        }

        //Seeding Feedback Options
        if(DB::table('feedback_options')->get()->count() == 0){

            DB::table('feedback_options')->insert([

                [
                    'rate1' => 'Very Good'
                ],
                [
                    'rate1' => 'Good'
                ],
                [
                    'rate1' => 'Average'
                ],
                [
                    'rate1' => 'Poor'
                ]

            ]);

        }

        //Seeding Feedback Options
        if(DB::table('feedback_options2')->get()->count() == 0){

            DB::table('feedback_options2')->insert([

                [
                    'rent' => 'Acceptable',
                    'YN'   => 'Yes'
                ],
                [
                    'rent' => 'Not Acceptable',
                    'YN'   => 'No'
                ]

            ]);

        }

        //Seeding property specs
        if(DB::table('property_specs')->get()->count() == 0){

            DB::table('property_specs')->insert([

                [
                    'bedrooms' => '1',
                    'bathrooms' => '1'
                ],
                [
                    'bedrooms' => '2',
                    'bathrooms' => '2'
                ],
                [
                    'bedrooms' => '3',
                    'bathrooms' => '3'
                ],
                [
                    'bedrooms' => '4',
                    'bathrooms' => '4'
                ],
                [
                    'bedrooms' => '5',
                    'bathrooms' => '5'
                ],
                [
                    'bedrooms' => '6',
                    'bathrooms' => '6'
                ],


            ]);

        }

        //
        if(DB::table('property_type')->get()->count() == 0){

            DB::table('property_type')->insert([

                [
                    'name' => 'Apartment',
                ],
                [
                    'name' => 'Duplex',
                ],
                [
                    'name' => 'Flat',
                ],
                [
                    'name' => 'House',
                ],
                [
                    'name' => 'Studio',
                ],

            ]);

        }

        //Seeding Town
        if(DB::table('town')->get()->count() == 0){

            DB::table('town')->insert([

                [
                    'name' => 'Baldoyle',
                ],
                [
                    'name' => 'Howth',
                ],
                [
                    'name' => 'Malahide',
                ],
                [
                    'name' => 'Portmarnock',
                ],
                [
                    'name' => 'Sutton',
                ],
                

            ]);

        }
    }
}
