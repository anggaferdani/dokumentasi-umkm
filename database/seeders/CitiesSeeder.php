<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('cities')->delete();

        DB::table('cities')->insert(array (
            0 =>
            array (
                'id' => 1,
                'city_id' => 1101,
                'city_name' => 'KAB. ACEH SELATAN',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'city_id' => 1102,
                'city_name' => 'KAB. ACEH TENGGARA',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'city_id' => 1103,
                'city_name' => 'KAB. ACEH TIMUR',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'city_id' => 1104,
                'city_name' => 'KAB. ACEH TENGAH',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'city_id' => 1105,
                'city_name' => 'KAB. ACEH BARAT',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'city_id' => 1106,
                'city_name' => 'KAB. ACEH BESAR',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'city_id' => 1107,
                'city_name' => 'KAB. PIDIE',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'city_id' => 1108,
                'city_name' => 'KAB. ACEH UTARA',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'city_id' => 1109,
                'city_name' => 'KAB. SIMEULUE',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'city_id' => 1110,
                'city_name' => 'KAB. ACEH SINGKIL',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'city_id' => 1111,
                'city_name' => 'KAB. BIREUEN',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'city_id' => 1112,
                'city_name' => 'KAB. ACEH BARAT DAYA',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'city_id' => 1113,
                'city_name' => 'KAB. GAYO LUES',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'city_id' => 1114,
                'city_name' => 'KAB. ACEH JAYA',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'city_id' => 1115,
                'city_name' => 'KAB. NAGAN RAYA',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array (
                'id' => 16,
                'city_id' => 1116,
                'city_name' => 'KAB. ACEH TAMIANG',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 =>
            array (
                'id' => 17,
                'city_id' => 1117,
                'city_name' => 'KAB. BENER MERIAH',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 =>
            array (
                'id' => 18,
                'city_id' => 1118,
                'city_name' => 'KAB. PIDIE JAYA',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 =>
            array (
                'id' => 19,
                'city_id' => 1171,
                'city_name' => 'KOTA BANDA ACEH',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 =>
            array (
                'id' => 20,
                'city_id' => 1172,
                'city_name' => 'KOTA SABANG',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 =>
            array (
                'id' => 21,
                'city_id' => 1173,
                'city_name' => 'KOTA LHOKSEUMAWE',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 =>
            array (
                'id' => 22,
                'city_id' => 1174,
                'city_name' => 'KOTA LANGSA',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 =>
            array (
                'id' => 23,
                'city_id' => 1175,
                'city_name' => 'KOTA SUBULUSSALAM',
                'prov_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 =>
            array (
                'id' => 24,
                'city_id' => 1201,
                'city_name' => 'KAB. TAPANULI TENGAH',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 =>
            array (
                'id' => 25,
                'city_id' => 1202,
                'city_name' => 'KAB. TAPANULI UTARA',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 =>
            array (
                'id' => 26,
                'city_id' => 1203,
                'city_name' => 'KAB. TAPANULI SELATAN',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 =>
            array (
                'id' => 27,
                'city_id' => 1204,
                'city_name' => 'KAB. NIAS',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 =>
            array (
                'id' => 28,
                'city_id' => 1205,
                'city_name' => 'KAB. LANGKAT',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 =>
            array (
                'id' => 29,
                'city_id' => 1206,
                'city_name' => 'KAB. KARO',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 =>
            array (
                'id' => 30,
                'city_id' => 1207,
                'city_name' => 'KAB. DELI SERDANG',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 =>
            array (
                'id' => 31,
                'city_id' => 1208,
                'city_name' => 'KAB. SIMALUNGUN',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 =>
            array (
                'id' => 32,
                'city_id' => 1209,
                'city_name' => 'KAB. ASAHAN',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 =>
            array (
                'id' => 33,
                'city_id' => 1210,
                'city_name' => 'KAB. LABUHANBATU',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 =>
            array (
                'id' => 34,
                'city_id' => 1211,
                'city_name' => 'KAB. DAIRI',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 =>
            array (
                'id' => 35,
                'city_id' => 1212,
                'city_name' => 'KAB. TOBA',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 =>
            array (
                'id' => 36,
                'city_id' => 1213,
                'city_name' => 'KAB. MANDAILING NATAL',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 =>
            array (
                'id' => 37,
                'city_id' => 1214,
                'city_name' => 'KAB. NIAS SELATAN',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 =>
            array (
                'id' => 38,
                'city_id' => 1215,
                'city_name' => 'KAB. PAKPAK BHARAT',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 =>
            array (
                'id' => 39,
                'city_id' => 1216,
                'city_name' => 'KAB. HUMBANG HASUNDUTAN',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 =>
            array (
                'id' => 40,
                'city_id' => 1217,
                'city_name' => 'KAB. SAMOSIR',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 =>
            array (
                'id' => 41,
                'city_id' => 1218,
                'city_name' => 'KAB. SERDANG BEDAGAI',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 =>
            array (
                'id' => 42,
                'city_id' => 1219,
                'city_name' => 'KAB. BATU BARA',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 =>
            array (
                'id' => 43,
                'city_id' => 1220,
                'city_name' => 'KAB. PADANG LAWAS UTARA',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 =>
            array (
                'id' => 44,
                'city_id' => 1221,
                'city_name' => 'KAB. PADANG LAWAS',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 =>
            array (
                'id' => 45,
                'city_id' => 1222,
                'city_name' => 'KAB. LABUHANBATU SELATAN',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 =>
            array (
                'id' => 46,
                'city_id' => 1223,
                'city_name' => 'KAB. LABUHANBATU UTARA',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 =>
            array (
                'id' => 47,
                'city_id' => 1224,
                'city_name' => 'KAB. NIAS UTARA',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 =>
            array (
                'id' => 48,
                'city_id' => 1225,
                'city_name' => 'KAB. NIAS BARAT',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 =>
            array (
                'id' => 49,
                'city_id' => 1271,
                'city_name' => 'KOTA MEDAN',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 =>
            array (
                'id' => 50,
                'city_id' => 1272,
                'city_name' => 'KOTA PEMATANGSIANTAR',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 =>
            array (
                'id' => 51,
                'city_id' => 1273,
                'city_name' => 'KOTA SIBOLGA',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 =>
            array (
                'id' => 52,
                'city_id' => 1274,
                'city_name' => 'KOTA TANJUNG BALAI',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 =>
            array (
                'id' => 53,
                'city_id' => 1275,
                'city_name' => 'KOTA BINJAI',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 =>
            array (
                'id' => 54,
                'city_id' => 1276,
                'city_name' => 'KOTA TEBING TINGGI',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 =>
            array (
                'id' => 55,
                'city_id' => 1277,
                'city_name' => 'KOTA PADANGSIDIMPUAN',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 =>
            array (
                'id' => 56,
                'city_id' => 1278,
                'city_name' => 'KOTA GUNUNGSITOLI',
                'prov_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 =>
            array (
                'id' => 57,
                'city_id' => 1301,
                'city_name' => 'KAB. PESISIR SELATAN',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 =>
            array (
                'id' => 58,
                'city_id' => 1302,
                'city_name' => 'KAB. SOLOK',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 =>
            array (
                'id' => 59,
                'city_id' => 1303,
                'city_name' => 'KAB. SIJUNJUNG',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 =>
            array (
                'id' => 60,
                'city_id' => 1304,
                'city_name' => 'KAB. TANAH DATAR',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 =>
            array (
                'id' => 61,
                'city_id' => 1305,
                'city_name' => 'KAB. PADANG PARIAMAN',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 =>
            array (
                'id' => 62,
                'city_id' => 1306,
                'city_name' => 'KAB. AGAM',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 =>
            array (
                'id' => 63,
                'city_id' => 1307,
                'city_name' => 'KAB. LIMA PULUH KOTA',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 =>
            array (
                'id' => 64,
                'city_id' => 1308,
                'city_name' => 'KAB. PASAMAN',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 =>
            array (
                'id' => 65,
                'city_id' => 1309,
                'city_name' => 'KAB. KEPULAUAN MENTAWAI',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 =>
            array (
                'id' => 66,
                'city_id' => 1310,
                'city_name' => 'KAB. DHARMASRAYA',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 =>
            array (
                'id' => 67,
                'city_id' => 1311,
                'city_name' => 'KAB. SOLOK SELATAN',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 =>
            array (
                'id' => 68,
                'city_id' => 1312,
                'city_name' => 'KAB. PASAMAN BARAT',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 =>
            array (
                'id' => 69,
                'city_id' => 1371,
                'city_name' => 'KOTA PADANG',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 =>
            array (
                'id' => 70,
                'city_id' => 1372,
                'city_name' => 'KOTA SOLOK',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 =>
            array (
                'id' => 71,
                'city_id' => 1373,
                'city_name' => 'KOTA SAWAHLUNTO',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 =>
            array (
                'id' => 72,
                'city_id' => 1374,
                'city_name' => 'KOTA PADANG PANJANG',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 =>
            array (
                'id' => 73,
                'city_id' => 1375,
                'city_name' => 'KOTA BUKITTINGGI',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 =>
            array (
                'id' => 74,
                'city_id' => 1376,
                'city_name' => 'KOTA PAYAKUMBUH',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 =>
            array (
                'id' => 75,
                'city_id' => 1377,
                'city_name' => 'KOTA PARIAMAN',
                'prov_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 =>
            array (
                'id' => 76,
                'city_id' => 1401,
                'city_name' => 'KAB. KAMPAR',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 =>
            array (
                'id' => 77,
                'city_id' => 1402,
                'city_name' => 'KAB. INDRAGIRI HULU',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 =>
            array (
                'id' => 78,
                'city_id' => 1403,
                'city_name' => 'KAB. BENGKALIS',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 =>
            array (
                'id' => 79,
                'city_id' => 1404,
                'city_name' => 'KAB. INDRAGIRI HILIR',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 =>
            array (
                'id' => 80,
                'city_id' => 1405,
                'city_name' => 'KAB. PELALAWAN',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 =>
            array (
                'id' => 81,
                'city_id' => 1406,
                'city_name' => 'KAB. ROKAN HULU',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 =>
            array (
                'id' => 82,
                'city_id' => 1407,
                'city_name' => 'KAB. ROKAN HILIR',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 =>
            array (
                'id' => 83,
                'city_id' => 1408,
                'city_name' => 'KAB. SIAK',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 =>
            array (
                'id' => 84,
                'city_id' => 1409,
                'city_name' => 'KAB. KUANTAN SINGINGI',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 =>
            array (
                'id' => 85,
                'city_id' => 1410,
                'city_name' => 'KAB. KEPULAUAN MERANTI',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 =>
            array (
                'id' => 86,
                'city_id' => 1471,
                'city_name' => 'KOTA PEKANBARU',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 =>
            array (
                'id' => 87,
                'city_id' => 1472,
                'city_name' => 'KOTA DUMAI',
                'prov_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 =>
            array (
                'id' => 88,
                'city_id' => 1501,
                'city_name' => 'KAB. KERINCI',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 =>
            array (
                'id' => 89,
                'city_id' => 1502,
                'city_name' => 'KAB. MERANGIN',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 =>
            array (
                'id' => 90,
                'city_id' => 1503,
                'city_name' => 'KAB. SAROLANGUN',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 =>
            array (
                'id' => 91,
                'city_id' => 1504,
                'city_name' => 'KAB. BATANGHARI',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 =>
            array (
                'id' => 92,
                'city_id' => 1505,
                'city_name' => 'KAB. MUARO JAMBI',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 =>
            array (
                'id' => 93,
                'city_id' => 1506,
                'city_name' => 'KAB. TANJUNG JABUNG BARAT',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 =>
            array (
                'id' => 94,
                'city_id' => 1507,
                'city_name' => 'KAB. TANJUNG JABUNG TIMUR',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 =>
            array (
                'id' => 95,
                'city_id' => 1508,
                'city_name' => 'KAB. BUNGO',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 =>
            array (
                'id' => 96,
                'city_id' => 1509,
                'city_name' => 'KAB. TEBO',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 =>
            array (
                'id' => 97,
                'city_id' => 1571,
                'city_name' => 'KOTA JAMBI',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 =>
            array (
                'id' => 98,
                'city_id' => 1572,
                'city_name' => 'KOTA SUNGAI PENUH',
                'prov_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 =>
            array (
                'id' => 99,
                'city_id' => 1601,
                'city_name' => 'KAB. OGAN KOMERING ULU',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 =>
            array (
                'id' => 100,
                'city_id' => 1602,
                'city_name' => 'KAB. OGAN KOMERING ILIR',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 =>
            array (
                'id' => 101,
                'city_id' => 1603,
                'city_name' => 'KAB. MUARA ENIM',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 =>
            array (
                'id' => 102,
                'city_id' => 1604,
                'city_name' => 'KAB. LAHAT',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 =>
            array (
                'id' => 103,
                'city_id' => 1605,
                'city_name' => 'KAB. MUSI RAWAS',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 =>
            array (
                'id' => 104,
                'city_id' => 1606,
                'city_name' => 'KAB. MUSI BANYUASIN',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 =>
            array (
                'id' => 105,
                'city_id' => 1607,
                'city_name' => 'KAB. BANYUASIN',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 =>
            array (
                'id' => 106,
                'city_id' => 1608,
                'city_name' => 'KAB. OGAN KOMERING ULU TIMUR',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 =>
            array (
                'id' => 107,
                'city_id' => 1609,
                'city_name' => 'KAB. OGAN KOMERING ULU SELATAN',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 =>
            array (
                'id' => 108,
                'city_id' => 1610,
                'city_name' => 'KAB. OGAN ILIR',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 =>
            array (
                'id' => 109,
                'city_id' => 1611,
                'city_name' => 'KAB. EMPAT LAWANG',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 =>
            array (
                'id' => 110,
                'city_id' => 1612,
                'city_name' => 'KAB. PENUKAL ABAB LEMATANG ILIR',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 =>
            array (
                'id' => 111,
                'city_id' => 1613,
                'city_name' => 'KAB. MUSI RAWAS UTARA',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 =>
            array (
                'id' => 112,
                'city_id' => 1671,
                'city_name' => 'KOTA PALEMBANG',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 =>
            array (
                'id' => 113,
                'city_id' => 1672,
                'city_name' => 'KOTA PAGAR ALAM',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 =>
            array (
                'id' => 114,
                'city_id' => 1673,
                'city_name' => 'KOTA LUBUK LINGGAU',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 =>
            array (
                'id' => 115,
                'city_id' => 1674,
                'city_name' => 'KOTA PRABUMULIH',
                'prov_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 =>
            array (
                'id' => 116,
                'city_id' => 1701,
                'city_name' => 'KAB. BENGKULU SELATAN',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 =>
            array (
                'id' => 117,
                'city_id' => 1702,
                'city_name' => 'KAB. REJANG LEBONG',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 =>
            array (
                'id' => 118,
                'city_id' => 1703,
                'city_name' => 'KAB. BENGKULU UTARA',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 =>
            array (
                'id' => 119,
                'city_id' => 1704,
                'city_name' => 'KAB. KAUR',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 =>
            array (
                'id' => 120,
                'city_id' => 1705,
                'city_name' => 'KAB. SELUMA',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 =>
            array (
                'id' => 121,
                'city_id' => 1706,
                'city_name' => 'KAB. MUKO MUKO',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 =>
            array (
                'id' => 122,
                'city_id' => 1707,
                'city_name' => 'KAB. LEBONG',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 =>
            array (
                'id' => 123,
                'city_id' => 1708,
                'city_name' => 'KAB. KEPAHIANG',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 =>
            array (
                'id' => 124,
                'city_id' => 1709,
                'city_name' => 'KAB. BENGKULU TENGAH',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 =>
            array (
                'id' => 125,
                'city_id' => 1771,
                'city_name' => 'KOTA BENGKULU',
                'prov_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 =>
            array (
                'id' => 126,
                'city_id' => 1801,
                'city_name' => 'KAB. LAMPUNG SELATAN',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 =>
            array (
                'id' => 127,
                'city_id' => 1802,
                'city_name' => 'KAB. LAMPUNG TENGAH',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 =>
            array (
                'id' => 128,
                'city_id' => 1803,
                'city_name' => 'KAB. LAMPUNG UTARA',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 =>
            array (
                'id' => 129,
                'city_id' => 1804,
                'city_name' => 'KAB. LAMPUNG BARAT',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 =>
            array (
                'id' => 130,
                'city_id' => 1805,
                'city_name' => 'KAB. TULANG BAWANG',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 =>
            array (
                'id' => 131,
                'city_id' => 1806,
                'city_name' => 'KAB. TANGGAMUS',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 =>
            array (
                'id' => 132,
                'city_id' => 1807,
                'city_name' => 'KAB. LAMPUNG TIMUR',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 =>
            array (
                'id' => 133,
                'city_id' => 1808,
                'city_name' => 'KAB. WAY KANAN',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 =>
            array (
                'id' => 134,
                'city_id' => 1809,
                'city_name' => 'KAB. PESAWARAN',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 =>
            array (
                'id' => 135,
                'city_id' => 1810,
                'city_name' => 'KAB. PRINGSEWU',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 =>
            array (
                'id' => 136,
                'city_id' => 1811,
                'city_name' => 'KAB. MESUJI',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 =>
            array (
                'id' => 137,
                'city_id' => 1812,
                'city_name' => 'KAB. TULANG BAWANG BARAT',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 =>
            array (
                'id' => 138,
                'city_id' => 1813,
                'city_name' => 'KAB. PESISIR BARAT',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 =>
            array (
                'id' => 139,
                'city_id' => 1871,
                'city_name' => 'KOTA BANDAR LAMPUNG',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 =>
            array (
                'id' => 140,
                'city_id' => 1872,
                'city_name' => 'KOTA METRO',
                'prov_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 =>
            array (
                'id' => 141,
                'city_id' => 1901,
                'city_name' => 'KAB. BANGKA',
                'prov_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 =>
            array (
                'id' => 142,
                'city_id' => 1902,
                'city_name' => 'KAB. BELITUNG',
                'prov_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 =>
            array (
                'id' => 143,
                'city_id' => 1903,
                'city_name' => 'KAB. BANGKA SELATAN',
                'prov_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 =>
            array (
                'id' => 144,
                'city_id' => 1904,
                'city_name' => 'KAB. BANGKA TENGAH',
                'prov_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 =>
            array (
                'id' => 145,
                'city_id' => 1905,
                'city_name' => 'KAB. BANGKA BARAT',
                'prov_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 =>
            array (
                'id' => 146,
                'city_id' => 1906,
                'city_name' => 'KAB. BELITUNG TIMUR',
                'prov_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 =>
            array (
                'id' => 147,
                'city_id' => 1971,
                'city_name' => 'KOTA PANGKAL PINANG',
                'prov_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 =>
            array (
                'id' => 148,
                'city_id' => 2101,
                'city_name' => 'KAB. BINTAN',
                'prov_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 =>
            array (
                'id' => 149,
                'city_id' => 2102,
                'city_name' => 'KAB. KARIMUN',
                'prov_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 =>
            array (
                'id' => 150,
                'city_id' => 2103,
                'city_name' => 'KAB. NATUNA',
                'prov_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 =>
            array (
                'id' => 151,
                'city_id' => 2104,
                'city_name' => 'KAB. LINGGA',
                'prov_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 =>
            array (
                'id' => 152,
                'city_id' => 2105,
                'city_name' => 'KAB. KEPULAUAN ANAMBAS',
                'prov_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 =>
            array (
                'id' => 153,
                'city_id' => 2171,
                'city_name' => 'KOTA BATAM',
                'prov_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 =>
            array (
                'id' => 154,
                'city_id' => 2172,
                'city_name' => 'KOTA TANJUNG PINANG',
                'prov_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 =>
            array (
                'id' => 155,
                'city_id' => 3101,
                'city_name' => 'KAB. ADM. KEP. SERIBU',
                'prov_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 =>
            array (
                'id' => 156,
                'city_id' => 3171,
                'city_name' => 'KOTA ADM. JAKARTA PUSAT',
                'prov_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 =>
            array (
                'id' => 157,
                'city_id' => 3172,
                'city_name' => 'KOTA ADM. JAKARTA UTARA',
                'prov_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 =>
            array (
                'id' => 158,
                'city_id' => 3173,
                'city_name' => 'KOTA ADM. JAKARTA BARAT',
                'prov_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 =>
            array (
                'id' => 159,
                'city_id' => 3174,
                'city_name' => 'KOTA ADM. JAKARTA SELATAN',
                'prov_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 =>
            array (
                'id' => 160,
                'city_id' => 3175,
                'city_name' => 'KOTA ADM. JAKARTA TIMUR',
                'prov_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 =>
            array (
                'id' => 161,
                'city_id' => 3201,
                'city_name' => 'KAB. BOGOR',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 =>
            array (
                'id' => 162,
                'city_id' => 3202,
                'city_name' => 'KAB. SUKABUMI',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 =>
            array (
                'id' => 163,
                'city_id' => 3203,
                'city_name' => 'KAB. CIANJUR',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 =>
            array (
                'id' => 164,
                'city_id' => 3204,
                'city_name' => 'KAB. BANDUNG',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 =>
            array (
                'id' => 165,
                'city_id' => 3205,
                'city_name' => 'KAB. GARUT',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 =>
            array (
                'id' => 166,
                'city_id' => 3206,
                'city_name' => 'KAB. TASIKMALAYA',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 =>
            array (
                'id' => 167,
                'city_id' => 3207,
                'city_name' => 'KAB. CIAMIS',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 =>
            array (
                'id' => 168,
                'city_id' => 3208,
                'city_name' => 'KAB. KUNINGAN',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 =>
            array (
                'id' => 169,
                'city_id' => 3209,
                'city_name' => 'KAB. CIREBON',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 =>
            array (
                'id' => 170,
                'city_id' => 3210,
                'city_name' => 'KAB. MAJALENGKA',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 =>
            array (
                'id' => 171,
                'city_id' => 3211,
                'city_name' => 'KAB. SUMEDANG',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 =>
            array (
                'id' => 172,
                'city_id' => 3212,
                'city_name' => 'KAB. INDRAMAYU',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 =>
            array (
                'id' => 173,
                'city_id' => 3213,
                'city_name' => 'KAB. SUBANG',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 =>
            array (
                'id' => 174,
                'city_id' => 3214,
                'city_name' => 'KAB. PURWAKARTA',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 =>
            array (
                'id' => 175,
                'city_id' => 3215,
                'city_name' => 'KAB. KARAWANG',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 =>
            array (
                'id' => 176,
                'city_id' => 3216,
                'city_name' => 'KAB. BEKASI',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 =>
            array (
                'id' => 177,
                'city_id' => 3217,
                'city_name' => 'KAB. BANDUNG BARAT',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 =>
            array (
                'id' => 178,
                'city_id' => 3218,
                'city_name' => 'KAB. PANGANDARAN',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 =>
            array (
                'id' => 179,
                'city_id' => 3271,
                'city_name' => 'KOTA BOGOR',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 =>
            array (
                'id' => 180,
                'city_id' => 3272,
                'city_name' => 'KOTA SUKABUMI',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 =>
            array (
                'id' => 181,
                'city_id' => 3273,
                'city_name' => 'KOTA BANDUNG',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 =>
            array (
                'id' => 182,
                'city_id' => 3274,
                'city_name' => 'KOTA CIREBON',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 =>
            array (
                'id' => 183,
                'city_id' => 3275,
                'city_name' => 'KOTA BEKASI',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 =>
            array (
                'id' => 184,
                'city_id' => 3276,
                'city_name' => 'KOTA DEPOK',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 =>
            array (
                'id' => 185,
                'city_id' => 3277,
                'city_name' => 'KOTA CIMAHI',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 =>
            array (
                'id' => 186,
                'city_id' => 3278,
                'city_name' => 'KOTA TASIKMALAYA',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 =>
            array (
                'id' => 187,
                'city_id' => 3279,
                'city_name' => 'KOTA BANJAR',
                'prov_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 =>
            array (
                'id' => 188,
                'city_id' => 3301,
                'city_name' => 'KAB. CILACAP',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 =>
            array (
                'id' => 189,
                'city_id' => 3302,
                'city_name' => 'KAB. BANYUMAS',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 =>
            array (
                'id' => 190,
                'city_id' => 3303,
                'city_name' => 'KAB. PURBALINGGA',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 =>
            array (
                'id' => 191,
                'city_id' => 3304,
                'city_name' => 'KAB. BANJARNEGARA',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 =>
            array (
                'id' => 192,
                'city_id' => 3305,
                'city_name' => 'KAB. KEBUMEN',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 =>
            array (
                'id' => 193,
                'city_id' => 3306,
                'city_name' => 'KAB. PURWOREJO',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 =>
            array (
                'id' => 194,
                'city_id' => 3307,
                'city_name' => 'KAB. WONOSOBO',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 =>
            array (
                'id' => 195,
                'city_id' => 3308,
                'city_name' => 'KAB. MAGELANG',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 =>
            array (
                'id' => 196,
                'city_id' => 3309,
                'city_name' => 'KAB. BOYOLALI',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 =>
            array (
                'id' => 197,
                'city_id' => 3310,
                'city_name' => 'KAB. KLATEN',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 =>
            array (
                'id' => 198,
                'city_id' => 3311,
                'city_name' => 'KAB. SUKOHARJO',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 =>
            array (
                'id' => 199,
                'city_id' => 3312,
                'city_name' => 'KAB. WONOGIRI',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 =>
            array (
                'id' => 200,
                'city_id' => 3313,
                'city_name' => 'KAB. KARANGANYAR',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 =>
            array (
                'id' => 201,
                'city_id' => 3314,
                'city_name' => 'KAB. SRAGEN',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 =>
            array (
                'id' => 202,
                'city_id' => 3315,
                'city_name' => 'KAB. GROBOGAN',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 =>
            array (
                'id' => 203,
                'city_id' => 3316,
                'city_name' => 'KAB. BLORA',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 =>
            array (
                'id' => 204,
                'city_id' => 3317,
                'city_name' => 'KAB. REMBANG',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 =>
            array (
                'id' => 205,
                'city_id' => 3318,
                'city_name' => 'KAB. PATI',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 =>
            array (
                'id' => 206,
                'city_id' => 3319,
                'city_name' => 'KAB. KUDUS',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 =>
            array (
                'id' => 207,
                'city_id' => 3320,
                'city_name' => 'KAB. JEPARA',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 =>
            array (
                'id' => 208,
                'city_id' => 3321,
                'city_name' => 'KAB. DEMAK',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 =>
            array (
                'id' => 209,
                'city_id' => 3322,
                'city_name' => 'KAB. SEMARANG',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 =>
            array (
                'id' => 210,
                'city_id' => 3323,
                'city_name' => 'KAB. TEMANGGUNG',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 =>
            array (
                'id' => 211,
                'city_id' => 3324,
                'city_name' => 'KAB. KENDAL',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 =>
            array (
                'id' => 212,
                'city_id' => 3325,
                'city_name' => 'KAB. BATANG',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 =>
            array (
                'id' => 213,
                'city_id' => 3326,
                'city_name' => 'KAB. PEKALONGAN',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 =>
            array (
                'id' => 214,
                'city_id' => 3327,
                'city_name' => 'KAB. PEMALANG',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 =>
            array (
                'id' => 215,
                'city_id' => 3328,
                'city_name' => 'KAB. TEGAL',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 =>
            array (
                'id' => 216,
                'city_id' => 3329,
                'city_name' => 'KAB. BREBES',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 =>
            array (
                'id' => 217,
                'city_id' => 3371,
                'city_name' => 'KOTA MAGELANG',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 =>
            array (
                'id' => 218,
                'city_id' => 3372,
                'city_name' => 'KOTA SURAKARTA',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 =>
            array (
                'id' => 219,
                'city_id' => 3373,
                'city_name' => 'KOTA SALATIGA',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 =>
            array (
                'id' => 220,
                'city_id' => 3374,
                'city_name' => 'KOTA SEMARANG',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 =>
            array (
                'id' => 221,
                'city_id' => 3375,
                'city_name' => 'KOTA PEKALONGAN',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 =>
            array (
                'id' => 222,
                'city_id' => 3376,
                'city_name' => 'KOTA TEGAL',
                'prov_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 =>
            array (
                'id' => 223,
                'city_id' => 3401,
                'city_name' => 'KAB. KULON PROGO',
                'prov_id' => 34,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 =>
            array (
                'id' => 224,
                'city_id' => 3402,
                'city_name' => 'KAB. BANTUL',
                'prov_id' => 34,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 =>
            array (
                'id' => 225,
                'city_id' => 3403,
                'city_name' => 'KAB. GUNUNGKIDUL',
                'prov_id' => 34,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 =>
            array (
                'id' => 226,
                'city_id' => 3404,
                'city_name' => 'KAB. SLEMAN',
                'prov_id' => 34,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 =>
            array (
                'id' => 227,
                'city_id' => 3471,
                'city_name' => 'KOTA YOGYAKARTA',
                'prov_id' => 34,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 =>
            array (
                'id' => 228,
                'city_id' => 3501,
                'city_name' => 'KAB. PACITAN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 =>
            array (
                'id' => 229,
                'city_id' => 3502,
                'city_name' => 'KAB. PONOROGO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 =>
            array (
                'id' => 230,
                'city_id' => 3503,
                'city_name' => 'KAB. TRENGGALEK',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 =>
            array (
                'id' => 231,
                'city_id' => 3504,
                'city_name' => 'KAB. TULUNGAGUNG',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 =>
            array (
                'id' => 232,
                'city_id' => 3505,
                'city_name' => 'KAB. BLITAR',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 =>
            array (
                'id' => 233,
                'city_id' => 3506,
                'city_name' => 'KAB. KEDIRI',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 =>
            array (
                'id' => 234,
                'city_id' => 3507,
                'city_name' => 'KAB. MALANG',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 =>
            array (
                'id' => 235,
                'city_id' => 3508,
                'city_name' => 'KAB. LUMAJANG',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 =>
            array (
                'id' => 236,
                'city_id' => 3509,
                'city_name' => 'KAB. JEMBER',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 =>
            array (
                'id' => 237,
                'city_id' => 3510,
                'city_name' => 'KAB. BANYUWANGI',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 =>
            array (
                'id' => 238,
                'city_id' => 3511,
                'city_name' => 'KAB. BONDOWOSO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 =>
            array (
                'id' => 239,
                'city_id' => 3512,
                'city_name' => 'KAB. SITUBONDO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 =>
            array (
                'id' => 240,
                'city_id' => 3513,
                'city_name' => 'KAB. PROBOLINGGO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 =>
            array (
                'id' => 241,
                'city_id' => 3514,
                'city_name' => 'KAB. PASURUAN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 =>
            array (
                'id' => 242,
                'city_id' => 3515,
                'city_name' => 'KAB. SIDOARJO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 =>
            array (
                'id' => 243,
                'city_id' => 3516,
                'city_name' => 'KAB. MOJOKERTO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 =>
            array (
                'id' => 244,
                'city_id' => 3517,
                'city_name' => 'KAB. JOMBANG',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 =>
            array (
                'id' => 245,
                'city_id' => 3518,
                'city_name' => 'KAB. NGANJUK',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 =>
            array (
                'id' => 246,
                'city_id' => 3519,
                'city_name' => 'KAB. MADIUN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 =>
            array (
                'id' => 247,
                'city_id' => 3520,
                'city_name' => 'KAB. MAGETAN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 =>
            array (
                'id' => 248,
                'city_id' => 3521,
                'city_name' => 'KAB. NGAWI',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 =>
            array (
                'id' => 249,
                'city_id' => 3522,
                'city_name' => 'KAB. BOJONEGORO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 =>
            array (
                'id' => 250,
                'city_id' => 3523,
                'city_name' => 'KAB. TUBAN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 =>
            array (
                'id' => 251,
                'city_id' => 3524,
                'city_name' => 'KAB. LAMONGAN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 =>
            array (
                'id' => 252,
                'city_id' => 3525,
                'city_name' => 'KAB. GRESIK',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 =>
            array (
                'id' => 253,
                'city_id' => 3526,
                'city_name' => 'KAB. BANGKALAN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 =>
            array (
                'id' => 254,
                'city_id' => 3527,
                'city_name' => 'KAB. SAMPANG',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 =>
            array (
                'id' => 255,
                'city_id' => 3528,
                'city_name' => 'KAB. PAMEKASAN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 =>
            array (
                'id' => 256,
                'city_id' => 3529,
                'city_name' => 'KAB. SUMENEP',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 =>
            array (
                'id' => 257,
                'city_id' => 3571,
                'city_name' => 'KOTA KEDIRI',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 =>
            array (
                'id' => 258,
                'city_id' => 3572,
                'city_name' => 'KOTA BLITAR',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 =>
            array (
                'id' => 259,
                'city_id' => 3573,
                'city_name' => 'KOTA MALANG',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 =>
            array (
                'id' => 260,
                'city_id' => 3574,
                'city_name' => 'KOTA PROBOLINGGO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 =>
            array (
                'id' => 261,
                'city_id' => 3575,
                'city_name' => 'KOTA PASURUAN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 =>
            array (
                'id' => 262,
                'city_id' => 3576,
                'city_name' => 'KOTA MOJOKERTO',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 =>
            array (
                'id' => 263,
                'city_id' => 3577,
                'city_name' => 'KOTA MADIUN',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 =>
            array (
                'id' => 264,
                'city_id' => 3578,
                'city_name' => 'KOTA SURABAYA',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 =>
            array (
                'id' => 265,
                'city_id' => 3579,
                'city_name' => 'KOTA BATU',
                'prov_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 =>
            array (
                'id' => 266,
                'city_id' => 3601,
                'city_name' => 'KAB. PANDEGLANG',
                'prov_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 =>
            array (
                'id' => 267,
                'city_id' => 3602,
                'city_name' => 'KAB. LEBAK',
                'prov_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 =>
            array (
                'id' => 268,
                'city_id' => 3603,
                'city_name' => 'KAB. TANGERANG',
                'prov_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 =>
            array (
                'id' => 269,
                'city_id' => 3604,
                'city_name' => 'KAB. SERANG',
                'prov_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 =>
            array (
                'id' => 270,
                'city_id' => 3671,
                'city_name' => 'KOTA TANGERANG',
                'prov_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 =>
            array (
                'id' => 271,
                'city_id' => 3672,
                'city_name' => 'KOTA CILEGON',
                'prov_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 =>
            array (
                'id' => 272,
                'city_id' => 3673,
                'city_name' => 'KOTA SERANG',
                'prov_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 =>
            array (
                'id' => 273,
                'city_id' => 3674,
                'city_name' => 'KOTA TANGERANG SELATAN',
                'prov_id' => 36,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 =>
            array (
                'id' => 274,
                'city_id' => 5101,
                'city_name' => 'KAB. JEMBRANA',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 =>
            array (
                'id' => 275,
                'city_id' => 5102,
                'city_name' => 'KAB. TABANAN',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 =>
            array (
                'id' => 276,
                'city_id' => 5103,
                'city_name' => 'KAB. BADUNG',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 =>
            array (
                'id' => 277,
                'city_id' => 5104,
                'city_name' => 'KAB. GIANYAR',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 =>
            array (
                'id' => 278,
                'city_id' => 5105,
                'city_name' => 'KAB. KLUNGKUNG',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 =>
            array (
                'id' => 279,
                'city_id' => 5106,
                'city_name' => 'KAB. BANGLI',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 =>
            array (
                'id' => 280,
                'city_id' => 5107,
                'city_name' => 'KAB. KARANGASEM',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 =>
            array (
                'id' => 281,
                'city_id' => 5108,
                'city_name' => 'KAB. BULELENG',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 =>
            array (
                'id' => 282,
                'city_id' => 5171,
                'city_name' => 'KOTA DENPASAR',
                'prov_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 =>
            array (
                'id' => 283,
                'city_id' => 5201,
                'city_name' => 'KAB. LOMBOK BARAT',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 =>
            array (
                'id' => 284,
                'city_id' => 5202,
                'city_name' => 'KAB. LOMBOK TENGAH',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 =>
            array (
                'id' => 285,
                'city_id' => 5203,
                'city_name' => 'KAB. LOMBOK TIMUR',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 =>
            array (
                'id' => 286,
                'city_id' => 5204,
                'city_name' => 'KAB. SUMBAWA',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 =>
            array (
                'id' => 287,
                'city_id' => 5205,
                'city_name' => 'KAB. DOMPU',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 =>
            array (
                'id' => 288,
                'city_id' => 5206,
                'city_name' => 'KAB. BIMA',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 =>
            array (
                'id' => 289,
                'city_id' => 5207,
                'city_name' => 'KAB. SUMBAWA BARAT',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 =>
            array (
                'id' => 290,
                'city_id' => 5208,
                'city_name' => 'KAB. LOMBOK UTARA',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 =>
            array (
                'id' => 291,
                'city_id' => 5271,
                'city_name' => 'KOTA MATARAM',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 =>
            array (
                'id' => 292,
                'city_id' => 5272,
                'city_name' => 'KOTA BIMA',
                'prov_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 =>
            array (
                'id' => 293,
                'city_id' => 5301,
                'city_name' => 'KAB. KUPANG',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 =>
            array (
                'id' => 294,
                'city_id' => 5302,
                'city_name' => 'KAB TIMOR TENGAH SELATAN',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 =>
            array (
                'id' => 295,
                'city_id' => 5303,
                'city_name' => 'KAB. TIMOR TENGAH UTARA',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 =>
            array (
                'id' => 296,
                'city_id' => 5304,
                'city_name' => 'KAB. BELU',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 =>
            array (
                'id' => 297,
                'city_id' => 5305,
                'city_name' => 'KAB. ALOR',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 =>
            array (
                'id' => 298,
                'city_id' => 5306,
                'city_name' => 'KAB. FLORES TIMUR',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 =>
            array (
                'id' => 299,
                'city_id' => 5307,
                'city_name' => 'KAB. SIKKA',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 =>
            array (
                'id' => 300,
                'city_id' => 5308,
                'city_name' => 'KAB. ENDE',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 =>
            array (
                'id' => 301,
                'city_id' => 5309,
                'city_name' => 'KAB. NGADA',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 =>
            array (
                'id' => 302,
                'city_id' => 5310,
                'city_name' => 'KAB. MANGGARAI',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 =>
            array (
                'id' => 303,
                'city_id' => 5311,
                'city_name' => 'KAB. SUMBA TIMUR',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 =>
            array (
                'id' => 304,
                'city_id' => 5312,
                'city_name' => 'KAB. SUMBA BARAT',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 =>
            array (
                'id' => 305,
                'city_id' => 5313,
                'city_name' => 'KAB. LEMBATA',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 =>
            array (
                'id' => 306,
                'city_id' => 5314,
                'city_name' => 'KAB. ROTE NDAO',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 =>
            array (
                'id' => 307,
                'city_id' => 5315,
                'city_name' => 'KAB. MANGGARAI BARAT',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 =>
            array (
                'id' => 308,
                'city_id' => 5316,
                'city_name' => 'KAB. NAGEKEO',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 =>
            array (
                'id' => 309,
                'city_id' => 5317,
                'city_name' => 'KAB. SUMBA TENGAH',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 =>
            array (
                'id' => 310,
                'city_id' => 5318,
                'city_name' => 'KAB. SUMBA BARAT DAYA',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 =>
            array (
                'id' => 311,
                'city_id' => 5319,
                'city_name' => 'KAB. MANGGARAI TIMUR',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 =>
            array (
                'id' => 312,
                'city_id' => 5320,
                'city_name' => 'KAB. SABU RAIJUA',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 =>
            array (
                'id' => 313,
                'city_id' => 5321,
                'city_name' => 'KAB. MALAKA',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 =>
            array (
                'id' => 314,
                'city_id' => 5371,
                'city_name' => 'KOTA KUPANG',
                'prov_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 =>
            array (
                'id' => 315,
                'city_id' => 6101,
                'city_name' => 'KAB. SAMBAS',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 =>
            array (
                'id' => 316,
                'city_id' => 6102,
                'city_name' => 'KAB. MEMPAWAH',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 =>
            array (
                'id' => 317,
                'city_id' => 6103,
                'city_name' => 'KAB. SANGGAU',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 =>
            array (
                'id' => 318,
                'city_id' => 6104,
                'city_name' => 'KAB. KETAPANG',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 =>
            array (
                'id' => 319,
                'city_id' => 6105,
                'city_name' => 'KAB. SINTANG',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 =>
            array (
                'id' => 320,
                'city_id' => 6106,
                'city_name' => 'KAB. KAPUAS HULU',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 =>
            array (
                'id' => 321,
                'city_id' => 6107,
                'city_name' => 'KAB. BENGKAYANG',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 =>
            array (
                'id' => 322,
                'city_id' => 6108,
                'city_name' => 'KAB. LANDAK',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 =>
            array (
                'id' => 323,
                'city_id' => 6109,
                'city_name' => 'KAB. SEKADAU',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 =>
            array (
                'id' => 324,
                'city_id' => 6110,
                'city_name' => 'KAB. MELAWI',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 =>
            array (
                'id' => 325,
                'city_id' => 6111,
                'city_name' => 'KAB. KAYONG UTARA',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 =>
            array (
                'id' => 326,
                'city_id' => 6112,
                'city_name' => 'KAB. KUBU RAYA',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 =>
            array (
                'id' => 327,
                'city_id' => 6171,
                'city_name' => 'KOTA PONTIANAK',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 =>
            array (
                'id' => 328,
                'city_id' => 6172,
                'city_name' => 'KOTA SINGKAWANG',
                'prov_id' => 61,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 =>
            array (
                'id' => 329,
                'city_id' => 6201,
                'city_name' => 'KAB. KOTAWARINGIN BARAT',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 =>
            array (
                'id' => 330,
                'city_id' => 6202,
                'city_name' => 'KAB. KOTAWARINGIN TIMUR',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 =>
            array (
                'id' => 331,
                'city_id' => 6203,
                'city_name' => 'KAB. KAPUAS',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 =>
            array (
                'id' => 332,
                'city_id' => 6204,
                'city_name' => 'KAB. BARITO SELATAN',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 =>
            array (
                'id' => 333,
                'city_id' => 6205,
                'city_name' => 'KAB. BARITO UTARA',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 =>
            array (
                'id' => 334,
                'city_id' => 6206,
                'city_name' => 'KAB. KATINGAN',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 =>
            array (
                'id' => 335,
                'city_id' => 6207,
                'city_name' => 'KAB. SERUYAN',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 =>
            array (
                'id' => 336,
                'city_id' => 6208,
                'city_name' => 'KAB. SUKAMARA',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 =>
            array (
                'id' => 337,
                'city_id' => 6209,
                'city_name' => 'KAB. LAMANDAU',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 =>
            array (
                'id' => 338,
                'city_id' => 6210,
                'city_name' => 'KAB. GUNUNG MAS',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 =>
            array (
                'id' => 339,
                'city_id' => 6211,
                'city_name' => 'KAB. PULANG PISAU',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 =>
            array (
                'id' => 340,
                'city_id' => 6212,
                'city_name' => 'KAB. MURUNG RAYA',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 =>
            array (
                'id' => 341,
                'city_id' => 6213,
                'city_name' => 'KAB. BARITO TIMUR',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 =>
            array (
                'id' => 342,
                'city_id' => 6271,
                'city_name' => 'KOTA PALANGKARAYA',
                'prov_id' => 62,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 =>
            array (
                'id' => 343,
                'city_id' => 6301,
                'city_name' => 'KAB. TANAH LAUT',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 =>
            array (
                'id' => 344,
                'city_id' => 6302,
                'city_name' => 'KAB. KOTABARU',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 =>
            array (
                'id' => 345,
                'city_id' => 6303,
                'city_name' => 'KAB. BANJAR',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 =>
            array (
                'id' => 346,
                'city_id' => 6304,
                'city_name' => 'KAB. BARITO KUALA',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 =>
            array (
                'id' => 347,
                'city_id' => 6305,
                'city_name' => 'KAB. TAPIN',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 =>
            array (
                'id' => 348,
                'city_id' => 6306,
                'city_name' => 'KAB. HULU SUNGAI SELATAN',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 =>
            array (
                'id' => 349,
                'city_id' => 6307,
                'city_name' => 'KAB. HULU SUNGAI TENGAH',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 =>
            array (
                'id' => 350,
                'city_id' => 6308,
                'city_name' => 'KAB. HULU SUNGAI UTARA',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 =>
            array (
                'id' => 351,
                'city_id' => 6309,
                'city_name' => 'KAB. TABALONG',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 =>
            array (
                'id' => 352,
                'city_id' => 6310,
                'city_name' => 'KAB. TANAH BUMBU',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 =>
            array (
                'id' => 353,
                'city_id' => 6311,
                'city_name' => 'KAB. BALANGAN',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 =>
            array (
                'id' => 354,
                'city_id' => 6371,
                'city_name' => 'KOTA BANJARMASIN',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 =>
            array (
                'id' => 355,
                'city_id' => 6372,
                'city_name' => 'KOTA BANJARBARU',
                'prov_id' => 63,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 =>
            array (
                'id' => 356,
                'city_id' => 6401,
                'city_name' => 'KAB. PASER',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 =>
            array (
                'id' => 357,
                'city_id' => 6402,
                'city_name' => 'KAB. KUTAI KARTANEGARA',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 =>
            array (
                'id' => 358,
                'city_id' => 6403,
                'city_name' => 'KAB. BERAU',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 =>
            array (
                'id' => 359,
                'city_id' => 6407,
                'city_name' => 'KAB. KUTAI BARAT',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 =>
            array (
                'id' => 360,
                'city_id' => 6408,
                'city_name' => 'KAB. KUTAI TIMUR',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 =>
            array (
                'id' => 361,
                'city_id' => 6409,
                'city_name' => 'KAB. PENAJAM PASER UTARA',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 =>
            array (
                'id' => 362,
                'city_id' => 6411,
                'city_name' => 'KAB. MAHAKAM ULU',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 =>
            array (
                'id' => 363,
                'city_id' => 6471,
                'city_name' => 'KOTA BALIKPAPAN',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 =>
            array (
                'id' => 364,
                'city_id' => 6472,
                'city_name' => 'KOTA SAMARINDA',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 =>
            array (
                'id' => 365,
                'city_id' => 6474,
                'city_name' => 'KOTA BONTANG',
                'prov_id' => 64,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 =>
            array (
                'id' => 366,
                'city_id' => 6501,
                'city_name' => 'KAB. BULUNGAN',
                'prov_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 =>
            array (
                'id' => 367,
                'city_id' => 6502,
                'city_name' => 'KAB. MALINAU',
                'prov_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 =>
            array (
                'id' => 368,
                'city_id' => 6503,
                'city_name' => 'KAB. NUNUKAN',
                'prov_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 =>
            array (
                'id' => 369,
                'city_id' => 6504,
                'city_name' => 'KAB. TANA TIDUNG',
                'prov_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 =>
            array (
                'id' => 370,
                'city_id' => 6571,
                'city_name' => 'KOTA TARAKAN',
                'prov_id' => 65,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 =>
            array (
                'id' => 371,
                'city_id' => 7101,
                'city_name' => 'KAB. BOLAANG MONGONDOW',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 =>
            array (
                'id' => 372,
                'city_id' => 7102,
                'city_name' => 'KAB. MINAHASA',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 =>
            array (
                'id' => 373,
                'city_id' => 7103,
                'city_name' => 'KAB. KEPULAUAN SANGIHE',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 =>
            array (
                'id' => 374,
                'city_id' => 7104,
                'city_name' => 'KAB. KEPULAUAN TALAUD',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 =>
            array (
                'id' => 375,
                'city_id' => 7105,
                'city_name' => 'KAB. MINAHASA SELATAN',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 =>
            array (
                'id' => 376,
                'city_id' => 7106,
                'city_name' => 'KAB. MINAHASA UTARA',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 =>
            array (
                'id' => 377,
                'city_id' => 7107,
                'city_name' => 'KAB. MINAHASA TENGGARA',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 =>
            array (
                'id' => 378,
                'city_id' => 7108,
                'city_name' => 'KAB. BOLAANG MONGONDOW UTARA',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 =>
            array (
                'id' => 379,
                'city_id' => 7109,
                'city_name' => 'KAB. KEP. SIAU TAGULANDANG BIARO',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 =>
            array (
                'id' => 380,
                'city_id' => 7110,
                'city_name' => 'KAB. BOLAANG MONGONDOW TIMUR',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 =>
            array (
                'id' => 381,
                'city_id' => 7111,
                'city_name' => 'KAB. BOLAANG MONGONDOW SELATAN',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 =>
            array (
                'id' => 382,
                'city_id' => 7171,
                'city_name' => 'KOTA MANADO',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 =>
            array (
                'id' => 383,
                'city_id' => 7172,
                'city_name' => 'KOTA BITUNG',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 =>
            array (
                'id' => 384,
                'city_id' => 7173,
                'city_name' => 'KOTA TOMOHON',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 =>
            array (
                'id' => 385,
                'city_id' => 7174,
                'city_name' => 'KOTA KOTAMOBAGU',
                'prov_id' => 71,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 =>
            array (
                'id' => 386,
                'city_id' => 7201,
                'city_name' => 'KAB. BANGGAI',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 =>
            array (
                'id' => 387,
                'city_id' => 7202,
                'city_name' => 'KAB. POSO',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 =>
            array (
                'id' => 388,
                'city_id' => 7203,
                'city_name' => 'KAB. DONGGALA',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 =>
            array (
                'id' => 389,
                'city_id' => 7204,
                'city_name' => 'KAB. TOLI TOLI',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 =>
            array (
                'id' => 390,
                'city_id' => 7205,
                'city_name' => 'KAB. BUOL',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 =>
            array (
                'id' => 391,
                'city_id' => 7206,
                'city_name' => 'KAB. MOROWALI',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 =>
            array (
                'id' => 392,
                'city_id' => 7207,
                'city_name' => 'KAB. BANGGAI KEPULAUAN',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 =>
            array (
                'id' => 393,
                'city_id' => 7208,
                'city_name' => 'KAB. PARIGI MOUTONG',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 =>
            array (
                'id' => 394,
                'city_id' => 7209,
                'city_name' => 'KAB. TOJO UNA UNA',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 =>
            array (
                'id' => 395,
                'city_id' => 7210,
                'city_name' => 'KAB. SIGI',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 =>
            array (
                'id' => 396,
                'city_id' => 7211,
                'city_name' => 'KAB. BANGGAI LAUT',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 =>
            array (
                'id' => 397,
                'city_id' => 7212,
                'city_name' => 'KAB. MOROWALI UTARA',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 =>
            array (
                'id' => 398,
                'city_id' => 7271,
                'city_name' => 'KOTA PALU',
                'prov_id' => 72,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 =>
            array (
                'id' => 399,
                'city_id' => 7301,
                'city_name' => 'KAB. KEPULAUAN SELAYAR',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 =>
            array (
                'id' => 400,
                'city_id' => 7302,
                'city_name' => 'KAB. BULUKUMBA',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 =>
            array (
                'id' => 401,
                'city_id' => 7303,
                'city_name' => 'KAB. BANTAENG',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 =>
            array (
                'id' => 402,
                'city_id' => 7304,
                'city_name' => 'KAB. JENEPONTO',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 =>
            array (
                'id' => 403,
                'city_id' => 7305,
                'city_name' => 'KAB. TAKALAR',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 =>
            array (
                'id' => 404,
                'city_id' => 7306,
                'city_name' => 'KAB. GOWA',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 =>
            array (
                'id' => 405,
                'city_id' => 7307,
                'city_name' => 'KAB. SINJAI',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 =>
            array (
                'id' => 406,
                'city_id' => 7308,
                'city_name' => 'KAB. BONE',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 =>
            array (
                'id' => 407,
                'city_id' => 7309,
                'city_name' => 'KAB. MAROS',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 =>
            array (
                'id' => 408,
                'city_id' => 7310,
                'city_name' => 'KAB. PANGKAJENE KEPULAUAN',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 =>
            array (
                'id' => 409,
                'city_id' => 7311,
                'city_name' => 'KAB. BARRU',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 =>
            array (
                'id' => 410,
                'city_id' => 7312,
                'city_name' => 'KAB. SOPPENG',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 =>
            array (
                'id' => 411,
                'city_id' => 7313,
                'city_name' => 'KAB. WAJO',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 =>
            array (
                'id' => 412,
                'city_id' => 7314,
                'city_name' => 'KAB. SIDENRENG RAPPANG',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 =>
            array (
                'id' => 413,
                'city_id' => 7315,
                'city_name' => 'KAB. PINRANG',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 =>
            array (
                'id' => 414,
                'city_id' => 7316,
                'city_name' => 'KAB. ENREKANG',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 =>
            array (
                'id' => 415,
                'city_id' => 7317,
                'city_name' => 'KAB. LUWU',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 =>
            array (
                'id' => 416,
                'city_id' => 7318,
                'city_name' => 'KAB. TANA TORAJA',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 =>
            array (
                'id' => 417,
                'city_id' => 7322,
                'city_name' => 'KAB. LUWU UTARA',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 =>
            array (
                'id' => 418,
                'city_id' => 7324,
                'city_name' => 'KAB. LUWU TIMUR',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 =>
            array (
                'id' => 419,
                'city_id' => 7326,
                'city_name' => 'KAB. TORAJA UTARA',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 =>
            array (
                'id' => 420,
                'city_id' => 7371,
                'city_name' => 'KOTA MAKASSAR',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 =>
            array (
                'id' => 421,
                'city_id' => 7372,
                'city_name' => 'KOTA PARE PARE',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 =>
            array (
                'id' => 422,
                'city_id' => 7373,
                'city_name' => 'KOTA PALOPO',
                'prov_id' => 73,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 =>
            array (
                'id' => 423,
                'city_id' => 7401,
                'city_name' => 'KAB. KOLAKA',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 =>
            array (
                'id' => 424,
                'city_id' => 7402,
                'city_name' => 'KAB. KONAWE',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 =>
            array (
                'id' => 425,
                'city_id' => 7403,
                'city_name' => 'KAB. MUNA',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 =>
            array (
                'id' => 426,
                'city_id' => 7404,
                'city_name' => 'KAB. BUTON',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 =>
            array (
                'id' => 427,
                'city_id' => 7405,
                'city_name' => 'KAB. KONAWE SELATAN',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 =>
            array (
                'id' => 428,
                'city_id' => 7406,
                'city_name' => 'KAB. BOMBANA',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 =>
            array (
                'id' => 429,
                'city_id' => 7407,
                'city_name' => 'KAB. WAKATOBI',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 =>
            array (
                'id' => 430,
                'city_id' => 7408,
                'city_name' => 'KAB. KOLAKA UTARA',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 =>
            array (
                'id' => 431,
                'city_id' => 7409,
                'city_name' => 'KAB. KONAWE UTARA',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 =>
            array (
                'id' => 432,
                'city_id' => 7410,
                'city_name' => 'KAB. BUTON UTARA',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 =>
            array (
                'id' => 433,
                'city_id' => 7411,
                'city_name' => 'KAB. KOLAKA TIMUR',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 =>
            array (
                'id' => 434,
                'city_id' => 7412,
                'city_name' => 'KAB. KONAWE KEPULAUAN',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 =>
            array (
                'id' => 435,
                'city_id' => 7413,
                'city_name' => 'KAB. MUNA BARAT',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 =>
            array (
                'id' => 436,
                'city_id' => 7414,
                'city_name' => 'KAB. BUTON TENGAH',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 =>
            array (
                'id' => 437,
                'city_id' => 7415,
                'city_name' => 'KAB. BUTON SELATAN',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 =>
            array (
                'id' => 438,
                'city_id' => 7471,
                'city_name' => 'KOTA KENDARI',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 =>
            array (
                'id' => 439,
                'city_id' => 7472,
                'city_name' => 'KOTA BAU BAU',
                'prov_id' => 74,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 =>
            array (
                'id' => 440,
                'city_id' => 7501,
                'city_name' => 'KAB. GORONTALO',
                'prov_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 =>
            array (
                'id' => 441,
                'city_id' => 7502,
                'city_name' => 'KAB. BOALEMO',
                'prov_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 =>
            array (
                'id' => 442,
                'city_id' => 7503,
                'city_name' => 'KAB. BONE BOLANGO',
                'prov_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 =>
            array (
                'id' => 443,
                'city_id' => 7504,
                'city_name' => 'KAB. PAHUWATO',
                'prov_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 =>
            array (
                'id' => 444,
                'city_id' => 7505,
                'city_name' => 'KAB. GORONTALO UTARA',
                'prov_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 =>
            array (
                'id' => 445,
                'city_id' => 7571,
                'city_name' => 'KOTA GORONTALO',
                'prov_id' => 75,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 =>
            array (
                'id' => 446,
                'city_id' => 7601,
                'city_name' => 'KAB. PASANGKAYU',
                'prov_id' => 76,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 =>
            array (
                'id' => 447,
                'city_id' => 7602,
                'city_name' => 'KAB. MAMUJU',
                'prov_id' => 76,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 =>
            array (
                'id' => 448,
                'city_id' => 7603,
                'city_name' => 'KAB. MAMASA',
                'prov_id' => 76,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 =>
            array (
                'id' => 449,
                'city_id' => 7604,
                'city_name' => 'KAB. POLEWALI MANDAR',
                'prov_id' => 76,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 =>
            array (
                'id' => 450,
                'city_id' => 7605,
                'city_name' => 'KAB. MAJENE',
                'prov_id' => 76,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 =>
            array (
                'id' => 451,
                'city_id' => 7606,
                'city_name' => 'KAB. MAMUJU TENGAH',
                'prov_id' => 76,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 =>
            array (
                'id' => 452,
                'city_id' => 8101,
                'city_name' => 'KAB. MALUKU TENGAH',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 =>
            array (
                'id' => 453,
                'city_id' => 8102,
                'city_name' => 'KAB. MALUKU TENGGARA',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 =>
            array (
                'id' => 454,
                'city_id' => 8103,
                'city_name' => 'KAB. KEPULAUAN TANIMBAR',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 =>
            array (
                'id' => 455,
                'city_id' => 8104,
                'city_name' => 'KAB. BURU',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 =>
            array (
                'id' => 456,
                'city_id' => 8105,
                'city_name' => 'KAB. SERAM BAGIAN TIMUR',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 =>
            array (
                'id' => 457,
                'city_id' => 8106,
                'city_name' => 'KAB. SERAM BAGIAN BARAT',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 =>
            array (
                'id' => 458,
                'city_id' => 8107,
                'city_name' => 'KAB. KEPULAUAN ARU',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 =>
            array (
                'id' => 459,
                'city_id' => 8108,
                'city_name' => 'KAB. MALUKU BARAT DAYA',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 =>
            array (
                'id' => 460,
                'city_id' => 8109,
                'city_name' => 'KAB. BURU SELATAN',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 =>
            array (
                'id' => 461,
                'city_id' => 8171,
                'city_name' => 'KOTA AMBON',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 =>
            array (
                'id' => 462,
                'city_id' => 8172,
                'city_name' => 'KOTA TUAL',
                'prov_id' => 81,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 =>
            array (
                'id' => 463,
                'city_id' => 8201,
                'city_name' => 'KAB. HALMAHERA BARAT',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 =>
            array (
                'id' => 464,
                'city_id' => 8202,
                'city_name' => 'KAB. HALMAHERA TENGAH',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 =>
            array (
                'id' => 465,
                'city_id' => 8203,
                'city_name' => 'KAB. HALMAHERA UTARA',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 =>
            array (
                'id' => 466,
                'city_id' => 8204,
                'city_name' => 'KAB. HALMAHERA SELATAN',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 =>
            array (
                'id' => 467,
                'city_id' => 8205,
                'city_name' => 'KAB. KEPULAUAN SULA',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 =>
            array (
                'id' => 468,
                'city_id' => 8206,
                'city_name' => 'KAB. HALMAHERA TIMUR',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 =>
            array (
                'id' => 469,
                'city_id' => 8207,
                'city_name' => 'KAB. PULAU MOROTAI',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 =>
            array (
                'id' => 470,
                'city_id' => 8208,
                'city_name' => 'KAB. PULAU TALIABU',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 =>
            array (
                'id' => 471,
                'city_id' => 8271,
                'city_name' => 'KOTA TERNATE',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 =>
            array (
                'id' => 472,
                'city_id' => 8272,
                'city_name' => 'KOTA TIDORE KEPULAUAN',
                'prov_id' => 82,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 =>
            array (
                'id' => 473,
                'city_id' => 9103,
                'city_name' => 'KAB. JAYAPURA',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 =>
            array (
                'id' => 474,
                'city_id' => 9105,
                'city_name' => 'KAB. KEPULAUAN YAPEN',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 =>
            array (
                'id' => 475,
                'city_id' => 9106,
                'city_name' => 'KAB. BIAK NUMFOR',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 =>
            array (
                'id' => 476,
                'city_id' => 9110,
                'city_name' => 'KAB. SARMI',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 =>
            array (
                'id' => 477,
                'city_id' => 9111,
                'city_name' => 'KAB. KEEROM',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 =>
            array (
                'id' => 478,
                'city_id' => 9115,
                'city_name' => 'KAB. WAROPEN',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 =>
            array (
                'id' => 479,
                'city_id' => 9119,
                'city_name' => 'KAB. SUPIORI',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 =>
            array (
                'id' => 480,
                'city_id' => 9120,
                'city_name' => 'KAB. MAMBERAMO RAYA',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 =>
            array (
                'id' => 481,
                'city_id' => 9171,
                'city_name' => 'KOTA JAYAPURA',
                'prov_id' => 91,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 =>
            array (
                'id' => 482,
                'city_id' => 9201,
                'city_name' => 'KAB. SORONG',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 =>
            array (
                'id' => 483,
                'city_id' => 9202,
                'city_name' => 'KAB. MANOKWARI',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 =>
            array (
                'id' => 484,
                'city_id' => 9203,
                'city_name' => 'KAB. FAK FAK',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 =>
            array (
                'id' => 485,
                'city_id' => 9204,
                'city_name' => 'KAB. SORONG SELATAN',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 =>
            array (
                'id' => 486,
                'city_id' => 9205,
                'city_name' => 'KAB. RAJA AMPAT',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 =>
            array (
                'id' => 487,
                'city_id' => 9206,
                'city_name' => 'KAB. TELUK BINTUNI',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 =>
            array (
                'id' => 488,
                'city_id' => 9207,
                'city_name' => 'KAB. TELUK WONDAMA',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 =>
            array (
                'id' => 489,
                'city_id' => 9208,
                'city_name' => 'KAB. KAIMANA',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 =>
            array (
                'id' => 490,
                'city_id' => 9209,
                'city_name' => 'KAB. TAMBRAUW',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 =>
            array (
                'id' => 491,
                'city_id' => 9210,
                'city_name' => 'KAB. MAYBRAT',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 =>
            array (
                'id' => 492,
                'city_id' => 9211,
                'city_name' => 'KAB. MANOKWARI SELATAN',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 =>
            array (
                'id' => 493,
                'city_id' => 9212,
                'city_name' => 'KAB. PEGUNUNGAN ARFAK',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 =>
            array (
                'id' => 494,
                'city_id' => 9271,
                'city_name' => 'KOTA SORONG',
                'prov_id' => 92,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 =>
            array (
                'id' => 495,
                'city_id' => 9301,
                'city_name' => 'KAB. MERAUKE',
                'prov_id' => 93,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 =>
            array (
                'id' => 496,
                'city_id' => 9302,
                'city_name' => 'KAB. BOVEN DIGOEL',
                'prov_id' => 93,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 =>
            array (
                'id' => 497,
                'city_id' => 9303,
                'city_name' => 'KAB. MAPPI',
                'prov_id' => 93,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 =>
            array (
                'id' => 498,
                'city_id' => 9304,
                'city_name' => 'KAB. ASMAT',
                'prov_id' => 93,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 =>
            array (
                'id' => 499,
                'city_id' => 9401,
                'city_name' => 'KAB. NABIRE',
                'prov_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 =>
            array (
                'id' => 500,
                'city_id' => 9402,
                'city_name' => 'KAB. PUNCAK JAYA',
                'prov_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        DB::table('cities')->insert(array (
            0 =>
            array (
                'id' => 501,
                'city_id' => 9403,
                'city_name' => 'KAB. PANIAI',
                'prov_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 502,
                'city_id' => 9404,
                'city_name' => 'KAB. MIMIKA',
                'prov_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 503,
                'city_id' => 9405,
                'city_name' => 'KAB. PUNCAK',
                'prov_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 504,
                'city_id' => 9406,
                'city_name' => 'KAB. DOGIYAI',
                'prov_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 505,
                'city_id' => 9407,
                'city_name' => 'KAB. INTAN JAYA',
                'prov_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 506,
                'city_id' => 9408,
                'city_name' => 'KAB. DEIYAI',
                'prov_id' => 94,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 507,
                'city_id' => 9501,
                'city_name' => 'KAB. JAYAWIJAYA',
                'prov_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 508,
                'city_id' => 9502,
                'city_name' => 'KAB. PEGUNUNGAN BINTANG',
                'prov_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 509,
                'city_id' => 9503,
                'city_name' => 'KAB. YAHUKIMO',
                'prov_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'id' => 510,
                'city_id' => 9504,
                'city_name' => 'KAB. TOLIKARA',
                'prov_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'id' => 511,
                'city_id' => 9505,
                'city_name' => 'KAB. MAMBERAMO TENGAH',
                'prov_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'id' => 512,
                'city_id' => 9506,
                'city_name' => 'KAB. YALIMO',
                'prov_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array (
                'id' => 513,
                'city_id' => 9507,
                'city_name' => 'KAB. LANNY JAYA',
                'prov_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array (
                'id' => 514,
                'city_id' => 9508,
                'city_name' => 'KAB. NDUGA',
                'prov_id' => 95,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
