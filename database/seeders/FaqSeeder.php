<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::query()->delete();

        $faqs = [
            [
                'question' => [
                    'en' => 'What standard do you follow?',
                    'ar' => 'ما المعيار الذي تلتزمون به؟',
                ],
                'answer' => [
                    'en' => 'We comply with SASO ASTM 615 standards for all reinforcing steel products.',
                    'ar' => 'نلتزم بمعايير SASO ASTM 615 لجميع منتجات حديد التسليح.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
            [
                'question' => [
                    'en' => 'What certifications does the company hold?',
                    'ar' => 'ما هي الشهادات التي تحملها الشركة؟',
                ],
                'answer' => [
                    'en' => 'ISO 9001, ISO 45001, ISO 14001, ISO 50001, SASO 615 certification, and SIRI evaluation approval.',
                    'ar' => 'ISO 9001، ISO 45001، ISO 14001، ISO 50001، شهادة SASO 615، واعتماد تقييم SIRI.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
            [
                'question' => [
                    'en' => 'Are your products approved within the Kingdom?',
                    'ar' => 'هل منتجاتكم معتمدة داخل المملكة؟',
                ],
                'answer' => [
                    'en' => 'Yes, our products are officially approved by most authorities and projects and underwent rigorous testing to ensure compliance.',
                    'ar' => 'نعم، منتجاتنا معتمدة رسمياً من معظم الجهات والمشاريع وقد خضعت لاختبارات صارمة لضمان الامتثال.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
            [
                'question' => [
                    'en' => 'Where is the factory located?',
                    'ar' => 'أين يقع المصنع؟',
                ],
                'answer' => [
                    'en' => 'Riyadh – Second Industrial City, Kingdom of Saudi Arabia.',
                    'ar' => 'الرياض – المدينة الصناعية الثانية، المملكة العربية السعودية.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
            [
                'question' => [
                    'en' => 'Do you provide supply for major projects?',
                    'ar' => 'هل توفرون التوريد للمشاريع الكبرى؟',
                ],
                'answer' => [
                    'en' => 'Yes, the company is fully capable of meeting the requirements of major projects through an efficient logistics system.',
                    'ar' => 'نعم، الشركة قادرة بالكامل على تلبية متطلبات المشاريع الكبرى من خلال نظام لوجستي فعال.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
