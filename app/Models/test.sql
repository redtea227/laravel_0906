SELECT students.id, students.chinese, students.english, students.math, phones.phone
FROM students
LEFT JOIN phones
ON students.id=phones.student_id