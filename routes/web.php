<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;

// Frontend Routes
// Route::get()

// Admin Routes
// Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

// Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class);
// Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
// Route::resource('experiences', \App\Http\Controllers\Admin\ExperienceController::class);
// });

Route::middleware(["auth"])->group([function () {
    //Experience Routes
    Route::get("/dashboard/experience", [ExperienceController::class, 'index'])->name('Experience');
    Route::post('/add-experience', [ExperienceController::class, 'AddExperience']);
    Route::post('delete-experience/{id}', [ExperienceController::class, 'deleteExp']);
    // Message routes
    Route::get("/dashboard/messages", [MessageController::class, "showMessage"])->name('Messages');
    Route::post("/delete-message/{id}", [MessageController::class, "delete"]);
    //PRofile Route:
    Route::get("/dashboard/profile", [UserController::class, 'Profile'])->name('Profile');
    Route::get("/update-profile", [UserController::class, 'UpdateProfile']);

    //Project Routes:
    Route::get('/dashboard/projects', [ProjectController::class, 'show']);
    Route::post("/add-project", [ProjectController::class, "Store"]);
    Route::delete('/delete-project/{id}', [ProjectController::class, 'delete']);

    // Setting Route
    Route::view("/dashboard/settings", "admin.settingtab");

    // Skill Routes:
    Route::get("/dashboard/skills", [SkillController::class, "indexSkills"])->name("Skills");
    Route::post("/Addskill", [SkillController::class, "addSkill"]);
    Route::delete("/delete-skill/{id}", [SkillController::class, "deleteskill"]);
    Route::put('/update-skill/{id}', [SkillController::class, 'EditSkill']);

    // User Routess
    Route::put("/edit-pass", [UserController::class, "EditPassword"]);
}]);



// Route::middleware(["guest"])->group([function(){
Route::get('/', [UserController::class, 'index']);
Route::get('/skills', [SkillController::class, 'showSkills']);
// Route::view('','partials.');
Route::get('/projects', [ProjectController::class, 'index'])->name("Projects");
Route::get('/about', [UserController::class, 'AboutPage']);

Route::get('/experience', [ExperienceController::class, 'showExperience']);
Route::view('/contact', 'partials.contact')->name('Contact');
Route::post('/send-message', [MessageController::class, 'send']);
// }]);
Route::view("/admin", "admin.login")->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
