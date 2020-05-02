<?php

use App\Option;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class OptionsTableSeeder extends Seeder
{
    public function run()
    {

        Option::truncate();

        Option::create(['type' => 'types', 'code' => 'types', 'text_ar' => 'تصنيفات الخيارات', 'text_en' => 'Options Types']);


        Option::create(['type' => 'types', 'code' => 'roles', 'text_ar' => 'ادوار المستخدمين', 'text_en' => 'Roles']);
        Option::create(['type' => 'roles', 'code' => 'admin', 'text_ar' => 'مدير الموقع', 'text_en' => 'Admin']);
        Option::create(['type' => 'roles', 'code' => 'entry', 'text_ar' => 'مدخل بيانات', 'text_en' => 'Data Entry']);
        Option::create(['type' => 'roles', 'code' => 'user', 'text_ar' => 'مستخدم', 'text_en' => 'User']);

        Option::create(['type' => 'types', 'code' => 'answers', 'text_ar' => 'الإجابات', 'text_en' => 'Answers']);
        Option::create(['type' => 'answers', 'code' => '1', 'text_ar' => 'نعم ', 'text_en' => 'Yes']);
        Option::create(['type' => 'answers', 'code' => '0', 'text_ar' => 'لا', 'text_en' => 'No']);


        Option::create(['type' => 'types', 'code' => 'genders', 'text_ar' => 'الأجناس', 'text_en' => 'Genders']);
        Option::create(['type' => 'genders', 'code' => 'M', 'text_ar' => 'ذكر', 'text_en' => 'Male']);
        Option::create(['type' => 'genders', 'code' => 'F', 'text_ar' => 'أنثى', 'text_en' => 'Female']);

        Option::create(['type' => 'types', 'code' => 'orders_status', 'text_ar' => 'حالات الطلبات', 'text_en' => 'Orders Status']);
        Option::create(['type' => 'orders_status', 'code' => 'pending', 'text_ar' => 'معلق', 'text_en' => 'Pending']);
        Option::create(['type' => 'orders_status', 'code' => 'preparing', 'text_ar' => 'جاري التجهيز', 'text_en' => 'Preparing']);
        Option::create(['type' => 'orders_status', 'code' => 'delivering', 'text_ar' => 'جاري التوصيل', 'text_en' => 'Delivering']);
        Option::create(['type' => 'orders_status', 'code' => 'delivered', 'text_ar' => 'تم التوصيل', 'text_en' => 'Delivered']);
        Option::create(['type' => 'orders_status', 'code' => 'canceled', 'text_ar' => 'تم الالغاء', 'text_en' => 'Canceled']);


        Option::create(['type' => 'types', 'code' => 'filters_types', 'text_ar' => 'انواع الفلاتر', 'text_en' => 'Filters Types']);
        Option::create(['type' => 'filters_types', 'code' => 'select', 'text_ar' => 'قائمة منسدلة', 'text_en' => 'Select']);
        Option::create(['type' => 'filters_types', 'code' => 'multiple', 'text_ar' => 'عدة خيارات', 'text_en' => 'Multiple']);

        Option::create(['type' => 'types', 'code' => 'nationalities', 'text_ar' => 'الجنسيات', 'text_en' => 'Nationalities']);
        Option::create(['type' => 'nationalities', 'code' => 'AF', 'text_ar' => 'أفغانستاني', 'text_en' => 'Afghan']);
        Option::create(['type' => 'nationalities', 'code' => 'BD', 'text_ar' => 'بنغلاديشي', 'text_en' => 'Bangladeshi']);
        Option::create(['type' => 'nationalities', 'code' => 'DJ', 'text_ar' => 'جيبوتي', 'text_en' => 'Djiboutian']);
        Option::create(['type' => 'nationalities', 'code' => 'EG', 'text_ar' => 'مصري', 'text_en' => 'Egyptian']);
        Option::create(['type' => 'nationalities', 'code' => 'ET', 'text_ar' => 'أثيوبي', 'text_en' => 'Ethiopian']);
        Option::create(['type' => 'nationalities', 'code' => 'IN', 'text_ar' => 'هندي', 'text_en' => 'Indian']);
        Option::create(['type' => 'nationalities', 'code' => 'ID', 'text_ar' => 'أندونيسيي', 'text_en' => 'Indonesian']);
        Option::create(['type' => 'nationalities', 'code' => 'JO', 'text_ar' => 'أردني', 'text_en' => 'Jordanian']);
        Option::create(['type' => 'nationalities', 'code' => 'LB', 'text_ar' => 'لبناني', 'text_en' => 'Lebanese']);
        Option::create(['type' => 'nationalities', 'code' => 'MA', 'text_ar' => 'مغربي', 'text_en' => 'Moroccan']);
        Option::create(['type' => 'nationalities', 'code' => 'MM', 'text_ar' => 'ميانماري', 'text_en' => 'Myanmarian']);
        Option::create(['type' => 'nationalities', 'code' => 'PK', 'text_ar' => 'باكستاني', 'text_en' => 'Pakistani']);
        Option::create(['type' => 'nationalities', 'code' => 'PS', 'text_ar' => 'فلسطيني', 'text_en' => 'Palestinian']);
        Option::create(['type' => 'nationalities', 'code' => 'PH', 'text_ar' => 'فلبيني', 'text_en' => 'Filipino']);
        Option::create(['type' => 'nationalities', 'code' => 'SA', 'text_ar' => 'سعودي', 'text_en' => 'Saudi Arabian']);
        Option::create(['type' => 'nationalities', 'code' => 'SO', 'text_ar' => 'صومالي', 'text_en' => 'Somali']);
        Option::create(['type' => 'nationalities', 'code' => 'ZA', 'text_ar' => 'أفريقي', 'text_en' => 'South African']);
        Option::create(['type' => 'nationalities', 'code' => 'SY', 'text_ar' => 'سوري', 'text_en' => 'Syrian']);
        Option::create(['type' => 'nationalities', 'code' => 'TJ', 'text_ar' => 'طاجيكستاني', 'text_en' => 'Tajikistani']);
        Option::create(['type' => 'nationalities', 'code' => 'TN', 'text_ar' => 'تونسي', 'text_en' => 'Tunisian']);
        Option::create(['type' => 'nationalities', 'code' => 'TR', 'text_ar' => 'تركي', 'text_en' => 'Turkish']);
        Option::create(['type' => 'nationalities', 'code' => 'AE', 'text_ar' => 'إماراتي', 'text_en' => 'Emirati']);
        Option::create(['type' => 'nationalities', 'code' => 'YE', 'text_ar' => 'يمني', 'text_en' => 'Yemeni']);

        Option::create(['type' => 'types', 'code' => 'districts_types', 'text_ar' => 'أنواع المناطق', 'text_en' => 'Districts Types']);
        Option::create(['type' => 'districts_types', 'code' => 'city', 'text_ar' => 'مدينة', 'text_en' => 'City']);
        Option::create(['type' => 'districts_types', 'code' => 'neighborhood', 'text_ar' => 'حي', 'text_en' => 'Neighborhood']);
        Option::create(['type' => 'districts_types', 'code' => 'province', 'text_ar' => 'محافظة', 'text_en' => 'Province']);

        Option::create(['type' => 'types', 'code' => 'contacts_types', 'text_ar' => 'أنواع وسائل التواصل', 'text_en' => 'Contacts Types']);
        Option::create(['type' => 'contacts_types', 'code' => 'phone', 'text_ar' => 'هاتف', 'text_en' => 'Phone']);
        Option::create(['type' => 'contacts_types', 'code' => 'mobile', 'text_ar' => 'جوال', 'text_en' => 'Mobile']);
        Option::create(['type' => 'contacts_types', 'code' => 'email', 'text_ar' => 'بريد الكتروني', 'text_en' => 'Email']);

        Option::create(['type' => 'types', 'code' => 'socials_types', 'text_ar' => 'منصات التواصل', 'text_en' => 'Social Types']);
        Option::create(['type' => 'socials_types', 'code' => 'facebook', 'text_ar' => 'فيسبوك', 'text_en' => 'Facebook']);
        Option::create(['type' => 'socials_types', 'code' => 'youtube', 'text_ar' => 'يوتيوب', 'text_en' => 'Youtube']);
        Option::create(['type' => 'socials_types', 'code' => 'twitter', 'text_ar' => 'تويتر', 'text_en' => 'Twitter']);
        Option::create(['type' => 'socials_types', 'code' => 'linkedin', 'text_ar' => 'لينكد ان', 'text_en' => 'Linked In']);
        Option::create(['type' => 'socials_types', 'code' => 'instagram', 'text_ar' => 'انستغرام', 'text_en' => 'Instagram']);
        Option::create(['type' => 'socials_types', 'code' => 'snapchat', 'text_ar' => 'سناب شات', 'text_en' => 'Snapchat']);

    }
}