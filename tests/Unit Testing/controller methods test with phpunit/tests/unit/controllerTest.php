<?php
include "./app/controller.php";;
use PHPUnit\Framework\TestCase;
class controllerTest extends TestCase
{
    //test user class
    public function test_user_class(){
    $user = new user();
        //original code of controller is slightly modified to impliment a mock database and user input
    $this->assertTrue($user->login_user());

    $this->assertTrue($user->logout_user());

    $this->assertTrue($user->signup_user());
    }
    //test exam class
    public function test_exam_class(){
    $exam = new exam();
        //original code of controller is slightly modified to impliment a mock database and user input
    $this->assertTrue($exam->add_solution());

    $this->assertTrue($exam->delete_exam());

    $this->assertTrue($exam->save_solution());

    $this->assertTrue($exam->enroll_exam());

    $this->assertTrue($exam->add_exam());
    }
    //test result class
    public function test_result_class(){
    $results = new result();
        //original code of controller is slightly modified to impliment a mock database and user input
    $this->assertTrue($results->check_duplicate());

    $this->assertEquals('AAAAAAAAAA', $results->has_no_solve());

    $this->assertTrue($results->cal_result('AAAAAAAAAA'));
    }
}
?>