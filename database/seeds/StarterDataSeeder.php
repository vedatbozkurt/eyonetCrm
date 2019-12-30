<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StarterDataSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	//add sample user admin
        \App\User::create([
            'name' => 'John Doe',
            'image' => '',
            'status' => 1,
            'id' => 1,
            'role' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt('123'),
        ]);

        \App\Models\Company::create([
            'id' => 1,
            'user_id' => 1,
            'name' => 'My Test Company',
            'email' => 'test@test.com',
            'phone' => '9062987342',
            'logo' => '',
            'address' => 'my test com address, 100 st no:23',
            'website' => 'htttps://wwww.google.com',
            'status' => 1,
        ]);


        DB::table('company_employee')->insert([
            'company_id' => 1,
            'employee_id' => 1,
        ]);


for($i=1;$i<6;$i++) {
        DB::table('company_service')->insert([
            'company_id' => 1,
            'service_id' => $i,
            'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
        ]);
}


        \App\Models\Contact::create([
            'id' => 1,
            'user_id' => 1,
            'company_id' => 1,
            'name' => 'Jack Doe',
            'email' => 'john@test.com',
            'phone' => '9062987342',
            'image' => '',
            'Position' => 'Manager',
        ]);

        \App\Models\Currency::create([
            'id' => 1,
            'user_id' => 1,
            'name' => 'Dollar',
            'symbol' => '$',
        ]);

        \App\Models\Document::create([
            'id' => 1,
            'user_id' => 1,
            'company_id' => 1,
            'name' => 'Jone Doe Company Invoice',
            'filename' => 'no-file.test',
        ]);

        \App\Models\Employee::create([
            'id' => 1,
            'user_id' => 1,
            'position' => 'IK',
            'name' => 'Hanna Doe',
            'image' => '',
            'status' => 1,
            'email' => 'hanna@test.com',
            'password' => bcrypt('123'),
        ]);

        \App\Models\Event::create([
            'id' => 1,
            'user_id' => 1,
            'company_id' => 1,
            'name' => 'Jone Doe Company Invoice',
            'color' => '#38323a',
            'description' => 'Test event description',
            'start_date' => date('Y-m-d H:i:s'),
            'end_date' => date('Y-m-d H:i:s', strtotime(' + 5 days')),
        ]);
for($i=1;$i<6;$i++) {
        \App\Models\Service::create([
            'id' => $i,
            'user_id' => 1,
            'name' => 'test service'.$i,
            'price' => 80+$i,
            'status' => 1,
        ]);
}



        \App\Models\Setting::create([
            'id' => 1,
            'user_id' => 1,
            'logo' => '',
            'company_name' => 'My Company',
            'domain' => 'https:://www.wedat.org/',
            'address' => '3500 Deer Creek Road - Palo Alto, CA 94304',
            'phone' => '8754434304',
            'currency_id' => 1,
        ]);


        \App\Models\Task::create([
            'id' => 1,
            'user_id' => 1,
            'company_id' => 1,
            'details' => 'First task created.',
        ]);

        \App\Models\Offer::create([
            'id' => 1,
            'user_id' => 1,
            'company_id' => 1,
            'name' => 'First offer created.',
            'status' => 0,
            'details' => 'First task created. details re here',
            'price' => '232',
        ]);


        \App\Models\Payment::create([
            'id' => 1,
            'user_id' => 1,
            'company_id' => 1,
            'service_id' => 1,
            'name' => 'First payment created.',
            'status' => 0,
            'details' => 'First payment created. details re here',
            'price' => '22',
            'payment_method' => 'Cash',
        ]);



        \App\Models\Expense::create([
            'id' => 1,
            'user_id' => 1,
            'name' => 'First expense created.',
            'details' => 'First expense created. details re here',
            'price' => '112',
        ]);


    }
}
