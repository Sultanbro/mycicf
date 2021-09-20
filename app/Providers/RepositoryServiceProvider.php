<?php

namespace App\Providers;

use App\Repository\AnnouncementRepositoryInterface;
use App\Repository\AssignTrainingProgramsRepositoryInterface;
use App\Repository\AssignTrainingRepositoryInterface;
use App\Repository\EducationalMaterialRepositoryInterface;
use App\Repository\Eloquent\AnnouncementRepository;
use App\Repository\Eloquent\AssignTrainingProgramsRepository;
use App\Repository\Eloquent\AssignTrainingRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\EducationalMaterialRepository;
use App\Repository\Eloquent\QuestionMaterialRepository;
use App\Repository\Eloquent\QuizAnswerRepository;
use App\Repository\Eloquent\QuizForKiasRepository;
use App\Repository\Eloquent\QuizQuestionRepository;
use App\Repository\Eloquent\QuizRepository;
use App\Repository\Eloquent\TrainingMaterialRepository;
use App\Repository\Eloquent\TrainingProgramRepository;
use App\Repository\Eloquent\TrainingQuizRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\QuestionMaterialRepositoryInterface;
use App\Repository\QuizAnswerRepositoryInterface;
use App\Repository\QuizForKiasRepositoryInterface;
use App\Repository\QuizQuestionRepositoryInterface;
use App\Repository\QuizRepositoryInterface;
use App\Repository\TrainingMaterialRepositoryInterface;
use App\Repository\TrainingProgramRepositoryInterface;
use App\Repository\TrainingQuizRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(QuizRepositoryInterface::class, QuizRepository::class);
        $this->app->bind(QuizAnswerRepositoryInterface::class, QuizAnswerRepository::class);
        $this->app->bind(QuizQuestionRepositoryInterface::class, QuizQuestionRepository::class);
        $this->app->bind(QuizForKiasRepositoryInterface::class, QuizForKiasRepository::class);
        $this->app->bind(EducationalMaterialRepositoryInterface::class, EducationalMaterialRepository::class);
        $this->app->bind(TrainingProgramRepositoryInterface::class, TrainingProgramRepository::class);
        $this->app->bind(TrainingMaterialRepositoryInterface::class, TrainingMaterialRepository::class);
        $this->app->bind(QuestionMaterialRepositoryInterface::class, QuestionMaterialRepository::class);
        $this->app->bind(AnnouncementRepositoryInterface::class, AnnouncementRepository::class);
        $this->app->bind(TrainingQuizRepositoryInterface::class, TrainingQuizRepository::class);
        $this->app->bind(AssignTrainingRepositoryInterface::class, AssignTrainingRepository::class);
        $this->app->bind(AssignTrainingProgramsRepositoryInterface::class, AssignTrainingProgramsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
