CREATE DATABASE quote;
USE quote;
CREATE TABLE `quote_users` (
   `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
   `user_group_id` bigint(20) unsigned NOT NULL,
   `email` varchar(255) NOT NULL,
   `user_password` varchar(255) NOT NULL,
   `create_date` datetime NOT NULL,
   PRIMARY KEY (`id`),
   UNIQUE KEY `id` (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

 CREATE TABLE `quote_system_routes` (
   `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
   `route` varchar(255) NOT NULL,
   `title` varchar(255) NOT NULL,
   `position` int(11) NOT NULL,
   `hidden` tinyint(4) NOT NULL,
   `permitted` tinyint(4) NOT NULL,
   `extenal` tinyint(4) NOT NULL,
   `parent` bigint(20) unsigned NOT NULL,
   `icon` varchar(255) NOT NULL,
   PRIMARY KEY (`id`),
   UNIQUE KEY `id` (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

 CREATE TABLE `quote_system_routes_user_groups_relations` (
   `system_route_id` bigint(20) unsigned NOT NULL,
   `user_group_id` bigint(20) unsigned NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 CREATE TABLE `quote_user_groups` (
   `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
   `group_name` varchar(255) NOT NULL,
   `create_date` datetime NOT NULL,
   PRIMARY KEY (`id`),
   UNIQUE KEY `id` (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

 INSERT INTO `quote_users` (`user_group_id`, `email`, `user_password`, `create_date`) VALUES ('5', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '2016-06-22');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `icon`) VALUES ('', 'Users', '4', 'icon-users');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('users', 'Users List', '5', '0', '0', '0', '22', 'icon-user');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('users/add', 'Users Add', '6', '0', '0', '0', '22', 'icon-user-follow');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('users/groups', 'User Groups', '7', '0', '0', '0', '22', 'icon-users');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('users/add_group', 'Add Group', '8', '0', '0', '0', '22', 'icon-users');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('users/permissions', 'Users Permissions', '9', '0', '0', '0', '22', ' icon-close');

INSERT INTO `quote_user_groups` (`group_name`, `create_date`) VALUES ('admin', '2016-06-22');
INSERT INTO quote_system_routes_user_groups_relations SET system_route_id = '22', user_group_id = '5';
INSERT INTO quote_system_routes_user_groups_relations SET system_route_id = '23', user_group_id = '5';
INSERT INTO quote_system_routes_user_groups_relations SET system_route_id = '24', user_group_id = '5';
INSERT INTO quote_system_routes_user_groups_relations SET system_route_id = '25', user_group_id = '5';
INSERT INTO quote_system_routes_user_groups_relations SET system_route_id = '26', user_group_id = '5';
INSERT INTO quote_system_routes_user_groups_relations SET system_route_id = '27', user_group_id = '5';

INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('', 'Dashboard', '1', '0', '0', '0', '0', 'icon-home');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('generate', 'Generate', '2', '0', '0', '0', '0', 'icon-doc');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('services', 'Services', '3', '0', '0', '0', '0', 'icon-list');

ALTER TABLE quote_users ADD user_name VARCHAR(255) NULL AFTER email;
ALTER TABLE quote_users ADD user_surname VARCHAR(255) NULL AFTER user_name;

CREATE TABLE services (
id SERIAL PRIMARY KEY,
service_name VARCHAR(255) NOT NULL,
scope VARCHAR(255) NULL,
description TEXT NULL,
rate DECIMAL(8,2) NULL,
create_date DATETIME NOT NULL
)ENGINE=MyISAM;

INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES ('services/add', 'Add service', '10', '1', '0', '0', '0', '');

CREATE TABLE quotes (
  id SERIAL PRIMARY KEY,
  creator BIGINT UNSIGNED NOT NULL,
  status_id INT UNSIGNED NOT NULL DEFAULT 1,
  create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE quote_statuses (
  id SERIAL PRIMARY KEY,
  status_name VARCHAR (255) NOT NULL
)ENGINE=MyISAM;

INSERT INTO `quote_statuses` (`status_name`) VALUES ('new');
INSERT INTO `quote_statuses` (`status_name`) VALUES ('won');
INSERT INTO `quote_statuses` (`status_name`) VALUES ('lost');
INSERT INTO `quote_statuses` (`status_name`) VALUES ('not followed');

ALTER TABLE quote_user_groups ADD quote_visibility TINYINT NOT NULL DEFAULT 0;

ALTER TABLE quote_users ADD company_id BIGINT UNSIGNED NOT NULL AFTER user_group_id;

CREATE TABLE templates (
  id SERIAL PRIMARY KEY,
  template_name VARCHAR (255) NOT NULL
);

INSERT INTO `templates` (`id`, `template_name`) VALUES ('1', 'Template 1');

INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `icon`) VALUES ('companies', 'Companies', '11', 'icon-pointer');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`) VALUES ('companies/add', 'Add Company', '12', '1');

ALTER TABLE quotes ADD total DECIMAL(10,2) NULL AFTER status_id;
ALTER TABLE quotes ADD project_name VARCHAR(255) NULL AFTER status_id;
ALTER TABLE quotes ADD company_name VARCHAR(255) NULL AFTER status_id;

CREATE TABLE service_unites (
  id SERIAL PRIMARY KEY,
  unit_name VARCHAR(255) NOT NULL
)ENGINE=MyISAM;

INSERT INTO `service_unites` (`unit_name`) VALUES ('LS');
INSERT INTO `service_unites` (`unit_name`) VALUES ('hrs');
INSERT INTO `service_unites` (`unit_name`) VALUES ('EA');
INSERT INTO `service_unites` (`unit_name`) VALUES ('sheets');
INSERT INTO `service_unites` (`unit_name`) VALUES ('files');
INSERT INTO `service_unites` (`unit_name`) VALUES ('days');
INSERT INTO `service_unites` (`unit_name`) VALUES ('weeks');
INSERT INTO `service_unites` (`unit_name`) VALUES ('months');

ALTER TABLE services ADD default_unit BIGINT UNSIGNED NOT NULL AFTER rate;

CREATE TABLE project_types (
  id SERIAL PRIMARY KEY,
  type_name VARCHAR(255) NOT NULL
);

ALTER TABLE companies ADD zip VARCHAR(30) NULL AFTER state;
select * from companies;

CREATE TABLE states (
  id SERIAL PRIMARY KEY,
  full_name VARCHAR (50) NOT NULL,
  short_name VARCHAR (10) NOT NULL
);

INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Alabama', 'AL');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Alaska', 'AK');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Arizona', 'AZ');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Arkansas', 'AR');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('California', 'CA');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Colorado', 'CO');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Connecticut', 'CT');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Delaware', 'DE');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('District of Columbia', 'DC');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Florida', 'FL');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Georgia', 'GA');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Hawaii', 'HI');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Idaho', 'ID');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Illinois', 'IL');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Indiana', 'IN');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Iowa', 'IA');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Kansas', 'KS');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Kentucky', 'KY');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Louisiana', 'LA');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Maine', 'ME');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Montana', 'MT');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Nebraska', 'NE');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Nevada', 'NV');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('New Hampshire', 'NH');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('New Jersey', 'NJ');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('New Mexico', 'NM');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('New York', 'NY');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('North Carolina', 'NC');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('North Dakota', 'ND');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Ohio', 'OH');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Oklahoma', 'OK');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Oregon', 'OR');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Maryland', 'MD');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Massachusetts', 'MA');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Michigan', 'MI');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Minnesota', 'MN');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Mississippi', 'MS');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Missouri', 'MO');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Pennsylvania', 'PA');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Rhode Island', 'RI');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('South Carolina', 'SC');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('South Dakota', 'SD');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Tennessee', 'TN');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Texas', 'TX');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Utah', 'UT');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Vermont', 'VT');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Virginia', 'VA');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Washington', 'WA');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('West Virginia', 'WV');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Wisconsin', 'WI');
INSERT INTO `states` (`full_name`, `short_name`) VALUES ('Wyoming', 'WY');

