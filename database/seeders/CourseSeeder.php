<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * FIELD GUIDE - Understanding each field:
     * ======================================
     *
     * name           : Full course name (e.g., "Diploma of Information Technology")
     *                : Shows as the main title on course cards and detail page
     *
     * slug           : URL-friendly version (e.g., "diploma-of-information-technology")
     *                : Used in the URL: /courses/diploma-of-information-technology
     *
     * description   : Brief summary (2-3 sentences)
     *                : Shows on course cards in the listing page
     *
     * category      : Course category for filtering
     *                : Options: "it", "business", "health", "english", "leadership", "community"
     *                : Used for category filter links
     *
     * duration      : Course duration in WEEKS (integer)
     *                : Example: 52 = 52 weeks = 1 year
     *                : Shows as "📅 52 Weeks" on course cards
     *
     * fee           : Tuition fee in dollars (decimal)
     *                : Example: 12500.00 = $12,500
     *                : Shows in the sidebar as tuition fee
     *
     * image         : Image filename (stored in public/images/courses/)
     *                : If null, a gradient background with icon is shown
     *                : Example: "it-course.jpg"
     *
     * study_mode    : How the course is delivered
     *                : Example: "On Campus / Online" or "On Campus" or "Online"
     *                : Shows in quick facts sidebar
     *
     * intake_months: Months when new classes start
     *                : Example: "January, May, September" or "Monthly"
     *                : Shows in quick facts sidebar
     *
     * location      : Campus locations
     *                : Example: "Sydney, Melbourne" or "Online"
     *                : Shows in quick facts sidebar
     *
     * cricos_code   : CRICOS registration code (for international students)
     *                : Example: "03456J"
     *                : Shows in quick facts sidebar
     *
     * curriculum    : General curriculum description (long text)
     *                : Shows in Course Overview section
     *
     * core_units    : JSON array of core/mandatory units
     *                : Example: ["Manage complex ICT projects", "Implement ICT security"]
     *                : Shows in Course Structure section
     *
     * elective_units: JSON array of elective units
     *                : Example: ["Cyber security governance", "Software development"]
     *                : Shows in Course Structure section
     *
     * career_outcomes: JSON array of job titles
     *                : Example: ["IT Support Specialist", "Network Administrator"]
     *                : Shows in Career Outcomes section
     *
     * entry_requirements: Text describing what students need to apply
     *                : Shows in Entry Requirements section
     *                : Example: "Completion of Year 12, IELTS 5.5..."
     *
     * instructor    : Course coordinator/trainer name (optional)
     *                : Example: "John Smith"
     *
     * is_published  : Whether to show on frontend (true/false)
     *                : true = shows on website
     *                : false = hidden from website
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Diploma of Information Technology',
                'slug' => 'diploma-of-information-technology',
                'description' => 'Gain advanced skills in IT infrastructure, software development, and network security. This comprehensive program prepares you for a career in the rapidly growing IT industry.',
                'category' => 'it',
                'duration' => 52,
                'fee' => 12500.00,
                'study_mode' => 'On Campus / Online',
                'intake_months' => 'January, May, September',
                'location' => 'Sydney, Melbourne',
                'cricos_code' => '03456J',
                'curriculum' => 'This qualification reflects the role of individuals who have a broad knowledge of information and communications technology (ICT) and use a wide range of specialized technical skills. Graduates will be able to configure and manage networks and computing environments, develop and implement ICT solutions, and provide advice and support to users.',
                'core_units' => [
                    'Manage complex ICT projects',
                    'Implement and manage ICT security',
                    'Develop and implement cloud computing systems',
                    'Manage database systems',
                    'Lead and manage team effectiveness',
                    'ICT business development',
                ],
                'elective_units' => [
                    'Cyber security governance',
                    'Software development programming',
                    'Network and virtualisation',
                    'Web development',
                    'Data analytics',
                ],
                'career_outcomes' => [
                    'IT Support Specialist',
                    'Network Administrator',
                    'Systems Analyst',
                    'ICT Security Specialist',
                    'Technical Support Officer',
                ],
                'entry_requirements' => "• Completion of Year 12 or equivalent\n• IELTS 5.5 or equivalent (for international students)\n• Basic computer skills\n• Minimum 18 years of age",
                'instructor' => 'Dr. Sarah Johnson',
                'is_published' => true,
            ],
            [
                'name' => 'Diploma of Business',
                'slug' => 'diploma-of-business',
                'description' => 'Develop essential business skills in management, marketing, and organizational leadership. Learn to navigate the modern business landscape with confidence.',
                'category' => 'business',
                'duration' => 52,
                'fee' => 11500.00,
                'study_mode' => 'On Campus / Online',
                'intake_months' => 'January, May, September',
                'location' => 'Sydney, Melbourne',
                'cricos_code' => '03457K',
                'curriculum' => 'The Diploma of Business provides students with the skills and knowledge to work in a variety of business roles. Students will learn about business operations, strategic management, marketing, and organizational leadership.',
                'core_units' => [
                    'Develop business plans',
                    'Manage business operations',
                    'Lead team effectiveness',
                    'Marketing and communication',
                    'Financial basics for business',
                    'Project management',
                ],
                'elective_units' => [
                    'Human resource management',
                    'Digital marketing',
                    'Business analytics',
                    'Entrepreneurship',
                    'Corporate governance',
                ],
                'career_outcomes' => [
                    'Business Manager',
                    'Marketing Coordinator',
                    'Operations Manager',
                    'Project Coordinator',
                    'Executive Officer',
                ],
                'entry_requirements' => "• Completion of Year 12 or equivalent\n• IELTS 5.5 or equivalent (for international students)\n• Minimum 18 years of age",
                'instructor' => 'Michael Chen',
                'is_published' => true,
            ],
            [
                'name' => 'Advanced Diploma of Leadership',
                'slug' => 'advanced-diploma-of-leadership',
                'description' => 'Master strategic leadership and management skills for senior organizational roles. Become an effective leader who drives organizational success.',
                'category' => 'leadership',
                'duration' => 78,
                'fee' => 14500.00,
                'study_mode' => 'On Campus / Online',
                'intake_months' => 'March, July, November',
                'location' => 'Sydney, Melbourne',
                'cricos_code' => '03458L',
                'curriculum' => 'The Advanced Diploma of Leadership develops strategic leadership skills necessary for senior management positions. Students will learn to lead organizational change, manage complex projects, and develop high-performing teams.',
                'core_units' => [
                    'Strategic leadership',
                    'Organizational development',
                    'Change management',
                    'Risk management',
                    'Financial strategy',
                    'Business innovation',
                ],
                'elective_units' => [
                    'Corporate strategy',
                    'Executive coaching',
                    'Business transformation',
                    'Stakeholder management',
                    'National sustainability',
                ],
                'career_outcomes' => [
                    'Senior Manager',
                    'Director of Operations',
                    'Chief Operating Officer',
                    'Regional Manager',
                    'Executive Consultant',
                ],
                'entry_requirements' => "• Completion of Diploma or above\n• IELTS 6.0 or equivalent (for international students)\n• Minimum 2 years work experience\n• Minimum 20 years of age",
                'instructor' => 'Dr. Emma Thompson',
                'is_published' => true,
            ],
            [
                'name' => 'Diploma of Cybersecurity',
                'slug' => 'diploma-of-cybersecurity',
                'description' => 'Learn to protect organizations from cyber threats and manage security infrastructure. Become a sought-after cybersecurity professional.',
                'category' => 'it',
                'duration' => 52,
                'fee' => 13500.00,
                'study_mode' => 'On Campus / Online',
                'intake_months' => 'January, May, September',
                'location' => 'Sydney, Melbourne',
                'cricos_code' => '03459M',
                'curriculum' => 'This qualification equips students with the skills to identify and resolve cybersecurity threats. Students will learn about network security, incident response, vulnerability assessment, and security governance.',
                'core_units' => [
                    'Cybersecurity fundamentals',
                    'Network security implementation',
                    'Incident response and forensics',
                    'Vulnerability assessment',
                    'Security governance',
                    'Ethical hacking basics',
                ],
                'elective_units' => [
                    'Cloud security',
                    'Malware analysis',
                    'Penetration testing',
                    'Security compliance',
                    'Cryptography',
                ],
                'career_outcomes' => [
                    'Cybersecurity Analyst',
                    'Security Operations Center (SOC) Analyst',
                    'Network Security Engineer',
                    'Incident Responder',
                    'Security Consultant',
                ],
                'entry_requirements' => "• Completion of Year 12 or equivalent\n• IELTS 5.5 or equivalent (for international students)\n• Basic IT knowledge recommended\n• Minimum 18 years of age",
                'instructor' => 'James Wilson',
                'is_published' => true,
            ],
            [
                'name' => 'Diploma of Early Childhood Education',
                'slug' => 'diploma-of-early-childhood-education',
                'description' => 'Build a rewarding career in early childhood education and care. Learn to nurture and educate young children in a supportive environment.',
                'category' => 'community',
                'duration' => 78,
                'fee' => 12000.00,
                'study_mode' => 'On Campus',
                'intake_months' => 'February, June, October',
                'location' => 'Sydney, Melbourne, Brisbane',
                'cricos_code' => '03460N',
                'curriculum' => 'The Diploma of Early Childhood Education prepares students to work with children from birth to 6 years. Students will learn about child development, curriculum planning, health and safety, and educational practices.',
                'core_units' => [
                    'Child development and pedagogy',
                    'Curriculum planning and implementation',
                    'Health and safety in early childhood',
                    'Family and community partnerships',
                    'Early childhood teaching practices',
                    'Leadership in early childhood',
                ],
                'elective_units' => [
                    'Special needs education',
                    'Indigenous perspectives',
                    'Creative arts for children',
                    'Science and math for young children',
                    'Language and literacy development',
                ],
                'career_outcomes' => [
                    'Early Childhood Educator',
                    'Childcare Centre Manager',
                    'Family Day Care Educator',
                    'Kindergarten Teacher',
                    'Early Childhood Coordinator',
                ],
                'entry_requirements' => "• Completion of Year 12 or equivalent\n• IELTS 6.0 or equivalent (for international students)\n• Working with Children Check\n• Minimum 18 years of age",
                'instructor' => 'Lisa Anderson',
                'is_published' => true,
            ],
            [
                'name' => 'Certificate IV in Programming',
                'slug' => 'certificate-iv-in-programming',
                'description' => 'Start your programming career with foundational skills in software development. Learn multiple programming languages and development methodologies.',
                'category' => 'it',
                'duration' => 26,
                'fee' => 7500.00,
                'study_mode' => 'On Campus / Online',
                'intake_months' => 'Monthly',
                'location' => 'Sydney, Melbourne',
                'cricos_code' => '03461P',
                'curriculum' => 'This certificate provides foundational programming skills for those starting their IT journey. Students will learn Python, JavaScript, HTML/CSS, and database fundamentals.',
                'core_units' => [
                    'Programming fundamentals',
                    'Web development basics',
                    'Database design',
                    'Software development lifecycle',
                    'Problem solving for programming',
                ],
                'elective_units' => [
                    'Mobile app development intro',
                    'Game development basics',
                    'Data visualization',
                    'API development',
                    'Version control',
                ],
                'career_outcomes' => [
                    'Junior Software Developer',
                    'Web Developer',
                    'Programming Assistant',
                    'Software Tester',
                    'IT Support Technician',
                ],
                'entry_requirements' => "• Completion of Year 10 or equivalent\n• IELTS 5.0 or equivalent (for international students)\n• Minimum 16 years of age",
                'instructor' => 'David Kim',
                'is_published' => true,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
