-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2015 at 10:54 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"(-;-)


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */(-;-)
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */(-;-)
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */(-;-)
/*!40101 SET NAMES utf8 */(-;-)

--
-- Database: `active_supershop_installer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `name` longtext NOT NULL,
  `phone` longtext NOT NULL,
  `address` longtext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL,
  `role` varchar(10) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 (-;-)

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `phone`, `address`, `email`, `password`, `role`, `timestamp`) VALUES
(1, 'Mr. Master Admin', '', '', 'admin@shop.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', '')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(11) NOT NULL auto_increment,
  `page` longtext NOT NULL,
  `place` longtext NOT NULL,
  `num` longtext NOT NULL,
  `status` longtext NOT NULL,
  `link` longtext NOT NULL,
  PRIMARY KEY  (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 (-;-)

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `page`, `place`, `num`, `status`, `link`) VALUES
(1, 'home', 'after_slider', '1', 'ok', ''),
(2, 'home', 'after_slider', '2', 'ok', ''),
(3, 'home', 'after_slider', '3', 'ok', ''),
(4, 'home', 'after_slider', '4', 'ok', ''),
(5, 'home', 'after_featured', '1', '0', ''),
(6, 'home', 'after_featured', '2', '0', ''),
(7, 'home', 'after_featured', '3', '0', ''),
(8, 'home', 'after_featured', '4', '0', ''),
(9, 'home', 'after_search', '1', '0', ''),
(10, 'home', 'after_search', '2', '0', ''),
(11, 'home', 'after_search', '3', '0', ''),
(12, 'home', 'after_search', '4', '0', ''),
(13, 'home', 'after_category', '1', '0', ''),
(14, 'home', 'after_category', '2', '0', ''),
(15, 'home', 'after_category', '3', '0', ''),
(16, 'home', 'after_category', '4', '0', ''),
(17, 'home', 'after_latest', '1', '0', ''),
(18, 'home', 'after_popular', '1', '0', ''),
(19, 'home', 'after_most_viewed', '1', '0', ''),
(20, 'category', 'after_filters', '1', 'ok', ''),
(21, 'featured', 'after_most_sold', '1', '0', ''),
(22, 'featured', 'after_most_viewed', '1', '0', '')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL auto_increment,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(10) NOT NULL,
  PRIMARY KEY  (`brand_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 (-;-)

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `description`, `category`) VALUES
(1, 'Demo Brand 1', '0', '1'),
(2, 'Demo Brand 2', '0', '1'),
(3, 'Demo Brand 3', '0', '2'),
(4, 'Demo Brand 4', '0', '2'),
(5, 'Demo Brand 5', '0', '1'),
(6, 'Demo Brand 6', '0', '2') (-;-)

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE IF NOT EXISTS `business_settings` (
  `business_settings_id` int(11) NOT NULL auto_increment,
  `type` longtext NOT NULL,
  `status` varchar(10) NOT NULL,
  `value` longtext character set utf8 collate utf8_bin NOT NULL,
  PRIMARY KEY  (`business_settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 (-;-)

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`business_settings_id`, `type`, `status`, `value`) VALUES
(1, 'paypal_email', 'ok', ''),
(2, 'shipping_cost', 'ok', '0'),
(3, 'shipping_cost_type', '', 'product_wise'),
(4, 'currency', '', '$'),
(6, 'shipment_info', '', ''),
(7, 'currency_name', '', 'Dollar'),
(8, 'exchange', '', '1'),
(9, 'paypal_set', '', 'no'),
(10, 'paypal_type', '', 'sandbox'),
(11, 'faqs', '', '[{"question":"How to Pay on Delivery?","answer":"Please Provide cash money "}]') (-;-)

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 (-;-)

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
(1, 'Demo Category 1', '0'),
(2, 'Demo Category 2', '0')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 (-;-)


-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE IF NOT EXISTS `contact_message` (
  `contact_message_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `view` varchar(10) NOT NULL,
  `reply` longtext NOT NULL,
  `other` longtext NOT NULL,
  PRIMARY KEY  (`contact_message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 (-;-)

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`contact_message_id`, `name`, `subject`, `email`, `message`, `timestamp`, `view`, `reply`, `other`) VALUES
(1, 'm', '1', 'lashik7@gmail.com', 'm', '1436652624', 'no', '', '')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE IF NOT EXISTS `general_settings` (
  `general_settings_id` int(11) NOT NULL auto_increment,
  `type` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `value` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`general_settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 (-;-)

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`general_settings_id`, `type`, `value`) VALUES
(1, 'system_name', 'Active Super Shop'),
(2, 'system_email', 'admin@shop.com'),
(3, 'system_title', 'Active Super Shop'),
(4, 'address', ''),
(5, 'phone', ''),
(6, 'language', 'english'),
(9, 'terms_conditions', ''),
(10, 'fb_appid', ''),
(11, 'fb_secret', ''),
(12, 'google_languages', '{}'),
(24, 'meta_description', ''),
(25, 'meta_keywords', ''),
(26, 'meta_author', 'ActiveItZone'),
(27, 'captcha_public', '6LdsXPQSAAAAALRQB-m8Irt6-2_s2t10QsVnndVN'),
(28, 'captcha_private', '6LdsXPQSAAAAAFEnxFqW9qkEU_vozvDvJFV67yho'),
(29, 'application_name', 'Super Shop'),
(30, 'client_id', ''),
(31, 'client_secret', ''),
(32, 'redirect_uri', ''),
(33, 'api_key', ''),
(44, 'contact_about', ''),
(39, 'contact_phone', ''),
(40, 'contact_email', ''),
(41, 'contact_website', ''),
(42, 'footer_text', '<p><br></p>'),
(43, 'footer_category', '["1","2"]'),
(38, 'contact_address', ''),
(45, 'admin_notification_sound', 'no'),
(46, 'admin_notification_volume', '10.00'),
(47, 'privacy_policy', ''),
(48, 'discus_id', ''),
(49, 'home_notification_sound', 'no'),
(50, 'homepage_notification_volume', '10.00'),
(51, 'fb_login_set', 'no'),
(52, 'g_login_set', 'no')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `word_id` int(11) NOT NULL auto_increment,
  `word` longtext NOT NULL,
  `english` longtext character set utf8 collate utf8_bin NOT NULL,
  `Bangla` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `Spanish` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `Arabic` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `French` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `Chinese` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`word_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=562 (-;-)


--
-- Dumping data for table `language`
--

INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(1, 'home', 'Home', 'বাড়ি', 'Hogar', 'الصفحة الرئيسية', 'Accueil', '家'),
(2, 'toggle_navigation', 'Toggle Navigation', 'টগল ন্যাভিগেশন', 'Activar Navegación', 'تبديل للملاحة', 'Basculer la navigation', '切换导航'),
(3, 'our_products', 'Our Products', 'আমাদের পণ্য', 'Nuestros Productos', 'منتجاتنا', 'Nos Produits', '我们的产品'),
(4, 'featured_product', 'Featured Product', 'বৈশিষ্ট্যযুক্ত পণ্য', 'Producto Destacado', 'المنتج المميز', 'Produit En Vedette', '特色产品'),
(5, 'see_more', 'See More', 'আরো দেখুন', 'Ver Más', 'شاهد المزيد', 'Voir Plus', '查看更多'),
(6, 'contact', 'Contact', 'যোগাযোগ', 'Contacto', 'اتصال', 'Contact', '联系'),
(7, 'search_product', 'Search Product', 'অনুসন্ধান পণ্য', 'Buscar Producto', 'البحث عن منتج', 'Recherche produit', '搜索产品'),
(8, 'choose_category', 'Choose Category', 'বিভাগ নির্বাচন করুন', 'Escoja una Categoría', 'اختر الفئة', 'Choisissez Catégorie', '选择类别'),
(9, 'choose_sub_category', 'Choose Sub Category', 'উপ বিভাগ চয়ন করুন', 'Elige categoría Sub', 'اختر الفئة الرئيسية', 'Choisissez Sous catégorie', '选择子类别'),
(10, 'latest_products', 'Latest Products', 'সাম্প্রতিক পণ্যসমূহ', 'Últimos Productos', 'أحدث المنتجات', 'Derniers produits', '最新产品'),
(11, 'most_sold', 'Most Sold', 'সবথেকে বেশি বিক্রিত', 'Lo más Vendido', 'الأكثر مبيعا', 'La plupart Vendu', '最畅销的')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(12, 'most_viewed_products', 'Most Viewed Products', 'সর্বাধিক দেখা পণ্য', 'Productos más vistas', 'المنتجات الأكثر مشاهدة', 'Produits les plus consultés', '大多数浏览过的产品'),
(13, 'email_address', 'Email Address', 'এটি ইমেল ঠিকানা', 'Dirección De Correo Electrónico', 'عنوان البريد الإلكتروني', 'Adresse e-mail', '电子邮件地址'),
(14, 'subscribe', 'Subscribe', 'সদস্যতা', 'Suscribir', 'الاشتراك', 'S''abonner', '订阅'),
(15, 'categories', 'Categories', 'বিভাগ', 'Categorías', 'الفئات', 'Catégories', '分类'),
(16, 'useful_links', 'Useful Links', 'দরকারী লিংক', 'Enlaces Útiles', 'روابط مفيدة', 'Liens Utiles', '相关链接'),
(17, 'all_products', 'All Products', 'সব পণ্য', 'Todos Los Productos', 'جميع المنتجات', 'Tous Les Produits', '所有产品'),
(18, 'featured', 'Featured', 'বৈশিষ্ট্যযুক্ত', 'Destacado', 'ظهرت', 'Sélection', '精选'),
(19, 'contact_us', 'Contact Us', 'আমাদের সাথে যোগাযোগ করুন', 'Contáctenos', 'اتصل بنا', 'Contactez Nous', '联系我们'),
(20, 'phone', 'Phone', 'ফোন', 'Teléfono', 'هاتف', 'Téléphone', '电话'),
(21, 'website', 'Website', 'ওয়েবসাইট', 'Sitio web', 'الموقع', 'Site Internet', '网站'),
(22, 'email', 'Email', 'এটি ইমেল', 'Email', 'البريد الإلكتروني', 'Email', '电子邮件'),
(23, 'facebook', 'Facebook', 'ফেসবুক', 'Facebook', 'الفيسبوك', 'Facebook', 'Facebook的'),
(24, 'twitter', 'Twitter', 'টুইটার', 'Gorjeo', 'تغريد', 'Gazouillement', '推特')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(25, 'google_plus', 'Google Plus', 'গুগল প্লাস', 'Google Plus', 'جوجل بلس', 'Google Plus', '谷歌加'),
(26, 'youtube', 'Youtube', 'ইউটিউব', 'Youtube', 'يوتيوب', 'Youtube', 'YouTube的'),
(27, 'all_rights_reserved', 'All Rights Reserved', 'সর্বস্বত্ব সংরক্ষিত', 'Todos Los Derechos Reservados', 'جميع الحقوق محفوظة', 'Tous Droits Réservés', '版权所有'),
(28, 'terms_&_condition', 'Terms & Condition', 'বিধি - নিষেধ এবং শর্তাবলী', 'Términos Y Condiciones', 'الشروط والأحكام', 'Termes &amp; Conditions', '条款及条件'),
(29, 'privacy_policy', 'Privacy Policy', 'গোপনীয়তা নীতি', 'Política De Privacidad', 'سياسة الخصوصية', 'Politique de confidentialité', '隐私政策'),
(30, 'product_added_to_cart', 'Product Added To Cart', 'পণ্য কার্ট যোগ', 'Producto añadido al carrito', 'أضيف المنتج للسلة', 'Produit ajouté au panier', '产品已加入购物车'),
(31, 'added_to_cart', 'Added To Cart', 'কার্ট যোগ', 'Añadido a la cesta', 'تم إضافته للسلة', 'Ajouté au panier', '添加到购物车'),
(32, 'product_quantity_exceed_availability!', 'Product Quantity Exceed Availability!', 'উত্পাদনের মোট পরিমানের সহজলভ্যতা অতিক্রম!', 'Producto Cantidad Exceed disponibles!', 'المنتج الكمية تتجاوز توافر!', 'Produit Quantité dépassera la disponibilité!', '产品数量超越空房！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(33, 'product_already_added_to_cart!', 'Product Already Added To Cart!', 'পণ্য ইতিমধ্যে কার্ট যোগ!', 'Ya Producto añadido a la cesta!', 'المنتج أضفت إلى السلة!', 'Produit Déjà ajouté au panier!', '产品已添加到购物车！'),
(34, 'product_added_to_wishlist', 'Product Added To Wishlist', 'পণ্য শুরুতেই যোগ', 'Producto añadido a la lista de deseos', 'أضيف المنتج الى قائمه التمني', 'Produit ajouté à la liste', '产品添加到收藏'),
(35, 'added_to_wishlist', 'Added To Wishlist', 'শুরুতেই যোগ', 'Añadido a Mis Favoritos', 'أضيف الى قائمة الامنيات', 'Ajouté à la liste', '添加到收藏'),
(36, 'adding_to_wishlist..', 'Adding To Wishlist..', 'লটারি যোগ ..', 'Agregando a Mis Favoritos ..', 'إضافة إلى قائمة الامنيات ..', 'Ajout dans la liste ..', '添加到收藏..'),
(37, 'product_removed_from_wishlist', 'Product Removed From Wishlist', 'পণ্য সাইফুল থেকে সরানো হয়েছে', 'Producto Fuera De Regalos', 'تمت إزالة المنتج من قائمة الامنيات', 'Produit retiré de la liste d''envies', '产品移出收藏'),
(38, 'product_rated_successfully', 'Product Rated Successfully', 'পণ্য সফলভাবে রেট', 'Producto puntuado', 'المنتج تقييمه بنجاح', 'Produit nominale succès', '产品额定成功'),
(39, 'product_rating_failed', 'Product Rating Failed', 'পণ্য নির্ধারণ ব্যর্থ', 'Calificación del producto Falló', 'تقييم المنتج فشل', 'Évaluation du produit Échec', '产品评分失败')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(40, 'you_already_rated_this_product', 'You Already Rated This Product', 'যদি আপনি ইতিমধ্যেই এই পণ্য রেট', 'Ya has puntuado este producto', 'كنت إذا تقييمه هذا المنتج', 'Vous déjà évalué ce produit', '您已经评价过此产品'),
(41, 'working..', 'Working..', 'ওয়ার্কিং ..', 'Trabajo ..', 'العمل ..', 'De travail ..', '工作..'),
(42, 'you_already_subscribed', 'You Already Subscribed', 'আপনি ইতিমধ্যেই সদস্যতা', 'Usted ya Suscrito', 'كنت مشتركا بالفعل', 'Vous êtes déjà inscrit', '你已经订阅'),
(43, 'you_subscribed_successfully', 'You Subscribed Successfully', 'আপনি সফলভাবে সদস্যতা', 'Usted Suscrito con éxito', 'كنت قد اشتركت بنجاح', 'Vous avez souscrit avec succès', '您已成功订阅'),
(44, 'you_already_subscribed_thrice_from_this_browser', 'You Already Subscribed Thrice From This Browser', 'যদি আপনি ইতিমধ্যেই এই ব্রাউজার থেকে তিনবার সাবস্ক্রাইব', 'Usted ya Suscrito Thrice De Este Browser', 'كنت مشتركا بالفعل ثلاث مرات من هذا المتصفح', 'Vous êtes déjà inscrit trois fois depuis ce navigateur', '你已经订阅三次从这个浏览器'),
(45, 'logging_in..', 'Logging In..', 'লগ ইন ..', 'Iniciar Sesión ..', 'تسجيل الدخول ..', 'Connexion ..', '在登录..'),
(46, 'you_logged_in_successfully', 'You Logged In Successfully', 'আপনি সফলভাবে লগ ইন', 'Usted ha entrado en el éxito', 'لقد دخلت بنجاح', 'Vous êtes connecté avec succès', '你登录成功')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(47, 'login_failed!_try_again!', 'Login Failed! Try Again!', 'লগইন ব্যর্থ! </font><font>আবার চেষ্টা করুন!', 'Error De Inicio De Sesion! </font><font>Inténtalo De Nuevo!', 'فشل تسجيل الدخول! </font><font>حاول مرة أخرى!', 'Échec De La Connexion! </font><font>Essaye Encore!', '登录失败！</font><font>再试一次！'),
(48, 'submitting..', 'Submitting..', 'জমা ..', 'Envío de ..', 'تقديم ..', 'Envoi ..', '提交..'),
(49, 'email_sent_successfully', 'Email Sent Successfully', 'এটি ইমেল সফলভাবে পাঠানো', 'Email Enviado Satisfactoriamente', 'البريد الإلكتروني المرسلة بنجاح', 'Courriel envoyé avec succès', '电子邮件发送成功'),
(50, 'email_does_not_exist!', 'Email Does Not Exist!', 'ইমেইলটির কোন অস্তিত্ব নেই!', 'Email no existe!', 'البريد الإلكتروني غير موجود!', 'Email ne existe pas!', '电子邮件不存在！'),
(51, 'email_sending_failed!_try_again', 'Email Sending Failed! Try Again', 'এটি ইমেল ব্যর্থ পাঠানোর! </font><font>আবার চেষ্টা করুন', 'Envío de correo electrónico Error! </font><font>Inténtalo De Nuevo', 'إرسال البريد الإلكتروني فشل! </font><font>حاول مرة أخرى', 'Email envoi a échoué! </font><font>Essaye Encore', '电子邮件发送失败！</font><font>再试一次'),
(52, 'logging_in', 'Logging In', 'লগ ইন', 'Iniciar Sesión', 'تسجيل الدخول', 'Connexion', '在登录'),
(53, 'adding_to_cart..', 'Adding To Cart..', 'কার্ট যোগ ..', 'Añadiendo al carro ..', 'إضافة إلى السلة ..', 'Ajout au panier ..', '添加到购物车..')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(54, 'product_removed_from_cart', 'Product Removed From Cart', 'পণ্য কার্ট থেকে সরানো হয়েছে', 'Producto Fuera de la cesta', 'تمت إزالة المنتج من السلة', 'Produit retiré du panier', '产品移出车'),
(55, 'the_field_is_required', 'The Field Is Required', 'আপনি উত্তর দিবেন না', 'El campo es obligatorio', 'مطلوب الميدان', 'Le champ est obligatoire', '该字段是必须的'),
(56, 'logout', 'Logout', 'প্রস্থান', 'Cerrar Sesión', 'خروج', 'Se Déconnecter', '登出'),
(57, 'login', 'Login', 'লগইন', 'Iniciar Sesión', 'تسجيل الدخول', 'S''identifier', '登录'),
(58, 'register', 'Register', 'নিবন্ধন', 'Registrarse', 'تسجيل', 'Inscription', '注册'),
(59, 'sign_in', 'Sign In', 'প্রবেশ কর', 'Ingresar', 'تسجيل الدخول', 'S''inscrire', '签到'),
(60, 'do_not_have_account_?_click_', 'Do Not Have Account ? Click ', 'সেট ব্যবহার করা হয়নি? </font><font>দেখার জন্য ক্লিক করুন', 'No tiene cuenta? </font><font>Haga clic en', 'ليس لديك حساب؟ </font><font>انقر', 'Ne pas avoir un compte? </font><font>Cliquez', '没有帐户？</font><font>点击'),
(61, 'sign_up', 'Sign Up', 'নিবন্ধন করুন', 'Contratar', 'سجل', 'Signer', '签字'),
(62, 'add_to_cart', 'Add To Cart', 'কার্ট যোগ করুন', 'Añadir A La Cesta', 'أضف إلى السلة', 'Ajouter Au Panier', '添加到购物车'),
(63, 'to_registration_.', 'To Registration .', 'নিবন্ধন করুন.', 'Para inscripción.', 'إلى التسجيل.', 'Pour inscription.', '登记。')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(64, 'password', 'Password', 'পাসওয়ার্ড', 'Contraseña', 'كلمة السر', 'Mot de passe', '密码'),
(65, 'forget_your_password_?', 'Forget Your Password ?', 'আপনার পাসওয়ার্ড ভুলে গেছেন?', 'Olvidaste Tu Contraseña?', 'نسيت كلمة المرور؟', 'Mot De Passe Oublié?', '忘记密码？'),
(66, 'log_in', 'Log In', 'আপনার যাত্রা শুরু করুন', 'Iniciar Sesión', 'تسجيل الدخول', 'S''identifier', '登录'),
(67, 'forgot_password', 'Forgot Password', 'পাসওয়ার্ড ভুলে গেছেন', 'Has Olvidado Tu Contraseña', 'نسيت كلمة المرور', 'Mot De Passe Oublié', '忘记密码'),
(68, 'submit', 'Submit', 'জমা দিন', 'Enviar', 'عرض', 'Soumettre', '提交'),
(69, 'close', 'Close', 'ঘনিষ্ঠ', 'Cerrar', 'قريب', 'Fermer', '关闭'),
(70, 'already_signed Up?_click', 'Already Signed Up? Click', 'ইতিমধ্যে সাইন আপ? </font><font>দেখার জন্য ক্লিক করুন', 'Ya está inscrito? </font><font>Haga clic en', 'توقيع بالفعل؟ </font><font>انقر', 'Déjà inscrit? </font><font>Cliquez', '已注册？</font><font>点击'),
(71, 'to_login_your_account', 'To Login Your Account', 'আপনার একাউন্টে লগইন করার জন্য', 'Para Entrar Tu Cuenta', 'لتسجيل الدخول إلى حسابك', 'Pour Connexion Votre compte', '要登录您的账户'),
(72, 'confirm_password', 'Confirm Password', 'পাসওয়ার্ড নিশ্চিত করুন', 'Confirmar Contraseña', 'تأكيد كلمة السر', 'Confirmez Le Mot De Passe', '确认密码')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(73, 'your_first_name', 'Your First Name', 'তোমার নামের প্রথম অংশ', 'Su Nombre', 'الاسم الأول', 'Ton Prénom', '你的名字'),
(74, 'your_last_name', 'Your Last Name', 'তোমার শেষ নাম', 'Tu Apellido', 'اسمك الاخير', 'Votre Nom De Famille', '你的姓氏'),
(75, 'address_line_1', 'Address Line 1', 'ঠিকানা লেখার জায়গা 1', 'Dirección Línea 1', 'العنوان سطر 1', 'Adresse 1', '地址第一行'),
(76, 'address_line_2', 'Address Line 2', 'ঠিকানা লাইন ২', 'Dirección Línea 2', 'سطر العنوان 2', 'Adresse Ligne 2', '地址行2'),
(77, 'city', 'City', 'শহর', 'Ciudad', 'مدينة', 'Ville', '城市'),
(78, 'ZIP', 'ZIP', 'জিপ', 'Postal', 'ZIP', 'Postal', 'ZIP'),
(79, 'password_mismatched', 'Password Mismatched', 'পাসওয়ার্ড মিলছে না', 'Contraseña Mismatched', 'كلمة المرور غير متطابقة', 'Mot de passe Mismatched', '密码不匹配'),
(80, 'products', 'Products', 'পণ্য', 'Productos', 'المنتجات', 'Produits', '制品'),
(81, 'filter_by', 'Filter By', 'দ্বারা ফিল্টার', 'Filtrado Por', 'تصفية حسب', 'Filtrer Par', '过滤方式'),
(82, 'category', 'Category', 'শ্রেণী', 'Categoría', 'فئة', 'Catégorie', '类别'),
(83, 'price', 'Price', 'মূল্য', 'Precio', 'السعر', 'Prix', '价格'),
(84, 'results', 'Results', 'ফলাফল', 'Resultados', 'النتائج', 'Résultats', '结果'),
(85, 'sign_in_to_your_account', 'Sign In To Your Account', 'আপনার অ্যাকাউন্টে সাইন ইন করুন', 'Iniciar Sesión En Su Cuenta', 'تسجيل الدخول إلى حسابك', 'Connectez-vous à votre compte', '登录到您的帐户')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(86, 'forget_password', 'Forget Password', 'পাসওয়ার্ড ভুলে', 'Contraseña Olvidada', 'نسيت كلمة المرور', 'Mot De Passe Oublié', '忘记密码'),
(87, 'email_sent_with_new_password!', 'Email Sent With New Password!', 'এটি ইমেল নতুন পাসওয়ার্ড দিয়ে পাঠানো হয়েছে!', 'Correo electrónico enviado con la nueva contraseña!', 'البريد الإلكتروني المرسلة وكلمة المرور الجديدة!', 'Email envoyé avec nouveau mot de passe!', '电子邮件发送的新密码！'),
(88, 'cancelled', 'Cancelled', 'বাতিল হয়েছে', 'Cancelado', 'إلغاء', 'Annulé', '取消'),
(89, 'this_field_is_required', 'This Field Is Required', 'ঘরটি অবশ্যই পূরণ করতে হবে', 'Este Campo Es Requerido', 'هذه الخانة مطلوبه', 'Ce Champ Est Obligatoire', '这是必填栏'),
(90, 'signing_in...', 'Signing In...', 'সাইন ইন ...', 'Firmar En ...', 'تسجيل الدخول ...', 'Connectez-Vous ...', '登录...'),
(91, 'new_password_sent_to_your_email', 'New Password Sent To Your Email', 'আপনার ইমেল প্রেরণ নতুন পাসওয়ার্ড', 'Nueva contraseña enviada a su correo electrónico', 'كلمة السر الجديدة المرسلة إلى البريد الإلكتروني الخاص بك', 'Nouveau mot de passe envoyé à votre e-mail', '发送到您的邮箱新密码'),
(92, 'login_failed!', 'Login Failed!', 'লগইন ব্যর্থ!', 'Error De Inicio De Sesion!', 'فشل تسجيل الدخول!', 'Échec De La Connexion!', '登录失败！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(93, 'wrong_e-mail_address!_try_again', 'Wrong E-mail Address! Try Again', 'ভুল ইমেইল ঠিকানা! </font><font>আবার চেষ্টা করুন', 'Mail E-mail! </font><font>Inténtalo De Nuevo', 'الخطأ عنوان البريد الإلكتروني! </font><font>حاول مرة أخرى', 'Mauvaise adresse e-mail! </font><font>Essaye Encore', '错误的电子邮件地址！</font><font>再试一次'),
(94, 'login_successful!', 'Login Successful!', 'সফল লগইন!', 'Inicio de sesión correcto!', 'دخول ناجح!', 'Connexion Réussie!', '登录成功！'),
(95, 'SUCCESS!', 'SUCCESS!', 'সাফল্য!', 'ÉXITO!', 'النجاح!', 'SUCCÈS!', '成功了！'),
(96, 'reset_password', 'Reset Password', 'পাসওয়ার্ড রিসেট করুন', 'Restablecer La Contraseña', 'إعادة تعيين كلمة المرور', 'Réinitialiser Le Mot De Passe', '重设密码'),
(97, 'visit_home_page', 'Visit Home Page', 'হোম পেজ দেখুন', 'Visita la página de Inicio', 'زيارة الصفحة الرئيسية', 'Visitez la page d''accueil', '访问主页'),
(98, 'profile', 'Profile', 'প্রোফাইল', 'Perfil', 'الملف الشخصي', 'Profil', '轮廓'),
(99, 'dashboard', 'Dashboard', 'ড্যাশবোর্ড', 'Tablero', 'لوحة القيادة', 'Tableau de bord', '仪表盘'),
(100, '24_hours_stock', '24 Hours Stock', '24 ঘন্টা স্টক', '24 Horas de la', '24 ساعة المالية', '24 Heures Stock', '24小时股票'),
(101, '24_hours_sale', '24 Hours Sale', '24 ঘন্টা বিক্রয়', '24 Horas Venta', '24 ساعة بيع', '24 Heures Vente', '24小时销售'),
(102, '24_hours_destroy', '24 Hours Destroy', '24 ঘন্টা ধ্বংস', '24 Horas Destroy', '24 ساعة تدمير', '24 Heures Destroy', '24小时销毁')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(103, 'pending_order_map', 'Pending Order Map', 'পেন্ডিং অর্ডারের ম্যাপ', 'Orden Pendiente Mapa', 'في انتظار ترتيب خريطة', 'Commande de cartes en attente', '挂单地图'),
(104, 'present_customer_live_on_your_store', 'Present Customer Live On Your Store', 'আপনার দোকান উপস্থিত গ্রাহক লাইভ', 'Presente en Vivo al cliente en su tienda', 'الحالي العملاء يعيشون على مخزن لديك', 'Présent en direct à la clientèle sur votre boutique', '目前客户住在你的店'),
(105, 'category_wise_monthly_stock', 'Category Wise Monthly Stock', 'বিভাগের বিজ্ঞ মাসিক স্টক', 'Categoría Wise Mensual Stock', 'فئة الحكيم المالية الشهرية', 'Catégorie Wise mensuel Stock', '明智类股票月刊'),
(106, 'category_wise_monthly_sale', 'Category Wise Monthly Sale', 'বিভাগের বিজ্ঞ মাসিক বিক্রয়', 'Categoría Wise Mensual Venta', 'الفئة بيع الحكيم شهري', 'Catégorie Wise vente mensuel', '分类明智每月销售'),
(107, 'category_wise_monthly_destroy', 'Category Wise Monthly Destroy', 'বিভাগের বিজ্ঞ মাসিক ধ্বংস', 'Categoría Wise Mensual Destroy', 'تدمير فئة الحكيم شهري', 'Détruisez Catégorie Wise mensuel', '分类明智每月销毁'),
(108, 'category_wise_monthly_grand_profit', 'Category Wise Monthly Grand Profit', 'বিভাগের বিজ্ঞ মাসিক গ্র্যান্ড লাভ', 'Categoría Wise Mensual Gran Beneficio', 'فئة الحكيم الشهرية الكبرى الربح', 'Catégorie Wise mensuel de Grand Profit', '分类明智每月利润大'),
(109, 'cost', 'Cost', 'মূল্য', 'Costo', 'كلفة', 'Coût', '费用')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(110, 'value', 'Value', 'মান', 'Valor', 'قيمة', 'Valeur', '值'),
(111, 'loss', 'Loss', 'ক্ষতি', 'Pérdida', 'خسارة', 'Perte', '失利'),
(112, 'profit', 'Profit', 'লাভ', 'Beneficio', 'ربح', 'Bénéfice', '利润'),
(113, 'sub-category', 'Sub-category', 'উপ-বিভাগ', 'Sub-categoría', 'الفئة الفرعية', 'Sous-catégorie', '分类别'),
(114, 'brands', 'Brands', 'ব্লগ', 'Marcas', 'العلامات التجارية', 'Marques', '品牌'),
(115, 'product_stock', 'Product Stock', 'পণ্য স্টক', 'Stock del producto', 'الأسهم المنتج', 'Stock de produits', '产品库存'),
(116, 'sale', 'Sale', 'বিক্রয়', 'Venta', 'بيع', 'Vente', '卖'),
(117, 'reports', 'Reports', 'প্রতিবেদন', 'Informes', 'تقارير', 'Rapports', '报告'),
(118, 'product_compare', 'Product Compare', 'পণ্য তুলনা', 'Producto Comparar', 'المنتج قارن', 'Produit Comparer', '产品比较'),
(119, 'product_wishes', 'Product Wishes', 'পণ্য শুভেচ্ছা', 'Los deseos del producto', 'التمنيات المنتج', 'Voeux du produit', '产品愿望'),
(120, 'customers', 'Customers', 'গ্রাহকরা', 'Clientes', 'الزبائن', 'Clientèle', '客户'),
(121, 'create_new_page', 'Create New Page', 'নতুন পৃষ্ঠা তৈরি করুন', 'Crear nueva página', 'إنشاء صفحة جديدة', 'Créer une page', '创建新页面'),
(122, 'create_slider', 'Create Slider', 'স্লাইডার তৈরি করুন', 'Crear deslizante', 'إنشاء المتزلج', 'Créer Curseur', '创建滑块'),
(123, 'front_settings', 'Front Settings', 'ফ্রন্ট সেটিংস', 'Ajustes delanteros', 'إعدادات الأمامية', 'Réglages avant', '前方设置')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(124, 'banner_settings', 'Banner Settings', 'ব্যানার সেটিংস', 'Ajustes Banner', 'إعدادات راية', 'Paramètres de Bannière', '横幅设置'),
(125, 'site_settings', 'Site Settings', 'সাইট সেটিংস', 'Configuración del sitio', 'إعدادات الموقع', 'Paramètres du site', '网站设置'),
(126, 'staffs', 'Staffs', 'কর্মীরা', 'Estados Mayores', 'الموظفين', 'Staffs', '工作人员'),
(127, 'all_staffs', 'All Staffs', 'সমস্ত লাঠি', 'Todos los Estados Mayores', 'كل الأركان', 'Tous les états-majors', '所有员工'),
(128, 'staff_permissions', 'Staff Permissions', 'স্টাফ অনুমতি', 'Permisos de los funcionarios', 'ضوابط الموظفين', 'Permission de personnel', '工作人员权限'),
(129, 'messaging', 'Messaging', 'মেসেজিং', 'Mensajería', 'الرسائل', 'Messagerie', '消息'),
(130, 'newsletters', 'Newsletters', 'নিউজ লেটার', 'Boletines', 'النشرات الإخبارية', 'Bulletins', '简讯'),
(131, 'contact_messages', 'Contact Messages', 'যোগাযোগ বার্তা', 'Contacto Mensajes', 'رسائل الاتصال', 'Contacts Messages', '联系信息'),
(132, 'language', 'Language', 'ভাষা', 'Idioma', 'لغة', 'Langue', '语言'),
(133, 'business_settings', 'Business Settings', 'ব্যবসায়ের সেটিংসের', 'Configuración de negocio', 'إعدادات التجارية', 'Réglages d''affaires', '商业环境'),
(134, 'manage_admin_profile', 'Manage Admin Profile', 'অ্যাডমিন প্রোফাইল গালাগাল প্রতিবেদন করো', 'Administrar perfil de administrador', 'إدارة الملف الشخصي ل admin', 'Gérer un profil administrateur', '管理管理员配置')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(135, 'SEO_proggres', 'SEO Proggres', 'এসইও Proggres', 'SEO Proggres', 'SEO Proggres', 'SEO Proggres', 'SEO Proggres'),
(136, 'online_tutorial', 'Online Tutorial', 'অনলাইন টিউটোরিয়াল', 'Tutorial en línea', 'دروس عبر الإنترنت', 'Didacticiel en ligne', '在线教程'),
(137, 'checkout', 'Checkout', 'হোটেল হইতে বিদায়সময়', 'Revisa', 'الدفع', 'Check-Out', '查看'),
(138, 'deleted_successfully', 'Deleted Successfully', 'সফলভাবে মোছা হয়েছে', 'Eliminado correctamente', 'حذف بنجاح', 'Supprimé avec succès', '成功删除'),
(139, 'cancel', 'Cancel', 'বাতিল', 'Cancelar', 'إلغاء', 'Annuler', '取消'),
(140, 'required', 'Required', 'প্রয়োজনীয়', 'Necesario', 'مطلوب', 'Requis', '需要'),
(141, 'must_be_a_number', 'Must Be A Number', 'একটি সংখ্যা হতে হবে', 'Debe Ser Un Número', 'يجب أن يكون هناك عدد', 'Doit être un nombre', '必须是数字'),
(142, 'must_be_a_valid_email_address', 'Must Be A Valid Email Address', 'একটি বৈধ ইমেইল ঠিকানা আবশ্যক', 'Debe ser una dirección de correo electrónico válida', 'يجب أن يكون عنوان بريد إلكتروني صالح', 'Doit être une adresse e-mail valide', '必须是一个有效的E-Mail地址'),
(143, 'save', 'Save', 'সংরক্ষণ', 'Guardar', 'حفظ', 'Sauvegarder', '保存'),
(144, 'product_published!', 'Product Published!', 'পণ্য প্রকাশিত!', 'Producto Publicado!', 'المنتج النشر!', 'Publié produit!', '产品发布！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(145, 'product_unpublished!', 'Product Unpublished!', 'পণ্য অপ্রকাশিত!', 'Producto Inédito!', 'المنتج غير منشورة!', 'Produit inédit!', '产品未公布！'),
(146, 'product_featured!', 'Product Featured!', 'পণ্য দেখানো হয়েছে!', 'Producto Destacado!', 'منتج مميز!', 'Produit vedette!', '产品特色！'),
(147, 'product_unfeatured!', 'Product Unfeatured!', 'পণ্য Unfeatured!', 'Sin rasgos producto!', 'Unfeatured المنتج!', 'Unfeatured produit!', '产品Unfeatured！'),
(148, 'slider_published!', 'Slider Published!', 'স্লাইডার প্রকাশিত!', 'Deslizador Publicado!', 'المنزلق نشر!', 'Publié curseur!', '滑块发布！'),
(149, 'slider_unpublished!', 'Slider Unpublished!', 'স্লাইডার অপ্রকাশিত!', 'Deslizador Inédito!', 'التمرير غير منشورة!', 'Curseur inédit!', '滑块未公布！'),
(150, 'page_published!', 'Page Published!', 'পৃষ্ঠা প্রকাশিত!', 'Página Publicado!', 'الصفحة نشر!', 'Publié page!', '网页发布！'),
(151, 'page_unpublished!', 'Page Unpublished!', 'পাতা অপ্রকাশিত!', 'Página Inédito!', 'الصفحة غير منشورة!', 'Page inédite!', '页面未公布！'),
(152, 'notification_sound_enabled!', 'Notification Sound Enabled!', 'বিজ্ঞপ্তি সাউন্ড সক্ষম!', 'Notificación de sonido activado!', 'الإخطار الصوت المتعددة!', 'Notification sonore activé!', '通知启用声音！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(153, 'notification_sound_disabled!', 'Notification Sound Disabled!', 'বিজ্ঞপ্তি সাউন্ড নিষ্ক্রিয়!', 'Notificación de sonido discapacitados!', 'الإخطار الصوت معطل!', 'Notification sonore handicapés!', '通知声音残疾人！'),
(154, 'google_login_enabled!', 'Google Login Enabled!', 'গুগল লগ-ইন সক্রিয়!', 'Google Login Habilitado!', 'جوجل الدخول ممكن!', 'Google Connexion activé!', '谷歌登录启用！'),
(155, 'google_login_disabled!', 'Google Login Disabled!', 'গুগল লগইন অক্ষম!', 'Google Acceso de minusválidos!', 'جوجل تسجيل الدخول معطل!', 'Google Login Disabled!', '谷歌禁用登录！'),
(156, 'facebook_login_enabled!', 'Facebook Login Enabled!', 'ফেসবুক লগ-ইন সক্রিয়!', 'Facebook Login Habilitado!', 'الفيسبوك تسجيل الدخول ممكن!', 'Facebook Connexion activé!', 'Facebook的登录启用！'),
(157, 'facebook_login_disabled!', 'Facebook Login Disabled!', 'ফেসবুক লগইন অক্ষম!', 'Facebook Login discapacitados!', 'الفيسبوك تسجيل الدخول معطل!', 'Facebook Login Disabled!', 'Facebook的登录禁用！'),
(158, 'paypal_payment_disabled!', 'Paypal Payment Disabled!', 'পেপ্যাল ​​পেমেন্ট অক্ষম!', 'El pago de PayPal habilitado!', 'باي بال الدفع معطل!', 'Paiement Paypal désactivé!', '支付宝付款禁用！'),
(159, 'paypal_payment_enabled!', 'Paypal Payment Enabled!', 'পেপ্যাল ​​পেমেন্ট সক্ষম!', 'El pago de PayPal Habilitado!', 'باي بال الدفع المتعددة!', 'Paiement Paypal activé!', 'Paypal支付启用！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(160, 'manage_categories', 'Manage Categories', 'বিভাগ গালাগাল', 'Gestionar Categorías', 'إدارة الفئات', 'Gérer Les Catégories', '管理类别'),
(161, 'add_category', 'Add Category', 'বিভাগ যোগ করুন', 'Guardar Categoría', 'إضافة فئة', 'Ajouter Catégorie', '添加类别'),
(162, 'successfully_added!', 'Successfully Added!', 'সফলভাবে যোগ করা হয়েছে!', 'Con éxito Añadido!', 'واضاف بنجاح!', 'Ajouté avec succès!', '添加成功！'),
(163, 'create_category', 'Create Category', 'বিভাগ তৈরি করুন', 'Crear categoría', 'إنشاء الفئة', 'Créer une catégorie', '创建类别'),
(164, 'no', 'No', 'না', 'No', 'لا', 'Non', '没有'),
(165, 'name', 'Name', 'নাম', 'Nombre', 'اسم', 'Nom', '名字'),
(166, 'options', 'Options', 'বিকল্প', 'Opciones', 'خيارات', 'Options', '选项'),
(167, 'manage_sub_categories', 'Manage Sub Categories', 'উপ বিভাগ গালাগাল', 'Administrar Sub Categorías', 'إدارة الفئات الفرعية', 'Gérer Sous-catégories', '管理子分类'),
(168, 'add_sub-category', 'Add Sub-category', 'উপ-বিভাগ যোগ করুন', 'Añadir Sub-categoría', 'إضافة فئة الفرعية', 'Ajouter Sous-catégorie', '添加子类别'),
(169, 'create_sub_category', 'Create Sub Category', 'উপ বিভাগ তৈরি করুন', 'Crear Subcategoría', 'إنشاء التصنيف الفرعي', 'Créez Sous catégorie', '创建子类别'),
(170, 'sub_category', 'Sub Category', 'সাব বিভাগ', 'Sub Categoría', 'التصنيف الفرعي', 'Sous catégorie', '子类别')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(171, 'manage_brands', 'Manage Brands', 'ব্র্যান্ড পরিচালনা', 'Administrar las marcas', 'إدارة العلامات التجارية', 'Gérer Marques', '管理品牌'),
(172, 'add_brand', 'Add Brand', 'ব্র্যান্ড যোগ', 'Añadir Marca', 'إضافة العلامة التجارية', 'Ajouter Marque', '添加品牌'),
(173, 'create_brand', 'Create Brand', 'ব্র্যান্ড তৈরি করুন', 'Crear Marca', 'إنشاء العلامة التجارية', 'Créer Marque', '创建品牌'),
(174, 'logo', 'Logo', 'লোগো', 'Logo', 'الشعار', 'Logo', '徽标'),
(175, 'brand', 'Brand', 'ব্র্যান্ড', 'Marca', 'علامة تجارية', 'Marque', '牌'),
(176, 'manage_product', 'Manage Product', 'পণ্য গালাগাল প্রতিবেদন করো', 'Manejo de Producto', 'إدارة المنتج', 'Gérer produit', '管理产品'),
(177, 'add_product', 'Add Product', 'পণ্য যোগ করুন', 'Añadir Producto', 'إضافة منتج', 'Ajouter un produit', '添加产品'),
(178, 'create_product', 'Create Product', 'পণ্য তৈরি করুন', 'Crear Producto', 'إنشاء المنتج', 'Créez produit', '创建产品'),
(179, 'back_to_product_list', 'Back To Product List', 'পিছনে পণ্য তালিকায়', 'Volver al listado de productos', 'الرجوع إلى قائمة المنتجات', 'Retour à la liste de produit', '返回产品列表'),
(180, 'image', 'Image', 'ভাবমূর্তি', 'Imagen', 'صورة', 'Image', '图像'),
(181, 'title', 'Title', 'খেতাব', 'Título', 'عنوان', 'Titre', '称号'),
(182, 'current_quantity', 'Current Quantity', 'বর্তমান পরিমাণ', 'Cantidad actual', 'الكمية الحالية', 'Quantité actuelle', '电流量')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(183, 'publish', 'Publish', 'প্রকাশ করা', 'Publicar', 'نشر', 'Publier', '发布'),
(184, 'product', 'Product', 'পণ্য', 'Producto', 'المنتج', 'Produit', '产品'),
(185, 'quantity', 'Quantity', 'পরিমাণ', 'Cantidad', 'كمية', 'Quantité', '数量'),
(186, 'sale Price', 'Sale Price', 'বিক্রয় মূল্য', 'Precio De Venta', 'سعر البيع', 'Prix ​​De Vente', '销售价格'),
(187, 'creation Date', 'Creation Date', 'তৈরির তারিখ', 'Fecha De Creacion', 'تاريخ الإنشاء', 'Date De Création', '创建日期'),
(188, 'manage_banner', 'Manage Banner', 'ব্যানার গালাগাল প্রতিবেদন করো', 'Administrar Banner', 'إدارة راية', 'Gérer Bannière', '管理横幅'),
(189, 'homepage', 'Homepage', 'হোম পেজ', 'Página principal', 'الصفحة الرئيسية', 'Page d''accueil', '主页'),
(190, 'category_page', 'Category Page', 'বিভাগ পাতায় লেখা', 'Categoría Página', 'الفئة الصفحة', 'Catégorie page', '分类页'),
(191, 'featured_page', 'Featured Page', 'আলোচিত পাতা', 'Página Destacado', 'صفحة مميزة', 'Vedette page', '推荐页面'),
(192, 'after_slider', 'After Slider', 'স্লাইডার পর', 'Después deslizante', 'بعد المتزلج', 'Après Curseur', '后滑块'),
(193, 'select_banner_image', 'Select Banner Image', 'ব্যানার চিত্র নির্বাচন করুন', 'Seleccionar Imagen del Anuncio', 'حدد راية صورة', 'Sélectionnez Banner Image', '选择横幅图片'),
(194, 'link', 'Link', 'লিংক', 'Enlace', 'صلة', 'Lien', '链接'),
(195, 'updating..', 'Updating..', 'আপডেট ..', 'Actualizando ..', 'تحديث ..', 'Mise à jour ..', '更新..')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(196, 'settings_updated!', 'Settings Updated!', 'সেটিংস আপডেট!', 'Ajustes Actualizado!', 'الإعدادات المحدثة!', 'Paramètres Mise à jour!', '设置更新！'),
(197, 'update', 'Update', 'আপডেট', 'Actualización', 'التحديث', 'Mise À Jour', '更新'),
(198, 'after_featured', 'After Featured', 'পরে বৈশিষ্ট্যযুক্ত', 'Después destacados', 'بعد مميزة', 'Après vedette', '精选后'),
(199, 'after_search', 'After Search', 'অনুসন্ধান পর', 'Después de Búsqueda', 'بعد البحث', 'Après Recherche', '经过搜索'),
(200, 'after_category', 'After Category', 'বিভাগ পরে', 'Después Categoría', 'بعد الفئة', 'Après Catégorie', '分类后，'),
(201, 'after_latest', 'After Latest', 'সর্বশেষ পর', 'Después reciente', 'بعد آخر', 'Après Dernières', '经过最新'),
(202, 'after_popular', 'After Popular', 'জনপ্রিয় পর', 'Después populares', 'بعد الشعبية', 'Après populaire', '之后人气'),
(203, 'after_most_viewed', 'After Most Viewed', 'সাম্প্রতিক পর', 'After Most Viewed', 'بعد الأكثر مشاهدة', 'Après plus consultés', '最受欢迎之后'),
(204, 'after_filters', 'After Filters', 'ফিল্টার পর', 'Después de Filtros', 'بعد الفلاتر', 'Après Filtres', '经过过滤器'),
(205, 'after_most_sold', 'After Most Sold', 'সবথেকে বেশি বিক্রিত পর', 'Después de más vendidos', 'بعد الأكثر مبيعا', 'Après les plus vendus', '最畅销的后'),
(206, 'banner_published!', 'Banner Published!', 'ব্যানার প্রকাশিত!', 'Banner Publicado!', 'راية نشر!', 'Bannière Publié!', '横幅发布！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(207, 'banner_unpublished!', 'Banner Unpublished!', 'ব্যানার অপ্রকাশিত!', 'Banner Inédito!', 'راية غير منشورة!', 'Bannière inédit!', '未公布的旗帜！'),
(208, 'manage_site', 'Manage Site', 'সাইট পরিচালনা', 'Administrar sitio', 'إدارة الموقع', 'Gérer le site', '管理网站'),
(209, 'general_settings', 'General Settings', 'সাধারণ সেটিংস', 'Configuración General', 'الإعدادات العامة', 'Réglages Généraux', '常规设置'),
(210, 'favicon', 'Favicon', 'ফেভিকন', 'Favicon', 'فافيكون', 'Favicon', '网站图标'),
(211, 'social_media', 'Social Media', 'সামাজিক মাধ্যম', 'Medio Social', 'وسائل التواصل الاجتماعي', 'Médias Sociaux', '社交媒体'),
(212, 'social_login_configuaration', 'Social Login Configuaration', 'সামাজিক প্রবেশ করুন Configuaration', 'Social Acceso de configuaration', 'تسجيل الدخول الاجتماعي Configuaration', 'Social Connexion configuaration', '社会登录Configuaration'),
(213, 'product_comment_settings', 'Product Comment Settings', 'পণ্য মন্তব্য সেটিংস', 'Configuración de producto Comentario', 'إعدادات المنتج تعليق', 'Produit Commentez Paramètres', '商品评论设置'),
(214, 'SEO', 'SEO', 'এসইও', 'SEO', 'SEO', 'SEO', '搜索引擎优化'),
(215, 'captcha_settings', 'Captcha Settings', 'ক্যাপচা সেটিংস', 'Ajustes Captcha', 'إعدادات CAPTCHA', 'Paramètres Captcha', '验证码设置'),
(216, 'home_page', 'Home Page', 'হোম পেজ', 'Home Page', 'الصفحة الرئيسية', 'Page d''accueil', '主页')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(217, 'contact_page', 'Contact Page', 'যোগাযোগের পৃষ্ঠায়', 'Página de contacto', 'صفحة الاتصال', 'Page de contact', '联系方式页面'),
(218, 'footer', 'Footer', 'পাদলেখ', 'Pie de página', 'تذييل', 'Pied de page', '页脚'),
(219, 'system_name', 'System Name', 'সিস্টেম নাম', 'Nombre del sistema', 'اسم النظام', 'Name System', '系统名称'),
(220, 'system_email', 'System Email', 'সিস্টেম ইমেল', 'Sistema de Correo', 'نظام البريد الإلكتروني', 'Système Email', '电子邮件系统'),
(221, 'system_title', 'System Title', 'সিস্টেম শিরোনাম', 'Sistema Título', 'نظام العنوان', 'Système Titre', '系统标题'),
(222, 'admin_notification_sound', 'Admin Notification Sound', 'অ্যাডমিন বিজ্ঞপ্তি সাউন্ড', 'Sonido de notificación de administración', 'مشرف صوت الإعلام', 'Administrateur notification sonore', '管理员通知声音'),
(223, 'admin_notification_volume', 'Admin Notification Volume', 'অ্যাডমিন বিজ্ঞপ্তি ভলিউম', 'Volumen de Notificación de administración', 'مشرف إعلام حجم', 'Administrateur volume de la notification', '管理员通知音量'),
(224, 'Volume_:_', 'Volume : ', 'ভলিউম: ', 'Volumen: ', 'الصوت: ', 'Volume: ', '体积： '),
(225, 'homepage_notification_sound', 'Homepage Notification Sound', 'হোম পেজ বিজ্ঞপ্তি সাউন্ড', 'Notificación de sonido Página de inicio', 'الصفحة الرئيسية صوت الإعلام', 'Page d''accueil de notification sonore', '首页通知声音')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(226, 'homepage_notification_volume', 'Homepage Notification Volume', 'হোম পেজ বিজ্ঞপ্তি ভলিউম', 'Volumen Notificación Homepage', 'الصفحة الرئيسية إعلام حجم', 'Page d''accueil Volume de notification', '首页通知音量'),
(227, 'saving', 'Saving', 'রক্ষা', 'Ahorro', 'إنقاذ', 'Économie', '节约'),
(228, 'home_category', 'Home Category', 'হোম বিভাগ', 'Inicio Categoría', 'home الفئة', 'Accueil Catégorie', '首页分类'),
(229, 'home_brands', 'Home Brands', 'হোম ব্র্যান্ড', 'Inicio Marcas', 'الرئيسية ماركات', 'Accueil Marques', '家居品牌'),
(230, 'manage_category_page', 'Manage Category Page', 'বিষয়শ্রেণী পাতা গালাগাল প্রতিবেদন করো', 'Administrar Categoría Página', 'إدارة الفئة الصفحة', 'Gérer Catégorie page', '管理分类页'),
(231, 'side_bar_position', 'Side Bar Position', 'সাইড বার অবস্থান', 'Barra lateral Posición', 'الجانب بار الوظيفة', 'Side Bar Position', '边栏位置'),
(232, 'upload_logo', 'Upload Logo', 'আপলোড লোগো', 'Subir Logo', 'تحميل الشعار', 'Upload Logo', '上传徽标'),
(233, 'drop_logos_to_upload', 'Drop Logos To Upload', 'আপলোড লোগো ছাড়ুন', 'Caída Logos Para Sube', 'إسقاط شعارات لتحميل', 'Déposez Logos Pour télécharger', '降标志上传'),
(234, 'or_click_to_pick_manually', 'Or Click To Pick Manually', 'অথবা ম্যানুয়ালি চয়ন করার জন্য ক্লিক করুন', 'O Haga clic para seleccionar manualmente', 'أو انقر لاختيار يدويا', 'Ou Cliquez sur pour choisir manuellement', '或点击手动选择')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(235, 'all_logos', 'All Logos', 'সমস্ত প্রতীক', 'Todos los logos', 'كل الشعارات', 'Tous les Logos', '所有徽标'),
(236, 'select_logo', 'Select Logo', 'নির্বাচন লোগো', 'Seleccione Logo', 'حدد الشعار', 'Sélectionnez Logo', '选择标识'),
(237, 'place', 'Place', 'জায়গা', 'Lugar', 'مكان', 'Endroit', '地方'),
(238, 'admin_logo', 'Admin Logo', 'অ্যাডমিন লোগো', 'Logo de administración', 'المشرف الشعار', 'Administrateur Logo', '管理员标识'),
(239, 'successfully_selected!', 'Successfully Selected!', 'সফলভাবে নির্বাচিত!', 'Con éxito seleccionada!', 'مختارة بنجاح!', 'Sélectionné avec succès!', '成功入选！'),
(240, 'change', 'Change', 'পরিবর্তন', 'Cambio', 'تغيير', 'Changement', '变化'),
(241, 'homepage_header_logo', 'Homepage Header Logo', 'হোম পেজ শিরোলেখ লোগো', 'Página de inicio Logo Cabecera', 'الصفحة الرئيسية رأس الشعار', 'Accueil Logo Header', '首页页眉徽标'),
(242, 'homepage_footer_logo', 'Homepage Footer Logo', 'হোম পেজ পাদলেখ লোগো', 'Página de inicio Pie de página Logo', 'الصفحة الرئيسية تذييل شعار', 'Accueil Footer Logo', '网页页脚徽标'),
(243, 'select_favicon', 'Select Favicon', 'নির্বাচন ফেভিকন', 'Seleccione Favicon', 'حدد فافيكون', 'Sélectionnez Favicon', '选择网站图标'),
(244, 'social_links', 'Social Links', 'সামাজিক লিংক', 'Enlaces Sociales', 'الروابط الاجتماعية', 'Liens sociaux', '社会联系')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(245, 'discus_settings', 'Discus Settings', 'চাকতি সেটিংস', 'Ajustes Discus', 'إعدادات رمي ​​القرص', 'Réglages Discus', '铁饼设置'),
(246, 'discus_ID', 'Discus ID', 'চাকতি আইডি', 'Discus ID', 'رمي القرص ID', 'Discus ID', '七彩ID'),
(247, 'facebook_login_settings', 'Facebook Login Settings', 'ফেসবুক লগইন সেটিংগুলি', 'Facebook Entrar Configuración', 'الفيسبوك تسجيل الدخول إعدادات', 'Facebook Paramètres de connexion', 'Facebook的登录设置'),
(248, 'status', 'Status', 'অবস্থা', 'Estado', 'حالة', 'Statut', '状态'),
(249, 'google+_login_settings', 'Google+ Login Settings', 'Google + লগইন সেটিংগুলি', 'Google+ Entrar Configuración', 'في Google+ الدخول إعدادات', 'Google+ Paramètres de connexion', 'Google+的登录设置'),
(250, 'public_key', 'Public Key', 'সর্বজনীন কী', 'Clave Pública', 'المفتاح العام', 'À clé publique', '公钥'),
(251, 'private_key', 'Private Key', 'ব্যক্তিগত কী', 'Clave Privada', 'مفتاح خاص', 'Clé privée', '私钥'),
(252, 'manage_search_engine_optimization', 'Manage Search Engine Optimization', 'সার্চ ইঞ্জিন অপ্টিমাইজেশান গালাগাল প্রতিবেদন করো', 'Administrar la optimización del Search Engine', 'إدارة محرك البحث الأمثل', 'Gérer Search Engine Optimization', '管理搜索引擎优化'),
(253, 'keywords', 'Keywords', 'মূলশব্দ', 'Palabras clave', 'الكلمات المفتاحية', 'Mots-clés', '关键词'),
(254, 'author', 'Author', 'লেখক', 'Autor', 'مؤلف', 'Auteur', '笔者')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(255, 'description', 'Description', 'বিবরণ', 'Descripción', 'وصف', 'Description', '描述'),
(256, 'contact_address', 'Contact Address', 'যোগাযোগের ঠিকানা', 'Dirección De Contacto', 'عنوان الإتصال', 'Adresse De Contact', '联系地址'),
(257, 'contact_phone', 'Contact Phone', 'ফোনে যোগাযোগ', 'Teléfono De Contacto', 'الاتصال الهاتف', 'Numéro Du Contact', '联系电话'),
(258, 'contact_email', 'Contact Email', 'যোগাযোগের ই - মেইল', 'Email De Contacto', 'تواصل بالبريد الاكتروني', 'Email Du Contact', '联系人电子邮件'),
(259, 'contact_website', 'Contact Website', 'যোগাযোগ ওয়েবসাইট', 'Contacto Sitio web', 'الإتصال الموقع', 'Contact Site', '联系网站'),
(260, 'contact_about', 'Contact About', 'সম্পর্কে যোগাযোগ', 'Contacto Acerca', 'الاتصال عن', 'Contactez-propos', '联系关于'),
(261, 'footer_category', 'Footer Category', 'পাদলেখ বিভাগ', 'Pie de página Categoría', 'تذييل الفئة', 'Pied de page Catégorie', '页脚类别'),
(262, 'footer_text', 'Footer Text', 'পাদলেখ শিরোনাম', 'Texto De Pie De Página', 'تذييل النص', 'Pied de texte', '页脚文本'),
(263, 'really_want_to_delete_this_logo?', 'Really Want To Delete This Logo?', 'সত্যিই এই লোগো মুছে ফেলতে চান?', 'Realmente desea eliminar este logotipo?', 'حقا تريد حذف هذا الشعار؟', 'Vraiment de vouloir supprimer ce logo?', '真的要删除这个标志？'),
(264, 'manage_languages', 'Manage Languages', 'ভাষা পরিচালনা', 'Administrar Idiomas', 'إدارة اللغات', 'Gérer les langues', '管理语言')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(265, 'add_language', 'Add Language', 'নতুন ভাষা যোগ করা', 'Agregar idioma', 'إضافة اللغة', 'Ajouter une langue', '添加语言'),
(266, 'add_new_word', 'Add New Word', 'নতুন শব্দ যোগ', 'Añadir nueva palabra', 'إضافة جديد وورد', 'Ajout d''un mot', '添加新词'),
(267, 'really_want_to_delete_this_language?', 'Really Want To Delete This Language?', 'সত্যিই এই ভাষা মুছে ফেলতে চান?', 'Realmente desea eliminar este idioma?', 'حقا تريد حذف هذه اللغة؟', 'Vraiment de vouloir supprimer cette langue?', '真的要删除这种语言？'),
(268, 'saving..', 'Saving..', 'সংরক্ষণ ..', 'Ahorrar ..', 'إنقاذ ..', 'Enregistrement ..', '节能..'),
(269, 'delete_language', 'Delete Language', 'ভাষা মুছে দিতে', 'Eliminar Idioma', 'حذف اللغة', 'Supprimer Langue', '删除语言'),
(270, 'select_language', 'Select Language', 'ভাষা নির্বাচন কর', 'Seleccione Idioma', 'اختار اللغة', 'Choisir La Langue', '选择语言'),
(271, 'word', 'Word', 'শব্দ', 'Palabra', 'كلمة', 'Mot', '字'),
(272, 'translation', 'Translation', 'অনুবাদ', 'Traducción', 'ترجمة', 'Traduction', '翻译'),
(273, 'updated!', 'Updated!', 'আপডেট করা হয়েছে!', 'Actualizado!', 'تحديث!', 'Mise à jour!', '更新！'),
(274, 'really_want_to_delete_this_word?', 'Really Want To Delete This Word?', 'সত্যিই এই শব্দ মুছে ফেলতে চান?', 'Realmente desea eliminar esta Palabra?', 'حقا تريد حذف هذه الكلمة؟', 'Vraiment de vouloir supprimer cette Parole?', '真的要删除这个字？'),
(275, 'delete', 'Delete', 'মুছে দিন', 'Borrar', 'حذف', 'Effacer', '删除')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(276, 'translate', 'Translate', 'অনুবাদ করা', 'Traducir', 'ترجم', 'Traduire', '翻译'),
(277, 'save_all', 'Save All', 'সব সংরক্ষণ করুন', 'Salvar A Todos', 'احفظ الكل', 'Sauver Tous', '保存全部'),
(278, 'manage_profile', 'Manage Profile', 'প্রোফাইল গালাগাল প্রতিবেদন করো', 'Administrar perfil', 'إدارة الملف', 'Gérer le profil', '管理个人资料'),
(279, 'manage_details', 'Manage Details', 'বিস্তারিত গালাগাল প্রতিবেদন করো', 'Administrar Detalles', 'إدارة تفاصيل', 'Gérer Détails', '管理细则'),
(280, 'address', 'Address', 'ঠিকানা', 'Dirección', 'عنوان', 'Adresse', '地址'),
(281, 'profile_updated!', 'Profile Updated!', 'প্রোফাইল আপডেট!', 'Perfil Actualizado!', 'يتم تجديد!', 'Profil Mis À Jour!', '个人资料已更新！'),
(282, 'update_profile', 'Update Profile', 'হালনাগাদ প্রফাইল', 'Actualización Del Perfil', 'تحديث الملف', 'Mettre À Jour Le Profil', '更新个人资料'),
(283, 'change_password', 'Change Password', 'পাসওয়ার্ড পরিবর্তন করুন', 'Cambiar La Contraseña', 'تغيير كلمة المرور', 'Changer Le Mot De Passe', '更改密码'),
(284, 'current_password', 'Current Password', 'বর্তমান পাসওয়ার্ড', 'Contraseña Actual', 'كلمة السر الحالية', 'Mot De Passe Actuel', '当前密码'),
(285, 'new_password*', 'New Password*', 'নতুন পাসওয়ার্ড *', 'Nueva Contraseña *', 'كلمة سر جديدة *', 'Nouveau Mot De Passe *', '新密码*')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(286, 'password_updated!', 'Password Updated!', 'পাসওয়ার্ড আপডেট করা হয়েছে!', 'Contraseña Actualizada!', 'كلمة التحديث!', 'Mot de passe Mise à jour!', '密码更新！'),
(287, 'update_password', 'Update Password', 'আপডেট পাসওয়ার্ড', 'Actualizar contraseña', 'تحديث كلمة المرور', 'Mise à jour le mot de passe', '更新密码'),
(288, 'incorrect_password!', 'Incorrect Password!', 'ভুল পাসওয়ার্ড৤!', 'Contraseña Incorrecta!', 'كلمة المرور غير صحيحة!', 'Mot De Passe Incorrect!', '密码不正确！'),
(289, 'manage_business_settings', 'Manage Business Settings', 'ব্যবসা সেটিংস পরিচালনা করুন', 'Administrar configuración de negocio', 'إدارة إعدادات الشركة', 'Gérer les paramètres commerciaux', '管理业务设置'),
(290, 'paypal_payment', 'Paypal Payment', 'পেপ্যাল ​​পেমেন্ট', 'Pago Paypal', 'باي بال الدفع', 'Paiement Paypal', '支付宝付款'),
(291, 'paypal_email', 'Paypal Email', 'PayPal এর ইমেইল', 'E-Mail De Paypal', 'باي بال البريد الإلكتروني', 'Paypal Email', '贝宝电子邮件'),
(292, 'paypal_account_type', 'Paypal Account Type', 'PayPal অ্যাকাউন্ট প্রকার', 'PayPal Tipo de cuenta', 'باي بال نوع الحساب', 'Type de compte Paypal', '贝宝账户类型'),
(293, 'currency_name', 'Currency Name', 'মুদ্রার নাম', 'Nombre moneda', 'اسم العملة', 'Nom de la devise', '货币名称'),
(294, 'currency_symbol', 'Currency Symbol', 'মুদ্রা প্রতীক', 'Símbolo de moneda', 'رمز العملة', 'Symbole monétaire', '货币符号')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(295, 'shipping_cost_type', 'Shipping Cost Type', 'শিপিং খরচ প্রকার', 'Envios Tipo Costo', 'تكلفة الشحن نوع', 'Frais de port Type de coût', '运费类型'),
(296, 'product_wise', 'Product Wise', 'পণ্য প্রজ্ঞাময়', 'Sabio Producto', 'المنتج الحكيم', 'Wise Produit', '产品智者'),
(297, 'fixed', 'Fixed', 'স্থায়ী', 'Fijo', 'ثابت', 'Fixé', '固定'),
(298, 'shipping_cost_(If_fixed)', 'Shipping Cost (If Fixed)', 'শিপিং খরচ (সংশোধন করা হয়েছে যদি)', 'El coste de envío (Si Fijo)', 'تكلفة الشحن (إذا كان ثابت)', 'Coût de l''expédition (Si fixe)', '运费（如果固定）'),
(299, 'shipment_info', 'Shipment Info', 'চালান তথ্য', 'Envío Info', 'شحنة معلومات', 'Infos expédition', '出货信息'),
(300, 'FAQs', 'FAQs', 'প্রায়শই জিজ্ঞাসিত প্রশ্নাবলী', 'Preguntas frecuentes', 'أسئلة وأجوبة', 'FAQs', '常见问题解答'),
(301, 'question', 'Question', 'প্রশ্ন', 'Pregunta', 'سؤال', 'Question', '题'),
(302, 'answer', 'Answer', 'উত্তর', 'Respuesta', 'إجابة', 'Répondre', '答案'),
(303, 'add_more_FAQs', 'Add More FAQs', 'প্রায়শই জিজ্ঞাসিত প্রশ্নাবলী যোগ', 'Añadir Más preguntas frecuentes', 'إضافة المزيد من أسئلة وأجوبة', 'Ajouter Plus de FAQ', '添加更多常见问题解答'),
(304, 'send_newsletter', 'Send Newsletter', 'নিউজলেটার পাঠাতে', 'Enviar Newsletter', 'إرسال النشرة الإخبارية', 'Envoyer lettre', '发送新闻')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(305, 'e-mails_(users)', 'E-mails (users)', 'ই-মেইল (ব্যবহারকারী)', 'Correos electrónicos (usuarios)', 'رسائل البريد الإلكتروني (المستخدمين)', 'E-mails (utilisateurs)', '电子邮件（用户）'),
(306, 'e-mails_(subscribers)', 'E-mails (subscribers)', 'ই-মেইল (সদস্য)', 'Correos electrónicos (usuarios registrados)', 'رسائل البريد الإلكتروني (مشترك)', 'E-mails (abonnés)', '电子邮件（用户）'),
(307, 'from_:_email_address', 'From : Email Address', 'থেকে: এটি ইমেল ঠিকানা', 'De: Dirección de correo electrónico', 'من: عنوان البريد الإلكتروني', 'De: Adresse électronique', '来自：电子邮件地址'),
(308, 'newsletter_subject', 'Newsletter Subject', 'নিউজলেটার বিষয়', 'Boletín Asunto', 'النشرة الموضوع', 'Lettre Sujet', '时事主题'),
(309, 'newsletter_content', 'Newsletter Content', 'নিউজলেটার বিষয়বস্তু', 'Boletín de contenido', 'النشرة المحتوى', 'Bulletin contenu', '通讯内容'),
(310, 'sending', 'Sending', 'পাঠানো', 'Enviando', 'إرسال', 'Envoi', '发出'),
(311, 'sent!', 'Sent!', 'পাঠানো হয়েছে!', 'Enviado!', 'أرسلت!', 'Envoyé!', '发送！'),
(312, 'send', 'Send', 'পাঠান', 'Enviar', 'إرسال', 'Envoyer', '发送'),
(313, 'subject', 'Subject', 'বিষয়', 'Tema', 'موضوع', 'Sujet', '学科'),
(314, 'date', 'Date', 'তারিখ', 'Fecha', 'تاريخ', 'Date', '日期'),
(315, 'message', 'Message', 'বার্তা', 'Mensaje', 'رسالة', 'Message', '信息'),
(316, 'date_time', 'Date Time', 'তারিখ সময়', 'Fecha Y Hora', 'التاريخ الوقت', 'Date Heure', '日期时间')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(317, 'reply', 'Reply', 'উত্তর', 'Responder', 'رد', 'Répondre', '回复'),
(318, 'manage_staffs', 'Manage Staffs', 'কর্মীরা পরিচালনা', 'Administrar Estados Mayores', 'إدارة الأركان', 'Gérer Staffs', '管理职员'),
(319, 'add_staff', 'Add Staff', 'স্টাফ যোগ', 'Añadir Staff', 'إضافة للموظفين', 'Ajouter personnel', '增加员工'),
(320, 'create_admin', 'Create Admin', 'অ্যাডমিন তৈরি করুন', 'Crear administración', 'إنشاء الادارية', 'Créer Administrateur', '创建管理员'),
(321, 'role', 'Role', 'ভূমিকা', 'Papel', 'دور', 'Rôle', '角色'),
(322, 'edit_admin', 'Edit Admin', 'সম্পাদনা অ্যাডমিন', 'Editar administración', 'تحرير المشرف', 'Modifier Administrateur', '编辑管理'),
(323, 'successfully_edited!', 'Successfully Edited!', 'সফলভাবে সম্পাদিত হয়েছে!', 'Editado con éxito!', 'حرره بنجاح!', 'Edité avec succès!', '编辑成功！'),
(324, 'edit', 'Edit', 'সম্পাদন করা', 'Editar', 'تحرير', 'Éditer', '编辑'),
(325, 'sddress', 'Sddress', 'Sddress', 'Sddress', 'Sddress', 'Sddress', 'Sddress'),
(326, 'Manage_roles', 'Manage Roles', 'ভূমিকা গালাগাল প্রতিবেদন করো', 'Administrar funciones', 'إدارة الأدوار', 'Gérer les rôles', '管理角色'),
(327, 'add_role', 'Add Role', 'ভূমিকা যোগ', 'Añadir Rol', 'إضافة دور', 'Ajouter un rôle', '添加角色'),
(328, 'create_role', 'Create Role', 'ভূমিকা তৈরি করুন', 'Crear Rol', 'إنشاء دور', 'Créer un rôle', '创建角色')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(329, 'back_to_role_list', 'Back To Role List', 'পিছনে ভূমিকা তালিকায়', 'Volver a la lista Rol', 'الرجوع إلى قائمة دور', 'Retour à la liste de Rôle', '返回角色列表'),
(330, 'edit_role', 'Edit Role', 'সম্পাদনা ভূমিকা', 'Editar Papel', 'تحرير الدور', 'Modifier Rôle', '编辑角色'),
(331, 'really_want_to_delete_this?', 'Really Want To Delete This?', 'সত্যিই এই মুছে ফেলতে চান?', 'Realmente desea eliminar este?', 'حقا تريد حذف هذا؟', 'Vraiment de vouloir supprimer ce?', '真的要删除吗？'),
(332, 'manage_slider', 'Manage Slider', 'স্লাইডার পরিচালনা', 'Administrar deslizante', 'إدارة المتزلج', 'Gérer Curseur', '管理滑块'),
(333, 'slider_list', 'Slider List', 'স্লাইডার তালিকা', 'Lista deslizante', 'قائمة المنزلق', 'Liste curseur', '滑块名单'),
(334, 'slider_serial', 'Slider Serial', 'স্লাইডার সিরিয়াল', 'Serial deslizante', 'المنزلق المسلسل', 'Curseur de série', '滑盖系列'),
(335, 'successfully_serialized!', 'Successfully Serialized!', 'সফলভাবে ধারাবাহিকভাবে!', 'Con éxito Serialized!', 'تسلسل بنجاح!', 'Sérialisé succès!', '成功连载！'),
(336, 'ID', 'ID', 'আইডি', 'Identificación', 'الهوية', 'ID', 'ID'),
(337, 'manage_page', 'Manage Page', 'পাতা গালাগাল প্রতিবেদন করো', 'Administrar Página', 'إدارة الصفحة', 'Gérer la page', '管理页面'),
(338, 'add_page', 'Add Page', 'পৃষ্ঠা যুক্ত করুন', 'Añadir Página', 'أضف الصفحة', 'Ajouter une page', '添加页面')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(339, 'create_page', 'Create Page', 'পাতা তৈরি করুন', 'Crear Página', 'انشئ صفحة', 'Créer Une Page', '创建页'),
(340, 'back_to_page_list', 'Back To Page List', 'প্রথম পাতা তালিকায়', 'Volver a la lista Página', 'الرجوع إلى قائمة الصفحة', 'Retour à la liste de la page', '返回页面列表'),
(341, 'page_name', 'Page Name', 'পৃষ্ঠার নাম', 'Nombre De La Página', 'اسم الصفحة', 'Nom de la page', '页面名称'),
(342, 'page', 'Page', 'পৃষ্ঠা', 'Página', 'صفحة', 'Page', '页面'),
(343, 'sale_price', 'Sale Price', 'বিক্রয় মূল্য', 'Precio De Venta', 'سعر البيع', 'Prix ​​De Vente', '销售价格'),
(344, 'creation_date', 'Creation Date', 'তৈরির তারিখ', 'Fecha De Creacion', 'تاريخ الإنشاء', 'Date De Création', '创建日期'),
(345, 'page_title', 'Page Title', 'পাতা শিরোনাম', 'Título De La Página', 'عنوان الصفحة', 'Titre De La Page', '页面标题'),
(346, 'parmalink', 'Parmalink', 'Parmalink', 'Parmalink', 'Parmalink', 'Parmalink', 'Parmalink'),
(347, 'tags', 'Tags', 'ট্যাগ্স', 'Etiquetas', 'الكلمات', 'Mots clés', '标签'),
(348, 'number_of_page_parts', 'Number Of Page Parts', 'পাতা অংশ সংখ্যা', 'Número de las partes Page', 'عدد الأجزاء الصفحة', 'Nombre de pages Pièces', '页零件数量'),
(349, 'lets_start_to_create_your_page', 'Lets Start To Create Your Page', 'আপনার পৃষ্ঠা তৈরি করতে শুরু করি', 'Vamos a empezar a crear su página', 'يتيح البدء في إنشاء الصفحة الخاصة بك', 'Permet de commencer à créer votre page', '让我们开始创建你的页面')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(350, 'parts', 'Parts', 'যন্ত্রাংশ', 'Partes', 'أجزاء', 'Parties', '零件'),
(351, 'reset', 'Reset', 'রিসেট', 'Reajustar', 'إعادة تعيين', 'Réinitialiser', '重置'),
(352, 'upload', 'Upload', 'আপলোড', 'Subir', 'تحميل', 'Télécharger', '上传'),
(353, 'select_size', 'Select Size', 'নির্বাচন আকার', 'Selecciona El Tamaño', 'حدد الحجم', 'Sélectionnez La Taille', '选择尺寸'),
(354, 'one-fourth', 'One-fourth', 'এক চতুর্থাংশ', 'Un cuarto', 'ربع', 'Un quart', '四分之一'),
(355, 'one-third', 'One-third', 'এক-তৃতীয়াংশ', 'Un tercio', 'ثلث', 'Un tiers', '三分之一'),
(356, 'half', 'Half', 'অর্ধেক', 'Mitad', 'نصف', 'Moitié', '半'),
(357, 'two-third', 'Two-third', 'দুই-তৃতীয়াংশ', 'Dos tercios', 'ثلثي', 'Deux tiers', '三分之二'),
(358, 'three-fourth', 'Three-fourth', 'তিন-চতুর্থাংশ', 'Tres cuartos', 'ثلاثة أرباع', 'Trois-quatrième', '三十四'),
(359, 'full', 'Full', 'পূর্ণ', 'Completo', 'كامل', 'Complet', '满'),
(360, 'select_type', 'Select Type', 'নির্বাচন করুন প্রকার', 'Seleccionar tipo', 'حدد نوع', 'Sélectionner le type', '选择类型'),
(361, 'content', 'Content', 'সন্তুষ্ট', 'Contenido', 'محتوى', 'Contenu', '内容'),
(362, 'widget', 'Widget', 'উইজেট', 'Widget', 'القطعة', 'Widget', '小工具'),
(363, 'most_viewed', 'Most Viewed', 'সর্বাধিক দেখা', 'Más Vistos', 'الأكثر مشاهدة', 'Le Plus Regardé', '最受关注'),
(364, 'not_more_than_4_columns!', 'Not More Than 4 Columns!', 'অনধিক 4 কলাম!', 'No más de 4 columnas!', 'لا يزيد على 4 أعمدة!', 'Pas plus de 4 colonnes!', '不超过4列！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(365, 'category_name', 'Category Name', 'নামের তালিকা', 'Nombre De La Categoría', 'اسم التصنيف', 'Nom De Catégorie', '分类名称'),
(366, 'edit_category', 'Edit Category', 'সম্পাদনা বিভাগ', 'Editar categoría', 'تحرير الفئة', 'Modifier une catégorie', '编辑类别'),
(367, 'sub-category_name', 'Sub-category Name', 'উপ-বিভাগ নাম', 'Sub-categoría Nombre', 'الفئة الفرعية اسم', 'Sous-catégorie Nom', '子类别名称'),
(368, 'edit_sub-category', 'Edit Sub-category', 'সম্পাদনা করুন উপ-বিভাগ', 'Editar Sub-categoría', 'تحرير التصنيف الفرعى-', 'Modifier la sous-catégorie', '编辑子类别'),
(369, 'brand_name', 'Brand Name', 'পরিচিতিমুলক নাম', 'Nombre De La Marca', 'اسم العلامة التجارية', 'Marque', '品牌'),
(370, 'brand_logo', 'Brand Logo', 'ব্র্যান্ড লোগো', 'Logotipo De La Marca', 'شعار العلامة التجارية', 'Logo De La Marque', '品牌标识'),
(371, 'select_brand_logo', 'Select Brand Logo', 'নির্বাচন ব্র্যান্ড লোগো', 'Seleccionar logo de la marca', 'حدد شعار العلامة التجارية', 'Sélectionnez une marque Logo', '选择品牌标识'),
(372, 'edit_brand', 'Edit Brand', 'সম্পাদনা করুন ব্র্যান্ড', 'Editar Marca', 'تحرير العلامة التجارية', 'Modifier Marque', '编辑品牌'),
(373, 'product_title', 'Product Title', 'পণ্য শিরোনাম', 'Título del producto', 'عنوان المنتج', 'Titre du produit', '产品名称'),
(374, 'unit', 'Unit', 'একক', 'Unidad', 'وحدة', 'Unité', '单元')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(375, 'unit_(e.g._kg,_pc_etc.)', 'Unit (e.g. Kg, Pc Etc.)', 'ইউনিট (যেমন কেজি, পিসি ইত্যাদি)', 'Unidad (por ejemplo Kg, ordenador, etc.)', 'وحدة (مثلا كلغ، والكمبيوتر الخ.)', 'Unité (ex Kg, ordinateur, etc.)', '单位（如斤，PC等设备）'),
(376, 'purchase_price', 'Purchase Price', 'ক্রয় মূল্য', 'Precio De Compra', 'سعر الشراء', 'Prix ​​D''Achat', '购买价格'),
(377, 'shipping_cost', 'Shipping Cost', 'শিপিং খরচ', 'Costo De Envío', 'تكلفة الشحن', 'Frais De Port', '运输费'),
(378, 'product_tax', 'Product Tax', 'পণ্য ট্যাক্স', 'Fiscal Producto', 'الضريبة المنتج', 'Impôt sur le produit', '产品税'),
(379, 'product_discount', 'Product Discount', 'পণ্যের ডিসকাউন্ট', 'Descuento del producto', 'الخصم المنتج', 'Remise de produit', '产品折扣'),
(380, 'images', 'Images', 'ছবি', 'Imágenes', 'الصور', 'Images', '图片'),
(381, 'choose_file', 'Choose File', 'ফাইল পছন্দ কর', 'Elija El Archivo', 'اختر ملف', 'Choisissez Fichier', '选择文件'),
(382, 'color', 'Color', 'রঙ', 'Color', 'اللون', 'Couleur', '颜色'),
(383, 'add_more_colors', 'Add More Colors', 'আরো রঙ যোগ করুন', 'Añadir más colores', 'إضافة المزيد من الألوان', 'Ajouter plus de couleurs', '添加更多颜色')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(384, 'if_you_need_more_field_for_your_product_,_please_click_here_for_more...', 'If You Need More Field For Your Product , Please Click Here For More...', 'আপনি আপনার পণ্যের জন্য আরো মাঠ প্রয়োজন হয়, তাহলে আরও বেশির জন্য এখানে ক্লিক করুন ...', 'Si necesita más campo para su producto, por favor haga clic aquí para Más ...', 'إذا كنت بحاجة إلى المزيد من الميدان للمنتج الخاص بك، الرجاء انقر هنا للمزيد ...', 'Si vous désirez plus de terrain pour votre produit, S''il vous plaît Cliquez ici pour plus ...', '如果你需要更多的现场为您的产品，请点击这里查看更多...'),
(385, 'add_more_fields', 'Add More Fields', 'আরো ক্ষেত্র যোগ করুন', 'Añadir más campos', 'إضافة المزيد من الحقول', 'Ajouter d''autres champs', '添加更多的字段'),
(386, 'product_has_been_uploaded!', 'Product Has Been Uploaded!', 'পণ্য আপলোড করা হয়েছে!', 'Producto se ha cargado!', 'المنتج قد تم إيداع!', 'Produit a été téléchargé!', '产品已上传！'),
(387, 'field_name', 'Field Name', 'ক্ষেত্র নাম', 'Nombre Del Campo', 'اسم الحقل', 'Nom De Domaine', '字段名称'),
(388, 'field_value', 'Field Value', 'ক্ষেত্রের মান', 'Campo Valor', 'قيمة الحقل', 'Champ Valeur', '字段值'),
(389, 'out_of_stock', 'Out Of Stock', 'মজুদ শেষ', 'Agotado', 'إنتهى من المخزن', 'Rupture De Stock', '缺货'),
(390, 'view_product', 'View Product', 'আমাদের পণ্য', 'Ver Producto', 'عرض المنتج', 'Voir le produit', '查看产品')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(391, 'successfully_viewed!', 'Successfully Viewed!', 'সফলভাবে দেখা!', 'Visto éxito!', 'مشاهدة بنجاح!', 'Vu succès!', '成功查看！'),
(392, 'view', 'View', 'দৃশ্য', 'Vista', 'عرض', 'Vue', '视图'),
(393, 'view_discount', 'View Discount', 'দেখুন বাট্টা', 'Ver descuento', 'عرض الخصم', 'Voir Discount', '查看折扣'),
(394, 'viewing_discount!', 'Viewing Discount!', 'বাট্টা দেখছেন!', 'Viendo el descuento!', 'عرض خصم!', 'Regarde un rabais!', '查看折扣！'),
(395, 'discount', 'Discount', 'ডিসকাউন্ট', 'Descuento', 'خصم', 'Remise', '折扣'),
(396, 'add_product_quantity', 'Add Product Quantity', 'উত্পাদনের মোট পরিমানের যোগ', 'Añadir Producto Cantidad', 'إضافة منتج الكمية', 'Ajouter Produit Quantité', '添加产品数量'),
(397, 'quantity_added!', 'Quantity Added!', 'পরিমাণ যোগ করা হয়েছে!', 'Cantidad añadida!', 'الكمية المضافة!', 'Quantité Ajouté!', '添加量！'),
(398, 'stock', 'Stock', 'স্টক', 'Valores', 'الأوراق المالية', 'Stock', '股票'),
(399, 'reduce_product_quantity', 'Reduce Product Quantity', 'পণ্য পরিমাণ হ্রাস করুন', 'Reducir Producto Cantidad', 'تقليل كمية المنتج', 'Réduire Produit Quantité', '减少产品数量'),
(400, 'quantity_reduced!', 'Quantity Reduced!', 'পরিমাণ কমিয়ে!', 'Cantidad rebajado!', 'كمية خفض!', 'Quantité réduit!', '数量减少！'),
(401, 'destroy', 'Destroy', 'ধ্বংস করা', 'Destruir', 'هدم', 'Détruire', '破坏')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(402, 'edit_product', 'Edit Product', 'সম্পাদনা পণ্য', 'Editar Producto', 'تحرير المنتج', 'Modifier le produit', '编辑产品'),
(403, 'rate', 'Rate', 'হার', 'Tarifa', 'معدل', 'Taux', '率'),
(404, 'total', 'Total', 'মোট', 'Total', 'مجموع', 'Total', '总'),
(405, 'reason_note', 'Reason Note', 'কারণ উল্লেখ্য', 'Motivo Nota', 'السبب ملاحظة', 'Raison Remarque', '原因说明'),
(406, 'manage_your_product_stock', 'Manage Your Product Stock', 'আপনার পণ্য স্টক পরিচালনা', 'Administre su stock del producto', 'إدارة الأسهم الخاصة بك المنتج', 'Gérer votre produit Stock', '管理你的产品库存'),
(407, 'destroy_product_entry', 'Destroy Product Entry', 'পণ্য এন্ট্রি ধ্বংস', 'Destruye Entrada Producto', 'تدمير دخول المنتج', 'Détruisez Entrée produit', '销毁产品入境'),
(408, 'add_stock_entry_taken!', 'Add Stock Entry Taken!', 'স্টক এন্ট্রি নেওয়া যোগ!', 'Añadir Tomado de la entrada Stock!', 'إضافة المحصلة دخول سوق الأسهم!', 'Ajouter Stock Entrée pris!', '添加股票输入上当受骗！'),
(409, 'add_product_stock', 'Add Product Stock', 'পণ্য স্টক যোগ করুন', 'Añadir stock del producto', 'إضافة منتج المالية', 'Ajouter le produit Stock', '添加产品库存'),
(410, 'destroy_entry_taken!', 'Destroy Entry Taken!', 'এন্ট্রি নেওয়া ধ্বংস!', 'Destruye Tomado de entrada!', 'تدمير المحصلة الدخول!', 'Détruisez Entrée pris!', '摧毁条目获取！'),
(411, 'create_stock', 'Create Stock', 'স্টক তৈরি করুন', 'Crear archivo', 'إنشاء البورصة', 'Créer Stock', '创建库存')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(412, 'entry_type', 'Entry Type', 'এন্ট্রি টাইপ', 'Tipo de entrada', 'نوع الدخول', 'Type d''entrée', '条目类型'),
(413, 'note', 'Note', 'বিঃদ্রঃ', 'Nota', 'ملاحظة', 'Note', '注意'),
(414, 'added_quantity_will_be_reduced.', 'Added Quantity Will Be Reduced.', 'যোগ করা হয়েছে পরিমাণ হ্রাস করা হবে.', 'Cantidad añadida será reducido.', 'وأضاف الكمية ستنخفض.', 'Ajouté Quantité sera réduite.', '加入数量将减少。'),
(415, 'manage_sale', 'Manage Sale', 'বিক্রয় গালাগাল প্রতিবেদন করো', 'Administrar Venta', 'إدارة بيع', 'Gérer Vente', '销售管理'),
(416, 'sale_code', 'Sale Code', 'বিক্রয় কোড', 'Venta Código', 'بيع مدونة', 'Vente code', '销售守则'),
(417, 'buyer', 'Buyer', 'ক্রেতা', 'Comprador', 'مشتر', 'Acheteur', '买主'),
(418, 'delivery_status', 'Delivery Status', 'ডেলিভারি স্থিতি', 'Estado De Entrega', 'حالة التسليم', 'Statut De Livraison', '交货状态'),
(419, 'payment_status', 'Payment Status', 'লেনদেনের অবস্থা', 'Estado De Pago', 'حالة السداد', 'Statut De Paiement', '付款状态'),
(420, 'sales', 'Sales', 'বিক্রয়', 'Ventas', 'مبيعات', 'Ventes', '销售'),
(421, 'choose_your_slider_style', 'Choose Your Slider Style', 'আপনার স্লাইডার শৈলী চয়ন করুন', 'Elija su estilo deslizante', 'اختيار المتزلج طريقتك', 'Choisissez votre style Slider', '选择您的滑盖造型'),
(422, 'play', 'Play', 'খেলা', 'Jugar', 'لعب', 'Jouer', '玩'),
(423, 'choose', 'Choose', 'নির্বাচন করা', 'Escoger', 'اختار', 'Choisir', '选择')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(424, 'enter_preview', 'Enter Preview', 'সম্পূর্ণ বিবরণের পূর্বরূপ দেখুন লিখুন', 'Introduzca Prevista', 'أدخل معاينة', 'Entrez Aperçu', '进入预览'),
(425, 'creating_slider..', 'Creating Slider..', 'স্লাইডার তৈরি ..', 'Crear deslizante ..', 'خلق المتزلج ..', 'Création curseur ..', '创建滑块..'),
(426, 'slider_added!', 'Slider Added!', 'স্লাইডার যোগ করা হয়েছে!', 'Deslizador Agregado', 'المنزلق واضاف!', 'Curseur Ajouté!', '滑块增加！'),
(427, 'select_background_image', 'Select Background Image', 'নির্বাচন পটভূমি চিত্র', 'Seleccione la imagen de fondo', 'اختر صورة الخلفية', 'Sélectionnez l''image de fond', '选择背景图片'),
(428, 'select_image', 'Select Image', 'নির্বাচন করুন', 'Seleccionar Imagen', 'اختر صورة', 'Sélectionner l''image', '选择图片'),
(429, 'font-color', 'Font-color', 'ফন্টের রং', 'Color de fuente', 'لون الخط', 'Couleur de police', '字体颜色'),
(430, 'background_color', 'Background Color', 'পেছনের রঙ', 'Color De Fondo', 'لون الخلفية', 'Couleur De Fond', '背景颜色'),
(431, 'clean', 'Clean', 'পরিষ্কার', 'Limpio', 'نظيف', 'Propre', '清洁'),
(432, 'slider_serial_saved!', 'Slider Serial Saved!', 'সিরিয়াল সংরক্ষিত এখানে ক্লিক করুন!', 'Slider Guardados de serie!', 'المنزلق المسلسل المحفوظ!', 'Curseur série Saved!', '滑盖系列救了！'),
(433, 'permissions', 'Permissions', 'অনুমতি', 'Permisos', 'أذونات', 'Autorisations', '权限'),
(434, 'off', 'Off', 'বন্ধ', 'Apagado', 'بعيدا', 'De', '离')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(435, 'add_to_wishlist', 'Add To Wishlist', 'চাহিদাপত্রে যোগ করা', 'Añadir A La Lista De Deseos', 'اضف الى قائمة الامنيات', 'Ajouter À La Liste De Souhaits', '添加到收藏'),
(436, 'our_available_brands', 'Our Available Brands', 'আমাদের উপলব্ধ ব্রান্ডের', 'Nuestras Marcas disponibles', 'علاماتنا التجارية المتاحة', 'Nos Marques disponibles', '我们现有的品牌'),
(437, 'product_color_options', 'Product Color Options', 'পণ্য রঙ বিকল্প', 'Opciones de color Producto', 'خيارات المنتج اللون', 'options de couleur de produit', '产品颜色选项'),
(438, 'add_colors', 'Add Colors', 'রঙ যোগ করুন', 'Añadir colores', 'إضافة الألوان', 'Ajouter des couleurs', '添加颜色'),
(439, 'preview', 'Preview', 'সম্পূর্ণ বিবরণের পূর্বরূপ দেখুন', 'Preestreno', 'معاينة', 'Aperçu', '预习'),
(440, 'related_products', 'Related Products', 'সংশ্লিষ্ট পণ্য', 'Productos Relacionados', 'المنتجات ذات الصلة', 'Produits Connexes', '相关产品'),
(441, 'full_description', 'Full Description', 'পূর্ণ বিবরণ', 'Descripción Completa', 'الوصف الكامل', 'Description Complète', '完整说明'),
(442, 'additional_specification', 'Additional Specification', 'অতিরিক্ত স্পেসিফিকেশন', 'Especificación adicional', 'مواصفات إضافية', 'Spécification Supplémentaire', '其他规格'),
(443, 'reviews', 'Reviews', 'পর্যালোচনা', 'Opiniones', 'التعليقات', 'Avis', '点评')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(444, 'add_to wishlist', 'Add To Wishlist', 'চাহিদাপত্রে যোগ করা', 'Añadir A La Lista De Deseos', 'اضف الى قائمة الامنيات', 'Ajouter À La Liste De Souhaits', '添加到收藏'),
(445, 'featured_products', 'Featured Products', 'বৈশিষ্ট্যযুক্ত পণ্য', 'Productos Destacados', 'منتجات مميزة', 'Produits Présentés', '特色产品'),
(446, 'our_contacts', 'Our Contacts', 'আমাদের পরিচিতি', 'Nuestros Contactos', 'دليل المنسوبين', 'Nos Contacts', '我们的联系方式'),
(447, 'about_us', 'About Us', 'আমাদের সম্পর্কে', 'Sobre Nosotros', 'عنا', 'A Propos De Nous', '关于我们'),
(448, 'get_in_touch', 'Get In Touch', 'যোগাযোগ করুন', 'Ponerse En Contacto', 'الحصول على اتصال', 'Entrer en contact', '保持联系'),
(449, 'contacts_form', 'Contacts Form', 'পরিচিতিতে ফরম', 'Contactos Formulario', 'اتصالات نموذج', 'Formulaire de contacts', '联系表格'),
(450, 'e-mail', 'E-mail', 'ই-মেইল', 'Email', 'البريد الإلكتروني', 'Email', '电子邮件'),
(451, 'sending..', 'Sending..', 'পাঠানো ..', 'Enviando ..', 'إرسال ..', 'Envoi ..', '正在发送。'),
(452, 'send_message:', 'Send Message:', 'বার্তা পাঠাও:', 'Enviar Mensaje:', 'أرسل رسالة:', 'Envoyer Le Message:', '发信息：'),
(453, 'message_sent!', 'Message Sent!', 'বার্তা প্রদান!', 'Mensaje Enviado!', 'تم إرسال الرسالة!', 'Message Envoyé!', '消息已发送！'),
(454, 'incorrect_captcha!', 'Incorrect Captcha!', 'ভুল ক্যাপচা!', 'Captcha Incorrecto!', 'كلمة التحقق غير صحيح!', 'Captcha Incorrecte!', '验证码不正确！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(455, 'my_profile', 'My Profile', 'আমার প্রোফাইল', 'Mi Perfil', 'ملفي الشخصي', 'Mon Profil', '我的简历'),
(456, 'personal_information', 'Personal Information', 'ব্যক্তিগত তথ্য', 'Información Personal', 'معلومات شخصية', 'Information Personnelle', '个人信息'),
(457, 'total_purchase', 'Total Purchase', 'মোট ক্রয়', 'Compra total', 'إجمالي شراء', 'Total Achat', '总购买'),
(458, 'last_7_days', 'Last 7 Days', 'শেষ 7 দিন', 'Últimos 7 días', 'اخر 7 ايام', 'Les 7 derniers jours', '最近7天'),
(459, 'last_30_days', 'Last 30 Days', 'গত 30 দিনে', 'Últimos 30 Días', 'اخر 30 يوم', '30 derniers jours', '最后30天'),
(460, 'wished_products', 'Wished Products', 'আকাঙ্ক্ষিত পণ্য', 'Productos deseados', 'المنتجات تمنى', 'Produits souhaité', '希望产品'),
(461, 'user_since', 'User Since', 'ব্যবহারকারী যেহেতু', 'Usuario desde', 'المستخدم منذ', 'Utilisateur depuis', '用户自'),
(462, 'last_login', 'Last Login', 'সর্বশেষ লগইন', 'Último Acceso', 'آخر تسجيل دخول', 'Dernière Connexion', '上次登录'),
(463, 'purchase_history', 'Purchase History', 'ক্রয় ইতিহাস', 'Historial De Compras', 'تاريخ شراء', 'Historique D''Achat', '购买记录'),
(464, 'wishlist', 'Wishlist', 'লটারি', 'Lista', 'مفضلة', 'Liste', '心愿'),
(465, 'edit_info', 'Edit Info', 'সম্পাদনা তথ্য', 'Editar información', 'تحرير معلومات', 'Modifier les informations', '编辑信息'),
(466, 'invoice', 'Invoice', 'চালান', 'Factura', 'فاتورة', 'Facture', '发票')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(467, 'availability', 'Availability', 'উপস্থিতি', 'Disponibilidad', 'توفر', 'Disponibilité', '可用性'),
(468, 'purchase', 'Purchase', 'ক্রয়', 'Compra', 'شراء', 'Achat', '购买'),
(469, 'remove', 'Remove', 'অপসারণ', 'Quitar', 'إزالة', 'Supprimer', '拆除'),
(470, 're-write your_first_name', 'Re-write Your First Name', 'আপনার নামের প্রথম অংশ পুনরায় লিখুন', 'Vuelva a escribir su nombre', 'إعادة كتابة الاسم الأول', 'Re-écrire Votre Prénom', '重新写你的名字'),
(471, 're-write your_last_name', 'Re-write Your Last Name', 'আপনার পদবি পুনরায় লিখুন', 'Vuelva a escribir su apellido', 'إعادة كتابة الاسم الأخير', 'Re-écrire Votre Nom', '重新写你的姓'),
(472, 're-write_your_phone_number', 'Re-write Your Phone Number', 'আপনার ফোন নম্বর পুনরায় লিখুন', 'Vuelva a escribir su número de teléfono', 'إعادة كتابة رقم الهاتف الخاص بك', 'Re-écrire votre numéro de téléphone', '重新写你的电话号码'),
(473, 'ZIP_Code', 'ZIP Code', 'মার্কিন', 'Código postal', 'الرمز البريدي', 'Code postal', '邮政编码'),
(474, 'city_name', 'City Name', 'শহরের নাম', 'Nombre De La Ciudad', 'اسم المدينة', 'Nom De La Ville', '城市的名字'),
(475, 'your_skype_id', 'Your Skype Id', 'আপনার স্কাইপ আইডি', 'Tu Identificacion De Skype', 'رقم سكايب الخاص بك', 'Votre Identifiant Skype', '你的Skype帐号')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(476, 'your_facebook_profile_link', 'Your Facebook Profile Link', 'আপনার ফেসবুক প্রোফাইল লিঙ্ক', 'Su perfil de Facebook Enlace', 'الخاص بك الفيسبوك ملف الموقع', 'Votre profil Facebook Lien', '你的Facebook个人资料链接'),
(477, 'your_google+_profile_link', 'Your Google+ Profile Link', 'আপনার Google+ প্রোফাইল লিংক', 'Su Google+ Enlace', 'في + Google ملف الموقع', 'Votre profil Google+ Lien', '您的Google+个人资料链接'),
(478, 'browse', 'Browse', 'ব্রাউজ করুন', 'Explorar', 'تصفح', 'Feuilleter', '浏览'),
(479, 'update_info', 'Update Info', 'আপডেট তথ্য', 'Actualizar Información', 'تحديث معلومات', 'Information De Mise À Jour', '更新信息'),
(480, 'enter_your_current_password', 'Enter Your Current Password', 'আপনার বর্তমান পাসওয়ার্ডটি প্রবেশ করান', 'Introduce Tu Contraseña Actual', 'أدخل كلمة المرور الحالية', 'Entrer Votre Mot De Passe Actuel', '输入当前的密码'),
(481, 'new_password', 'New Password', 'নতুন পাসওয়ার্ড', 'Nueva Contraseña', 'كلمة سر جديدة', 'Nouveau Mot De Passe', '新密码'),
(482, 'enter_your_new_password', 'Enter Your New Password', 'আপনার নতুন পাসওয়ার্ড লিখুন', 'Ingrese su nueva contraseña', 'أدخل كلمة المرور الجديدة', 'Entrez votre nouveau mot de passe', '输入新密码'),
(483, 'confirm_new_password', 'Confirm New Password', 'নিশ্চিত কর নতুন গোপননম্বর', 'Confirmar Nueva Contraseña', 'تأكيد كلمة السر الجديدة', 'Confirmer Le Nouveau Mot De Passe', '确认新密码')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(484, 're-enter_your_new_password', 'Re-enter Your New Password', 'আপনার নতুন পাসওয়ার্ড আবার লিখুন', 'Vuelva a introducir su nueva contraseña', 'إعادة إدخال كلمة المرور الجديدة', 'Re-entrez votre nouveau mot de passe', '重新输入新密码'),
(485, 'save_password', 'Save Password', 'পাসওয়ার্ড সংরক্ষণ', 'Guardar Contraseña', 'حفظ كلمة المرور', 'Enregistrer Le Mot De Passe', '保存密码'),
(486, 'incorrect_password', 'Incorrect Password', 'ভুল পাসওয়ার্ড৤', 'Contraseña Incorrecta', 'كلمة المرور غير صحيحة', 'Mot De Passe Incorrect', '密码不正确'),
(487, 'terms_conditions', 'Terms Conditions', 'শর্তাবলী', 'Términos Y Condiciones', 'الشروط والأحكام', 'Termes Et Conditions', '条款细则'),
(488, 'give_a_rating', 'Give A Rating', 'একটি রেটিং দিতে', 'Give A Clasificación', 'إعطاء تقييم', 'Donner une note', '给予评级'),
(489, 'tax', 'Tax', 'কর', 'Impuesto', 'ضريبة', 'Impôt', '税'),
(490, 'shipping', 'Shipping', 'পরিবহন', 'Envío', 'الشحن', 'Livraison', '送货'),
(491, 'grand_total', 'Grand Total', 'সর্বমোট', 'Gran Total', 'المجموع الإجمالي', 'Total', '累计'),
(492, 'empty_cart', 'Empty Cart', 'খালি ট্রলি', 'Vaciar el carro', 'فارغة سلة', 'Panier Vide', '清空购物车'),
(493, 'added_to wishlist', 'Added To Wishlist', 'শুরুতেই যোগ', 'Añadido a Mis Favoritos', 'أضيف الى قائمة الامنيات', 'Ajouté à la liste', '添加到收藏'),
(494, 'available', 'Available', 'উপলব্ধ', 'Disponible', 'متاح', 'Disponible', '可用的')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(495, 'remove_from_wishlist', 'Remove From Wishlist', 'সাইফুল থেকে সরান', 'Quitar de la lista', 'إزالة من قائمة الامنيات', 'Supprimer de la Liste', '从收藏中删除'),
(496, 'my_cart', 'My Cart', 'আমার কার্ট', 'Mi Carrito', 'سلة التسوق', 'Mon panier', '我的购物车'),
(497, 'shopping_cart', 'Shopping Cart', 'বাজারের ব্যাগ', 'Carrito De Compras', 'عربة التسوق', 'Panier', '购物车'),
(498, 'review_&_edit_your_product', 'Review & Edit Your Product', 'পর্যালোচনা ও সম্পাদনা করুন আপনার পণ্য', 'Revisión y edición de su producto', 'مراجعة وتحرير منتجك', 'Consulter et modifier votre produit', '审查和编辑你的产品'),
(499, 'qty', 'Qty', 'Qty', 'Cantidad', 'الكمية', 'Quantité', '数量'),
(500, 'option', 'Option', 'পছন্দ', 'Opción', 'خيار', 'Option', '选项'),
(501, 'shipping_info', 'Shipping Info', 'জাহাজীকরন তথ্য', 'Información De Envío', 'معلومات الشحن', 'Info Livraison', '航运信息'),
(502, 'shipping_and_address_info', 'Shipping And Address Info', 'গ্রেপ্তার এবং ঠিকানা তথ্য', 'Envío y Dirección Info', 'الشحن وعنوان معلومات', 'Adresse d''expédition et Infos', '航运及地址信息'),
(503, 'shipping_address', 'Shipping Address', 'প্রেরণের ঠিকানা', 'Dirección De Envío', 'عنوان الشحن', 'Adresse De Livraison', '邮寄地址'),
(504, 'first_name', 'First Name', 'প্রথম নাম', 'Nombre', 'الاسم الأول', 'Prénom', '名字'),
(505, 'last_name', 'Last Name', 'নামের শেষাংশ', 'Apellido', 'اسم العائلة', 'Nom De Famille', '姓')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(506, 'zip/postal_code', 'Zip/postal Code', 'জিপ / পোস্টাল কোড', 'Postal / Código Postal', 'الرمز البريدي / الرمز البريدي', 'Zip / code postal', '邮编/邮政编码'),
(507, 'payment', 'Payment', 'প্রদান', 'Pago', 'دفع', 'Paiement', '付款'),
(508, 'select_payment_method', 'Select Payment Method', 'নির্বাচন পেমেন্ট পদ্ধতি', 'Seleccione el método de pago', 'اختر طريقة الدفع', 'Sélectionnez la méthode de paiement', '请选择支付方式'),
(509, 'choose_a_payment_method', 'Choose A Payment Method', 'একটি পেমেন্ট পদ্ধতি বেছে নিন', 'Elija un método de pago', 'اختيار طريقة الدفع', 'Choisissez une méthode de paiement', '选择付款方式'),
(510, 'frequently_asked_questions', 'Frequently Asked Questions', 'সচরাচর জিজ্ঞাস্য', 'Preguntas Frecuentes', 'أسئلة مكررة', 'Questions Fréquemment Posées', '经常问的问题'),
(511, 'subtotal', 'Subtotal', 'উপমোট', 'Total parcial', 'حاصل الجمع', 'Total', '小计'),
(512, 'invoice_paper', 'Invoice Paper', 'চালান পেপার', 'Papel Factura', 'فاتورة ورقة', 'Papier facture', '发票纸'),
(513, 'invoice_no', 'Invoice No', 'চালান নং', 'Factura No', 'رقم الفاتورة', 'NumFacture', '发票号码'),
(514, 'client_information:', 'Client Information:', 'ক্লায়েন্ট তথ্য:', 'Información Del Cliente:', 'معلومات العميل:', 'Renseignements sur le client:', '客户资料：'),
(515, 'first_name:', 'First Name:', 'প্রথম নাম:', 'Nombre:', 'الاسم الأول:', 'Prénom:', '名字：')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(516, 'last_name:', 'Last Name:', 'নামের শেষাংশ:', 'Apellido:', 'اسم العائلة:', 'Nom De Famille:', '姓：'),
(517, 'city_:', 'City :', 'নগরী:', 'Ciudad:', 'مدينة:', 'Ville:', '城市：'),
(518, 'peyment_details_:', 'Peyment Details :', 'Peyment বিবরণ:', 'Peyment Detalles:', 'PEYMENT تفاصيل:', 'Peyment Détails:', 'Peyment详细信息：'),
(519, 'payment_status_:', 'Payment Status :', 'লেনদেনের অবস্থা:', 'Estado De Pago:', 'حالة السداد:', 'Statut De Paiement:', '付款状态：'),
(520, 'payment_method_:', 'Payment Method :', 'মূল্যপরিশোধ পদ্ধতি:', 'Forma De Pago:', 'طريقة الدفع:', 'Mode de paiement:', '付款方式：'),
(521, 'payment_invoice', 'Payment Invoice', 'পেমেন্ট চালান', 'Factura De Pago', 'دفع الفاتورة', 'Paiement de facture', '付款发票'),
(522, 'item', 'Item', 'আইটেম', 'Artículo', 'العنصر', 'Article', '项目'),
(523, 'unit_cost', 'Unit Cost', 'ইউনিট খরচ', 'Costo Unitario', 'تكلفة الوحدة', 'Coût Unitaire', '单价'),
(524, 'sub_total_amount', 'Sub Total Amount', 'উপ মোট পরিমাণ', 'Sub Total Importe', 'جنوب المبلغ الكلي لل', 'Sous Montant total', '小计金额'),
(525, 'print', 'Print', 'ছাপা', 'Impresión', 'طباعة', 'Impression', '打印'),
(526, 'manage_users', 'Manage Users', 'ব্যবহারকারী গালাগাল প্রতিবেদন', 'Administrar usuarios', 'إدارة المستخدمين', 'Gérer les utilisateurs', '管理用户'),
(527, 'view_profile', 'View Profile', 'প্রোফাইল দেখা', 'Ver Perfil', 'الملف الشخصي', 'Voir Le Profil', '查看资料')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(528, 'users', 'Users', 'ব্যবহারকারীরা', 'Usuarios', 'المستخدمين', 'Utilisateurs', '用户'),
(529, 'product_sale_comparison', 'Product Sale Comparison', 'পণ্য বিক্রয় তুলনা', 'Comparación de productos Venta', 'مقارنة بيع المنتج', 'Comparaison de vente de produit', '产品销售比较'),
(530, 'product_sale_comparison_report', 'Product Sale Comparison Report', 'পণ্য বিক্রয় তুলনা রিপোর্ট', 'Venta de productos ¡Comparar Reportar', 'المنتج بيع مقارنة تقرير', 'Vente de produit Rapport de comparaison', '产品销售比较报告'),
(531, 'get_stock_report', 'Get Stock Report', 'স্টক প্রতিবেদন করুন', 'Obtén Stock Reportar', 'الحصول على الأوراق المالية تقرير', 'Obtenez Stock Rapport', '获取库存报告'),
(532, 'delivery_payment', 'Delivery Payment', 'ডেলিভারি পেমেন্ট', 'Entrega Pago', 'تسليم الدفع', 'Livraison Paiement', '货到付款'),
(533, 'invoice_no:', 'Invoice No:', 'চালান নং:', 'Factura No:', 'رقم الفاتورة:', 'NO FACTURE:', '发票号码：'),
(534, 'date_:', 'Date :', 'তারিখ:', 'Fecha:', 'تاريخ:', 'Date:', '日期：'),
(535, 'client_information', 'Client Information', 'ক্লায়েন্ট তথ্য', 'Información Del Cliente', 'معلومات العميل', 'Renseignements sur le client', '客户信息'),
(536, 'payment_detail', 'Payment Detail', 'পেমেন্ট বিস্তারিত', 'Detalle de Pago', 'دفع التفاصيل', 'Paiement Détail', '付款明细'),
(537, 'payment_method', 'Payment Method', 'মূল্যপরিশোধ পদ্ধতি', 'Forma De Pago', 'طريقة الدفع', 'Mode de paiement', '付款方式')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(538, 'payment_date', 'Payment Date', 'টাকা প্রদানের তারিখ', 'Día De Pago', 'تاريخ الدفع', 'Date De Paiement', '支付日期'),
(539, 'zipcode', 'Zipcode', 'পিনকোড', 'Código Postal', 'الرمز البريدي', 'Code Postal', '邮政编码'),
(540, 'marker_location', 'Marker Location', 'মার্কার অবস্থান', 'Marcador de ubicación', 'علامة الموقع', 'Marker Localisation', '标记位置'),
(541, 'payment_details', 'Payment Details', 'বিস্তারিত হিসাব', 'Detalles Del Pago', 'تفاصيل الدفع', 'Détails de paiement', '付款详情'),
(542, 'reduced_quantity_will_be_added.', 'Reduced Quantity Will Be Added.', 'কমিয়ে পরিমাণ যোগ করা হবে.', 'Cantidad reducida se añadirán.', 'انخفاض الكمية ستضاف.', 'Quantité réduite seront ajoutés.', '减少数量将增加。'),
(543, 'monetary_loss', 'Monetary Loss', 'আর্থিক ক্ষতি', 'Resultado Monetario', 'فقدان النقدي', 'Perte monétaire', '金钱损失'),
(544, 'details_of', 'Details Of', 'বিস্তারিত', 'Detalles De', 'تفاصيل', 'Détails de', '详细信息'),
(545, 'tag', 'Tag', 'ট্যাগ', 'Etiqueta', 'بطاقة', 'Balise', '标签'),
(546, 'colors', 'Colors', 'রঙ', 'Colores', 'الألوان', 'Couleurs', '颜色'),
(547, 'user', 'User', 'ব্যবহারকারী', 'Usuario', 'المستخدم', 'Utilisateur', '用户'),
(548, 'phone_number', 'Phone Number', 'ফোন নম্বর', 'Número Telefónico', 'رقم الهاتف', 'numéro de téléphone', '电话号码')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(549, 'view_contact_message', 'View Contact Message', 'দেখুন যোগাযোগ বার্তা', 'Ver contacto Mensaje', 'عرض طرق الاتصال رسالة', 'Voir Contact Message', '查看联系信息'),
(550, 'view_message', 'View Message', 'দেখুন বার্তা', 'Ver Mensaje', 'إرسال رسالة خاصة إلى', 'Voir le message', '查看留言'),
(551, 'message_from', 'Message From', 'থেকে বার্তা', 'Mensaje De', 'رسالة من', 'Message De', '从消息'),
(552, 'date_&_time', 'Date & Time', 'তারিখ সময়', 'Fecha Y Hora', 'التاريخ والوقت', 'Date et heure', '日期时间'),
(553, 'reply_contact_message', 'Reply Contact Message', 'যোগাযোগ বার্তা উত্তর', 'Responder Contacto Mensaje', 'رد الاتصال رسالة', 'Répondre Contact Message', '回复留言联系'),
(554, 'successfully_replied!', 'Successfully Replied!', 'সফলভাবে জবাব দিয়েছেন!', 'Respondió con éxito!', 'أجاب بنجاح!', 'Répondit succès!', '成功作答！'),
(555, 'reply_message', 'Reply Message', 'বার্তা উত্তর', 'Responder Mensaje', 'الرد رسالة', 'Message De Réponse', '回复留言'),
(556, 'view_original_message', 'View Original Message', 'মূল বার্তা দেখুন', 'Ver mensaje original', 'عرض الرسالة الأصلية', 'Voir Original Message', '查看原始消息'),
(557, 'new_word', 'New Word', 'নতুন শব্দ', 'Palabra Nueva', 'كلمة جديدة', 'Nouveau Mot', '新词'),
(558, 'already_exists!', 'Already Exists!', 'আগে থেকেই আছে!', 'Ya Existe!', 'موجود بالفعل!', 'Existe Déjà!', '已经存在！')(-;-)
INSERT INTO `language` (`word_id`, `word`, `english`, `Bangla`, `Spanish`, `Arabic`, `French`, `Chinese`) VALUES
(559, 'language_name', 'Language Name', 'ভাষার নাম', 'Nombre de Idioma', 'اسم اللغة', 'Nom de la langue', '语言名称'),
(560, 'new_language', 'New Language', 'নতুন ভাষা', 'Nuevo Idioma', 'لغة جديدة', 'Nouvelle Langue', '新的语言'),
(561, 'do_you_really_want_to_delete_this_language?', 'Do You Really Want To Delete This Language?', 'আপনি কি সত্যিই এই ভাষা মুছে দিতে চান?', '¿Realmente desea eliminar este idioma?', 'هل حقا تريد حذف هذه اللغة؟', 'Êtes-vous sûr de vouloir supprimer cette langue?', '你真的要删除这个语言？')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `logo_id` int(11) NOT NULL auto_increment,
  `name` longtext NOT NULL,
  PRIMARY KEY  (`logo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 (-;-)

--
-- Dumping data for table `logo`
--


-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL auto_increment,
  `status` varchar(20) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `parmalink` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `parts` longtext NOT NULL,
  `tag` longtext NOT NULL,
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 (-;-)

--
-- Dumping data for table `page`
--


-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `permission_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `codename` varchar(30) NOT NULL,
  `parent_status` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY  (`permission_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 (-;-)

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `name`, `codename`, `parent_status`, `description`) VALUES
(1, 'staff', 'admin', 'parent', ''),
(2, 'edit', 'admin_edit', '1', ''),
(3, 'view', 'admin_view', '1', ''),
(4, 'delete', 'admin_delete', '1', ''),
(5, 'banner', 'banner', 'parent', ''),
(6, 'edit', 'banner_edit', '5', ''),
(7, 'view', 'banner_view', '5', ''),
(8, 'delete', 'banner_delete', '5', ''),
(9, 'brand', 'brand', 'parent', ''),
(10, 'edit', 'brand_edit', '9', ''),
(11, 'view', 'brand_view', '9', ''),
(12, 'delete', 'brand_delete', '9', ''),
(13, 'business settings', 'business_settings', 'parent', ''),
(14, 'edit', 'business_settings_edit', '13', ''),
(15, 'view', 'business_settings_view', '13', ''),
(16, 'delete', 'business_settings_delete', '13', ''),
(17, 'category', 'category', 'parent', ''),
(18, 'edit', 'category_edit', '17', ''),
(19, 'view', 'category_view', '17', ''),
(20, 'delete', 'category_delete', '17', ''),
(21, 'contact message', 'contact_message', 'parent', ''),
(22, 'edit', 'contact_message_edit', '21', ''),
(23, 'view', 'contact_message_view', '21', ''),
(24, 'delete', 'contact_message_delete', '21', ''),
(25, 'site settings', 'site_settings', 'parent', ''),
(26, 'edit', 'site_settings_edit', '25', ''),
(27, 'view', 'site_settings_view', '25', ''),
(28, 'delete', 'site_settings_delete', '25', ''),
(29, 'product', 'product', 'parent', ''),
(30, 'edit', 'product_edit', '29', ''),
(31, 'view', 'product_view', '29', ''),
(32, 'delete', 'product_delete', '29', ''),
(33, 'report', 'report', 'parent', ''),
(34, 'edit', 'report_edit', '33', ''),
(35, 'view', 'report_view', '33', ''),
(36, 'delete', 'report_delete', '33', ''),
(37, 'role', 'role', 'parent', ''),
(38, 'edit', 'role_edit', '37', ''),
(39, 'view', 'role_view', '37', ''),
(40, 'delete', 'role_delete', '37', ''),
(41, 'sale', 'sale', 'parent', ''),
(42, 'edit', 'sale_edit', '41', ''),
(43, 'view', 'sale_view', '41', ''),
(44, 'delete', 'sale_delete', '41', ''),
(45, 'slider', 'slider', 'parent', ''),
(46, 'edit', 'slider_edit', '45', ''),
(47, 'view', 'slider_view', '45', ''),
(48, 'delete', 'slider_delete', '45', ''),
(49, 'stock', 'stock', 'parent', ''),
(50, 'edit', 'stock_edit', '49', ''),
(51, 'view', 'stock_view', '49', ''),
(52, 'delete', 'stock_delete', '49', ''),
(53, 'sub category', 'sub_category', 'parent', ''),
(54, 'edit', 'sub_category_edit', '53', ''),
(55, 'view', 'sub_category_view', '53', ''),
(56, 'delete', 'sub_category_delete', '53', ''),
(57, 'user', 'user', 'parent', ''),
(58, 'edit', 'user_edit', '57', ''),
(59, 'view', 'user_view', '57', ''),
(60, 'delete', 'user_delete', '57', ''),
(61, 'newsletter', 'newsletter', 'parent', ''),
(62, 'language', 'language', 'parent', ''),
(63, 'page', 'page', 'parent', '') (-;-)

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL auto_increment,
  `rating_num` int(11) NOT NULL,
  `rating_total` int(11) NOT NULL,
  `rating_user` longtext collate utf8_unicode_ci NOT NULL,
  `title` longtext collate utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `description` longtext collate utf8_unicode_ci NOT NULL,
  `sub_category` int(11) NOT NULL,
  `num_of_imgs` varchar(100) collate utf8_unicode_ci NOT NULL,
  `sale_price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `shipping_cost` longtext collate utf8_unicode_ci NOT NULL,
  `add_timestamp` longtext collate utf8_unicode_ci NOT NULL,
  `featured` longtext collate utf8_unicode_ci NOT NULL,
  `tag` longtext collate utf8_unicode_ci,
  `status` longtext collate utf8_unicode_ci NOT NULL,
  `front_image` longtext collate utf8_unicode_ci,
  `brand` longtext collate utf8_unicode_ci NOT NULL,
  `current_stock` longtext collate utf8_unicode_ci NOT NULL,
  `unit` longtext collate utf8_unicode_ci NOT NULL,
  `additional_fields` longtext collate utf8_unicode_ci NOT NULL,
  `number_of_view` int(11) NOT NULL default '0',
  `background` longtext collate utf8_unicode_ci,
  `discount` longtext collate utf8_unicode_ci NOT NULL,
  `discount_type` longtext collate utf8_unicode_ci NOT NULL,
  `tax` longtext collate utf8_unicode_ci NOT NULL,
  `tax_type` longtext collate utf8_unicode_ci NOT NULL,
  `color` longtext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 (-;-)

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `rating_num`, `rating_total`, `rating_user`, `title`, `category`, `description`, `sub_category`, `num_of_imgs`, `sale_price`, `purchase_price`, `shipping_cost`, `add_timestamp`, `featured`, `tag`, `status`, `front_image`, `brand`, `current_stock`, `unit`, `additional_fields`, `number_of_view`, `background`, `discount`, `discount_type`, `tax`, `tax_type`, `color`) VALUES
(1, 0, 0, '', 'Demo Product 1', 1, '<p><span style="-webkit-font-smoothing: antialiased; text-align: justify;">Lorem Ipsum</span><span style="-webkit-font-smoothing: antialiased; text-align: justify;">&nbsp;</span><span style="-webkit-font-smoothing: antialiased; text-align: justify;">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 1, '1', 100, 80, '10', '1436646563', 'ok', 'demo', 'ok', '0', '1', '101', 'pc', '{"name":"false","value":"false"}', 0, NULL, '5', 'percent', '5', 'percent', 'false'),
(2, 0, 0, '', 'Demo Product 2', 1, '<p><span style="-webkit-font-smoothing: antialiased; text-align: justify;">Lorem Ipsum</span><span style="-webkit-font-smoothing: antialiased; text-align: justify;">&nbsp;</span><span style="-webkit-font-smoothing: antialiased; text-align: justify;">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 2, '1', 100, 80, '10', '1436646639', 'ok', 'demo', 'ok', '0', '2', '98', 'pc', '{"name":"false","value":"false"}', 0, NULL, '5', 'percent', '5', 'percent', 'false'),
(3, 0, 0, '', 'Demo Product 3', 2, '							<p><span style="-webkit-font-smoothing: antialiased; text-align: justify;">Lorem Ipsum</span><span style="-webkit-font-smoothing: antialiased; text-align: justify;">&nbsp;</span><span style="-webkit-font-smoothing: antialiased; text-align: justify;">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 3, '1', 100, 80, '10', '1436646721', 'ok', 'demo', 'ok', '0', '3', '98', 'pc', '{"name":"false","value":"false"}', 0, NULL, '5', 'percent', '5', 'percent', 'false'),
(4, 0, 0, '', 'Demo Product 4', 2, '<p><span style="-webkit-font-smoothing: antialiased; text-align: justify;">Lorem Ipsum</span><span style="-webkit-font-smoothing: antialiased; text-align: justify;">&nbsp;</span><span style="-webkit-font-smoothing: antialiased; text-align: justify;">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 4, '1', 100, 80, '10', '1436646786', 'ok', 'demo', 'ok', '0', '6', '98', 'pc', '{"name":"false","value":"false"}', 0, NULL, '5', 'percent', '5', 'percent', 'false')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `permission` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 (-;-)

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `permission`, `description`) VALUES
(1, 'master', '', 'Master Admin. Adds Admin. Provides account roles.'),
(5, 'Product Manager', '["13","17","21","29","33","41","49"]', 'Manages Products'),
(4, 'Accountant', '["13","25","33","41","49","61"]', 'Accountancy and Support')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sale_id` int(11) NOT NULL auto_increment,
  `sale_code` longtext NOT NULL,
  `buyer` longtext NOT NULL,
  `product_details` longtext NOT NULL,
  `shipping_address` longtext NOT NULL,
  `vat` longtext NOT NULL,
  `vat_percent` varchar(10) NOT NULL,
  `shipping` longtext NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `payment_status` longtext NOT NULL,
  `payment_details` longtext NOT NULL,
  `payment_timestamp` longtext NOT NULL,
  `grand_total` longtext NOT NULL,
  `sale_datetime` longtext NOT NULL,
  `delivary_datetime` longtext NOT NULL,
  `delivery_status` longtext NOT NULL,
  `viewed` longtext NOT NULL,
  PRIMARY KEY  (`sale_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 (-;-)

--
-- Dumping data for table `sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(11) NOT NULL auto_increment,
  `elements` longtext NOT NULL,
  `status` longtext NOT NULL,
  `title` longtext NOT NULL,
  `style` varchar(20) NOT NULL,
  `serial` int(11) NOT NULL,
  PRIMARY KEY  (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 (-;-)

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `elements`, `status`, `title`, `style`, `serial`) VALUES
(1, '{"images":["ase"],"texts":[{"name":"text_1","text":"WELCOME TO","color":"rgba(255,255,255,1)","background":"rgba(196,4,189,1)"},{"name":"text_2","text":"YOUR SHOP NAME","color":"rgba(255,255,255,1)","background":"rgba(141,0,176,1)"}]}', 'ok', 'Welcome', '2', 2),
(2, '{"images":[],"texts":[{"name":"text_1","text":"WELCOME","color":"rgba(255,255,255,1)","background":"rgba(0,0,0,0)"},{"name":"text_2","text":"YOUR SHOP NAME","color":"rgba(255,255,255,1)","background":"rgba(0,0,0,0)"},{"name":"text_3","text":"SHOP TITLE","color":"rgba(255,255,255,1)","background":"rgba(0,0,0,0)"}]}', 'ok', 'Welcome 2', '1', 1)(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `slider_style`
--

CREATE TABLE IF NOT EXISTS `slider_style` (
  `slider_style_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`slider_style_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 (-;-)

--
-- Dumping data for table `slider_style`
--

INSERT INTO `slider_style` (`slider_style_id`, `name`, `value`) VALUES
(1, 'WELCOME TYPE 1', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:6500;transition2d:all;transition3d:15;\\"",\r\n   "background":"bg",\r\n   "images":[\r\n\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h1",\r\n         "show_name":"WELCOME",\r\n         "name":"text_1",\r\n         "style":"top:30%; left:50%; text-shadow: 0px 0px 20px white;  font-weight: 300; font-size:50px;",\r\n         "data_ls":"offsetxin:0; durationin:2500; offsetxout:0; durationout:2500; showuntil:1;",\r\n         "color":"#ffffff",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h1",\r\n         "show_name":"YOUR SHOP NAME",\r\n         "name":"text_2",\r\n         "style":"top:50%; left:50%; text-shadow: 0px 0px 20px white;  font-weight: 300; font-size:100px;  white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; durationin:2500; delayin:500; offsetxout:0; durationout:2500; showuntil:1;",\r\n         "color":"#ffffff",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h1",\r\n         "show_name":"SHOP TITLE",\r\n         "name":"text_3",\r\n         "style":"top:70%; left:50%; text-shadow: 0px 0px 20px white;  font-weight: 300; font-size:40px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; durationin:2500; delayin:1200; offsetxout:0; durationout:2500; showuntil:1;",\r\n         "color":"#ffffff",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(2, 'WELCOME TYPE 2', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:4500;transition2d:24,25,27,28,34,35,37,38,110,113;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "show_name":"Image 1",\r\n         "name":"ase",\r\n         "style":"top:20px; left:50%;width:220px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; offsetyin:top; durationin:4600; easingin:easeOutQuad; fadein:false; rotatein:-10; offsetxout:0; durationout:1500;"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h5",\r\n         "show_name":"WELCOME TO",\r\n         "name":"text_1",\r\n         "style":"top:260px; left:50%; text-align: center;  font-weight: 300; width:300px; height:60px; font-size:30px; line-height:60px; border-radius:5px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; scalexin:0; scaleyin:0; offsetxout:0; offsetyout:top; durationout:750; durationin:1000; fadeout:false;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"YOUR SHOP NAME",\r\n         "name":"text_2",\r\n         "style":"top:340px; left:50%; text-align: center; font-weight: 300; width:500px; height:100px; font-size:40px; line-height:100px; border-radius:5px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; scalexin:0; scaleyin:0; offsetxout:0; offsetyout:bottom; durationin:1000; durationout:750; fadeout:false;",\r\n         "color":"#ffffff",\r\n         "background":"#8D00B0"\r\n      }\r\n   ]\r\n}'),
(3, 'SLIDER TYPE 1', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7000;transition2d:76,77,78,79;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "show_name":"Product Image 1",\r\n         "name":"circle_1",\r\n         "style":"top:35%; left:60%;width:200px; white-space: nowrap; ",\r\n         "data_ls":"offsetxin:0; offsetyin:top; durationin:750; delayin:1500; easingin:easeOutQuart; fadein:false; offsetxout:right; durationout:1000; showuntil:1; easingout:easeInQuart; fadeout:false; "\r\n      },\r\n      {\r\n         "show_name":"Product Image 2",\r\n         "name":"circle_2",\r\n         "style":"top:35%; left:60%;width:200px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; offsetyin:top; durationin:750; delayin:3000; easingin:easeOutQuart; fadein:false; offsetxout:right; durationout:1000; showuntil:1; easingout:easeInQuart; fadeout:false; "\r\n      },\r\n      {\r\n         "show_name":"Product Image 3",\r\n         "name":"circle_3",\r\n         "style":"top:35%; left:60%;width:200px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; offsetyin:top; durationin:750; delayin:4500; easingin:easeOutQuart; fadein:false; offsetxout:right; durationout:1000; easingout:easeInQuart; fadeout:false; "\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_1",\r\n         "style":"top:105px; left:30px; text-align: center; font-weight: 300; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; durationin:750; easingin:easeOutQuint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 1",\r\n         "name":"product_feature_1",\r\n         "style":"top:100px; left:85px; font-weight: 300; font-size:25px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:left; easingin:easeOutBack; fadein:false; scalexin:0.1; scaleyin:0.1; offsetxout:left; durationout:750; fadeout:false; scalexout:0.1; scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_2",\r\n         "style":"top:155px; left:30px; font-weight: 300; text-align: center; width:30px; height:30px; font-size:30px; line-height:30PX; border-radius:100px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; durationin:750; delayin:500; easingin:easeOutQuint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 2",\r\n         "name":"product_feature_2",\r\n         "style":"top:150px; left:85px; font-weight: 300; font-size:25px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:left; delayin:500; easingin:easeOutBack; fadein:false; scalexin:0.1; scaleyin:0.1; offsetxout:left; durationout:750; fadeout:false; scalexout:0.1; scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_3",\r\n         "style":"top:205px; left:30px; font-weight: 300; text-align: center; width:30px; height:30px; font-size:30px; line-height:30PX; border-radius:100px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; durationin:750; delayin:1000; easingin:easeOutQuint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 3",\r\n         "name":"product_feature_3",\r\n         "style":"top:200px; left:85px;  font-weight: 300; font-size:25px; white-space: nowrap; ",\r\n         "data_ls":"offsetxin:left; delayin:1000; easingin:easeOutBack; fadein:false; scalexin:0.1; scaleyin:0.1; offsetxout:left; durationout:750; fadeout:false; scalexout:0.1; scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_4",\r\n         "style":"top:255px; left:30px; font-weight: 300; text-align: center; width:30px; height:30px; font-size:30px; line-height:30PX;  border-radius:100px; white-space: nowrap; ",\r\n         "data_ls":"offsetxin:0; durationin:750; delayin:1500; easingin:easeOutQuint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5;",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 4",\r\n         "name":"product_feature_4",\r\n         "style":"top:250px; left:85px;  font-weight: 300; font-size:25px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:left; delayin:1500; easingin:easeOutBack; fadein:false; scalexin:0.1; scaleyin:0.1; offsetxout:left; durationout:750; fadeout:false; scalexout:0.1; scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_5",\r\n         "style":"top:305px; left:30px; font-weight: 300; text-align: center; width:30px; height:30px; font-size:30px; line-height:30PX; border-radius:100px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; durationin:750; delayin:2000; easingin:easeOutQuint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#C404BD",\r\n         "other":"fixed"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 5",\r\n         "name":"product_feature_5",\r\n         "style":"top:300px; left:85px;  font-weight: 300; font-size:25px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:left; delayin:2000; easingin:easeOutBack; fadein:false; scalexin:0.1; scaleyin:0.1; offsetxout:left; durationout:750; fadeout:false; scalexout:0.1; scaleyout:0.1;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE 1",\r\n         "name":"product_title_1",\r\n         "style":"top:65%; left:60%; font-weight: 300; font-size:30px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; durationin:450; delayin:1750; easingin:easeOutQuart; scalexin:0; scaleyin:0; offsetxout:0; durationout:1000; showuntil:51; easingout:easeInQuart; scalexout:3; scaleyout:3;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE 2",\r\n         "name":"product_title_2",\r\n         "style":"top:65%; left:60%; font-weight: 300; font-size:30px; white-space: nowrap; ",\r\n         "data_ls":"offsetxin:0; durationin:450; delayin:3250; easingin:easeOutQuart; scalexin:0; scaleyin:0; offsetxout:0; durationout:1000; showuntil:51; easingout:easeInQuart; scalexout:3; scaleyout:3;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE 3",\r\n         "name":"product_title_3",\r\n         "style":"top:65%; left:60%; font-weight: 300; font-size:30px; white-space: nowrap;",\r\n         "data_ls":"offsetxin:0; durationin:450; delayin:4750; easingin:easeOutQuart; scalexin:0; scaleyin:0; offsetxout:0; durationout:1000; easingout:easeInQuart; scalexout:3; scaleyout:3;",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(4, 'SLIDER TYPE 2', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:4500;transition2d:105,106;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:100px;left:80px; white-space:nowrap; width:220px;",\r\n         "data_ls":"offsetxin:left;durationin:1500; delayin:1400; fadein:false; offsetxout:left; durationout:1000; fadeout:false; ",\r\n         "name":"semi_long_1",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "style":"top:100px;left:180px; white-space:nowrap;width:220px; ",\r\n         "data_ls":"offsetxin:left;durationin:1500; delayin:1200; fadein:false; offsetxout:left; durationout:1000; fadeout:false; ",\r\n         "name":"semi_long_2",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      },\r\n      {\r\n         "style":"top:100px;left:280px; white-space:nowrap; width:220px;",\r\n         "data_ls":"offsetxin:left;durationin:1500; delayin:1000; fadein:false; offsetxout:left; durationout:1000; fadeout:false; ",\r\n         "name":"semi_long_3",\r\n         "show_name":"PRODUCT IMAGE 3"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:20px;left:700px; font-weight:300; font-size:40px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:1000; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 1",\r\n         "name":"product_feature_1",\r\n         "style":"top:100px;left:761px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:800; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 2",\r\n         "name":"product_feature_2",\r\n         "style":"top:150px;left:761px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:1300; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURe 3",\r\n         "name":"product_feature_3",\r\n         "style":"top:200px;left:761px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:1800; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 4",\r\n         "name":"product_feature_4",\r\n         "style":"top:250px;left:761px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:2300; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 5",\r\n         "name":"product_feature_5",\r\n         "style":"top:300px;left:761px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:2800; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 6",\r\n         "name":"product_feature_6",\r\n         "style":"top:350px;left:761px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:3300; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_1",\r\n         "style":"top:107px;left:710px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:500; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_2",\r\n         "style":"top:157px;left:710px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:1000; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_3",\r\n         "style":"top:207px;left:710px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:1500; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_4",\r\n         "style":"top:257px;left:710px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:2000; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_5",\r\n         "style":"top:307px;left:710px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:2500; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_6",\r\n         "style":"top:357px;left:710px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:3000; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      }\r\n   ]\r\n}'),
(5, 'SLIDER TYPE 3', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:105,106;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:100px;left:580px;width:220px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:right;durationin:1500; delayin:1400; fadein:false; offsetxout:left; durationout:1000; fadeout:false; ",\r\n         "name":"semi_long_1",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "style":"top:100px;left:680px;width:220px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:right;durationin:1500; delayin:1200; fadein:false; offsetxout:left; durationout:1000; fadeout:false; ",\r\n         "name":"semi_long_2",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      },\r\n      {\r\n         "style":"top:100px;left:780px;width:220px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:right;durationin:1500; delayin:1000; fadein:false; offsetxout:left; durationout:1000; fadeout:false; ",\r\n         "name":"semi_long_3",\r\n         "show_name":"PRODUCT IMAGE 3"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:20px;left:80px; font-weight:300; font-size:40px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:1000; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_1",\r\n         "style":"top:107px;left:71px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:500; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 1",\r\n         "name":"product_feature_1",\r\n         "style":"top:100px;left:116px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:800; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_2",\r\n         "style":"top:157px;left:71px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:1000; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 2",\r\n         "name":"product_feature_2",\r\n         "style":"top:150px;left:116px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:1300; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_3",\r\n         "style":"top:207px;left:71px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:1500; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 3",\r\n         "name":"product_feature_3",\r\n         "style":"top:200px;left:116px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:1800; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_4",\r\n         "style":"top:257px;left:71px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:2000; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 4",\r\n         "name":"product_feature_4",\r\n         "style":"top:250px;left:116px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:2300; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_5",\r\n         "style":"top:307px;left:71px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:2500; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 5",\r\n         "name":"product_feature_5",\r\n         "style":"top:300px;left:116px; font-weight:300; font-size:30px; white-space:nowrap;",\r\n         "data_ls":"offsetxin:0;delayin:2800; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"+",\r\n         "name":"feature_bullet_6",\r\n         "style":"top:357px;left:71px; font-weight:300; text-align:center; width:30px; height:30px; font-size:30px; line-height:30px; border-radius:100px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:750; delayin:3000; easingin:easeoutquint; rotatein:90; scalexin:0.5; scaleyin:0.5; offsetxout:0; durationout:750; rotateout:90; scalexout:0.5; scaleyout:0.5; ",\r\n         "color":"#ffffff",\r\n         "background":"#c404bd"\r\n      },\r\n      {\r\n         "element":"h5",\r\n         "show_name":"PRODUCT FEATURE 6",\r\n         "name":"product_feature_6",\r\n         "style":"top:350px;left:116px; font-weight:300; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;delayin:3300; easingin:easeoutquint; scalexin:0.8; scaleyin:0.8; offsetxout:0; durationout:750; scalexout:0.8; scaleyout:0.8; ",\r\n         "color":"#8d00b0",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(6, 'SLIDER TYPE 4', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:105,106;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "name":"long_1",\r\n         "style":"top:60px;left:578px;width:200px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:4000; delayin:1500; easingin:easeinoutquad; scalexin:1.1; scaleyin:1.1; offsetxout:0; durationout:1000; scalexout:0.9; scaleyout:0.9; ",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "name":"semi_long_1",\r\n         "style":"top:170px;left:800px;width:200px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:4000; delayin:1500; easingin:easeinoutquad; scalexin:1.1; scaleyin:1.1; offsetxout:0; durationout:1000; scalexout:0.9; scaleyout:0.9; ",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      },\r\n      {\r\n         "name":"square_1",\r\n         "style":"top:265px;left:1020px;width:200px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:4000; delayin:1500; easingin:easeinoutquad; scalexin:1.1; scaleyin:1.1; offsetxout:0; durationout:1000; scalexout:0.9; scaleyout:0.9; ",\r\n         "show_name":"PRODUCT IMAGE 3"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h1",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:20px;left:50px; font-size:50px; font-weight:300; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:3000; delayin:500; easingin:easeoutelastic; rotatexin:90; transformoriginin:50; bottom; 0; offsetxout:0; rotatexout:90; transformoriginout:50; ",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 1",\r\n         "name":"product_feature_1",\r\n         "style":"top:100px;left:50px; text-align:justify; width:500px; font-size:20px; ",\r\n         "data_ls":"offsetxin:-150;durationin:2000; delayin:500; easingin:easeinoutquart; rotateyin:-40; offsetxout:-150; durationout:1000; rotateyout:-40; ",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 2",\r\n         "name":"product_feature_2",\r\n         "style":"top:150px;left:50px; text-align:justify; width:500px; font-size:20px; ",\r\n         "data_ls":"offsetxin:-150;durationin:2000; delayin:1000; easingin:easeinoutquart; rotateyin:-40; offsetxout:-150; durationout:1000; rotateyout:-40; ",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 3",\r\n         "name":"product_feature_3",\r\n         "style":"top:200px;left:50px; text-align:justify; width:500px; font-size:20px; ",\r\n         "data_ls":"offsetxin:-150;durationin:2000; delayin:1500; easingin:easeinoutquart; rotateyin:-40; offsetxout:-150; durationout:1000; rotateyout:-40; ",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 4",\r\n         "name":"product_feature_4",\r\n         "style":"top:250px;left:50px; text-align:justify; width:500px; font-size:20px; ",\r\n         "data_ls":"offsetxin:-150;durationin:2000; delayin:2000; easingin:easeinoutquart; rotateyin:-40; offsetxout:-150; durationout:1000; rotateyout:-40; ",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 5",\r\n         "name":"product_feature_5",\r\n         "style":"top:300px;left:50px; text-align:justify; width:500px; font-size:20px; ",\r\n         "data_ls":"offsetxin:-150;durationin:2000; delayin:2500; easingin:easeinoutquart; rotateyin:-40; offsetxout:-150; durationout:1000; rotateyout:-40; ",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 6",\r\n         "name":"product_feature_6",\r\n         "style":"top:350px;left:50px; text-align:justify; width:500px; font-size:20px; ",\r\n         "data_ls":"offsetxin:-150;durationin:2000; delayin:3000; easingin:easeinoutquart; rotateyin:-40; offsetxout:-150; durationout:1000; rotateyout:-40; ",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"div",\r\n         "show_name":"PRODUCT FEATURE 7",\r\n         "name":"product_feature_7",\r\n         "style":"top:400px;left:50px; text-align:justify; width:500px; font-size:20px; ",\r\n         "data_ls":"offsetxin:-150;durationin:2000; delayin:3500; easingin:easeinoutquart; rotateyin:-40; offsetxout:-150; durationout:1000; rotateyout:-40; ",\r\n         "color":"#470467",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(7, 'SLIDER TYPE 5', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:73,102;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "name":"long_1",\r\n         "style":"top:50%; left:50%;width:200px; white-space:nowrap;",\r\n         "data_ls" : "",\r\n         "show_name":"IMAGE"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h6",\r\n         "show_name":"PRICE",\r\n         "name":"price",\r\n         "style":"top:55%; left:39%; durationin:500; delayin:600; fadein:false; rotatein:30; durationout:500; fadeout:false; slidedirection:fade; slideoutdirection:fade; scalein:0.1; scaleout:0.1; font-weight:300; box-shadow:0px 2px 8px -2px black; padding-top:5px; padding-right:20px; padding-bottom:5px; padding-left:20px; font-size:30px; color:#ffffff; background:#B816B2; border-radius:5px; white-space:nowrap;",\r\n         "data_ls" : "",\r\n         "color":"#ffffff",\r\n         "background":"#b816b2"\r\n      },\r\n      {\r\n         "element":"h6",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:45%; left:36%; durationin:500; delayin:500; fadein:false; rotatein:-30; durationout:500; fadeout:false; slidedirection:fade; slideoutdirection:fade; scalein:0.1;scaleout:0.1; font-weight:300; box-shadow:0px 2px 8px -2px black; padding-top:5px; padding-right:20px; padding-bottom:5px; padding-left:20px; font-size:30px; color:#ffffff; background:#760093;border-radius:5px; white-space:nowrap;",\r\n         "data_ls" : "",\r\n         "color":"#ffffff",\r\n         "background":"#760093"\r\n      }\r\n   ]\r\n}'),
(8, 'SLIDER TYPE 6', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:73,102;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:100px;left:100px; width:250px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:3000; delayin:1500; rotateyin:90; transformoriginin:left; 0; offsetxout:0; durationout:750; rotateyout:90; transformoriginout:left; ",\r\n         "name":"semi_long_1",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "style":"top:100px;left:400px; width:250px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:3000; delayin:1500; rotateyin:-90; transformoriginin:right; 0; offsetxout:0; durationout:750; rotateyout:90; transformoriginout:right; ",\r\n         "name":"semi_long_2",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"h1",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"font-family:Roboto;top:25px; left:192px; font-weight:100; text-align:center; width:340px; font-size:40px; border-radius:5px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:2500; delayin:2000; easingin:easeoutelastic; rotatexin:90; transformoriginin:50; bottom; 0; offsetxout:0; rotateout:-90; transformoriginout:left; ",\r\n         "color":"#34009d",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":" DUMMY TEXT 1",\r\n         "name":"dummy_text_1",\r\n         "style":"top:50px;left:800px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; border-radius:4px; white-space:nowrap; ",\r\n         "data_ls":"durationin:1500;delayin:2300; rotatein:20; rotatexin:30; scalexin:1.5; scaleyin:1.5; transformoriginin:left; 0; durationout:750; rotateout:20; rotatexout:-30; scalexout:0; scaleyout:0; transformoriginout:left; ",\r\n         "color":"#ffffff",\r\n         "background":"#740091"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 2",\r\n         "name":"dummy_text_2",\r\n         "style":"top:90px;left:800px; font-weight:300; font-size:24px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:1500; delayin:2700; rotateyin:90; skewxin:60; transformoriginin:25; 0; offsetxout:100; durationout:750; skewxout:60; ",\r\n         "color":"#ff00f6",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 3",\r\n         "name":"dummy_text_3",\r\n         "style":"top:150px;left:800px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; border-radius:4px; white-space:nowrap; ",\r\n         "data_ls":"durationin:1500;delayin:3000; rotatein:20; rotatexin:30; scalexin:1.5; scaleyin:1.5; transformoriginin:left; 0; durationout:750; rotateout:20; rotatexout:-30; scalexout:0; scaleyout:0; transformoriginout:left; ",\r\n         "color":"#ffffff",\r\n         "background":"#740091"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 4",\r\n         "name":"dummy_text_4",\r\n         "style":"top:190px;left:800px; font-weight:300; font-size:24px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:1500; delayin:3400; rotateyin:90; skewxin:60; transformoriginin:25; 0; offsetxout:100; durationout:750; skewxout:60; ",\r\n         "color":"#ff00f6",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 5",\r\n         "name":"dummy_text_5",\r\n         "style":"top:250px;left:800px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; border-radius:4px; white-space:nowrap; ",\r\n         "data_ls":"durationin:1500;delayin:3700; rotatein:20; rotatexin:30; scalexin:1.5; scaleyin:1.5; transformoriginin:left; 0; durationout:750; rotateout:20; rotatexout:-30; scalexout:0; scaleyout:0; transformoriginout:left; ",\r\n         "color":"#ffffff",\r\n         "background":"#740091"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 6",\r\n         "name":"dummy_text_6",\r\n         "style":"top:290px;left:799px; font-weight:300; font-size:24px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:1500; delayin:4100; rotateyin:90; skewxin:60; transformoriginin:25; 0; offsetxout:100; durationout:750; skewxout:60; ",\r\n         "color":"#ff00f6",\r\n         "background":"rgba(0,0,0,0)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 7",\r\n         "name":"dummy_text_7",\r\n         "style":"top:360px;left:800px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; border-radius:4px; white-space:nowrap; ",\r\n         "data_ls":"durationin:1500;delayin:4400; rotatein:20; rotatexin:30; scalexin:1.5; scaleyin:1.5; transformoriginin:left; 0; durationout:750; rotateout:20; rotatexout:-30; scalexout:0; scaleyout:0; transformoriginout:left; ",\r\n         "color":"#ffffff",\r\n         "background":"#740091"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 8",\r\n         "name":"dummy_text_8",\r\n         "style":"top:400px;left:799px; font-weight:300; font-size:24px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:1500; delayin:4800; rotateyin:90; skewxin:60; transformoriginin:25; 0; offsetxout:100; durationout:750; skewxout:60; ",\r\n         "color":"#ff00f6",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(9, 'SLIDER TYPE 7', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7500;transition2d:73,102;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:50px; left:50%;width:278px; white-space:nowrap;",\r\n         "data_ls":"durationin:1500;scalexin:0.8; scaleyin:0.8; scalexout:0.8; scaleyout:0.8; ",\r\n         "name":"semi_long_1",\r\n         "show_name":"IMAGE"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 1",\r\n         "name":"dummy_text_1",\r\n         "style":"top:80px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:1000; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 2",\r\n         "name":"dummy_text_2",\r\n         "style":"top:140px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:1500; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 3",\r\n         "name":"dummy_text_3",\r\n         "style":"top:200px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:2000; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 4",\r\n         "name":"dummy_text_4",\r\n         "style":"top:260px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:2500; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 5",\r\n         "name":"dummy_text_5",\r\n         "style":"top:320px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:3000; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 6",\r\n         "name":"dummy_text_6",\r\n         "style":"top:380px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:3500; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:50%;left:900px; font-weight:100; text-align:right; padding:15px; font-size:40px; line-height:37px; font-family:roboto; border-radius:4px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:2500; delayin:3250; easingin:easeoutelastic; rotatexin:90; transformoriginin:50; top; 0; offsetxout:0; durationout:1000; rotatexout:90; transformoriginout:50; bottom; ",\r\n         "color":"#fff",\r\n         "background":"#11008b"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 6",\r\n         "name":"dummy_text_6",\r\n         "style":"top:505px;left:983px; font-family:; flower; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;delayin:3500; skewxin:60; scalexin:1.5; offsetxout:-50; durationout:1000; skewxout:60; scalexout:1.5; ",\r\n         "color":"#d9482b",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}'),
(10, 'SLIDER TYPE 8', '{\r\n   "full_slide_style":"data-ls=\\"slidedelay:7000;transition2d:76,77,78,79;\\"",\r\n   "background":"bg_apple",\r\n   "images":[\r\n      {\r\n         "style":"top:120px; left:42%;width:180px; white-space:nowrap; ",\r\n         "data_ls":"durationin:1500;scalexin:0.8; scaleyin:0.8; scalexout:0.8; scaleyout:0.8; ",\r\n         "name":"semi_long_1",\r\n         "show_name":"PRODUCT IMAGE 1"\r\n      },\r\n      {\r\n         "style":"top:120px; left:58%;width:180px; white-space:nowrap; ",\r\n         "data_ls":"durationin:1500;scalexin:0.8; scaleyin:0.8; scalexout:0.8; scaleyout:0.8; ",\r\n         "name":"semi_long_2",\r\n         "show_name":"PRODUCT IMAGE 2"\r\n      },\r\n      {\r\n         "style":"top:50px; left:50%;width:200px; white-space:nowrap; ",\r\n         "data_ls":"durationin:1500;scalexin:0.8; scaleyin:0.8; scalexout:0.8; scaleyout:0.8; ",\r\n         "name":"long_1",\r\n         "show_name":"PRODUCT IMAGE 3"\r\n      }\r\n   ],\r\n   "texts":[\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 1",\r\n         "name":"dummy_text_1",\r\n         "style":"top:80px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:1000; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 2",\r\n         "name":"dummy_text_2",\r\n         "style":"top:140px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:1500; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 3",\r\n         "name":"dummy_text_3",\r\n         "style":"top:200px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:2000; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 4",\r\n         "name":"dummy_text_4",\r\n         "style":"top:260px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:2500; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 5",\r\n         "name":"dummy_text_5",\r\n         "style":"top:320px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:3000; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 6",\r\n         "name":"dummy_text_6",\r\n         "style":"top:380px;left:20px; font-weight:300; height:40px; padding-right:10px; padding-left:10px; font-size:30px; line-height:37px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;durationin:2000; delayin:3500; offsetxout:-50; durationout:1000; ",\r\n         "color":"#fd2931",\r\n         "background":"rgba(255,255,255,0.85)"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"PRODUCT TITLE",\r\n         "name":"product_title",\r\n         "style":"top:50%;left:900px; font-weight:100; text-align:right; padding:15px; font-size:40px; line-height:37px; font-family:roboto; border-radius:4px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:0;durationin:2500; delayin:3250; easingin:easeoutelastic; rotatexin:90; transformoriginin:50; top; 0; offsetxout:0; durationout:1000; rotatexout:90; transformoriginout:50; bottom; ",\r\n         "color":"#fff",\r\n         "background":"#11008b"\r\n      },\r\n      {\r\n         "element":"p",\r\n         "show_name":"DUMMY TEXT 7",\r\n         "name":"dummy_text_7",\r\n         "style":"top:505px;left:983px; font-family:; flower; font-size:30px; white-space:nowrap; ",\r\n         "data_ls":"offsetxin:-50;delayin:3500; skewxin:60; scalexin:1.5; offsetxout:-50; durationout:1000; skewxout:60; scalexout:1.5; ",\r\n         "color":"#000",\r\n         "background":"rgba(0,0,0,0)"\r\n      }\r\n   ]\r\n}')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE IF NOT EXISTS `social_links` (
  `social_links_id` int(11) NOT NULL auto_increment,
  `type` longtext collate utf8_unicode_ci NOT NULL,
  `value` longtext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`social_links_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 (-;-)

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`social_links_id`, `type`, `value`) VALUES
(1, 'facebook', 'http://facebook.com/'),
(2, 'google-plus', 'http://google.com/'),
(3, 'twitter', 'http://twitter.com/'),
(4, 'skype', 'active-classified'),
(5, 'pinterest', 'http://pinterest.com/'),
(6, 'youtube', 'http://youtube.com/')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL auto_increment,
  `type` longtext NOT NULL,
  `category` longtext NOT NULL,
  `sub_category` longtext NOT NULL,
  `product` longtext NOT NULL,
  `quantity` longtext NOT NULL,
  `rate` longtext NOT NULL,
  `total` longtext NOT NULL,
  `reason_note` longtext NOT NULL,
  `datetime` longtext NOT NULL,
  `sale_id` varchar(30) NOT NULL,
  PRIMARY KEY  (`stock_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 (-;-)

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `type`, `category`, `sub_category`, `product`, `quantity`, `rate`, `total`, `reason_note`, `datetime`, `sale_id`) VALUES
(1, 'add', '1', '1', '1', '101', '80', '8080', '', '1436646573', ''),
(2, 'add', '1', '2', '2', '100', '80', '8000', '', '1436646648', ''),
(3, 'add', '2', '4', '3', '100', '80', '8000', '', '1436646728', ''),
(4, 'add', '2', '4', '4', '100', '80', '8000', '', '1436646794', ''),
(5, 'destroy', '2', '4', '4', '2', '', '', 'sale', '1436652334', '1'),
(6, 'destroy', '2', '3', '3', '2', '', '', 'sale', '1436652334', '1'),
(7, 'destroy', '1', '2', '2', '2', '', '', 'sale', '1436652334', '1')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `subscribe_id` int(11) NOT NULL,
  `email` varchar(600) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1(-;-)

--
-- Dumping data for table `subscribe`
--


-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_category_id` int(11) NOT NULL auto_increment,
  `sub_category_name` longtext NOT NULL,
  `category` longtext NOT NULL,
  PRIMARY KEY  (`sub_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 (-;-)

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category`) VALUES
(1, 'Demo Sub-category 1', '1'),
(2, 'Demo Sub-category 2', '1'),
(3, 'Demo Sub-category 3', '2'),
(4, 'Demo Sub-category 4', '2')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `ui_settings`
--

CREATE TABLE IF NOT EXISTS `ui_settings` (
  `ui_settings_id` int(11) NOT NULL auto_increment,
  `type` longtext NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`ui_settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 (-;-)

--
-- Dumping data for table `ui_settings`
--

INSERT INTO `ui_settings` (`ui_settings_id`, `type`, `value`) VALUES
(1, 'side_bar_pos', '0'),
(2, 'latest_item_div', '0'),
(3, 'most_popular_div', '0'),
(4, 'most_view_div', '0'),
(5, 'filter_div', 'on'),
(6, 'admin_login_logo', '18'),
(7, 'admin_nav_logo', '18'),
(8, 'home_top_logo', '16'),
(9, 'home_bottom_logo', '10'),
(10, 'home_category', '["1","2"]'),
(11, 'fav_ext', 'png'),
(12, 'side_bar_pos_category', 'right'),
(13, 'home_brand', '["1","2","3","4","5","6"]')(-;-)

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` longtext NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` longtext NOT NULL,
  `phone` longtext NOT NULL,
  `address1` longtext NOT NULL,
  `address2` longtext NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `langlat` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `fb_id` longtext NOT NULL,
  `g_id` varchar(50) NOT NULL,
  `g_photo` longtext NOT NULL,
  `creation_date` longtext NOT NULL,
  `google_plus` longtext NOT NULL,
  `skype` longtext NOT NULL,
  `facebook` longtext NOT NULL,
  `wishlist` longtext NOT NULL,
  `last_login` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 (-;-)

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `surname`, `email`, `phone`, `address1`, `address2`, `city`, `zip`, `langlat`, `password`, `fb_id`, `g_id`, `g_photo`, `creation_date`, `google_plus`, `skype`, `facebook`, `wishlist`, `last_login`) VALUES
(1, 's', 's', 'customer@shop.com', 's', 's', 's', 's', 's', '(12.4248105, 76.67821879999997)', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '', '', '1436652284', '', '', '', '[]', '1436652321')