<?php

namespace App\Console\Commands;

use App\Mail\AveragePoint;
use App\Repositories\Faculties\FacultyRepository;
use App\Repositories\Students\StudentRepository;
use App\Repositories\Subjects\SubjectRepository;
use App\Repositories\Users\UserRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AveragePointStudent extends Command
{

    protected $studentRepository, $userRepository, $facultyRepository, $subjectRepository;


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
                                SubjectRepository        $subjectRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
        $this->facultyRepository = $facultyRepository;
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
        $students = $this->studentRepository->getAll();
        foreach ($students as $student) {
            $subjects = $student->faculty->subjects()->get();
            $points = $student->subjects()->wherePivot('point', '!=', null)->get();

            if (count($points) > 0 && count($student->subjects->pluck('id')) == count($subjects)
                && count($points) == count($subjects) && count($subjects) > 0) {
                $total = 0;
                foreach ($points as $point) {
                    $total += $point->pivot->point;
                }
                $average = $total / count($subjects);

                $this->studentRepository->update($student->id, [
                    'average_point' => $average,
                ]);

                if($student->average_point < 5) {
                    $this->studentRepository->update($student->id, [
                        'status' => 'disable',
                    ]);
                    Mail::to($student->user->email)->send(new AveragePoint($student));
                }
            }
        }
        \Log::info('Hello World!');
    }
}
