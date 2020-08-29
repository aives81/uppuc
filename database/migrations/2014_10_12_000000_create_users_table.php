<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/************************************************************
 * Cette me permet de créer toutes les tables de notre base *
 *************************************************************/
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->bigIncrements('comId');
            $table->string('libCom');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomPrenom');
            $table->string('email')->unique()->nullable();
            $table->string('tel')->unique();
            $table->date('dateNaiss');
            $table->integer('numActiv')->default(0)->comment('0: num pas vérifié; 1: num vérifié');
            $table->integer('userActiv')->default(0)->comment('0: user is logout; 1: user is login');
            $table->string('codeActivNum');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('typeUser');
            $table->integer('dispoUser')->nullable()->comment('0: indispo; 1: dispo');
            $table->string('genreUser');
            $table->unsignedBigInteger('comId');
            $table->foreign('comId')
                ->references('comId')->on('communes')
                ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('catId');
            $table->string('libCat');
            $table->string('sulgCat');
            $table->timestamps();
        });

        Schema::create('entreprises', function (Blueprint $table) {
            $table->bigIncrements('entrepriseId');
            $table->string('entrepriseTitle');
            $table->text('entrepriseDescription');
            $table->text('entrepriseJourDispo');
            $table->text('entrepriseHeureDispo');
            $table->string('entrepriseDispoActive')->nullable();
            $table->text('entrepriseImgCourv');
            $table->string('entrepriseSlug');
            $table->string('latEntreprise', 20);
            $table->string('longEntreprise', 20);
            $table->string('descripPlaceEntreprise');
            $table->unsignedBigInteger('id')->nullable();
            $table->unsignedBigInteger('catId')->nullable();
            $table->unsignedBigInteger('comId')->nullable();
            $table->foreign('id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('catId')
                ->references('catId')->on('categories')
                ->onDelete('cascade');
            $table->foreign('comId')
                ->references('comId')->on('communes')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('adresses', function (Blueprint $table) {
            $table->bigIncrements('adresseId');
            $table->string('libAdresse');
            $table->string('latAdresse');
            $table->string('longAdresse');
            $table->unsignedBigInteger('id');
            $table->foreign('id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('paiements', function (Blueprint $table) {
            $table->bigIncrements('payId');
            $table->string('codePay')->unique();
            $table->bigInteger('montantPay');
            $table->date('datePay');
            $table->time('heurePay');
            $table->unsignedBigInteger('entrepriseId');
            $table->foreign('entrepriseId')
                ->references('entrepriseId')->on('entreprises')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('diversentreprises', function (Blueprint $table) {
            $table->bigIncrements('diversId');
            $table->string('libDivers');
            $table->bigInteger('descripDivers');
            $table->unsignedBigInteger('entrepriseId');
            $table->foreign('entrepriseId')
                ->references('entrepriseId')->on('entreprises')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('imgId');
            $table->string('libImg');
            $table->unsignedBigInteger('entrepriseId');
            $table->foreign('entrepriseId')
                ->references('entrepriseId')->on('entreprises')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('prodservs', function (Blueprint $table) {
            $table->bigIncrements('prodServId');
            $table->string('libProdServ');
            $table->string('typeProdServ');
            $table->float('prixProdServ');
            $table->string('slugProdServ');
            $table->text('imgProdServ');
            $table->unsignedBigInteger('entrepriseId');
            $table->foreign('entrepriseId')
                ->references('entrepriseId')->on('entreprises')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('commanders', function (Blueprint $table) {
            $table->bigIncrements('orderId');
            $table->integer('orderQty');
            $table->date('orderDate');
            $table->time('orderHours');
            $table->unsignedBigInteger('prodServId');
            $table->unsignedBigInteger('customUserId');
            $table->unsignedBigInteger('deliveryUserId')->nullable();
//            $table->foreign('prodServId')
//                ->references('prodServId')->on('prodservs')
//                ->onDelete('cascade');
//            $table->foreign('customUserId')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
//            $table->foreign('id')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
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
        Schema::dropIfExists('communes');
        Schema::dropIfExists('users');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('entreprises');
        Schema::dropIfExists('adresses');
        Schema::dropIfExists('paiements');
        Schema::dropIfExists('diversentreprises');
        Schema::dropIfExists('images');
        Schema::dropIfExists('prodservs');
        Schema::dropIfExists('commanders');
    }
}
