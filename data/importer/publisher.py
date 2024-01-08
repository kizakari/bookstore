import mysql.connector
import csv

#Read CSV file
publisherList = []
with open('../books.csv',encoding='utf-8') as csv_file:
    csv_reader = csv.DictReader(csv_file,delimiter=';')
    i = 0
    for row in csv_reader:
        publisherList.append(row['Publisher'])

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

for index in range(len(publisherList)):
    if '\'' in publisherList[index]:
        publisherList[index] = escapeName(publisherList[index])

    publisherList[index] = publisherList[index].strip()
publisherList= list(set(publisherList))
# Get only distingushed author

cnx = mysql.connector.connect(user='root', password='Dung1822011',
                              host='127.0.0.1',
                              database='BookStore')

cursor = cnx.cursor()

ori_query = "INSERT INTO Publisher(publisherName) VALUES"
query = ori_query
for index, publisher in enumerate(publisherList):
    query+="('"+publisher+"'),"
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