<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegionalOffice;

class RegionalOfficeSeeder extends Seeder
{
    public function run(): void
    {
        $offices = [
            [
                'slug' => 'tashkent-city',
                'region_code' => 'UZ-TK',
                'name' => ['ru' => 'Ташкентский филиал', 'uz' => 'Toshkent filiali', 'en' => 'Tashkent City Branch'],
                'address' => ['ru' => 'г. Ташкент, ул. Бобур, 12', 'uz' => 'Toshkent sh., Bobur ko\'ch., 12', 'en' => '12 Bobur St, Tashkent'],
                'phone' => '+998 71 200-00-01',
                'email' => 'tashkent@uzex.uz',
                'manager_name' => ['ru' => 'Алиев Расул Бахтиёрович', 'uz' => 'Aliyev Rasul Baxtiyorovich', 'en' => 'Rasul Aliyev'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 41.311081,
                'longitude' => 69.240562,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'slug' => 'samarkand',
                'region_code' => 'UZ-SA',
                'name' => ['ru' => 'Самаркандский филиал', 'uz' => 'Samarqand filiali', 'en' => 'Samarkand Branch'],
                'address' => ['ru' => 'г. Самарканд, ул. Регистан, 5', 'uz' => 'Samarqand sh., Registon ko\'ch., 5', 'en' => '5 Registan St, Samarkand'],
                'phone' => '+998 66 233-00-01',
                'email' => 'samarkand@uzex.uz',
                'manager_name' => ['ru' => 'Норов Бахром Шавкатович', 'uz' => 'Norov Baxrom Shavkatovich', 'en' => 'Bakhrom Norov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 39.654167,
                'longitude' => 66.959722,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'slug' => 'bukhara',
                'region_code' => 'UZ-BU',
                'name' => ['ru' => 'Бухарский филиал', 'uz' => 'Buxoro filiali', 'en' => 'Bukhara Branch'],
                'address' => ['ru' => 'г. Бухара, ул. Накшбанди, 10', 'uz' => 'Buxoro sh., Naqshbandiy ko\'ch., 10', 'en' => '10 Naqshbandi St, Bukhara'],
                'phone' => '+998 65 224-00-01',
                'email' => 'bukhara@uzex.uz',
                'manager_name' => ['ru' => 'Умаров Фаррух Шухратович', 'uz' => 'Umarov Farrux Shuxratovich', 'en' => 'Farrukh Umarov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 39.774722,
                'longitude' => 64.428611,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'slug' => 'navoi',
                'region_code' => 'UZ-NW',
                'name' => ['ru' => 'Навоийский филиал', 'uz' => 'Navoiy filiali', 'en' => 'Navoi Branch'],
                'address' => ['ru' => 'г. Навои, ул. Ислама Каримова, 25', 'uz' => 'Navoiy sh., Islom Karimov ko\'ch., 25', 'en' => '25 Islam Karimov St, Navoi'],
                'phone' => '+998 79 221-00-11',
                'email' => 'navoi@uzex.uz',
                'manager_name' => ['ru' => 'Эргашев Сардор Олимович', 'uz' => 'Ergashev Sardor Olimovich', 'en' => 'Sardor Ergashev'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 40.103922,
                'longitude' => 65.373506,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'slug' => 'fergana',
                'region_code' => 'UZ-FA',
                'name' => ['ru' => 'Ферганский филиал', 'uz' => 'Farg\'ona filiali', 'en' => 'Fergana Branch'],
                'address' => ['ru' => 'г. Фергана, ул. Навои, 20', 'uz' => 'Farg\'ona sh., Navoiy ko\'ch., 20', 'en' => '20 Navoi St, Fergana'],
                'phone' => '+998 73 244-00-01',
                'email' => 'fergana@uzex.uz',
                'manager_name' => ['ru' => 'Абдуллаев Улугбек Каримович', 'uz' => 'Abdullayev Ulug\'bek Karimovich', 'en' => 'Ulugbek Abdullaev'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 40.386389,
                'longitude' => 71.786389,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'slug' => 'namangan',
                'region_code' => 'UZ-NG',
                'name' => ['ru' => 'Наманганский филиал', 'uz' => 'Namangan filiali', 'en' => 'Namangan Branch'],
                'address' => ['ru' => 'г. Наманган, ул. Бобура, 15', 'uz' => 'Namangan sh., Bobur ko\'ch., 15', 'en' => '15 Bobur St, Namangan'],
                'phone' => '+998 69 227-01-01',
                'email' => 'namangan@uzex.uz',
                'manager_name' => ['ru' => 'Юлдашев Тимур Акмалович', 'uz' => 'Yuldashev Timur Akmalovich', 'en' => 'Timur Yuldashev'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 40.998333,
                'longitude' => 71.6725,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 6
            ],
            [
                'slug' => 'andijan',
                'region_code' => 'UZ-AN',
                'name' => ['ru' => 'Андижанский филиал', 'uz' => 'Andijon filiali', 'en' => 'Andijan Branch'],
                'address' => ['ru' => 'г. Андижан, проспект А.Темура, 30', 'uz' => 'Andijon sh., A.Temur shox ko\'ch., 30', 'en' => '30 A. Temur Ave, Andijan'],
                'phone' => '+998 74 223-00-05',
                'email' => 'andijan@uzex.uz',
                'manager_name' => ['ru' => 'Мамадов Камол Саидович', 'uz' => 'Mamadov Kamol Saidovich', 'en' => 'Kamol Mamadov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 40.783333,
                'longitude' => 72.35,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 7
            ],
            [
                'slug' => 'jizzakh',
                'region_code' => 'UZ-JI',
                'name' => ['ru' => 'Джизакский филиал', 'uz' => 'Jizzax filiali', 'en' => 'Jizzakh Branch'],
                'address' => ['ru' => 'г. Джизак, ул. Ш.Рашидова, 1', 'uz' => 'Jizzax sh., Sh.Rashidov ko\'ch., 1', 'en' => '1 Sh. Rashidov St, Jizzakh'],
                'phone' => '+998 72 226-00-10',
                'email' => 'jizzakh@uzex.uz',
                'manager_name' => ['ru' => 'Касимов Азиз Муратович', 'uz' => 'Kasimov Aziz Muratovich', 'en' => 'Aziz Kasimov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 40.115833,
                'longitude' => 67.842222,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 8
            ],
            [
                'slug' => 'kashkadarya',
                'region_code' => 'UZ-QA',
                'name' => ['ru' => 'Кашкадарьинский филиал', 'uz' => 'Qashqadaryo filiali', 'en' => 'Kashkadarya Branch'],
                'address' => ['ru' => 'г. Карши, ул. Ислама Каримова, 12', 'uz' => 'Qarshi sh., Islom Karimov ko\'ch., 12', 'en' => '12 Islam Karimov St, Karshi'],
                'phone' => '+998 75 221-00-20',
                'email' => 'kashkadarya@uzex.uz',
                'manager_name' => ['ru' => 'Сафаров Дилшод Рахимович', 'uz' => 'Safarov Dilshod Raximovich', 'en' => 'Dilshod Safarov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 38.860556,
                'longitude' => 65.789167,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 9
            ],
            [
                'slug' => 'surkhandarya',
                'region_code' => 'UZ-SU',
                'name' => ['ru' => 'Сурхандарьинский филиал', 'uz' => 'Surxondaryo filiali', 'en' => 'Surkhandarya Branch'],
                'address' => ['ru' => 'г. Термез, ул. ат-Термизи, 15', 'uz' => 'Termiz sh., at-Termiziy ko\'ch., 15', 'en' => '15 at-Termizi St, Termez'],
                'phone' => '+998 76 224-00-30',
                'email' => 'surkhandarya@uzex.uz',
                'manager_name' => ['ru' => 'Рахимов Олим Абдуллаевич', 'uz' => 'Raximov Olim Abdullayevich', 'en' => 'Olim Rakhimov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 37.224167,
                'longitude' => 67.278333,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 10
            ],
            [
                'slug' => 'syrdarya',
                'region_code' => 'UZ-SI',
                'name' => ['ru' => 'Сырдарьинский филиал', 'uz' => 'Sirdaryo filiali', 'en' => 'Syrdarya Branch'],
                'address' => ['ru' => 'г. Гулистан, ул. Мустакиллик, 8', 'uz' => 'Guliston sh., Mustaqillik ko\'ch., 8', 'en' => '8 Mustaqillik St, Gulistan'],
                'phone' => '+998 67 225-00-40',
                'email' => 'syrdarya@uzex.uz',
                'manager_name' => ['ru' => 'Хасанов Мурод Давлатович', 'uz' => 'Xasanov Murod Davlatovich', 'en' => 'Murod Khasanov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 40.489722,
                'longitude' => 68.784167,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 11
            ],
            [
                'slug' => 'khorezm',
                'region_code' => 'UZ-KH',
                'name' => ['ru' => 'Хорезмский филиал', 'uz' => 'Xorezm filiali', 'en' => 'Khorezm Branch'],
                'address' => ['ru' => 'г. Ургенч, ул. Аль-Хорезми, 10', 'uz' => 'Urganch sh., Al-Xorazmiy ko\'ch., 10', 'en' => '10 Al-Khorezmi St, Urgench'],
                'phone' => '+998 62 223-00-50',
                'email' => 'khorezm@uzex.uz',
                'manager_name' => ['ru' => 'Матякубов Бахром Атаханович', 'uz' => 'Matyakubov Baxrom Ataxanovich', 'en' => 'Bakhrom Matyakubov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 41.55,
                'longitude' => 60.633333,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 12
            ],
            [
                'slug' => 'karakalpakstan',
                'region_code' => 'UZ-QR',
                'name' => ['ru' => 'Филиал Республики Каракалпакстан', 'uz' => 'Qoraqalpog\'iston filiali', 'en' => 'Karakalpakstan Branch'],
                'address' => ['ru' => 'г. Нукус, ул. Досназарова, 1', 'uz' => 'Nukus sh., Dosnazarov ko\'ch., 1', 'en' => '1 Dosnazarov St, Nukus'],
                'phone' => '+998 61 222-00-60',
                'email' => 'karakalpakstan@uzex.uz',
                'manager_name' => ['ru' => 'Алланиязов Муратбай', 'uz' => 'Allaniyazov Muratbay', 'en' => 'Muratbay Allaniyazov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 42.463333,
                'longitude' => 59.601389,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 13
            ],
            [
                'slug' => 'tashkent-region',
                'region_code' => 'UZ-TO',
                'name' => ['ru' => 'Филиал Ташкентской области', 'uz' => 'Toshkent viloyat filiali', 'en' => 'Tashkent Region Branch'],
                'address' => ['ru' => 'Ташкентская обл., г. Чирчик, ул. Навои, 5', 'uz' => 'Toshkent vil., Chirchiq sh., Navoiy ko\'ch., 5', 'en' => '5 Navoi St, Chirchiq'],
                'phone' => '+998 70 715-00-70',
                'email' => 'tashkent_region@uzex.uz',
                'manager_name' => ['ru' => 'Исаков Музаффар', 'uz' => 'Isakov Muzaffar', 'en' => 'Muzaffar Isakov'],
                'manager_position' => ['ru' => 'Директор филиала', 'uz' => 'Filial direktori', 'en' => 'Branch Director'],
                'latitude' => 41.468889,
                'longitude' => 69.582222,
                'working_hours' => ['ru' => 'Пн-Пт: 09:00 - 18:00', 'uz' => 'Dush-Jum: 09:00 - 18:00', 'en' => 'Mon-Fri: 09:00 - 18:00'],
                'is_active' => true,
                'sort_order' => 14
            ],
        ];

        foreach ($offices as $o) {
            RegionalOffice::updateOrCreate(['slug' => $o['slug']], $o);
        }
    }
}
