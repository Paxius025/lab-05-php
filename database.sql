CREATE DATABASE school_db;

USE school_db;

CREATE TABLE students (
    student_code CHAR(10) PRIMARY KEY,
    student_name VARCHAR(50) NOT NULL,
    gender CHAR(1) CHECK (gender IN ('M', 'F'))
);

CREATE TABLE courses (
    course_code CHAR(8) PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL,
    credits INT CHECK (credits > 0)
);

CREATE TABLE exam_results (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_code CHAR(10),
    course_code CHAR(8),
    point INT CHECK (score BETWEEN 0 AND 100),
);

INSERT INTO students(student_code, student_name, gender)
VALUES ('6540201111', 'Anan', 'F'),
       ('6540202222', 'Budi', 'M'),
       ('6540203333', 'Citra', 'F'),
       ('6540204444', 'Dedi', 'M'),
       ('6540205555', 'Eka', 'F'),
       ('6540206666', 'Fajar', 'M'),
       ('6540207777', 'Garuna', 'F');

INSERT INTO exam_results(course_code, student_code, point)
VALUES ('01204114', '6540201111', 85),
       ('01204114', '6540202222', 90),
       ('01204114', '6540203333', 78),
       ('01204223', '6540204444', 88),
       ('01204223', '6540205555', 92),
       ('01204332', '6540206666', 80),
       ('01204332', '6540207777', 75),
       ('01204351', '6540201111', 95),
       ('01204351', '6540202222', 89),
       ('01204351', '6540203333', 84),
       ('01204271', '6540204444', 70),
       ('01204271', '6540205555', 65),
       ('01204271', '6540206666', 60),
      ('01204271', '6540207777', 25.5);

INSERT INTO courses(course_code, course_name, credits)
VALUES
('01204114', 'Intro to Hardware Development', 3),
('01204223', 'Practicum in Computer Engineering', 1),
('01204332', 'Operating System', 3),
('01204351', 'Database System', 3);