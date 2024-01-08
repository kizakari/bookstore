DROP PROCEDURE IF EXISTS add_book;
DELIMITER //
CREATE PROCEDURE add_book(IN title VARCHAR(200),IN authName VARCHAR(200),
IN bookType ENUM('Kindle Edition','Paperback','Hardcover'),IN price INT, IN cvImg VARCHAR(500),
IN publisherName VARCHAR(200), IN bookDesc TEXT,
IN bookCate ENUM('Tiểu thuyết','Phiêu lưu','Kinh điển','Khoa học viễn tưởng','Tiểu sử và Tự truyện',
'Huyền bí và kỳ bí','Hài hước','Kinh điển Triết học','Văn hóa và Lịch sử','Tâm lý học và Tự giúp bản thân'))
proc_label:BEGIN
	-- LOCAL VARIABLE DECLAREATION
    DECLARE value_count INT DEFAULT 0;
    DECLARE value_count2 INT DEFAULT 0;
    DECLARE bookId INT;
    DECLARE authId INT;
    DECLARE publisherId INT;
    DECLARE lastBookId BIGINT;
    -- Kiểm tra sách cùng TÊN & KIỂU thì signal cho backend
    
	SELECT COUNT(*) 
    INTO value_count
    FROM Book 
    WHERE BkName = title;
    IF value_count > 0 THEN
		SELECT COUNT(*)
		INTO value_count2
		FROM Book,Price
		WHERE BkType = bookType;
		IF value_count2 > 0 THEN
-- 			-- SEND SIGNAL TO APP SIDE
			SIGNAL SQLSTATE '45000'
				SET MESSAGE_TEXT = 'Sách đã có sẵn, nếu chỉnh sửa thông tin, hãy truy cập vào database';
		END IF;
    END IF;
    
    -- 3. Lấy Id của tác giả, nếu không có thì tạo tác giả mới
    SELECT AuthId 
    INTO authId
    FROM Author
    WHERE authName = Author.AuthName
    LIMIT 1;
    IF authId IS NULL THEN
		INSERT INTO Author(AuthName) VALUES (authName);
		SET authId  = LAST_INSERT_ID();
    END IF;
    
    -- 4. Lấy Id của publisher, nếu không có thì tạo publisher mới
    SELECT id 
    INTO publisherId
    FROM Publisher
    WHERE publisherName = Publisher.publisherName
    LIMIT 1;
    IF publisherId IS NULL THEN
		INSERT INTO Publisher(publisherName) VALUES (publisherName);
		SET publisherId  = LAST_INSERT_ID();
    END IF;
    
    -- 5. Thêm vào bảng Book
	INSERT INTO Book (BkDesc, BkName, BkCvImg, PbId)
	VALUES (bookDesc, title, cvImg, publisherId);
    
    SET lastBookId = LAST_INSERT_ID();
    -- 6. Thêm vào bảng Price
	INSERT INTO Price (BkType, BkId, BkPrice)
	VALUES (bookType, lastBookId, price);
    
    -- 7. Thêm vào bảng BookAuthor
    INSERT INTO BookAuthor(BookId,AuthId)
    VALUES (lastBookId,authId);
    
    -- 8. Thêm vào bảng BkCategory
    INSERT INTO BkCategory(BkCategory,BkId)
    VALUES (bookCate,lastBookId);
    
END //
DELIMITER ;