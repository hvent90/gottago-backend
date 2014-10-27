<?php

class TenantSeeder extends Seeder {

    public function run()
    {

        DB::table('tenants')->delete();

        $tenants = [
            0 => [
                'first_name' => 'Henry',
                'last_name'  => 'Ventura',
                'email'      => 'hvent90@gmail.com',
                'nickname'   => 'Henndawg',
                'password'   => 'password'
            ],
            1 => [
                'first_name' => 'Barry',
                'last_name'  => 'White',
                'email'      => 'billy@billy.com',
                'nickname'   => 'Barry',
                'password'   => 'password'
            ]
        ];

        foreach ($tenants as $tenant) {
            Tenant::createTenant(
                $tenant['first_name'],
                $tenant['last_name'],
                $tenant['email'],
                $tenant['nickname'],
                $tenant['password']);
        }
    }
}