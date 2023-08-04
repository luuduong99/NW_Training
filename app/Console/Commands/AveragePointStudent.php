<?php

namespace App\Console\Commands;

use App\Mail\AveragePoint;
use App\Models\StudentSubject;
use App\Models\Subject;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Students\StudentRepository;
use App\Repositories\StudentSubject\StudentSubjectRepository;
use App\Repositories\Subjects\SubjectRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AveragePointStudent extends Command
{

    protected $studentRepository, $userRepository, $facultyRepository, $studentSubjectRepository, $subjectRepository;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(StudentRepository        $studentRepository, UserRepository $userRepository,
                                FacultyRepository        $facultyRepository,
                                StudentSubjectRepository $studentSubjectRepository,
                                SubjectRepository        $subjectRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
        $this->facultyRepository = $facultyRepository;
        $this->studentSubjectRepository = $studentSubjectRepository;
        $this->subjectRepository = $subjectRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $students = $this->studentRepository->studnets();
        foreach ($students as $student) {
            $subjects = Subject::where('faculty_id', $student->faculty_id)->get();
            $points = StudentSubject::where('student_id', $student->id)->whereNotNull('point')->get();
            if (count($points) > 0 && count($student->subjects->pluck('id')) == count($subjects)
                && count($points) == count($subjects) && count($subjects) > 0) {
                $total = 0;
                foreach ($points as $point) {
                    $total += $point->point;
                }
                $average = $total / count($subjects);

                $this->studentRepository->updateStudent($student->id, [
                    'average_point' => $average,
                ]);

                if($student->average_point < 5) {
                    $this->studentRepository->updateStudent($student->id, [
                        'status' => 'disable',
                    ]);
                    Mail::to($student->user->email)->send(new AveragePoint($student));
                }
            }
        }
        \Log::info('Hello World!');
    }
}
