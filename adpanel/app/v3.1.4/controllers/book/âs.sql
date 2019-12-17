CREATE DEFINER=`binhivuc`@`%` PROCEDURE `book_update`(
IN _id INT(11),
IN _name VARCHAR(256),
IN _des TEXT,
IN _content TEXT,
IN _image VARCHAR(512),
IN _path VARCHAR(512),
IN _total_book int(11),
IN _tag VARCHAR(512),
IN _free TINYINT,
IN _price DECIMAL(10),
IN _author varchar(64),
IN _nxb VARCHAR(64),
IN _status TINYINT,
IN _user_id int(11)
)
BEGIN
UPDATE binhivuc_ci2019.`book` a
SET a.`b_name` = _name,
a.`b_des` = _des,
a.`b_content` = _content,
a.`b_image` = _image,
a.`b_path_file` = _path,
a.`b_total_book` = _total_book,
a.`b_tag` = _tag,
a.`b_free` = _free,
a.`b_price` = _price,
a.`b_author` = _author,
a.`b_nxb` = _nxb,
a.`b_status` = _status,
a.`b_update_date` = CURRENT_TIME
WHERE a.`b_id` = _id LIMIT 1;

COMMIT;
END