-- Mundo Azul: esquema de banco de dados (MySQL 8+ / MariaDB compatível)
-- Gerado para uso com projeto Laravel
-- Charset e engine recomendados
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Tabela users (adaptada para permitir inserção de seed com hash placeholder)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uuid CHAR(36) NULL,
  name VARCHAR(200) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','professional','parent','volunteer','public') NOT NULL DEFAULT 'public',
  phone VARCHAR(50),
  address VARCHAR(500),
  avatar_media_id INT NULL,
  active BOOLEAN NOT NULL DEFAULT TRUE,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT uq_users_uuid UNIQUE (uuid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crianças / atendidos
CREATE TABLE IF NOT EXISTS children (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uuid CHAR(36) NULL,
  name VARCHAR(200) NOT NULL,
  dob DATE,
  gender ENUM('M','F','O') DEFAULT 'O',
  support_level TINYINT,
  responsible_user_id INT NOT NULL,
  medical_notes TEXT,
  allergies TEXT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (responsible_user_id) REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Atividades / jogos educativos
CREATE TABLE IF NOT EXISTS activities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uuid CHAR(36) NULL,
  title VARCHAR(250) NOT NULL,
  slug VARCHAR(300) NULL,
  description TEXT,
  age_range VARCHAR(50),
  difficulty ENUM('easy','medium','hard') DEFAULT 'medium',
  resource_url VARCHAR(1000),
  created_by INT NULL,
  visibility ENUM('public','private') DEFAULT 'private',
  tags JSON NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Registro de progresso das crianças
CREATE TABLE IF NOT EXISTS progress (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  child_id INT NOT NULL,
  activity_id INT NOT NULL,
  date DATE NOT NULL,
  score INT NULL,
  time_spent INT NULL, -- segundos
  notes TEXT,
  recorded_by INT NULL,
  metadata JSON NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (child_id) REFERENCES children(id) ON DELETE CASCADE,
  FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE,
  FOREIGN KEY (recorded_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Agendamentos / agenda (terapias, atendimentos)
CREATE TABLE IF NOT EXISTS appointments (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  child_id INT NOT NULL,
  professional_id INT NOT NULL,
  start_datetime DATETIME NOT NULL,
  end_datetime DATETIME NOT NULL,
  type VARCHAR(100) NULL,
  status ENUM('scheduled','cancelled','completed','no_show') DEFAULT 'scheduled',
  notes TEXT,
  created_by INT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (child_id) REFERENCES children(id) ON DELETE CASCADE,
  FOREIGN KEY (professional_id) REFERENCES users(id) ON DELETE RESTRICT,
  FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Controle de presença (opcionalmente ligado a appointment ou activity)
CREATE TABLE IF NOT EXISTS attendance (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  appointment_id BIGINT NULL,
  activity_id INT NULL,
  child_id INT NOT NULL,
  present BOOLEAN NOT NULL DEFAULT FALSE,
  recorded_by INT NULL,
  recorded_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (appointment_id) REFERENCES appointments(id) ON DELETE CASCADE,
  FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE,
  FOREIGN KEY (child_id) REFERENCES children(id) ON DELETE CASCADE,
  FOREIGN KEY (recorded_by) REFERENCES users(id) ON DELETE SET NULL,
  CONSTRAINT chk_attendance_one_source CHECK (
    (appointment_id IS NOT NULL AND activity_id IS NULL)
    OR (appointment_id IS NULL AND activity_id IS NOT NULL)
  )
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Artigos / blog
CREATE TABLE IF NOT EXISTS articles (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  uuid CHAR(36) NULL,
  author_id INT NULL,
  title VARCHAR(500) NOT NULL,
  slug VARCHAR(500) NULL,
  body LONGTEXT,
  summary VARCHAR(1000),
  tags JSON NULL,
  status ENUM('draft','published','archived') DEFAULT 'draft',
  published_at DATETIME NULL,
  views INT DEFAULT 0,
  comments_count INT DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Mensagens de contato
CREATE TABLE IF NOT EXISTS contact_messages (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  sender_name VARCHAR(200),
  sender_email VARCHAR(255),
  subject VARCHAR(500),
  body TEXT,
  received_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  responded_by INT NULL,
  response_at TIMESTAMP NULL,
  status ENUM('new','in_progress','answered','closed') DEFAULT 'new',
  consent_given BOOLEAN DEFAULT FALSE,
  metadata JSON NULL,
  FOREIGN KEY (responded_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Depoimentos / testimonials
CREATE TABLE IF NOT EXISTS testimonials (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  author_name VARCHAR(255),
  relation VARCHAR(200),
  content TEXT,
  approved BOOLEAN DEFAULT FALSE,
  posted_at TIMESTAMP NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Voluntários (separado para dados operacionais)
CREATE TABLE IF NOT EXISTS volunteers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NULL,
  available_from DATE NULL,
  available_to DATE NULL,
  skills JSON NULL,
  notes TEXT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Doações / finanças simples
CREATE TABLE IF NOT EXISTS donations (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  donor_name VARCHAR(255),
  donor_email VARCHAR(255),
  amount DECIMAL(12,2) NOT NULL,
  date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  receipt_number VARCHAR(255) NULL,
  metadata JSON NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Arquivos / mídia
CREATE TABLE IF NOT EXISTS media_files (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  uuid CHAR(36) NULL,
  filename VARCHAR(500) NOT NULL,
  storage_path VARCHAR(1000) NOT NULL,
  mime_type VARCHAR(255) NULL,
  size_bytes BIGINT NULL,
  uploaded_by INT NULL,
  usage_context VARCHAR(100) NULL,
  uploaded_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Consentimentos (LGPD)
CREATE TABLE IF NOT EXISTS consents (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  consent_type ENUM('privacy_policy','research','marketing','contact') NOT NULL,
  consent_given BOOLEAN NOT NULL DEFAULT FALSE,
  consent_date TIMESTAMP NULL,
  terms_version VARCHAR(50) NULL,
  metadata JSON NULL,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Log de auditoria
CREATE TABLE IF NOT EXISTS audit_log (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NULL,
  action ENUM('CREATE','UPDATE','DELETE','LOGIN','LOGOUT','EXPORT') NOT NULL,
  table_name VARCHAR(255) NULL,
  record_id VARCHAR(255) NULL,
  old_values JSON NULL,
  new_values JSON NULL,
  ip_address VARCHAR(100) NULL,
  user_agent VARCHAR(500) NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Índices recomendados adicionais
CREATE INDEX IF NOT EXISTS idx_children_responsible ON children (responsible_user_id);
CREATE INDEX IF NOT EXISTS idx_appointments_prof_start ON appointments (professional_id, start_datetime);
CREATE INDEX IF NOT EXISTS idx_progress_child_date ON progress (child_id, date);
CREATE INDEX IF NOT EXISTS idx_articles_status_published ON articles (status, published_at);
CREATE INDEX IF NOT EXISTS idx_media_usage ON media_files (usage_context);

-- Full-text index (MySQL InnoDB full-text suportado)
ALTER TABLE articles ADD FULLTEXT KEY ft_articles_title_body (title, body);
ALTER TABLE activities ADD FULLTEXT KEY ft_activities_title_desc (title, description);

-- =====================================================
-- Seed data de exemplo (apenas para desenvolvimento)
-- NOTA: os password_hash abaixo são placeholders. Substitua usando
-- php artisan tinker: \App\Models\User::find($id)->update(['password' => Hash::make('sua_senha')])
-- ou crie seeders Laravel com Hash::make().
-- =====================================================

-- Users (admin, professional, parent, volunteer)
INSERT INTO users (uuid, name, email, password_hash, role, phone, address, active, created_at, updated_at)
VALUES
('11111111-1111-1111-1111-111111111111','Admin Mundo Azul','admin@exemplo.com','$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNOpqrstuvwx','admin','+55 11 90000-0000','Rua A, 123, Cidade','1',NOW(),NOW()),
('22222222-2222-2222-2222-222222222222','Profissional Exemplo','pro@exemplo.com','$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNOpqrstuvwx','professional','+55 11 91111-1111','Rua B, 45','1',NOW(),NOW()),
('33333333-3333-3333-3333-333333333333','Responsável (Pai)','pai@exemplo.com','$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNOpqrstuvwx','parent','+55 11 92222-2222','Rua C, 67','1',NOW(),NOW()),
('44444444-4444-4444-4444-444444444444','Voluntário Exemplo','vol@exemplo.com','$2y$10$abcdefghijklmnopqrstuvABCDEFGHIJKLMNOpqrstuvwx','volunteer','+55 11 93333-3333','Rua D, 89','1',NOW(),NOW());

-- Uma criança vinculada ao responsável (usuário id = 3 presumido)
INSERT INTO children (uuid, name, dob, gender, support_level, responsible_user_id, medical_notes, allergies, created_at, updated_at)
VALUES ('aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa','Criança Exemplo','2018-05-12','O',2,3,'Observações médicas exemplo','Nenhuma',NOW(),NOW());

-- Uma atividade
INSERT INTO activities (uuid, title, slug, description, age_range, difficulty, resource_url, created_by, visibility, tags, created_at, updated_at)
VALUES ('bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb','Jogo de Emoções','jogo-emocoes','Atividade para trabalhar reconhecimento de emoções.','3-6','easy',NULL,2,'public',JSON_ARRAY('emoção','reconhecimento'),NOW(),NOW());

-- Progresso
INSERT INTO progress (child_id, activity_id, date, score, time_spent, notes, recorded_by, metadata, created_at)
VALUES (1,1,CURDATE(),85,300,'Primeiro teste de atividade',2,JSON_OBJECT('device','tablet'),NOW());

-- Agendamento (profissional id = 2, child id = 1)
INSERT INTO appointments (child_id, professional_id, start_datetime, end_datetime, type, status, notes, created_by, created_at, updated_at)
VALUES (1,2,DATE_ADD(NOW(), INTERVAL 2 DAY), DATE_ADD(NOW(), INTERVAL 2 DAY + INTERVAL 45 MINUTE),'Terapia Inicial','scheduled','Agendamento de teste',2,NOW(),NOW());

-- Doação de exemplo
INSERT INTO donations (donor_name, donor_email, amount, date, receipt_number, metadata)
VALUES ('Doador Teste','doador@exemplo.com',150.00,NOW(),'RCPT-0001',JSON_OBJECT('campaign','campanha_inicial'));

-- Media file de exemplo
INSERT INTO media_files (uuid, filename, storage_path, mime_type, size_bytes, uploaded_by, usage_context, uploaded_at)
VALUES ('cccccccc-cccc-cccc-cccc-cccccccccccc','avatar_exemplo.png','/storage/avatars/avatar_exemplo.png','image/png',34567,2,'avatar',NOW());

-- Consentimento (para o responsável)
INSERT INTO consents (user_id, consent_type, consent_given, consent_date, terms_version, metadata)
VALUES (3,'privacy_policy',1,NOW(),'v1.0',JSON_OBJECT('via','web'));

-- Testemunho
INSERT INTO testimonials (author_name, relation, content, approved, posted_at, created_at)
VALUES ('Maria Responsável','mãe','Excelente trabalho com as atividades.',1,NOW(),NOW());

SET FOREIGN_KEY_CHECKS = 1;