<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone',11); //手机号
            $table->string('name',8);//真实姓名
            $table->string('email',30);//邮箱
            $table->string('identity',20);//身份证号
            $table->string('sex',4);//性别
            $table->string('relationship_status',6);//情感状态
            $table->string('sex_orietation',6);//性取向
            $table->string('income_level',8);//收入等级
            $table->string('blood_type',4);//血型
            $table->dateTime('birthday');//生日
            $table->string('residence',20);//当前所在地
            $table->string('hometown',20);//家乡
            $table->string('degree',20);//学历
            $table->string('school',20);//毕业学校
      	    $table->string('major',20);//专业
            $table->string('profession',20);//职业
            $table->string('qq',20);//qq号
            $table->string('weibo',20);//微博号
            $table->string('weixin',20);//微信号
            $table->string('source',20);//来源
            $table->string('user_id',20);//西祠ID
            $table->string('screen_name',20);//西祠用户名
            $table->string('address',100);//联系地址
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userinfos');
    }
}
