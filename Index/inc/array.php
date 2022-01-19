<?php
require "connect.php";
$topic_health1=array(
    "0"=>"- กรุณาเลือกหัวข้อด้านสุขภาพ -",
"1"=>"ปัญหาโรคติดต่อและโรคระบาดในหมู่บ้าน/ชุมชน ภายในระยะเวลา 1 ปีที่ผ่านมา",
"2"=>"การจัดบริการดูแลสุขภาพในหมู่บ้าน/ชุมชน ภายในระยะ 1 ปีที่ผ่านมา",
"3"=>"สถานที่/แหล่งบริการสุขภาพที่มีในหมู่บ้าน/ชุมชน",
"4"=>"ผู้ให้บริการ/ดูแลรักษาด้านสุขภาพในหมู่บ้าน/ชุมชน บุคลากรด้านสุขภาพ",
"5"=>"ผู้ให้บริการ/ดูแลรักษาด้านสุขภาพในหมู่บ้าน/ชุมชน ภาคประชาชน",
"6"=>"การใช้สารเสพติดในหมู่บ้าน/ชุมชน ชนิดของสารเสพติด",
"7"=>"การใช้สารเสพติดในหมู่บ้าน/ชุมชน กลุ่มของผู้ใช้สารเสพติด",
"8"=>"การใช้สารเสพติดในหมู่บ้าน/ชุมชน แนวทางการป้องกันแก้ไขปัญหาสารเสพติด",
);
$data_svital11=array(
 "0"=>"กรุณาระบุข้อมูลสถิติชีพ",
"1"=>"เด็กเกิดใหม่ในรอบ 1 ปี",
"2"=>"ผู้เสียชีวิตในรอบ 1 ปี",
"3"=>"สาเหตุการเสียชีวิต ตายขณะคลอด",
"4"=>"สาเหตุการเสียชีวิต ชรา",
"5"=>"สาเหตุการเสียชีวิต โรคเรื้อรัง (เช่น เบาหวาน ความดันโลหิตสูง หัวใจ มะเร็ง ไตวาย เป็นต้น)",
"6"=>"สาเหตุการเสียชีวิต โรคติดต่อ/โรคระบาด (เช่น เอดส์ โรคฉี่หนู ไข้หวัดนก ไข้หวัดใหญ่สายพันธุ์ใหม่ เป็นต้น)",
"7"=>"สาเหตุการเสียชีวิต ฆ่าตัวตาย",
"8"=>"สาเหตุการเสียชีวิต ถูกฆาตกรรม",
"9"=>"สาเหตุการเสียชีวิต เสียชีวิตจากภัยพิบัติ (เช่น ดินถล่ม แผ่นดินไหว น้ำท่วม พายุ อื่นๆ)",
"10"=>"สาเหตุการเสียชีวิต อุบัติเหตุจราจร",
"11"=>"สาเหตุการเสียชีวิต จมน้ำ",
"12"=>"สาเหตุการเสียชีวิต ตกจากที่สูง",
"13"=>"สาเหตุการเสียชีวิต ถูกสัตว์กัดหรือทำร้าย",
"14"=>"แรงงานไทย",
"15"=>"แรงงานต่างด้าว(ขึ้นทะเบียน)",
"16"=>"แรงงานต่างด้าว(ไม่ขึ้นทะเบียน)",

);
$env0=array(
    "0"=>"กรุณาระบุหัวข้อ",
    "1"=>"การจัดการขยะ",
    "2"=>"การจัดการมลภาวะหรือมลพิษ",
    "3"=>"การจัดการจุดอันตราย/พื้นที่เสี่ยง",
    "4"=>"การจัดการน้ำอุปโภคและบริโภค",
    "5"=>"การจัดการภัยพิบัติ",
    "6"=>"การจัดการคุณภาพดิน",
    "7"=>"การจัดการสิ่งแวดล้อมในหมู่บ้าน/ชุมชนที่เอื้อต่อการสร้างสุขภาพ",
    "8"=>"การประหยัดพลังงาน",
    "9"=>"การใช้พลังงานทดแทน",
);
$env1=array(
    "0"=>"กรุณาระบุปัญหา",
   "1"=>"ปริมาณขยะจำนวนมาก",
   "2"=>"ไม่มีพื้นที่ทิ้งขยะ",
   "3"=>"บริการจัดเก็บไม่เพียงพอ",
   "4"=>"น้ำเสีย",
   "5"=>"หมอกควัน",
   "6"=>"ฝุ่นละออง",
   "7"=>"เสียงดัง",
   "8"=>"การใช้สารเคมี",
   "9"=>"กลิ่น",
   "10"=>"อุบัติเหตุจราจร",
   "11"=>"อาชญากรรม",
   "12"=>"ลักทรัพย์/วิ่งราวทรัพย์",
   "13"=>"ไฟส่องสว่างไม่เพียงพอ",
   "14"=>"แหล่งมั่วสุ่ม",
   "15"=>"ขาดแคลนแหล่งน้ำ",
   "16"=>"น้ำอุปโภคไม่เพียงพอ",
   "17"=>"น้ำบริโภคไม่เพียงพอ",
   "18"=>"ขาดภาชนะกักเก็บน้ำในระดับครัวเรือน",
   "19"=>"การตรวจสอบคุณภาพน้ำ",
   "20"=>"น้ำท่วม",
   "21"=>"ดินถล่ม",
   "22"=>"ไฟป่า",
   "23"=>"ภัยแล้ง",
   "24"=>"พายุ",
   "25"=>"แผ่นดินไหว",
   "26"=>"ดินเสื่อม",
   "27"=>"ดินเปรี๊ยว",
   "28"=>"ดินเค็ม",
   "29"=>"ดินจืด",
   "30"=>"หน้าดินถูกชะล้าง",
   "31"=>"ดินกรวด",
   "32"=>"ดินดาน",
   "33"=>"การจัดตลาดสดให้ถูกหลักสุขาภิบาล",
   "34"=>"การตรวจสอบคุณภาพและการปนเปื้อนของอาหารและผู้ประกอบการ",
   "35"=>"การจัดให้มีสถานที่ออกกำลังกายหรือสวนสาธารณะ",
   "36"=>"การจัดให้มีสถานที่สำหรับเป็นที่พบปะหรือทำกิจกรรมเพื่อส่วนรวม",
   "37"=>"การอนุรักษ์ฟื้นฟูทรัพยากรธรรมชาติในชุมชน"
   
   );
   $env2=array(
    "0"=>"กรุณาระบุลักษณะการจัดการปัญหา",
   "1"=>"ยังไม่ได้ดำเนินการ",
   "2"=>"การคัดแยกขยะ",
   "3"=>"การฝังกลบ",
   "4"=>"การทำเตาเผาขยะ",
   "5"=>"การทำปุ๋ยหมัก/ปุ๋ยอินทรีย์",
   "6"=>"การทำธนาคารขยะ",
   "7"=>"การจัดเก็บโดยอปท.(เทศบาล/อบต./อบจ.)",
   "8"=>"การทำบ่อบำบัดน้ำเสีย",
   "9"=>"การทำบ่อดักไขมันในครัวเรือน",
   "10"=>"การใช้วัสดุและอุปกรณ์ป้องกันการเกิดควันพิษและฝุ่นละออง",
   "11"=>"การใช้วัสดุและอุปกรณ์ป้องกันการเกิดเสียงดังรบกวน",
   "12"=>"การส่งเสริมการทำเกษตรอินทรีย์และลดปริมาณการใช้สารเคมี",
   "13"=>"การค้นหาจุดเสี่ยงหรือจุดอันตรายในชุมชน",
   "14"=>"การซ่อมแซมถนนส่วนที่ชำรุดเสียหาย",
   "15"=>"การติดไฟส่องสว่างในบริเวณที่เป็นจุดอันตราย",
   "16"=>"การจัดเวรยามรักษาความปลอดภัยในชุมชน",
   "17"=>"การติดป้ายหรือสัญญาณเตือนบริเวณที่เป็นจุดอันตราย",
   "18"=>"การจัดทำระบบประปาของชุมชน",
   "19"=>"การผลิตน้ำดื่มเพื่อจำหน่ายให้กับชุมชน",
   "20"=>"การจัดการน้ำสะอาดไว้แจกจ่ายกรณีเกิดภัยแล้ง",
   "21"=>"ส่งเสริมให้มีการใช้ภาชนะสำหรับกักเก็บน้ำ",
   "22"=>"สร้างและพัฒนาศักยภาพอาสาสมัคร",
   "23"=>"จัดตั้งศูนย์จัดารการภัยพิบัติ",
   "24"=>"พัฒนาฐานข้อมูลและการนำใช้ข้อมูล",
   "25"=>"จัดตั้งกองทุนหรือสวัสดิการช่วยเหลือ",
   "26"=>"จัดทำคู่มือหรือแนวทางปฏิบัติในการดูแลช่วยเหลือและสุขภาพ",
   "27"=>"มีระบบสื่อสารหรือแจ้งข้อมูล",
   "28"=>"มีศูนย์ประสานงานเพื่อการช่วยเหลือ",
   "29"=>"มีเครื่อข่ายสนับสนุนและให้การช่วยเหลือ",
   "30"=>"กำหนดกฏ กติกา นโยบายการจัดการภัยพิบัติ",
   "31"=>"กำหนดพื้นที่พักพิงหรือให้การช่วยเหลือ",
   "32"=>"มีระบบการเฝ้าระวังและติดตามภาวะเสี่ยง",
   "33"=>"มีการฟื้นฟูสภาพอย่างบูรณาการทั้งด้านสังคม เศรษฐกิจ สิ่งแวดล้อม",
   "34"=>"การใช้ปุ๋ยอินทรีย์ ปุ๋ยพืชสด ปุ๋ยคอก",
   "35"=>"การปลูกพืชหมุนเวียน",
   "36"=>"การไถกลบ",
   "37"=>"สารปรับปรุงบำรุงดิน (พด.1-7)",
   "38"=>"ปลูกพืชคลุมดิน",
   "39"=>"การรณรงค์ให้มีการลดปริมาณการใช้พลังงาน",
   "40"=>"มีการสำรวจตรวจสอบความถูกต้องการพลังงานทดแทนในระดับครัวเรือน",
   "41"=>"มีแผนการจัดการพลังงานทดแทน",
   "42"=>"มีข้อบัญญัติท้องถิ่น",
   "43"=>"มีศูนย์ถ่ายทอดความรู้ในการผลิตและใช้พลังงานทดแทน",
   "44"=>"การรณรงค์ให้มีปริมาณการใช้พลังงาน",
   "45"=>"มีการสำรวจตรวจสอบความต้องการพลังงานทดแทนในระดับครัวเรือน",
   "46"=>"มีแผนจัดการพลังงานทดแทน",
   
   );
