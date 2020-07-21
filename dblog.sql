CREATE TABLE `db_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `biz_tag` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '业务标签',
  `action_tag` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '操作标签',
  `operator` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '操作人',
  `track_key` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '追踪标签',
  `log_content` json NOT NULL COMMENT '日志内容',
  `created_at` datetime NOT NULL COMMENT '创建时间format:yyyy-mm-dd HH:ii:ss',
  `created_date` datetime NOT NULL COMMENT '创建日期format:yyy-mm-dd',
  PRIMARY KEY (`id`),
  KEY `idx_big` (`biz_tag`),
  KEY `idx_action` (`action_tag`),
  KEY `idx_operator` (`operator`),
  KEY `idx_track` (`track_key`),
  KEY `idx_date` (`created_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;