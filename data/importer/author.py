"""
Đây là một script nhỏ dùng để đưa dữ liệu của tác giả vào database với mục tiêu
Tên của tác giả có format nhất quán
"""

import mysql.connector
import csv

#Read CSV file
authorList = []
#Get all authors
with open('../books.csv',encoding='utf-8') as csv_file:
    csv_reader = csv.DictReader(csv_file,delimiter=';')
    for row in csv_reader:
        authorList.append(row['Book-Author'])

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

#Xử lý tên 
#Nếu có dấu NHÁY ĐƠN ở tên thì ESCAPE trước khi chuyển cho database
for index in range(len(authorList)):
    if '\'' in authorList[index]:
        authorList[index] = escapeName(authorList[index])

    authorList[index] = authorList[index].strip()

authorList = list(set(authorList))

# Get only distingushed author
cnx = mysql.connector.connect(user='root', password='Dung1822011',
                              host='127.0.0.1',
                              database='BookStore')

cursor = cnx.cursor()
ori_query = "INSERT INTO Author(AuthName) VALUES"
query = ori_query
for index,author in enumerate(authorList):
    query+="('"+author+"'),"
    if index % 10 == 0:
        try:
            query = query[:-1]
            cursor.execute(query)
            cnx.commit()
        except:
            print("Exception handling: ",query)
            break
        query = ori_query
    
cursor.close()
cnx.close()