$k=array(
    "0"=>"กรุณาระบุกิจกรรม",
   "1"=>"การออม เช่น การเข้าร่วมเป็นสมาชิกกลุามสวัสดิการ/กองทุน ธนาคารโรงเรียนออมวันละบาท เป็นต้น",
   "2"=>"การทำบัญชีครัวเรือน",
   "3"=>"กลุ่มอาชีพ",
   "4"=>"พัฒนาทักษะการประกอบอาชีพของแกนนำ ปราชญ์ชุมชน อาสาสมัคร แหล่งเรียนรู้ ศูนย์เรียนรู้ ฯลฯ",
   "5"=>"ค้นหาและพัฒนาช่องทางการตลาด เช่น ตลาดชุมชน ตลาดสีเขียว ร้านค้าชุมชน ฯลฯ",
   "6"=>"การจัดการท่องเที่ยวชุมชน",
   "7"=>"มีการบริหารจัดการน้ำเพื่อส่งเสริมกิจกรรมการประกอบอาชีพของชุมชน",
   "8"=>"ส่งเสริมการจัดการขยะชุมชนโดยการคัดแยกขยะเพื่อสร้างมูลค่า",
   "9"=>"สนับสนุนให้เกิดการจัดตั้งธนาคารขยะชุมชน",
   "10"=>"ส่งเสริมให้เกิดการผลิตอาหารปลอดภัย (เช่น การปลูกผักสวนครัวรั้วกินได้ กลุ่มข้าวอินทรีย์เพื่อการบริโภคและจำหน่าย)",
   "11"=>"ผลักดันให้เกิดกติกาเรื่องของการใช้พื้นที่สาธารณะเพื่อการผลิต เช่น ป่าชุมชน เป็นต้น",
   "12"=>"ส่งเสริมการพัฒนารูปแบบผลิตภัณฑ์เพื่อยกระดับสินค้าและเพิ่มมูลค่าสินค้า",
   "13"=>"ส่งเสริมและสนับสนุนให้มีแหล่งทุนหรือกองทุนในการประกอบอาชีพ",
   );
