<?php

use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * @internal
 */
final class SessionTest extends CIUnitTestCase
{
    private $user = [
            'UserID' => 1,
            'FirstName' => 'John Doe',
            'Role' => 'Admin'
        ];
    public function testSessionWithUserData(): void
    {
        // Mock user data

        $session = Services::session();

        // Set session data with user-specific information
        $session->set([
            'user_id' => $this->user['UserID'],
            'user_name' => $this->user['FirstName'],
            'role' => $this->user['Role'],
            'is_logged_in' => true
        ]);

        // Assert the session values
        $this->assertSame($this->user['UserID'], $session->get('user_id'));
        $this->assertSame($this->user['FirstName'], $session->get('user_name'));
        $this->assertSame($this->user['Role'], $session->get('role'));
        $this->assertTrue($session->get('is_logged_in'));
    }

    public function testSessionWithoutUserData()
    {
        $session = Services::session();

        $session->destroy();

        $this->assertNull( $session->get('user_id'));
    }
}
