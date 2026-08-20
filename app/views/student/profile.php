<!DOCTYPE html>
<html>

<head>
    <title>Student Profile</title>
</head>

<body>

    <h1>Student Profile</h1>

    <p><strong>Student ID:</strong> <?= $student['student_id']; ?></p>
    <p><strong>Name:</strong> <?= $student['name']; ?></p>
    <p><strong>Course:</strong> <?= $student['course']; ?></p>
    <p><strong>Year:</strong> <?= $student['year']; ?></p>
    <p><strong>Section:</strong> <?= $student['section']; ?></p>
    <p><strong>Email:</strong> <?= $student['email']; ?></p>

    <hr>

    <a href="<?= site_url('student'); ?>">Home</a>

</body>

</html>