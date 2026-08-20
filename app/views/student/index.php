<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information | Academic Portal</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col justify-center items-center p-4 sm:p-6">

    <div class="w-full max-w-xl bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
        
        <!-- School Header with Logo Placeholder -->
        <div class="bg-blue-950 text-white px-6 py-5 flex items-center gap-4 border-b-4 border-blue-600">
            <!-- LOGO PLACEHOLDER: Replace src with your actual school logo asset path -->
            <div class="w-12 h-12 bg-white rounded-md flex items-center justify-center shrink-0 overflow-hidden border border-blue-900">
                <img src="/path-to-your-school-logo.png" alt="School Logo" class="w-10 h-10 object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <span class="text-blue-950 font-bold text-xs hidden">LOGO</span>
            </div>
            <div>
                <h1 class="text-lg font-bold tracking-tight">University Academic Portal</h1>
                <p class="text-xs text-blue-200 uppercase tracking-wider font-medium">Student Information Record</p>
            </div>
        </div>

        <!-- Content Body -->
        <div class="p-6 sm:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                
                <div class="bg-slate-50 border border-slate-200 p-4 rounded-lg">
                    <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Student ID</span>
                    <span class="text-base font-bold text-blue-950"><?= $student['student_id']; ?></span>
                </div>

                <div class="bg-slate-50 border border-slate-200 p-4 rounded-lg">
                    <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Year Level</span>
                    <span class="text-base font-bold text-blue-950"><?= $student['year']; ?></span>
                </div>

                <div class="bg-slate-50 border border-slate-200 p-4 rounded-lg sm:col-span-2">
                    <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Full Name</span>
                    <span class="text-base font-bold text-blue-950"><?= $student['name']; ?></span>
                </div>

                <div class="bg-slate-50 border border-slate-200 p-4 rounded-lg">
                    <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Course</span>
                    <span class="text-base font-bold text-blue-950"><?= $student['course']; ?></span>
                </div>

                <div class="bg-slate-50 border border-slate-200 p-4 rounded-lg">
                    <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Section</span>
                    <span class="text-base font-bold text-blue-950"><?= $student['section']; ?></span>
                </div>

                <div class="bg-slate-50 border border-slate-200 p-4 rounded-lg sm:col-span-2">
                    <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Email Address</span>
                    <span class="text-base font-bold text-blue-950"><?= $student['email']; ?></span>
                </div>

            </div>

            <hr class="border-slate-200 mb-6">

            <!-- Navigation Links -->
            <div class="flex flex-wrap justify-center items-center gap-3">
                <a href="<?= site_url('student'); ?>" class="px-4 py-2 bg-blue-900 text-white font-medium text-sm rounded-md hover:bg-blue-800 transition-colors">Home</a>
                <a href="<?= site_url('student/profile'); ?>" class="px-4 py-2 bg-slate-100 text-blue-950 font-medium text-sm rounded-md border border-slate-300 hover:bg-slate-200 transition-colors">Student Profile</a>
            </div>
        </div>

    </div>

</body>
</html>