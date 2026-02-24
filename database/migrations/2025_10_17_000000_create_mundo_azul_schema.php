<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid',36)->nullable()->unique();
            $table->string('name',200);
            $table->string('email')->unique();
            $table->string('password_hash');
            $table->enum('role',['admin','professional','parent','volunteer','public'])->default('public');
            $table->string('phone',50)->nullable();
            $table->string('address',500)->nullable();
            $table->unsignedBigInteger('avatar_media_id')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid',36)->nullable();
            $table->string('name',200);
            $table->date('dob')->nullable();
            $table->enum('gender',['M','F','O'])->default('O');
            $table->tinyInteger('support_level')->nullable();
            $table->unsignedInteger('responsible_user_id');
            $table->text('medical_notes')->nullable();
            $table->text('allergies')->nullable();
            $table->timestamps();
            $table->foreign('responsible_user_id')->references('id')->on('users')->onDelete('restrict');
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid',36)->nullable();
            $table->string('title',250);
            $table->string('slug',300)->nullable();
            $table->text('description')->nullable();
            $table->string('age_range',50)->nullable();
            $table->enum('difficulty',['easy','medium','hard'])->default('medium');
            $table->string('resource_url',1000)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->enum('visibility',['public','private'])->default('private');
            $table->json('tags')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('progress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('child_id');
            $table->unsignedInteger('activity_id');
            $table->date('date');
            $table->integer('score')->nullable();
            $table->integer('time_spent')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('recorded_by')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('recorded_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('child_id');
            $table->unsignedInteger('professional_id');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->string('type',100)->nullable();
            $table->enum('status',['scheduled','cancelled','completed','no_show'])->default('scheduled');
            $table->text('notes')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->foreign('professional_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('attendance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->unsignedInteger('activity_id')->nullable();
            $table->unsignedInteger('child_id');
            $table->boolean('present')->default(false);
            $table->unsignedInteger('recorded_by')->nullable();
            $table->timestamp('recorded_at')->useCurrent();
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->foreign('recorded_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid',36)->nullable();
            $table->unsignedInteger('author_id')->nullable();
            $table->string('title',500);
            $table->string('slug',500)->nullable();
            $table->longText('body')->nullable();
            $table->string('summary',1000)->nullable();
            $table->json('tags')->nullable();
            $table->enum('status',['draft','published','archived'])->default('draft');
            $table->dateTime('published_at')->nullable();
            $table->integer('views')->default(0);
            $table->integer('comments_count')->default(0);
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sender_name',200)->nullable();
            $table->string('sender_email',255)->nullable();
            $table->string('subject',500)->nullable();
            $table->text('body')->nullable();
            $table->timestamp('received_at')->useCurrent();
            $table->unsignedInteger('responded_by')->nullable();
            $table->timestamp('response_at')->nullable();
            $table->enum('status',['new','in_progress','answered','closed'])->default('new');
            $table->boolean('consent_given')->default(false);
            $table->json('metadata')->nullable();
            $table->foreign('responded_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author_name',255)->nullable();
            $table->string('relation',200)->nullable();
            $table->text('content')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamp('posted_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->date('available_from')->nullable();
            $table->date('available_to')->nullable();
            $table->json('skills')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('donor_name',255)->nullable();
            $table->string('donor_email',255)->nullable();
            $table->decimal('amount',12,2);
            $table->dateTime('date')->useCurrent();
            $table->string('receipt_number',255)->nullable();
            $table->json('metadata')->nullable();
        });

        Schema::create('media_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid',36)->nullable();
            $table->string('filename',500);
            $table->string('storage_path',1000);
            $table->string('mime_type',255)->nullable();
            $table->bigInteger('size_bytes')->nullable();
            $table->unsignedInteger('uploaded_by')->nullable();
            $table->string('usage_context',100)->nullable();
            $table->timestamp('uploaded_at')->useCurrent();
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('consents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->enum('consent_type',['privacy_policy','research','marketing','contact']);
            $table->boolean('consent_given')->default(false);
            $table->timestamp('consent_date')->nullable();
            $table->string('terms_version',50)->nullable();
            $table->json('metadata')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('audit_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->enum('action',['CREATE','UPDATE','DELETE','LOGIN','LOGOUT','EXPORT']);
            $table->string('table_name')->nullable();
            $table->string('record_id')->nullable();
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->string('ip_address',100)->nullable();
            $table->string('user_agent',500)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        // índices recomendados
        DB::statement('CREATE INDEX idx_children_responsible ON children (responsible_user_id)');
        DB::statement('CREATE INDEX idx_appointments_prof_start ON appointments (professional_id, start_datetime)');
        DB::statement('CREATE INDEX idx_progress_child_date ON progress (child_id, date)');
        DB::statement('CREATE INDEX idx_articles_status_published ON articles (status, published_at)');
        DB::statement('CREATE INDEX idx_media_usage ON media_files (usage_context)');

        // fulltext (InnoDB fulltext available on MySQL 5.6+ / MySQL 8)
        DB::statement('ALTER TABLE articles ADD FULLTEXT ft_articles_title_body (title, body)');
        DB::statement('ALTER TABLE activities ADD FULLTEXT ft_activities_title_desc (title, description)');
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_log');
        Schema::dropIfExists('consents');
        Schema::dropIfExists('media_files');
        Schema::dropIfExists('donations');
        Schema::dropIfExists('volunteers');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('progress');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('children');
        Schema::dropIfExists('users');
    }
};