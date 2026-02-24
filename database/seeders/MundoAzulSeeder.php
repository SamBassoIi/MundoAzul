<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MundoAzulSeeder extends Seeder
{
    public function run()
    {
        // USERS (5)
        DB::table('users')->insert([
            [
                'uuid' => (string) Str::uuid(),
                'name' => 'Admin Principal',
                'email' => 'admin@example.com',
                'password_hash' => Hash::make('senha123'),
                'role' => 'admin',
                'phone' => '+55 11 90000-0001',
                'address' => 'Rua A, 1',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'uuid' => (string) Str::uuid(),
                'name' => 'Profissional 1',
                'email' => 'pro1@example.com',
                'password_hash' => Hash::make('senha123'),
                'role' => 'professional',
                'phone' => '+55 11 90000-0002',
                'address' => 'Rua B, 2',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'uuid' => (string) Str::uuid(),
                'name' => 'Pai/Mãe 1',
                'email' => 'parent1@example.com',
                'password_hash' => Hash::make('senha123'),
                'role' => 'parent',
                'phone' => '+55 11 90000-0003',
                'address' => 'Rua C, 3',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'uuid' => (string) Str::uuid(),
                'name' => 'Voluntário 1',
                'email' => 'vol1@example.com',
                'password_hash' => Hash::make('senha123'),
                'role' => 'volunteer',
                'phone' => '+55 11 90000-0004',
                'address' => 'Rua D, 4',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'uuid' => (string) Str::uuid(),
                'name' => 'Publico 1',
                'email' => 'public1@example.com',
                'password_hash' => Hash::make('senha123'),
                'role' => 'public',
                'phone' => '+55 11 90000-0005',
                'address' => 'Rua E, 5',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // CHILDREN (5) -> responsible_user_id = 3 (Pai/Mãe 1)
        DB::table('children')->insert([
            ['uuid' => (string) Str::uuid(), 'name'=>'Criança 1', 'dob'=>'2015-01-01', 'gender'=>'M', 'support_level'=>2, 'responsible_user_id'=>3, 'medical_notes'=>'Nenhuma', 'allergies'=>'Nenhuma', 'created_at'=>now(), 'updated_at'=>now()],
            ['uuid' => (string) Str::uuid(), 'name'=>'Criança 2', 'dob'=>'2016-02-02', 'gender'=>'F', 'support_level'=>1, 'responsible_user_id'=>3, 'medical_notes'=>'Nenhuma', 'allergies'=>'Leite', 'created_at'=>now(), 'updated_at'=>now()],
            ['uuid' => (string) Str::uuid(), 'name'=>'Criança 3', 'dob'=>'2017-03-03', 'gender'=>'O', 'support_level'=>3, 'responsible_user_id'=>3, 'medical_notes'=>'Asma leve', 'allergies'=>'Nenhuma', 'created_at'=>now(), 'updated_at'=>now()],
            ['uuid' => (string) Str::uuid(), 'name'=>'Criança 4', 'dob'=>'2018-04-04', 'gender'=>'M', 'support_level'=>1, 'responsible_user_id'=>3, 'medical_notes'=>'Uso de medicação', 'allergies'=>'Nenhuma', 'created_at'=>now(), 'updated_at'=>now()],
            ['uuid' => (string) Str::uuid(), 'name'=>'Criança 5', 'dob'=>'2019-05-05', 'gender'=>'F', 'support_level'=>2, 'responsible_user_id'=>3, 'medical_notes'=>'Acompanhamento', 'allergies'=>'Amendoim', 'created_at'=>now(), 'updated_at'=>now()],
        ]);

        // ACTIVITIES (5) -> created_by = 2 (Profissional 1)
        DB::table('activities')->insert([
            ['uuid'=> (string) Str::uuid(), 'title'=>'Atividade 1', 'slug'=>'atividade-1','description'=>'Descrição 1','age_range'=>'3-5','difficulty'=>'easy','resource_url'=>null,'created_by'=>2,'visibility'=>'public','tags'=>json_encode(['lateralidade']),'created_at'=>now(),'updated_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'title'=>'Atividade 2', 'slug'=>'atividade-2','description'=>'Descrição 2','age_range'=>'4-6','difficulty'=>'medium','resource_url'=>null,'created_by'=>2,'visibility'=>'public','tags'=>json_encode(['coordenação']),'created_at'=>now(),'updated_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'title'=>'Atividade 3', 'slug'=>'atividade-3','description'=>'Descrição 3','age_range'=>'5-7','difficulty'=>'hard','resource_url'=>null,'created_by'=>2,'visibility'=>'public','tags'=>json_encode(['percepção']),'created_at'=>now(),'updated_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'title'=>'Atividade 4', 'slug'=>'atividade-4','description'=>'Descrição 4','age_range'=>'6-8','difficulty'=>'medium','resource_url'=>null,'created_by'=>2,'visibility'=>'public','tags'=>json_encode(['memória']),'created_at'=>now(),'updated_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'title'=>'Atividade 5', 'slug'=>'atividade-5','description'=>'Descrição 5','age_range'=>'7-9','difficulty'=>'easy','resource_url'=>null,'created_by'=>2,'visibility'=>'public','tags'=>json_encode(['atenção']),'created_at'=>now(),'updated_at'=>now()],
        ]);

        // APPOINTMENTS (5)
        DB::table('appointments')->insert([
            ['child_id'=>1,'professional_id'=>2,'start_datetime'=>now(),'end_datetime'=>now()->addHour(),'type'=>'Terapia 1','status'=>'scheduled','notes'=>'Primeira sessão','created_by'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['child_id'=>2,'professional_id'=>2,'start_datetime'=>now()->addDay(),'end_datetime'=>now()->addDay()->addHour(),'type'=>'Terapia 2','status'=>'scheduled','notes'=>'Segunda sessão','created_by'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['child_id'=>3,'professional_id'=>2,'start_datetime'=>now()->addDays(2),'end_datetime'=>now()->addDays(2)->addHour(),'type'=>'Terapia 3','status'=>'scheduled','notes'=>'Terceira sessão','created_by'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['child_id'=>4,'professional_id'=>2,'start_datetime'=>now()->addDays(3),'end_datetime'=>now()->addDays(3)->addHour(),'type'=>'Terapia 4','status'=>'scheduled','notes'=>'Quarta sessão','created_by'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['child_id'=>5,'professional_id'=>2,'start_datetime'=>now()->addDays(4),'end_datetime'=>now()->addDays(4)->addHour(),'type'=>'Terapia 5','status'=>'scheduled','notes'=>'Quinta sessão','created_by'=>2,'created_at'=>now(),'updated_at'=>now()],
        ]);

        // PROGRESS (5)
        DB::table('progress')->insert([
            ['child_id'=>1,'activity_id'=>1,'date'=>now(),'score'=>85,'time_spent'=>600,'notes'=>'Boa evolução','recorded_by'=>2,'metadata'=>json_encode(['device'=>'web']),'created_at'=>now()],
            ['child_id'=>2,'activity_id'=>2,'date'=>now(),'score'=>78,'time_spent'=>420,'notes'=>'Progresso constante','recorded_by'=>2,'metadata'=>json_encode(['device'=>'tablet']),'created_at'=>now()],
            ['child_id'=>3,'activity_id'=>3,'date'=>now(),'score'=>90,'time_spent'=>300,'notes'=>'Excelente','recorded_by'=>2,'metadata'=>json_encode([]),'created_at'=>now()],
            ['child_id'=>4,'activity_id'=>4,'date'=>now(),'score'=>60,'time_spent'=>500,'notes'=>'Precisa melhorar','recorded_by'=>2,'metadata'=>json_encode([]),'created_at'=>now()],
            ['child_id'=>5,'activity_id'=>5,'date'=>now(),'score'=>70,'time_spent'=>450,'notes'=>'Ok','recorded_by'=>2,'metadata'=>json_encode([]),'created_at'=>now()],
        ]);

        // ATTENDANCE (5) - alternando appointment/activity
        DB::table('attendance')->insert([
            ['appointment_id'=>1,'activity_id'=>null,'child_id'=>1,'present'=>true,'recorded_by'=>2,'recorded_at'=>now()],
            ['appointment_id'=>null,'activity_id'=>2,'child_id'=>2,'present'=>true,'recorded_by'=>2,'recorded_at'=>now()],
            ['appointment_id'=>3,'activity_id'=>null,'child_id'=>3,'present'=>true,'recorded_by'=>2,'recorded_at'=>now()],
            ['appointment_id'=>null,'activity_id'=>4,'child_id'=>4,'present'=>false,'recorded_by'=>2,'recorded_at'=>now()],
            ['appointment_id'=>5,'activity_id'=>null,'child_id'=>5,'present'=>true,'recorded_by'=>2,'recorded_at'=>now()],
        ]);

        // ARTICLES (5)
        DB::table('articles')->insert([
            ['uuid'=> (string) Str::uuid(), 'author_id'=>1,'title'=>'Artigo 1','slug'=>'artigo-1','body'=>'Conteúdo artigo 1','summary'=>'Resumo 1','tags'=>json_encode(['saude']),'status'=>'published','published_at'=>now(),'views'=>10,'comments_count'=>0,'created_at'=>now(),'updated_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'author_id'=>1,'title'=>'Artigo 2','slug'=>'artigo-2','body'=>'Conteúdo artigo 2','summary'=>'Resumo 2','tags'=>json_encode(['educacao']),'status'=>'published','published_at'=>now(),'views'=>5,'comments_count'=>0,'created_at'=>now(),'updated_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'author_id'=>1,'title'=>'Artigo 3','slug'=>'artigo-3','body'=>'Conteúdo artigo 3','summary'=>'Resumo 3','tags'=>json_encode([]),'status'=>'draft','published_at'=>null,'views'=>0,'comments_count'=>0,'created_at'=>now(),'updated_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'author_id'=>1,'title'=>'Artigo 4','slug'=>'artigo-4','body'=>'Conteúdo artigo 4','summary'=>'Resumo 4','tags'=>json_encode([]),'status'=>'archived','published_at'=>now(),'views'=>3,'comments_count'=>0,'created_at'=>now(),'updated_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'author_id'=>1,'title'=>'Artigo 5','slug'=>'artigo-5','body'=>'Conteúdo artigo 5','summary'=>'Resumo 5','tags'=>json_encode(['dica']),'status'=>'published','published_at'=>now(),'views'=>20,'comments_count'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);

        // CONTACT MESSAGES (5)
        DB::table('contact_messages')->insert([
            ['sender_name'=>'Pessoa 1','sender_email'=>'p1@mail.com','subject'=>'Assunto 1','body'=>'Mensagem 1','received_at'=>now(),'responded_by'=>1,'response_at'=>now(),'status'=>'answered','consent_given'=>true,'metadata'=>json_encode([])],
            ['sender_name'=>'Pessoa 2','sender_email'=>'p2@mail.com','subject'=>'Assunto 2','body'=>'Mensagem 2','received_at'=>now(),'responded_by'=>1,'response_at'=>now(),'status'=>'answered','consent_given'=>true,'metadata'=>json_encode([])],
            ['sender_name'=>'Pessoa 3','sender_email'=>'p3@mail.com','subject'=>'Assunto 3','body'=>'Mensagem 3','received_at'=>now(),'responded_by'=>null,'response_at'=>null,'status'=>'new','consent_given'=>false,'metadata'=>json_encode([])],
            ['sender_name'=>'Pessoa 4','sender_email'=>'p4@mail.com','subject'=>'Assunto 4','body'=>'Mensagem 4','received_at'=>now(),'responded_by'=>null,'response_at'=>null,'status'=>'new','consent_given'=>false,'metadata'=>json_encode([])],
            ['sender_name'=>'Pessoa 5','sender_email'=>'p5@mail.com','subject'=>'Assunto 5','body'=>'Mensagem 5','received_at'=>now(),'responded_by'=>1,'response_at'=>now(),'status'=>'answered','consent_given'=>true,'metadata'=>json_encode([])],
        ]);

        // TESTIMONIALS (5)
        DB::table('testimonials')->insert([
            ['author_name'=>'Autor 1','relation'=>'Parente','content'=>'Depoimento 1','approved'=>true,'posted_at'=>now(),'created_at'=>now()],
            ['author_name'=>'Autor 2','relation'=>'Responsável','content'=>'Depoimento 2','approved'=>true,'posted_at'=>now(),'created_at'=>now()],
            ['author_name'=>'Autor 3','relation'=>'Voluntário','content'=>'Depoimento 3','approved'=>false,'posted_at'=>null,'created_at'=>now()],
            ['author_name'=>'Autor 4','relation'=>'Profissional','content'=>'Depoimento 4','approved'=>true,'posted_at'=>now(),'created_at'=>now()],
            ['author_name'=>'Autor 5','relation'=>'Parente','content'=>'Depoimento 5','approved'=>false,'posted_at'=>null,'created_at'=>now()],
        ]);

        // VOLUNTEERS (5) -> linked to user_id 4
        DB::table('volunteers')->insert([
            ['user_id'=>4,'available_from'=>'2025-01-01','available_to'=>'2025-12-31','skills'=>json_encode(['organização']),'notes'=>'Nota 1','created_at'=>now()],
            ['user_id'=>4,'available_from'=>'2025-02-01','available_to'=>'2025-12-31','skills'=>json_encode(['ensino']),'notes'=>'Nota 2','created_at'=>now()],
            ['user_id'=>4,'available_from'=>'2025-03-01','available_to'=>'2025-12-31','skills'=>json_encode(['apoio']),'notes'=>'Nota 3','created_at'=>now()],
            ['user_id'=>4,'available_from'=>'2025-04-01','available_to'=>'2025-12-31','skills'=>json_encode(['logística']),'notes'=>'Nota 4','created_at'=>now()],
            ['user_id'=>4,'available_from'=>'2025-05-01','available_to'=>'2025-12-31','skills'=>json_encode(['atividades']),'notes'=>'Nota 5','created_at'=>now()],
        ]);

        // DONATIONS (5)
        DB::table('donations')->insert([
            ['donor_name'=>'Doador 1','donor_email'=>'d1@mail.com','amount'=>150.00,'date'=>now(),'receipt_number'=>'RCPT-0001','metadata'=>json_encode([])],
            ['donor_name'=>'Doador 2','donor_email'=>'d2@mail.com','amount'=>200.00,'date'=>now(),'receipt_number'=>'RCPT-0002','metadata'=>json_encode([])],
            ['donor_name'=>'Doador 3','donor_email'=>'d3@mail.com','amount'=>50.00,'date'=>now(),'receipt_number'=>'RCPT-0003','metadata'=>json_encode([])],
            ['donor_name'=>'Doador 4','donor_email'=>'d4@mail.com','amount'=>300.00,'date'=>now(),'receipt_number'=>'RCPT-0004','metadata'=>json_encode([])],
            ['donor_name'=>'Doador 5','donor_email'=>'d5@mail.com','amount'=>120.00,'date'=>now(),'receipt_number'=>'RCPT-0005','metadata'=>json_encode([])],
        ]);

        // MEDIA FILES (5)
        DB::table('media_files')->insert([
            ['uuid'=> (string) Str::uuid(), 'filename'=>'foto1.png','storage_path'=>'/storage/foto1.png','mime_type'=>'image/png','size_bytes'=>1024,'uploaded_by'=>1,'usage_context'=>'avatar','uploaded_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'filename'=>'doc1.pdf','storage_path'=>'/storage/doc1.pdf','mime_type'=>'application/pdf','size_bytes'=>2048,'uploaded_by'=>1,'usage_context'=>'document','uploaded_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'filename'=>'img2.jpg','storage_path'=>'/storage/img2.jpg','mime_type'=>'image/jpeg','size_bytes'=>512,'uploaded_by'=>1,'usage_context'=>'gallery','uploaded_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'filename'=>'img3.jpg','storage_path'=>'/storage/img3.jpg','mime_type'=>'image/jpeg','size_bytes'=>512,'uploaded_by'=>1,'usage_context'=>'gallery','uploaded_at'=>now()],
            ['uuid'=> (string) Str::uuid(), 'filename'=>'file5.png','storage_path'=>'/storage/file5.png','mime_type'=>'image/png','size_bytes'=>1500,'uploaded_by'=>1,'usage_context'=>'avatar','uploaded_at'=>now()],
        ]);

        // CONSENTS (5)
        DB::table('consents')->insert([
            ['user_id'=>1,'consent_type'=>'privacy_policy','consent_given'=>true,'consent_date'=>now(),'terms_version'=>'v1.0','metadata'=>json_encode([])],
            ['user_id'=>2,'consent_type'=>'research','consent_given'=>true,'consent_date'=>now(),'terms_version'=>'v1.0','metadata'=>json_encode([])],
            ['user_id'=>3,'consent_type'=>'contact','consent_given'=>true,'consent_date'=>now(),'terms_version'=>'v1.0','metadata'=>json_encode([])],
            ['user_id'=>4,'consent_type'=>'marketing','consent_given'=>false,'consent_date'=>null,'terms_version'=>'v1.0','metadata'=>json_encode([])],
            ['user_id'=>5,'consent_type'=>'privacy_policy','consent_given'=>true,'consent_date'=>now(),'terms_version'=>'v1.0','metadata'=>json_encode([])],
        ]);

        // AUDIT LOG (5)
        DB::table('audit_log')->insert([
            ['user_id'=>1,'action'=>'CREATE','table_name'=>'users','record_id'=>'1','old_values'=>null,'new_values'=>null,'ip_address'=>'127.0.0.1','user_agent'=>'Seeder','created_at'=>now()],
            ['user_id'=>1,'action'=>'UPDATE','table_name'=>'users','record_id'=>'2','old_values'=>null,'new_values'=>null,'ip_address'=>'127.0.0.1','user_agent'=>'Seeder','created_at'=>now()],
            ['user_id'=>1,'action'=>'DELETE','table_name'=>'children','record_id'=>'1','old_values'=>null,'new_values'=>null,'ip_address'=>'127.0.0.1','user_agent'=>'Seeder','created_at'=>now()],
            ['user_id'=>2,'action'=>'LOGIN','table_name'=>null,'record_id'=>null,'old_values'=>null,'new_values'=>null,'ip_address'=>'127.0.0.1','user_agent'=>'Seeder','created_at'=>now()],
            ['user_id'=>2,'action'=>'LOGOUT','table_name'=>null,'record_id'=>null,'old_values'=>null,'new_values'=>null,'ip_address'=>'127.0.0.1','user_agent'=>'Seeder','created_at'=>now()],
        ]);
    }
}