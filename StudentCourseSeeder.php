<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\StudentCourse;
use App\Models\StudentLesson;
use Illuminate\Database\Seeder;
use App\Services\StudentCourseService;


class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {
        $order =  Order::factory()->create([
            'id' => 9999,
            'user_id' => 1,
            'payment_id' => 'MANUAL',
            'total' => 130,
        ]);

        $cid = 14; // Course ID for 'ep13'
        $uid = 1;
        $oid = $order->id;

        $scs = app(StudentCourseService::class);
        $scs->enrolCourse($cid, $uid, $oid);

        $sc = $this->getStudentCourseByOrderId($oid);

        $scs->activateCourse($sc);

        StudentLesson::whereStudentCourseId($sc->id)
            ->update([
                'unlocked_at' => now(),
                'completed_at' => now()->addDays(15),
            ]);


        // reset the last lesson's completed_at to null
        StudentLesson::whereStudentCourseId($sc->id)
            ->latest('id')
            ->first()
            ->update([
                'completed_at' => null,
                'result' => 100
            ]);
    }

    public function getStudentCourseByOrderId($oid): StudentCourse
    {
        return StudentCourse::whereOrderId($oid)->first();
    }
}
