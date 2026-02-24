
-- Mundo Azul: esquema de banco de dados (MySQL 8+ / MariaDB compatível)
-- Charset e engine recomendados
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Tabela de usuários (pais, profissionais, admins, voluntários)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uuid CHAR(36) NULL,
  name VARCHAR(200) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','professional','parent','volunteer','public') NOT NULL DEFAULT 'public',
  phone VARCHAR(50),
  address VARCHAR(500),
  avatar_media_id INT,
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
  created_by INT,
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
  recorded_by INT,
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
  created_by INT,
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
  recorded_by INT,
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
  author_id INT,
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
CREATE INDEX idx_children_responsible ON children (responsible_user_id);
CREATE INDEX idx_appointments_prof_start ON appointments (professional_id, start_datetime);
CREATE INDEX idx_progress_child_date ON progress (child_id, date);
CREATE INDEX idx_articles_status_published ON articles (status, published_at);
CREATE INDEX idx_media_usage ON media_files (usage_context);

-- Full-text index (MySQL InnoDB full-text supported)
ALTER TABLE articles ADD FULLTEXT KEY ft_articles_title_body (title, body);
ALTER TABLE activities ADD FULLTEXT KEY ft_activities_title_desc (title, description);

SET FOREIGN_KEY_CHECKS = 1;
