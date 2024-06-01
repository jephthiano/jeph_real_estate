<?php
require_once(file_location('inc_path','connection.inc.php'));
@$conn = dbconnect('admin','PDO');
//CREATE ADMIN TABLE AND INSERT ADMIN
$sql = "CREATE TABLE IF NOT EXISTS admin_table(
    ad_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    ad_email VARCHAR(50) NOT NULL,
    ad_username VARCHAR(50) NOT NULL,
    ad_password VARCHAR(100) NOT NULL,
    ad_fullname VARCHAR(50) NOT NULL,
    ad_level ENUM('1','2','3'),
    ad_status ENUM('suspended','active') DEFAULT 'active',
    ad_registered_by INT(100) NOT NULL,
    
    UNIQUE(ad_id),
    UNIQUE(ad_email),
    UNIQUE(ad_username),
    FULLTEXT KEY (ad_email,ad_username,ad_fullname)
    ) ENGINE=InnoDB";
@$conn->exec($sql);
    
// CREATE ADMIN MEDIA TABLE
$sql = "CREATE TABLE IF NOT EXISTS admin_media_table(
    am_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    am_link_name VARCHAR(100) NOT NULL,
    am_extension VARCHAR(50) NOT NULL,
    ad_id INT(100) NOT NULL,
            
    UNIQUE(am_id),
    UNIQUE(am_link_name),
    UNIQUE(ad_id),
    FOREIGN KEY (ad_id) REFERENCES admin_table(ad_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->exec($sql);
// insert the grand admin
$admin = new admin('admin');
$admin->id = get_xml_data('id');
$admin->new_email = get_xml_data('email');
$admin->new_username = get_xml_data('username');
$admin->new_password = hash_pass(get_xml_data('pass'));
$admin->fullname = get_xml_data('fullname');
$admin->level = get_xml_data('level');
$admin->registered_by = get_xml_data('registered_by');
$admin->auto_insert_update();

//CREATE LOG TABLE
$sql = "CREATE TABLE IF NOT EXISTS log_table(
    l_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    l_brief VARCHAR(100) NOT NULL,
	l_details VARCHAR(200) NOT NULL,
	l_regdatetime DATETIME DEFAULT NOW(),
	l_ip_address VARCHAR(200) NOT NULL,
	ad_username VARCHAR(50) NOT NULL,
    ad_id INT(100) NOT NULL,
    
    UNIQUE(l_id),
	FULLTEXT KEY (l_brief,l_details,l_ip_address,ad_username)
    ) ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE SOCIAL MEDIA TABLE
$sql = "CREATE TABLE IF NOT EXISTS social_handle_table(
    s_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    s_name VARCHAR(50) NOT NULL,
    s_icon VARCHAR(20) NOT NULL,
    s_link VARCHAR(50) NOT NULL,
    s_color VARCHAR(10),
    s_bgcolor VARCHAR(10),
    
    UNIQUE(s_id),
    UNIQUE(s_name),
    UNIQUE(s_link),
    FULLTEXT KEY (s_name)
    ) ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE MESSAGE TABLE
$sql = "CREATE TABLE IF NOT EXISTS message_table(
    m_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    m_name VARCHAR(50) NOT NULL,
    m_email VARCHAR(50) NOT NULL,
    m_subject VARCHAR(70) NOT NULL,
    m_message TEXT NOT NULL,
    m_status ENUM('new','seen') DEFAULT 'new',
    m_datetime DATETIME DEFAULT NOW(),
    
    UNIQUE(m_id),
    FULLTEXT KEY (m_name,m_email,m_subject,m_message)
    ) ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE SUBSCRIBE TABLE
$sql = "CREATE TABLE IF NOT EXISTS subscriber_table(
    s_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    s_name VARCHAR(50) NOT NULL,
    s_email VARCHAR(50) NOT NULL,
    
    UNIQUE(s_id),
    UNIQUE(s_email),
    FULLTEXT KEY (s_name,s_email)
    ) ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE CATEGORY TABLE
