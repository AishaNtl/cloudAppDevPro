<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\UserModel;
use Tests\Support\Database\Seeds\UserSeeder;

class UserDatabaseTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    // Specify the seeder to populate the database before tests
    protected $seed = UserSeeder::class;

    // Test to ensure users are inserted correctly
    public function testUserFindAll(): void
    {
        $model = new UserModel();

        // Fetch all users created by the seeder
        $users = $model->findAll();

        // Ensure the count of users is as expected
        $this->assertCount(3, $users);
    }

    // Test to ensure soft delete leaves the row in the database
    public function testSoftDeleteLeavesRow(): void
    {
        $model = new UserModel();

        // Fetch the first user
        $user = $model->first();

        // Perform soft delete
        $model->delete($user->id);

        // Ensure the user is not found
        $this->assertNull($model->find($user->id));

        // Check that the user still exists in the database with 'deleted_at' field set
        $result = $model->builder()->where('id', $user->id)->get()->getResult();

        // Ensure there is still a record in the database
        $this->assertCount(1, $result);

        // Ensure that the 'deleted_at' field is not null
        $this->assertNotNull($result[0]->deleted_at);
    }

    // Test to ensure a new user can be inserted
    public function testCreateNewUser(): void
    {
        $model = new UserModel();

        // Create a new user
        $newUser = [
            'name'  => 'Bob Johnson',
            'email' => 'bob@example.com',
        ];

        // Insert the new user
        $userId = $model->insert($newUser);

        // Verify that the user was inserted correctly
        $this->assertNotEmpty($userId);

        // Ensure the user exists in the database
        $user = $model->find($userId);
        $this->assertEquals('Bob Johnson', $user['name']);
        $this->assertEquals('bob@example.com', $user['email']);
    }
}
