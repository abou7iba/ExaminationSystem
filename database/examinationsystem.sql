-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 12:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examinationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_nid` varchar(255) NOT NULL,
  `admin_number` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_nid`, `admin_number`, `admin_password`, `admin_pincode`) VALUES
(1, 'الادارة', '00000000000000', '0103280755', '0000', '5555');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ex_id` int(11) NOT NULL,
  `ex_department` varchar(255) NOT NULL,
  `ex_band` varchar(255) NOT NULL,
  `ex_group` varchar(255) NOT NULL,
  `ex_subject` varchar(255) NOT NULL,
  `ex_time_for` varchar(255) NOT NULL,
  `ex_date` varchar(255) NOT NULL,
  `ex_description` varchar(255) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ex_id`, `ex_department`, `ex_band`, `ex_group`, `ex_subject`, `ex_time_for`, `ex_date`, `ex_description`, `d_id`) VALUES
(9, 'نظم المعلومات الادارية', 'الرابعة', '', 'نظم دعم القرار', 'ساعة', '2022-04-02', 'نظم دعم القرار', 1),
(10, 'نظم المعلومات الادارية', 'الرابعة', '', 'شبكات وامن المعلومات', 'ساعة', '2022-04-02', 'مادة شبكات وامن المعلومات', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ex_check`
--

CREATE TABLE `ex_check` (
  `ex_check_id` int(11) NOT NULL,
  `student_check_id` int(255) NOT NULL,
  `ex_id` int(255) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp(),
  `check_stutes` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `noti_id` int(11) NOT NULL,
  `noti_text` varchar(255) NOT NULL,
  `noti_time` time NOT NULL DEFAULT current_timestamp(),
  `noti_date` date NOT NULL DEFAULT current_timestamp(),
  `noti_for_band` varchar(255) NOT NULL,
  `noti_for_department` varchar(255) NOT NULL,
  `noti_add_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`noti_id`, `noti_text`, `noti_time`, `noti_date`, `noti_for_band`, `noti_for_department`, `noti_add_by`) VALUES
(1, 'اهلا بجميع طلاب المعهد العالي للإادره بالفرقة الرابعة', '00:00:00', '2022-02-05', 'الرابعة', 'نظم المعلومات الادارية', '1'),
(2, 'نرجوا من الجميع الالتزام بتعليمات السلامه والوقايه', '00:00:00', '2022-02-05', 'الاولي', 'نظم المعلومات الادارية', '1');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans1` varchar(255) NOT NULL,
  `ans2` varchar(255) NOT NULL,
  `ans3` varchar(255) NOT NULL,
  `ans4` varchar(255) NOT NULL,
  `cor_ans` varchar(255) NOT NULL,
  `ex_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `cor_ans`, `ex_id`) VALUES
