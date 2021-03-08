<?php


use Illuminate\Support\Facades\Route;
use App\models\students;


Route::get('/', function () {
   echo 'Hello! This first page!';
});


//insert functions
Route::get('/insert', function () {
    DB::insert("insert into students(name,date_of_birth,GPA,adviser)values('Askar1','2010-10-10', 3.0,'Assel1' )");
});


//SELECT BY ID FUNCTION
Route::get('/select', function () {
    $results=DB::select('select * from students where id=?', [1]);
    foreach ($results as $posts)
    {
        echo 'name is:  ' .$posts->name;
        echo "<br>";

        echo 'date of birth is:  ' .$posts->date_of_birth;
        echo "<br>";

        echo 'GPA is:  ' .$posts->GPA;
        echo "<br>";

        echo 'adviser is:  ' .$posts->adviser;
        echo "<br>";
    }
});

//SELECT ALL
Route::get('/all', function () {
    $results=DB::select('select * from students');
    foreach ($results as $posts)
    {
        echo "<br>";
        echo 'name is:  ' .$posts->name;
        echo "<br>";

        echo 'date of birth is:  ' .$posts->date_of_birth;
        echo "<br>";

        echo 'GPA is:  ' .$posts->GPA;
        echo "<br>";

        echo 'adviser is:  ' .$posts->adviser;
        echo "<br>";
    }
});


//UPDATE COLUMN
Route::get('/update', function () {
    $update= DB::update('update students set name="ADwewrwA" where id=?',[1]);
    return $update;
});


//DELETE COLUMN
Route::get('/delete', function () {
    $deleted= DB::delete('delete from students where id=?',[2]);
    return $deleted;
});


//ORM SELECT ALL METHOD
Route::get('/all2',function (){
    $students1=students::all();
    foreach ($students1 as $student)
    {
        echo "<br>";
        echo 'name is:  ' .$student->name;
        echo "<br>";

        echo 'date of birth is:  ' .$student->date_of_birth;
        echo "<br>";

        echo 'GPA is:  ' .$student->GPA;
        echo "<br>";

        echo 'adviser is:  ' .$student->adviser;
        echo "<br>";
    }

});

//ORM FIND BY ID METHOD
Route::get('/select2', function () {
   $students1=students::where('id',1)->value('name');
    return $students1;
});

//ORM insert method
Route::get('/insert2', function () {
    $students1= new students;
    $students1->name='Nurbek';
    $students1->date_of_birth='2011-10-10';
    $students1->GPA=2;
    $students1->adviser='Askar';
    $students1->save();
});
//ORM update method
Route::get('/update2', function () {
    $students1=students::find(3);
    $students1->name='AUHGAIUDHGIUAHGIU11111';
    $students1->date_of_birth='2015-10-10';
    $students1->GPA=2.1;
    $students1->adviser='Askar12314';
    $students1->save();
});
//ORM DELETE METHOD
Route::get('/delete2', function () {
    $students1=students::where('id',3)->delete();
    return $students1;

});
