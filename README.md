# Lab 5 — Intro to Hardware Development (01204271)

เอกสารนี้เป็นตัวอย่างโปรเจกต์ Lab 5 (PHP + MySQL) จัดเป็นเอกสารภาษาไทยแบบ Markdown เพื่ออธิบายโครงสร้างไฟล์ วิธีติดตั้ง และการใช้งานเบื้องต้น

## ภาพรวม
โปรเจกต์เป็นเว็บแอปแบบง่ายสำหรับจัดการคอร์ส นักศึกษา และผลสอบ โดยใช้ PHP ร่วมกับฐานข้อมูล MySQL พร้อมรันด้วย Docker Compose

## ความต้องการเบื้องต้น
- Docker และ Docker Compose ติดตั้งแล้ว
- PHP, MySQL (หากไม่ได้ใช้ Docker)
- โปรแกรมแก้ไขโค้ด

## โครงสร้างไฟล์ (ตัวอย่าง)
```bash
├── database.sql  
├── docker-compose.yml  
├── php/  
│   └── Dockerfile  
└── src/  
    ├── course/  
    │   ├── add_course.php  
    │   ├── checkDuplicate.php  
    │   ├── course_list.php  
    │   ├── delete_course.php  
    │   ├── edit_course.php  
    │   ├── save_add_course.php  
    │   └── save_course.php  
    ├── db/  
    │   └── connect_db.php  
    ├── exam_result/  
    │   ├── add_exam_result.php  
    │   ├── delete_exam_result.php  
    │   ├── edit_exam_result.php  
    │   ├── exam_result.php  
    │   ├── save_add_exam_result.php  
    │   ├── save_exam_result.php  
    │   └── show_exam_result.php  
    ├── index.php  
    ├── navbar.php  
    └── student/  
        ├── add_student.php  
        ├── delete_student.php  
        ├── edit_student.php  
        ├── save_add_student.php  
        ├── save_student.php  
        └── student_list.php
```

## คำอธิบายไฟล์หลัก
- database.sql — โครงสร้างและข้อมูลตัวอย่างของฐานข้อมูล  
- docker-compose.yml — กำหนดบริการ (web, db) สำหรับรันด้วย Docker Compose  
- php/Dockerfile — สร้างอิมเมจ PHP/Apache สำหรับรันแอป  
- src/db/connect_db.php — ตั้งค่าการเชื่อมต่อกับฐานข้อมูล (แก้ค่าผู้ใช้ รหัสผ่าน ชื่อฐานข้อมูลตามจริง)  
- src/index.php — หน้าเริ่มต้นของแอป  
- src/navbar.php — เมนูนำทางที่เรียกใช้งานร่วมในหน้าอื่นๆ  
- โฟลเดอร์ course, student, exam_result — ฟังก์ชัน CRUD และการแสดงผลของแต่ละโมดูล

## ติดตั้งและรัน (ตัวอย่าง)
1. ตรวจสอบไฟล์ docker-compose.yml เพื่อดูพอร์ตและรหัสผ่านฐานข้อมูล  
2. สร้างคอนเทนเนอร์และรันบริการ:
   - docker-compose up -d --build
3. นำเข้าโครงสร้างฐานข้อมูล (ถ้าใช้ MySQL ภายในคอนเทนเนอร์):
   - docker exec -i <db_container_name> mysql -u<user> -p<password> <database> < database.sql
   หรือ (เครื่องท้องถิ่น): mysql -u user -p database < database.sql
4. แก้ไข src/db/connect_db.php ให้ตรงกับค่าการเชื่อมต่อจริง  
5. เปิดเว็บเบราว์เซอร์ไปที่พอร์ตที่กำหนด (เช่น http://localhost:80 หรือพอร์ตใน docker-compose.yml)

## การทดสอบฟีเจอร์หลัก
- เข้าไปหน้า Course เพื่อเพิ่ม/แก้ไข/ลบข้อมูลคอร์ส  
- เข้าไปหน้า Student เพื่อจัดการข้อมูลนักศึกษา  
- เข้าไปหน้า Exam Result เพื่อบันทึกและแสดงผลสอบ

## หมายเหตุ
- ตรวจสอบสิทธิ์ไฟล์/โฟลเดอร์ (permissions) หากเกิดปัญหาอ่าน/เขียนไฟล์  
- ปรับค่าคอนฟิกใน docker-compose.yml และ connect_db.php ให้สอดคล้องกันเสมอ

(จบเอกสารสรุปสำหรับ Lab 5)