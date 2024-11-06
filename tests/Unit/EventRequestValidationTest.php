<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EventRequest;

class EventRequestValidationTest extends TestCase
{
    /** @test */
    public function it_validates_event_creation_data()
    {
        // Define valid event data
        $data = [
            'name' => 'Laravel Conference',
            'date' => '10-11-2024',  // A valid future date
            'location' => 'Brazil',  // Location is valid
            'description' => 'A great event to learn Laravel',  // Valid description
        ];

        // Create an instance of EventRequest and get the validation rules
        $validator = Validator::make($data, (new EventRequest)->rules());

        // Assert: Validation passes
        $this->assertFalse($validator->fails());
    }

    /** @test */
    public function it_fails_validation_when_name_is_missing()
    {
        // Missing name
        $data = [
            'date' => '10-11-2024',
            'location' => 'Brazil',
            'description' => 'A great event to learn Laravel',
        ];

        // Create validator
        $validator = Validator::make($data, (new EventRequest)->rules());

        // Assert: Validation fails due to missing name
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('name', $validator->errors()->toArray());
    }

    /** @test */
    public function it_fails_validation_when_date_is_in_the_past()
    {
        // Invalid date in the past
        $data = [
            'name' => 'Laravel Conference',
            'date' => '10-11-2020',  // Invalid date (in the past)
            'location' => 'Brazil',
            'description' => 'A great event to learn Laravel',
        ];

        $validator = Validator::make($data, (new EventRequest)->rules());

        // Assert: Validation fails because the date is in the past
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('date', $validator->errors()->toArray());
    }

    /** @test */
    public function it_fails_validation_when_location_is_missing()
    {
        // Missing location
        $data = [
            'name' => 'Laravel Conference',
            'date' => '10-11-2024',
            'description' => 'A great event to learn Laravel',
        ];

        $validator = Validator::make($data, (new EventRequest)->rules());

        // Assert: Validation fails due to missing location
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('location', $validator->errors()->toArray());
    }

    /** @test */
    public function it_fails_validation_when_description_is_too_long()
    {
        // Description exceeding max length (500 characters)
        $data = [
            'name' => 'Laravel Conference',
            'date' => '10-11-2024',
            'location' => 'Brazil',
            'description' => str_repeat('A', 501),  // Description longer than 500 characters
        ];

        $validator = Validator::make($data, (new EventRequest)->rules());

        // Assert: Validation fails because description is too long
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('description', $validator->errors()->toArray());
    }
}
