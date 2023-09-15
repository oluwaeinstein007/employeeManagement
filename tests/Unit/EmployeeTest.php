<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }



        public function test_convert_csv_to_json(): void {
            // Get the file path (Check if the file exists in the path before running the test)
            $csvFilePath = __DIR__.'/import.csv';

            // Create an UploadedFile object
            $csvFile = new \Illuminate\Http\UploadedFile(
                $csvFilePath,
                'import.csv',
                'text/csv', // MIME type
                null,
                true // test mode, this prevents Laravel from actually moving the file
            );

            $response = $this->postJson('/api/employee', ['csv_file' => $csvFile]);

            // Assert that the response status is 201 ie. CREATED
            $response->assertStatus(201);

            // Assert that the response contains the expected data and is json
            $responseData = $response->json();
            $this->assertArrayHasKey('data', $responseData);
            $this->assertArrayHasKey('message', $responseData);
            $response->assertJson(['data' => $responseData['data'],]);

            // Assert that the advert was created in the databases
            $this->assertDatabaseHas('employees', $responseData['data'][0]);

        }

        public function test_update_employee_by_id(): void {
            $testData = Employee::factory()->create();
            $data = [
                'First_Name' => 'Lanre',
                'Last_Name' => 'Sanni'
            ];
            $response = $this->putJson('/api/employee/'.$testData->id, $data);
            $response->assertStatus(200);
            $responseData = $response->json();
            $this->assertArrayHasKey('data', $responseData);
            $this->assertArrayHasKey('message', $responseData);
            $response->assertJson(['data' => $responseData['data'],]);
        }


        public function test_get_all_employees(): void {
            // Create test data
            $testData = Employee::factory()->create();

            // Send a GET request to the API endpoint
            $response = $this->getJson('/api/employee');

            // Assert the response status is 200 (OK)
            $response->assertStatus(200);

            // Assert that the response contains the expected data and is json
            // $responseData = $response->json();
            // $this->assertArrayHasKey('data', $responseData);
            // $this->assertArrayHasKey('message', $responseData);
            // $response->assertJson(['data' => $responseData['data'],]);

            // $response->assertJsonFragment(['name' => $testData->name]);
        }

        public function test_get_employee_by_id(): void {
            // Create test data
            $testData = Employee::factory()->create();

            // Send a GET request to the API endpoint
            $response = $this->getJson('/api/employee/'.$testData->id);

            // Assert the response status is 200 (OK)
            $response->assertStatus(200);

            // Assert that the response contains the expected data and is json
            $responseData = $response->json();
            $this->assertArrayHasKey('data', $responseData);
            $this->assertArrayHasKey('message', $responseData);
            $response->assertJson(['data' => $responseData['data'],]);
        }

        public function test_delete_employee_by_id(): void{
            // Create test data
            $testData = Employee::factory()->create();

            // Send a DELETE request to the API endpoint
            $response = $this->deleteJson('/api/employee/'.$testData->id);

            // Assert the response status is 200 (OK)
            $response->assertStatus(200);

            // Assert that the response contains the expected data and is json
            $responseData = $response->json();
            $this->assertArrayHasKey('data', $responseData);
            $this->assertArrayHasKey('message', $responseData);
            $response->assertJson(['data' => $responseData['data'],]);
        }




}
