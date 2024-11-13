<?php

namespace Database\Seeders;

use App\Enums\GlobalUsage\Status;
use App\Models\UserManagement\Permission;
use App\Models\UserManagement\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        Permission::truncate();

        $roles = [
            [
                'title' => 'Super Admin',
                'description' => 'The highest level of authority with complete access to all system features and settings. Responsible for managing other administrators, overseeing user roles, and configuring system-wide settings to ensure optimal performance.'
            ],
            [
                'title' => 'Administrator',
                'description' => 'Manages day-to-day operations of the system, including user management and content moderation. Has authority to add or remove users, assign roles, and configure site settings to maintain a secure and efficient environment for users.'
            ],
            [
                'title' => 'Moderator',
                'description' => 'Oversees user interactions and monitors content for compliance with community guidelines. Addresses user reports and ensures a safe and respectful environment for all members, fostering positive engagement across the platform.'
            ],
            [
                'title' => 'Editor',
                'description' => 'Responsible for curating and managing content on the platform, publishing articles, and reviewing submissions from contributors. Coordinates with authors to ensure quality content that aligns with the platform’s standards and goals.'
            ],
            [
                'title' => 'Analyst',
                'description' => 'Focuses on data analysis and generating reports to provide insights on user engagement and content performance. Utilizes metrics and statistics to help improve the platform, making data-driven decisions to enhance user experience.'
            ],
            [
                'title' => 'Contributor',
                'description' => 'Can submit content for review but lacks publishing rights. Collaborates with editors to refine submissions, ensuring quality before publication, and may also engage with the community to provide feedback and ideas for improvement.'
            ],
            [
                'title' => 'Author',
                'description' => 'Has the ability to create and publish their own content. Authors can manage their posts, respond to comments, and engage with readers, while also collaborating with editors to maintain quality and relevance in their submissions.'
            ],
            [
                'title' => 'Coordinator',
                'description' => 'Provides essential support for user inquiries and assists with issues related to the platform. Coordinators are responsible for ensuring that users receive timely assistance, helping to maintain a positive experience throughout the site.'
            ],
            [
                'title' => 'Member',
                'description' => 'A registered user of the platform with basic access rights. Members can interact with content, leave comments, and participate in discussions, but do not have administrative privileges or access to backend system functionalities.'
            ],
            [
                'title' => 'Subscriber',
                'description' => 'A user who has opted to receive updates and notifications from the platform. Subscribers typically have access to exclusive content and are engaged in community activities, enjoying a personalized experience tailored to their preferences.'
            ]
        ];

        foreach ($roles as $key => $role) {
            $role['slug'] = Str::slug($role['title']);
            $role['status'] = Status::ENABLE;
            Role::create($role);
        }
    }
}