ALTER TABLE quotes ADD quote_date DATE NULL;
ALTER TABLE quotes ADD address VARCHAR(255) NULL;
ALTER TABLE quotes ADD city VARCHAR(255) NULL;
ALTER TABLE quotes ADD state VARCHAR(255) NULL;
ALTER TABLE quotes ADD zip VARCHAR(255) NULL;
ALTER TABLE quotes ADD phone_number VARCHAR(255) NULL;
ALTER TABLE quotes ADD fax VARCHAR(255) NULL;
ALTER TABLE quotes ADD mobile VARCHAR(255) NULL;
ALTER TABLE quotes ADD attn VARCHAR(255) NULL;
ALTER TABLE quotes ADD client_job_no VARCHAR(255) NULL;
ALTER TABLE quotes ADD project_type VARCHAR(255) NULL;
ALTER TABLE quotes ADD po_no VARCHAR(255) NULL;
ALTER TABLE quotes ADD hourly_basis VARCHAR(255) NULL;
ALTER TABLE quotes ADD expiration_date VARCHAR(255) NULL;

CREATE TABLE `quote_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quote_id` bigint(20) unsigned NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `scope` varchar(255) DEFAULT NULL,
  `description` text,
  `rate` decimal(8,2) DEFAULT NULL,
  `unit` VARCHAR(30) NOT NULL,
  `qty` INT NOT NULL DEFAULT 0,
  `total` decimal(8,2) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE quotes ADD revision TINYINT NOT NULL DEFAULT 0;

INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `icon`) VALUES ('project_types', 'Project Types', '13', 'icon-notebook');
INSERT INTO `quote_system_routes` (`route`, `title`, `position`, `hidden`, `icon`) VALUES ('project_types/add', 'Add Type', '14', '1', 'icon-notebook');


