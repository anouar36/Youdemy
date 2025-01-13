CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    role ENUM('Administrateur' ,'Etudiant', 'Enseignant')
);

CREATE TABLE Etudiants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE Enseignants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categorie_name VARCHAR(255)
);

CREATE TABLE Courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    description TEXT,
    content VARCHAR(255),
    enseignant_id int,
    categorie_id int,
    FOREIGN KEY (enseignant_id) REFERENCES Enseignants(id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

CREATE TABLE Course_Etudiant(
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATE,
    Etudiant_id int,
    Course_id int,
    FOREIGN KEY (Etudiant_id) REFERENCES Etudiants(id),
    FOREIGN KEY (Course_id) REFERENCES Courses(id)
);

CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(255)
);

CREATE TABLE Course_tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Course_id int,
    tag_id int,
    FOREIGN KEY (Course_id) REFERENCES Courses(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

-- FOR INSERATION 

-- Insert into users table
INSERT INTO users (id, username, email, password, role) VALUES
(1, 'ahmed_admin', 'ahmed.admin@gmail.com', 'password123', 'Administrateur'),
(2, 'fatima_student', 'fatima.student@gmail.com', 'password123', 'Etudiant'),
(3, 'youssef_teacher', 'youssef.teacher@gmail.com', 'password123', 'Enseignant');

-- Insert into admins table
INSERT INTO admins (id, user_id) VALUES
(1, 1);

-- Insert into Etudiants table
INSERT INTO Etudiants (id, user_id) VALUES
(1, 2);

-- Insert into Enseignants table
INSERT INTO Enseignants (id, user_id) VALUES
(1, 3);

-- Insert into categories table
INSERT INTO categories (id, categorie_name) VALUES
(1, 'Informatique'),
(2, 'Langues'),
(3, 'Entrepreneuriat');

-- Insert into tags table
INSERT INTO tags (id, tag_name) VALUES
(1, 'Programmation'),
(2, 'Design'),
(3, 'Marketing');

-- Insert into Courses table
INSERT INTO Courses (id, title, description, content, enseignant_id, categorie_id) VALUES
(1, 'Apprendre Python', 'Introduction à la programmation en Python', 'Contenu Python...', 1, 1),
(2, 'Apprendre Arabe', 'Cours pour maîtriser l’arabe', 'Contenu Arabe...', 1, 2);

-- Insert into Course_tag table
INSERT INTO Course_tag (id, Course_id, tag_id) VALUES
(1, 1, 1),
(2, 2, 2);

-- Insert into Course_Etudiant table
INSERT INTO Course_Etudiant (id, date, Etudiant_id, Course_id) VALUES
(1, '2025-01-01', 1, 1),
(2, '2025-01-02', 1, 2);