$sql = "CREATE TABLE IF NOT EXISTS category_table(
    c_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    c_category VARCHAR(50) NOT NULL,
    
	UNIQUE(c_id),
    UNIQUE(c_category),
    FULLTEXT KEY (c_category)
    ) ENGINE=InnoDB";
@$conn->query($sql);
 
// CREATE CATEGORY MEDIA TABLE
$sql = "CREATE TABLE IF NOT EXISTS category_media_table(
    cm_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    cm_link_name VARCHAR(100) NOT NULL,
    cm_extension VARCHAR(50) NOT NULL,
    c_id INT(100) NOT NULL,
            
    UNIQUE(cm_id),
    UNIQUE(cm_link_name),
    FOREIGN KEY (c_id) REFERENCES category_table(c_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE PARTNER TABLE
$sql = "CREATE TABLE IF NOT EXISTS partner_table(
    p_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    p_name VARCHAR(50) NOT NULL,
    
    UNIQUE(p_id),
    UNIQUE(p_name),
    FULLTEXT KEY (p_name)
    ) ENGINE=InnoDB";
@$conn->exec($sql);

// CREATE PARTNER MEDIA TABLE
$sql = "CREATE TABLE IF NOT EXISTS partner_media_table(
    pm_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    pm_link_name VARCHAR(100) NOT NULL,
    pm_extension VARCHAR(50) NOT NULL,
    p_id INT(100) NOT NULL,
            
    UNIQUE(pm_id),
    UNIQUE(pm_link_name),
    UNIQUE(p_id),
    FOREIGN KEY (p_id) REFERENCES partner_table(p_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->exec($sql);


//CREATE PROPERTY TABLE
$sql = "CREATE TABLE IF NOT EXISTS property_table(
    p_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    p_title VARCHAR(255) NOT NULL,
    p_type VARCHAR(20) NOT NULL,
    p_price VARCHAR(20) NOT NULL,
    p_state VARCHAR(20) NOT NULL,
    p_city VARCHAR(20) NOT NULL,
    p_location VARCHAR(20) NOT NULL,
    p_bedroom INT(5) NOT NULL,
    p_bathroom INT(5) NOT NULL,
    p_parking_space ENUM('no','yes') DEFAULT 'no',
    p_condition ENUM('used','new') DEFAULT 'used',
    p_furnished ENUM('unfurnished','furnished') DEFAULT 'unfurnished',
    p_property_size INT(5) NOT NULL,
    p_video_link VARCHAR(100),
    p_facilities VARCHAR(255) NOT NULL,
    p_details TEXT NOT NULL,
    p_regdatetime DATETIME DEFAULT NOW(),
    p_status ENUM('pending','available','unavailable','deleted') DEFAULT 'pending',
	c_id INT(10) NOT NULL,
    ad_id INT(10) NOT NULL,
    
	UNIQUE(p_id),
    UNIQUE(p_title),
	FOREIGN KEY (c_id) REFERENCES category_table(c_id) ON UPDATE CASCADE,
    FULLTEXT KEY (p_title,p_details)
    ) ENGINE=InnoDB";
@$conn->query($sql);

// CREATE PROPERTY MEDIA TABLE
$sql = "CREATE TABLE IF NOT EXISTS property_media_table(
    pm_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    pm_link_name VARCHAR(100),
    pm_extension VARCHAR(50),
    p_id INT(100) NOT NULL,
            
    UNIQUE(pm_id),
    UNIQUE(pm_link_name),
    FOREIGN KEY (p_id) REFERENCES property_table(p_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE NEWS TABLE
$sql = "CREATE TABLE IF NOT EXISTS news_table(
    n_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    n_title VARCHAR(255) NOT NULL,
    n_category VARCHAR(55) NOT NULL,
    n_keyword MEDIUMTEXT DEFAULT NULL,
    n_imagecaption VARCHAR(100) DEFAULT NULL,
    n_paragraph1 TEXT NOT NULL,
    n_paragraph2 TEXT,
    n_paragraph3 TEXT,
    n_source VARCHAR(55) NOT NULL,
    n_regdatetime DATETIME DEFAULT NOW(),
    n_status ENUM('pending','active','suspended') DEFAULT 'pending',
    ad_id INT(100) NOT NULL,
    
	UNIQUE(n_id),
    UNIQUE(n_title),
    FULLTEXT KEY (n_title,n_category,n_keyword,n_imagecaption,n_paragraph1,n_paragraph2,n_paragraph3,n_source)
    ) ENGINE=InnoDB";
