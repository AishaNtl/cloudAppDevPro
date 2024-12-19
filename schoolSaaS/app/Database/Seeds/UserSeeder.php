<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Data to be inserted into the `users` table
        $data = [
            [
                'UserID'    => 1,
                'FirstName' => 'Charlie',
                'LastName'  => 'Chaplin',
                'Email'     => 'charlie@chaplin.com',
                'PasswordHash' => '$2y$10$H/Yxl5A2GryxlLC1E93J/.bYZJWUV/dRsS3.j14PHsIwgpwJvGDE.',
                'Role'      => 'Admin',
                'CreatedAt' => '2024-12-09 05:30:32',
                'UpdatedAt' => '2024-12-09 14:27:51',
            ],
            [
                'UserID'    => 3,
                'FirstName' => 'Jane',
                'LastName'  => 'Doe',
                'Email'     => 'jane@doe.com',
                'PasswordHash' => '$2y$10$l49co85qkM8QY1cqVL06Z.EyQp4LkWKoC6K7se4uKInMoPjxLICki',
                'Role'      => 'Teacher',
                'CreatedAt' => '2024-12-09 14:38:18',
                'UpdatedAt' => '2024-12-09 14:38:18',
            ],
            [
                'UserID'    => 10,
                'FirstName' => 'Eric',
                'LastName'  => 'Does',
                'Email'     => 'eric@doe.com',
                'PasswordHash' => '$2y$10$HyQBgGYBgpihZ6BrK4iMnuiljJIA0XLXXF/LWHRK1QdJyxLcCrZlq',
                'Role'      => 'Student',
                'CreatedAt' => '2024-12-13 19:28:26',
                'UpdatedAt' => '2024-12-13 19:58:00',
            ],
            [
                'UserID'    => 11,
                'FirstName' => 'Patrick',
                'LastName'  => 'Steven',
                'Email'     => 'patrick@steven.com',
                'PasswordHash' => '$2y$10$ywJ0zHu6MjEUAo9vx.u5Tukp6Cm1DXoDthYS9D9D8kCRo3B0PbX1a',
                'Role'      => 'Student',
                'CreatedAt' => '2024-12-13 20:00:56',
                'UpdatedAt' => '2024-12-13 20:00:56',
            ],
            [
                'UserID'    => 12,
                'FirstName' => 'Smooth',
                'LastName'  => 'Thorn',
                'Email'     => 'smooth@thorn.com',
                'PasswordHash' => '$2y$10$dSPt5/uiY4w/rC2odLHwBulZ8fFR0WubTWXQFKFGgmlnTGrGeM8q2',
                'Role'      => 'Student',
                'CreatedAt' => '2024-12-13 20:18:38',
                'UpdatedAt' => '2024-12-13 20:18:38',
            ]
        ];

        // Insert the data into the `users` table
        $this->db->table('users')->insertBatch($data);
    }
}