$type_dh12=array(
    "0"=>"กรุณาระบุประเภทของโรค",
"1"=>"ไข้เลือดออก",
"2"=>"โรคชิคุณกุนย่า",
"3"=>"มาลาเรีย",
"4"=>"วัณโรค",
"5"=>"โปลิโอ",
"6"=>"มือเท้าปากเปื่อย",
"7"=>"อุจจาระร่วง",
"8"=>"ไข้หวัดสายพันธุ์ใหม่",
"9"=>"โรคฉี่หนู",
"10"=>"ไข้หวัดนก",
"11"=>"ตาแดง",
"12"=>"HIV/AIDs",
"13"=>"การตรวจรักษาโรคเบื้องต้น",
"14"=>"การตรวจสุขภาพประจำปี/ตรวจคัดกรองโรค",
"15"=>"การจัดกิจกรรมควบคุมเฝ้าระวังป้องกันโรค",
"16"=>"การจัดบริการส่งต่อกรณีอุบัติเหตุ/ฉุกเฉิน",
"17"=>"การจัดบริการดูแลความปลอดภัยจากการทำงาน",
"18"=>"การจัดกิจกรรมเพื่อลดพฤติกรรมเสี่ยงเกี่ยวกับบุหรี่/สุรา",
"19"=>"การจัดกิจกรรมเพื่อลดพฤติกรรมเสี่ยงเกี่ยวกับสารเสพติด",
"20"=>"การจัดกิจกรรมเพื่อลดพฤติกรรมเสี่ยงเกี่ยวกับการบริโภคอาหาร",
"21"=>"การจัดกิจกรรมเพื่อส่งเสริมการออกกำลังกาย",
"22"=>"การจัดกิจกรรมเพื่อลดพฤติกรรมเสี่ยงเกี่ยวกับเพศสัมพันธ์ที่ไม่ปลอดภัย",
"23"=>"การอบรม/พัฒนาศักยภาพเกี่ยวกับการดูแลช่วยเหลือผู้ป่วย",
"24"=>"ศูนย์สาธารณสุขมูลฐานชุมชน",
"25"=>"โรงพยาบาลส่งเสริมสุขภาพระดับตำบล",
"26"=>"โรงพยาบาลรัฐ",
"27"=>"โรงพยาบาลเอกชน",
"28"=>"คลิกิกแพทย์",
"29"=>"คลินิกพยาบาล",
"30"=>"ร้านยา",
"31"=>"วัดที่ให้บริการด้านสุขภาพ",
"32"=>"บ้านหมอพื้นบ้าน/หมอสมุนไพร",
"33"=>"บ้านอสม.",
"34"=>"แพทย์",
"35"=>"พยาบาล",
"36"=>"เจ้าหน้าที่สาธารณสุข",
"37"=>"นักวิชาการสาธารณสุข",
"38"=>"เจ้าหน้าที่ทันตสาธารณสุข",
"39"=>"ผู้ช่วยพยาบาล",
"40"=>"อาสาสมัครสาธารณสุข(อสม.)",
"41"=>"หมอพื้นบ้าน",
"42"=>"อาสาสมัครอื่นๆ ที่ดูแลช่วยเหลือ",
"43"=>"กลุ่ม/ชมรมต่างๆ เช่น ผู้ป่วย ผู้สูงอายุ",
"44"=>"เฮโรอีน",
"45"=>"ฝิ่น",
"46"=>"กัญชา",
"47"=>"สารระเหย(กาว,ทินเนอร์)",
"48"=>"ใบกระท่อม",
"49"=>"ยาไอช์",
"50"=>"ยาบ้า",
"51"=>"ยาอี/ยาเลิฟ",
"52"=>"นักเรียน/นักศึกษา",
"53"=>"เกษตรกร",
"54"=>"กรรมกร",
"55"=>"รับจ้าง",
"56"=>"แรงงานต่างด้าว",
"57"=>"มีการตั้งจุดตรวจ/จุดเฝ้าระวังในหมู่บ้าน/ชุมชน",
"58"=>"มีการใช้กฏ/กติกาในหมู่บ้าน/ชุมชน",
"59"=>"มีการแจ้งข้อมูลข่าวสารแก่เจ้าหน้าที่/หน่วยงานภาครัฐ",
"60"=>"มีการจัดอบรมให้ความรู้แก่กลุ่มเสี่ยง",
"61"=>"มีการส่งผู้ติดสารเสพติดเข้ารับการบำบัด",
"62"=>"ส่งเสริมอาชีพให้แก่ผู้ที่เลิกสารเสพติดแล้ว",
"63"=>"มีการจัดตั้งกองทุนที่เกี่ยวข้องกับการแก้ไขปัญหาสารเสพติดในหมู่บ้าน/ชุมชน",
"64"=>"ไวรัสตับอักเสบ");
 $thaimonth=array(
    "00"=>"",
"01"=>"มกราคม",
"02"=>"กุมภาพันธ์",
"03"=>"มีนาคม",
"04"=>"เมษายน",
"05"=>"พฤษภาคม",
"06"=>"มิถุนายน",
"07"=>"กรกฎาคม",
"08"=>"สิงหาคม",
"09"=>"กันยายน",
"10"=>"ตุลาคม",
"11"=>"พฤศจิกายน",
"12"=>"ธันวาคม");
$thaimonth1=array(
    "00"=>"",
    "01"=>"ม.ค.",
    "02"=>"ก.พ.",
    "03"=>"มี.ค.",
    "04"=>"เม.ย.",
    "05"=>"พ.ค.",
    "06"=>"มิ.ย.",
    "07"=>"ก.ค.",
    "08"=>"ส.ค.",
    "09"=>"ก.ย.",
    "10"=>"ต.ค.",
    "11"=>"พ.ย.",
    "12"=>"ธ.ค.");
$direction_t1=array(
        "0"=>"",
        "1"=>"ทิศเหนือ",
        "2"=>"ทิศใต้",
        "3"=>"ทิศตะวันออก",
        "4"=>"ทิศตะวันตก"
        );
        $position_1=array(
            "0"=>"",
            "1"=>"ประธาน",
            "2"=>"รองประธาน",
            "3"=>"เลขานุการ"
            );
            $dep_1=array(
                "0"=>"",
                "1"=>"ภาครัฐ",
                "2"=>"ภาคเอกชน",
                "3"=>"ภาคชุมชน"
                );

                $status_dh1=array(
                    "0"=>"มี",
                    "1"=>"ไม่มี"
                    );
     

?>