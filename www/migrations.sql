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