(43, ' .يرمز الى مستودع البيانات بالرمز DW', 'صح', 'خطأ', '', '', 'صح', 9),
(44, 'يرمز الى نظم معلومات التنفيذيين ب ELS', 'صح', 'خطأ', '', '', 'صح', 9),
(45, 'يرمز الى نظم دعم القرار الموجة بالنموذج MDDSS', 'صح', 'خطأ', '', '', 'صح', 9),
(46, 'من النماذج الكمية التخاذ القرار نظرية االحتماالت', 'صح', 'خطأ', '', '', 'صح', 9),
(47, 'تهدف نظرية االحتماالت الى التأكيد من درجة عدم المخاطرة', 'صح', 'خطأ', '', '', 'صح', 9),
(48, ' .تهتم البرمجة الخطية بتخصيص الموارد المحدودة علي أوجه االستخدام غير المحدودة', 'صح', 'خطأ', '', '', 'صح', 9),
(49, 'تعمل البرمجة الديناميكية علي إيجاد الحل األمثل للمشاكل بصورة تتابعية', 'صح', 'خطأ', '', '', 'صح', 9),
(50, 'تستخدم برمجة األهداف عندما يكون للمؤسسة هدف واحد فقط', 'صح', 'خطأ', '', '', 'خطأ', 9),
(51, 'أسلوب المحاكاة يستخدم كنموذج ال يماثل الواقع الفعلي لمشكلة الدراس', 'صح', 'خطأ', '', '', 'صح', 9),
(52, 'نظرية األلعاب تستخدم في ظروف تتسم بالمنافسة', 'صح', 'خطأ', '', '', 'صح', 9),
(53, ' .يهدف تحليل التكلفة والعائد الي دراسة التكاليف في مقابل المكاسب المحققة', 'صح', 'خطأ', '', '', 'صح', 9),
(54, 'المؤشرات االقتصادية من اهم أساليب التنبؤ عند اتخاذ القرار للمنظمة', 'صح', 'خطأ', '', '', 'صح', 9),
(55, 'يحدد نموذج المخزون الكمية الواجب االحتفاظ بها مع تحديد الزمن', 'صح', 'خطأ', '', '', 'صح', 9),
(56, 'لمصطلح KDDSS يشير الى نظم دعم القرار الموجهة بالمعرفة', 'صح', 'خطأ', '', '', 'صح', 9),
(57, 'المصطلح IA يشير الى الوكيل الذكي كأحد أساليب النظم الموجهة بالمعرفة', 'صح', 'خطأ', '', '', 'صح', 9),
(58, 'تبدأ خطوات عملية صنع القرار بإيجاد الحلول المناسبة للمشكلة', 'صح', 'خطأ', '', '', 'خطأ', 9),
(59, 'مرحلة التشخيص هي المرحلة االولي في اتخاذ القرار', 'صح', 'خطأ', '', '', 'صح', 9),
(60, 'النظم الموجهة بالمستندات تبني علي برامج الرسوم', 'صح', 'خطأ', '', '', 'خطأ', 9),
(61, 'التنفيذ للحل الجيد يعتمد علي الواقعية والدقة', 'صح', 'خطأ', '', '', 'صح', 9),
(62, 'الجودة واألخالق من اهم سبل تقييم النتائج', 'صح', 'خطأ', '', '', 'خطأ', 9),
(63, 'الفترة الزمنية من اهم عوامل تحديد الهدف من القرار', 'صح', 'خطأ', '', '', 'خطأ', 9),
(64, 'البحث والتقصي عن المعلومات يقتصر علي البيئة الداخلية فقط', 'صح', 'خطأ', '', '', 'خطأ', 9),
(65, 'التنويه المستمر واحاطة ورش صنع القرار تحدد بالتغيرات المحتملة في الماضي', 'صح', 'خطأ', '', '', 'خطأ', 9),
(66, 'مساندة اإلدارة العليا في اتخاذ القرار تأخذ الطابع التنفيذي', 'صح', 'خطأ', '', '', 'خطأ', 9),
(67, 'تمر عملية اتخاذ القرار ب', 'البحث والاستطلاع ', 'التصميم', 'التنفيذ', 'كل ماسبق', 'كل ماسبق', 9),
(68, 'تختلف تكلفة اتخاذ القرار وفقا ل', 'مستوي الاداره', 'وجود اصل للمشكلة', 'لاشئ', 'أ و ب', 'أ و ب', 9),
(69, 'من عوامل تحديد التكلفة عند اتخاذ القرار', 'تكرار الصمت', 'تكرار الحديث', 'تكرار السلطة', 'تكرار الحدوث', 'تكرار الحدوث', 9),
(70, 'من نماذج اتخاذ القرار', 'العمل', 'الوفرة', 'الاختيار', 'التنبؤ', 'التنبؤ', 9),
(71, 'نموذج المحاكاة من النماذج', 'النصية', 'الرسومية', 'البرمجية', 'الرياضية', 'الرياضية', 9),
(72, ' .يفضل نموذج الرشد عند اتخاذ القرار', 'الجماعي', 'الاستراتيجي', 'الزمني', 'الفردي', 'الفردي', 9),
(73, 'يستخدم مدخل علم الادارة الاسلوب ......... عند اتخاذ قرار تنظيمي', 'علمي', 'فني', 'رسومي', 'رياضي', 'رياضي', 9),
(74, 'المشكلة هي ......... الاداء الفعلي عن الاداء المطلوب', 'تناغم', 'جمع', 'سبق', 'انحراف', 'انحراف', 9),
(75, 'نظم دعم القرار ......... دور مدير المنظمة', 'تجمد', 'تحجم', 'تقلل', 'تساند', 'تساند', 9),
(76, 'من وظائف الادارة', 'التخطيط', 'التنظيم', 'الرقابة', 'كل ما سبق', 'كل ما سبق', 9),
(77, 'الوظيفة الثالثة للادارة هي', 'التخطيط', 'التحليل', 'التصميم', 'اعداد الكفاءات اللازمة', 'اعداد الكفاءات اللازمة', 9),
(78, 'تقسم القرارات الي', 'مبرمجة', 'غير مبرمجة', 'شبهة مبرمجة', 'كل ما سبق', 'كل ما سبق', 9),
(79, 'قرارات اإلدارة العليا ', 'تنفيذية', 'تنافسية', 'تصميمية', 'استراتيجية', 'استراتيجية', 9),
(80, 'من مميزات وخدمات الجيل  الاول للإلنترنت البحث والتصفح ونقل الملفات', 'صح', 'خطأ', '', '', 'صح', 10),
(81, 'في الجيل الثانى من الإلنترنت تم الاعتماد على I A الذكاء اإلصطناعى', 'صح', 'خطأ', '', '', 'خطأ', 10),
(82, 'انواع شبكات الحاسب اآللى من حيث المساحة الجغرافية LAN – WAN', 'صح', 'خطأ', '', '', 'صح', 10),
(83, 'من وظائف معدات ربط الشبكة زيادة المساحة التي تغطيها الشبكة', 'صح', 'خطأ', '', '', 'صح', 10),
(84, 'المشغل Driver هو عباره عن برنامج يقوم بعمل اتصال مع كارت واجهه الشبكات مثل Internet', 'صح', 'خطأ', '', '', 'صح', 10),
(85, 'وحدة البيانات unit Data هو مصطلح عام للبيانات فى كل طبقات الشبكة', 'صح', 'خطأ', '', '', 'صح', 10),
(86, 'الرسالة Message تطلق على البيانات فى اى طبقة Presentation', 'صح', 'خطأ', '', '', 'خطأ', 10),
(87, 'من وسائل التحكم فى وصول البيانات فى الشبكة اولوية الطلب Priority Demand', 'صح', 'خطأ', '', '', 'صح', 10),
(88, 'ليس هناك فرق بين شبكة االنترنت والشبكة المحلية', 'صح', 'خطأ', '', '', 'خطأ', 10),
(89, 'يعتبر الراوتر \" Router \"من مكونات شبكات الحاسب', 'صح', 'خطأ', '', '', 'صح', 10),
(90, 'النطاق Domain هو برنامج يستخم الختيار القدرة الوصولية وانتظار الرد', 'صح', 'خطأ', '', '', 'خطأ', 10),
(91, 'صفحة Page Home هى صفحة ثانوية فى الموقع Web', 'صح', 'خطأ', '', '', 'خطأ', 10),
(92, 'العميل Agent هو الجزء من النظام الذى ينفذ عملية اعداد المعلومات وتبادلها بدالا عن Host', 'صح', 'خطأ', '', '', 'صح', 10),
(93, 'المضيف Host هو الكمبيوتر المركزى او المتحكم فى بيئه الشبكة', 'صح', 'خطأ', '', '', 'صح', 10),
(94, 'يوجد نوع واحد من الشبكات بشكل عام هو Server Client', 'صح', 'خطأ', '', '', 'خطأ', 10),
(95, 'يتميز Server Client أنه اكثر أمانا وفاعليه واقل مشاكل فى الاتصال', 'صح', 'خطأ', '', '', 'خطأ', 10),
(96, 'من وسائل الاتصال السلكية', 'الكابل المزدوج المجدول', 'الكابل المحورى', 'كابل األلياف البصريه', 'أ و ب', 'أ و ب', 10),
(97, 'تنقسم الشبكات حسب الشكل الهندسى الى ', 'خطية', 'نجمية', 'هرمية', 'كل ما سبق', 'كل ما سبق', 10),
(98, 'اهم المخاطر التي تهدد الشبكات', 'اتلاف البيانات والبرامج', 'سرقة المعلومات', 'بث فيروسات عبر الشبكة', 'كل ما سبق', 'كل ما سبق', 10),
(99, 'توفر الشبكة العديد من المزايا منها', 'تبادل المعلومات', 'برمجة التطبيقات', ' سرقة المعلومات', 'كل ما سبق', 'كل ما سبق', 10),
(100, 'عملية مشاركة األجهزة تتيح للمستخدمين إمكانية االستفادة من الاجهزة الملحقة على الشبكة مثل', 'الطابعات', 'الماسحات الضوئية', 'اجهزه الفاكس', 'كل ما سبق', 'كل ما سبق', 10),
(101, 'العميل Client هو ', ' جهاز كمبيوتر يقوم بطلب الخدمة من جهاز آخر', 'جهاز كمبيوتر يوفر الخدمة للمستخدمين', 'جهاز يربط بين المستخدمين والموزعين', 'الجهاز المتحكم في الشبكة', ' جهاز كمبيوتر يقوم بطلب الخدمة من جهاز آخر', 10),
(102, ' هو Agent', 'هو الموفر Server / Client', 'هو الجزء من النظام الذى ينفذ عملية اعداد المعلومات وتبادلها ', 'هو المضيف او المتحكم في الشبكة ', 'ا و ب', 'ا و ب', 10),
(103, 'المصطلح Ping هو', 'Uniform resource locator', 'Packet internal grouper', 'World wide web', 'Domain name system', 'Packet internal grouper', 10),
(104, 'من أنواع البروتكولات', 'IP', 'TCP', 'FTP', 'كل ما سبق', 'كل ما سبق', 10),
(105, 'بروتكول SMTP هو', 'أحد بر وتوكالت IP/TCP', 'يستخدم في ارسال وتلقى البريد اإللكترونى', 'تعيين عنوان بروتكول اإلنترنت بصوره ديناميكية الى الى أي جهاز على الشبكة', 'ا وب', 'ا وب', 10),
(106, 'النطاق Domain هو', 'الجزء من DNS الذى يحدد مكان شبكة الكمبيوتر', 'المزود لخدمة الانترنت للتصفح ', 'هو نظام في الويندوز يستخدم للتعامل مع الانترنت', ' برنامج الاتصال بصفحات الويب.', 'الجزء من DNS الذى يحدد مكان شبكة الكمبيوتر', 10),
(107, 'محرك البحث هو ', 'هو برنامج يتم استعماله للوصول الى الشبكة', 'تتيح تنفيذ عمليات بحث في صفحات الويب', 'الوصول لبحث او هدف معين في اإلنترنت', 'ب و ج', 'ب و ج', 10),
(108, 'المكونات المطلوبة لشبكة اإلنترنت ', 'جهاز يتم اعدادة كمزود ويب', 'متصفح انترنت', 'بروتكول IP/TCP', 'كل ما سبق', 'كل ما سبق', 10);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `res_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ex_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `ex_subject` varchar(255) NOT NULL,
  `total_degree` varchar(255) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `answer`, `question`, `ex_id`, `st_id`, `ex_subject`, `total_degree`, `time`, `date`) VALUES
(115, '', 'من المسؤل عن المشروع ؟', 1, 1, 'مشروع التخرج', '0', '23:21:10', '2022-03-25'),
(116, '', 'عام المشروع ؟', 1, 1, 'مشروع التخرج', '0', '23:21:10', '2022-03-25'),
(117, '', 'انا ؟', 1, 1, 'مشروع التخرج', '0', '23:21:10', '2022-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `sn_id` varchar(255) NOT NULL,
  `snumber` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `band` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `f_name`, `l_name`, `sn_id`, `snumber`, `department`, `band`, `dateofbirth`, `phone`, `state`) VALUES
(3, 'عبدالله السعيد', 'فتحي حسين', '55555555555555', '0000', 'نظم المعلومات الادارية', 'الرابعة', '', '01000000000', 0),
(4, 'شهاب علي', ' فتوح سعد', '22222222222222', '0000', 'نظم المعلومات الادارية', 'الرابعة', '1922 - 22-22', '01000000000', 0),
(5, 'شعبان عبدالسلام', 'محمد خفاجي', '33333333333333', '0000', 'نظم المعلومات الادارية', 'الرابعة', '2033-33-33', '01000000000', 0),
(6, 'محمد السيد', 'احمد سليمان', '44444444444444', '0000', 'نظم المعلومات الادارية', 'الرابعة', '', '01000000000', 0),
(7, 'احمد طه', 'بريك', '66666666666666', '0000', 'نظم المعلومات الادارية', 'الرابعة', '', '01000000000', 0),
(8, 'محمد ايمن ', 'عبدالفتاح لاشين', '77777777777777', '0000', 'نظم المعلومات الادارية', 'الرابعة', '', '01000000000', 0),
(9, 'كريم علي', 'محمد عبدالونيس', '88888888888888', '0000', 'نظم المعلومات الادارية', 'الرابعة', '', '01000000000', 0),
(10, 'محمود زيد', 'فتحي', '99999999999999', '0000', 'نظم المعلومات الادارية', 'الرابعة', '', '01000000000', 0),
(11, 'السيد حسن', 'علي محمد', '10101010101010', '0000', 'نظم المعلومات الادارية', 'الرابعة', '1801-01-01', '01000000000', 0),
(12, 'احمد عطية', 'سعد ابوهيبة', '11111111111111', '0000', 'نظم المعلومات الادارية', 'الرابعة', '1811-11-11', '01000000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_news`
--

