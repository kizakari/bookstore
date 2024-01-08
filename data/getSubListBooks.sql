DROP PROCEDURE IF EXISTS getSubListBooks;
DELIMITER //
CREATE PROCEDURE getSubListBooks(
IN bookCate ENUM('Tiểu thuyết','Phiêu lưu','Kinh điển','Khoa học viễn tưởng','Tiểu sử và Tự truyện',
'Huyền bí và kỳ bí','Hài hước','Kinh điển Triết học','Văn hóa và Lịch sử','Tâm lý học và Tự giúp bản thân'),
IN idx INT,IN num INT)
BEGIN
	SELECT Book.BkId,Book.BkName,Book.BkCvImg
    FROM Book, BkCategory
    WHERE Book.BkId = BkCategory.BkId
    LIMIT idx,num;
END //
DELIMITER ;