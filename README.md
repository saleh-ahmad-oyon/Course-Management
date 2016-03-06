# Course-Management
This is a course project. I used PHP, HTML5, CSS3, Bootstrap, JavaScript, Jquery, MySql in this project.

It is an application that can be used to manage a course according to AIUB(American International University-Bangladesh) regulation. The main features of this application is uploading the marks of multiple quizzes and term exams, uploading the attendance and modifying the uploaded information where applicable.

**Authority is the heighest privileged user of this system.** The functionalities of an Authority are as follows:

- Add Faculty Member(s).
- Add Student(s).
- Change his/her password.
- Two students/teachers with the same ID can't be added.
- Can assign teachers in courses.

**Faculty is the second highest privileged user of this system.** The functionalities of a faculty are as follows:

- View his/her information.
- Edit his/her information except AIUB ID, Designation.
- Add / remove new student to his course (assuming that one course has only one faculty but a faculty can take multiple courses).
- Two students with the same ID can't be added to the same course and also total number of students in a course cannot exceed 40.
- Insert/Edit marks of three quizzes and term exam for all the students of his course.
- Sometimes students may appear for improvement exams (for quizzes). In that case the updated marks also can be uploaded but the previous marks should also be kept for further reference.
- Give attendance to all of the students of his course in each class.
- View the list of students and their information.
- View the marks of each quiz (including the makeups), the sum of best two quiz, the term exam and the total attendance for each student.
- Change his/her password.

**Student is the lower privileged user of the system.** The functionalities of a student is as follows:

- View his/her information.
- View his/her courses and course teacher's information.
- View his/her marks of each quiz (including the makeups), the sum of best two quiz, the term exam and the total attendance.
- Edit his/her information except AIUB ID, marks and CGPA (if there is any).
- Change his/her password.