CREATE TABLE `student_news` (
  `news_id` int(11) NOT NULL,
  `news_text` text NOT NULL,
  `news_department` varchar(255) NOT NULL,
  `news_band` varchar(255) NOT NULL,
  `news_time` time NOT NULL DEFAULT current_timestamp(),
  `news_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_news`
--

INSERT INTO `student_news` (`news_id`, `news_text`, `news_department`, `news_band`, `news_time`, `news_date`) VALUES
(5, '22222222222222', 'نظم المعلومات الادارية', 'الاولي', '21:22:52', '2022-03-25'),
(6, '0000000000000000', 'نظم المعلومات الادارية', 'الاولي', '22:31:48', '2022-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `table_ex`
--

CREATE TABLE `table_ex` (
  `table_ex` int(11) NOT NULL,
  `ex_name` varchar(255) NOT NULL,
  `ex_date` varchar(255) NOT NULL,
  `ex_time` varchar(255) NOT NULL,
  `ex_band` varchar(255) NOT NULL,
  `ex_department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_ex`
--

INSERT INTO `table_ex` (`table_ex`, `ex_name`, `ex_date`, `ex_time`, `ex_band`, `ex_department`) VALUES
(1, 'مشروع التخرج', '2022-04-04', '11:00', 'الرابعة', 'نظم المعلومات الادارية');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_n_id` varchar(255) NOT NULL,
  `teacher_username` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `teacher_pincode` varchar(255) NOT NULL,
  `teacher_date_of_birth` date NOT NULL,
  `teacher_nickname` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_phone` varchar(255) NOT NULL,
  `teacher_about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_n_id`, `teacher_username`, `teacher_password`, `teacher_pincode`, `teacher_date_of_birth`, `teacher_nickname`, `teacher_name`, `teacher_phone`, `teacher_about`) VALUES
(1, '28504040000000', 'dr_ayman', 'drayman2023', '4499', '0000-00-00', 'دكتور', 'ايمن ابوالنضر', '01022666191', 'دكتور ايمن ابوالنضر');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `ex_check`
--
ALTER TABLE `ex_check`
  ADD PRIMARY KEY (`ex_check_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `question` (`question`),
  ADD KEY `question_2` (`question`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `student_news`
--
ALTER TABLE `student_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `table_ex`
--
ALTER TABLE `table_ex`
  ADD PRIMARY KEY (`table_ex`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ex_check`
--
ALTER TABLE `ex_check`
  MODIFY `ex_check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_news`
--
ALTER TABLE `student_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_ex`
--
ALTER TABLE `table_ex`
  MODIFY `table_ex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
