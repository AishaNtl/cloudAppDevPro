<?php

namespace App\Tests;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\AssignmentModel;
use App\Models\CourseModel;
use App\Controllers\AssignmentController;

class AssignmentControllerTest extends CIUnitTestCase
{
    protected $assignmentModel;
    protected $courseModel;
    protected AssignmentController $controller;

    // Setup the mocks
    protected function setUp(): void
    {
        parent::setUp();

        // Create mock models
        $this->assignmentModel = $this->createMock(AssignmentModel::class);
        $this->courseModel = $this->createMock(CourseModel::class);

        // Manually set the mock models into the controller
        $this->controller = new AssignmentController();
        $this->controller->assignmentModel = $this->assignmentModel;
        $this->controller->courseModel = $this->courseModel;
    }

    // Test for index method with valid course ID
    public function testIndexWithValidCourseID()
    {
        // Define the expected data
        $courseID = 101; // Example course ID
        $assignments = [
            ['id' => 1, 'courseID' => 101, 'name' => 'Assignment 1'],
            ['id' => 2, 'courseID' => 101, 'name' => 'Assignment 2']
        ];
        $course = ['id' => 101, 'name' => 'Course Name'];

        // Mock the AssignmentModel behavior for findAll() directly
        $this->assignmentModel->method('findAll')
            ->willReturn($assignments);

        // Mock the CourseModel behavior for find()
        $this->courseModel->method('find')
            ->with($courseID)
            ->willReturn($course);

        // Simulate calling the controller's index method
        $response = $this->controller->index($courseID);

        // Check if the response contains the expected string
        $this->assertStringContainsString('Create a new Assignment', $response); // This is part of the view
    }

    // Test if no assignments are found
    public function testIndexWithNoAssignments()
    {
        // Define the expected data for an empty assignment list
        $courseID = 102; // Example course ID with no assignments
        $assignments = [];  // No assignments found for the course
        $course = ['id' => 102, 'name' => 'Course with No Assignments'];

        // Mock the AssignmentModel behavior for findAll() directly
        $this->assignmentModel->method('findAll')
            ->willReturn($assignments);

        // Mock the CourseModel behavior for find()
        $this->courseModel->method('find')
            ->with($courseID)
            ->willReturn($course);

        // Simulate calling the controller's index method
        $response = $this->controller->index($courseID);

        // Check if the response contains the expected string
        $this->assertStringContainsString('Assignments for Course Test', $response); // This is part of the view
    }
}
