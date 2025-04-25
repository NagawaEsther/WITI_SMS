<?php

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class StudentRepository
{
    // Create a new student
    public function create(array $data)
    {
        // You can validate the data here if needed before creating the student
        $this->validate($data);

        // Create and return the new student
        return Student::create($data);
    }

    // Validate data using the Student model's rules
    public function validate(array $data)
    {
        $validator = Validator::make($data, Student::$rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    // You can also add other useful methods to the repository, for example:
    public function getAll()
    {
        return Student::with(['user', 'cohort', 'studentApplication'])->get();
    }

    public function findById($id)
    {
        $student = Student::find($id);

        if (!$student) {
            throw new ModelNotFoundException("Student not found");
        }

        return $student;
    }

    // You can also add an update method if required
    public function update($id, array $data)
    {
        $student = $this->findById($id);

        // Validate and update
        $this->validate($data);

        $student->update($data);

        return $student;
    }
}