@$conn->query($sql);

// CREATE NEWS MEDIA TABLE
$sql = "CREATE TABLE IF NOT EXISTS news_media_table(
    nm_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nm_link_name VARCHAR(100),
    nm_extension VARCHAR(50),
    n_id INT(100) NOT NULL,
            
    UNIQUE(nm_id),
    UNIQUE(nm_link_name),
    UNIQUE(n_id),
    FOREIGN KEY (n_id) REFERENCES news_table(n_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE COMMENT TABLE
$sql = "CREATE TABLE IF NOT EXISTS comment_table(
    c_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    c_name VARCHAR(255),
    c_comment MEDIUMTEXT NOT NULL,
    c_status ENUM('active','suspended') DEFAULT 'active',
	c_ipaddress VARCHAR(55),
    c_regdatetime DATETIME DEFAULT NOW(),
    n_id INT(10) NOT NULL,
    
	UNIQUE(c_id),
    FULLTEXT KEY (c_name,c_comment,c_ipaddress),
    FOREIGN KEY (n_id) REFERENCES news_table(n_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->query($sql);

//CREATE TESTIMONIAL TABLE
$sql = "CREATE TABLE IF NOT EXISTS testimonial_table(
    t_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    t_name VARCHAR(50) NOT NULL,
    t_testimony VARCHAR(350) NOT NULL,
    
    UNIQUE(t_id),
    FULLTEXT KEY (t_name)
    ) ENGINE=InnoDB";
@$conn->exec($sql);

// CREATE TESTIMONIAL MEDIA TABLE
$sql = "CREATE TABLE IF NOT EXISTS testimonial_media_table(
    tm_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    tm_link_name VARCHAR(100) NOT NULL,
    tm_extension VARCHAR(50) NOT NULL,
    t_id INT(100) NOT NULL,
            
    UNIQUE(tm_id),
    UNIQUE(tm_link_name),
    UNIQUE(t_id),
    FOREIGN KEY (t_id) REFERENCES testimonial_table(t_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE TEAM TABLE
$sql = "CREATE TABLE IF NOT EXISTS team_table(
    t_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    t_name VARCHAR(50) NOT NULL,
    t_position VARCHAR(70) NOT NULL,
    t_info VARCHAR(350) NOT NULL,
    
    UNIQUE(t_id),
    FULLTEXT KEY (t_name,t_position)
    ) ENGINE=InnoDB";
@$conn->exec($sql);

// CREATE TEAM MEDIA TABLE
$sql = "CREATE TABLE IF NOT EXISTS team_media_table(
    tm_id INT(100) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    tm_link_name VARCHAR(100) NOT NULL,
    tm_extension VARCHAR(50) NOT NULL,
    t_id INT(100) NOT NULL,
            
    UNIQUE(tm_id),
    UNIQUE(tm_link_name),
    UNIQUE(t_id),
    FOREIGN KEY (t_id) REFERENCES team_table(t_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->exec($sql);

//CREATE APPOINTMENT TABLE
$sql = "CREATE TABLE IF NOT EXISTS appointment_table(
    a_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    a_name VARCHAR(255),
	a_email VARCHAR(70),
	a_phnumber VARCHAR(11),
    a_message MEDIUMTEXT NOT NULL,
    a_date DATE NOT NULL,
	a_time TIME NOT NULL,
    a_regdatetime DATETIME DEFAULT NOW(),
	c_status ENUM('unconfirmed','confirmed') DEFAULT 'unconfirmed',
    p_id INT(10) NOT NULL,  
    
	UNIQUE(a_id),
    FULLTEXT KEY (a_name,a_phnumber,a_message),
    FOREIGN KEY (p_id) REFERENCES property_table(p_id) ON UPDATE CASCADE ON DELETE CASCADE
    )ENGINE=InnoDB";
@$conn->query($sql);
?>