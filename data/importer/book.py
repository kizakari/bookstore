import mysql.connector
import csv
import random

cnx = mysql.connector.connect(user='root', password='Dung1822011',
                              host='127.0.0.1',
                              database='BookStore')
cursor = cnx.cursor()

categoryList = ['Tiểu thuyết','Phiêu lưu','Kinh điển','Khoa học viễn tưởng','Tiểu sử và Tự truyện',
'Huyền bí và kỳ bí','Hài hước','Kinh điển Triết học','Văn hóa và Lịch sử','Tâm lý học và Tự giúp bản thân']

def escapeName(name:str) -> str:
    listIdx = []
    #Get list index need to escape
    for i in range(len(name)):
        if name[i] == '\'':
            listIdx.append(i)

    #listIdx need to be move forward because of inserting new character
    for i in range(len(listIdx)):
        listIdx[i]+=i

    for idx in listIdx:
        name = name[:idx] + '\'' + name[idx:]    

    return name

# Read CSV file
with open('../books.csv',encoding='utf-8') as csv_file:
    csv_reader = csv.DictReader(csv_file,delimiter=';')
    i = 0
    errorCount = 0
    for row in csv_reader:
        bookName = row['Book-Title']
        if '\'' in bookName:
            bookName = escapeName(bookName)
        bookName = bookName.strip()
        bookType = ['Kindle Edition','Paperback','Hardcover'][random.randint(0, 2)]
        authName = row['Book-Author']
        if '\'' in authName:
            authName = escapeName(authName)
        bookCate = categoryList[random.randint(0,len(categoryList)-1)]
        publisherName = row['Publisher']
        if '\'' in publisherName:
            publisherName = escapeName(publisherName)
        price = random.randint(20, 1000)*1000
        cvImg = row['Image-URL-L']
        bookDesc = ""
        query = "CALL add_book('{0}','{1}','{2}','{3}','{4}','{5}','{6}','{7}')".format(bookName,authName,bookType,price,cvImg,publisherName,bookDesc,bookCate)
        # print(query)
        try:
            cursor.execute(query)
            cnx.commit()
        except:
            print("Exception handling: ",query)
            errorCount+=1
            # break
    print("Error count: ",errorCount)

# query = "CALL add_book('Angels &amp; Demons','Dan Brown','Hardcover','541000','http://images.amazon.com/images/P/0743486226.01.LZZZZZZZ.jpg','Atria','','Huyền bí và kỳ bí')"
# cursor.execute(query)
# cnx.commit()
    
cursor.close()
cnx.close()