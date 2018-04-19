#Importing Required Libraries
import sys
import mysql.connector

#creating dictionary
letterChart = {}

#establishing connection with mySQL database and running query
cnx = mysql.connector.connect(user="root", password="root", host="localhost", database="letter_chart")
cursor = cnx.cursor()

query = "SELECT * FROM chart"

cursor.execute(query)

#filling dictionary with query results
for(letter, number) in cursor:
    letterChart[number] = letter

#closing connection
cursor.close()
cnx.close()

#creating a length variable for use in the future
chartLen = len(letterChart)

#parsing command line args
which = sys.argv[1]
wordp = sys.argv[2]

#Defining the encrypt function
def encrypt(word):
    output = ""
    i = 1
    #filling output
    while i <= len(word):

        ori_num = list(letterChart.keys())[list(letterChart.values()).index(word[i - 1])]
        if (ori_num + i) % chartLen == 0:
            output += letterChart.get(chartLen)
        else:
            output += letterChart.get((ori_num + i) % chartLen)
        i += 1
    #returning output
    sys.exit(output)

#defining the decrypt function
def decrypt(word):
    output = ""
    i = 1
    #filling output
    while i <= len(word):
        ori_num = list(letterChart.keys())[list(letterChart.values()).index(word[i - 1])]
        if ori_num - i == 0:
            output += letterChart.get(chartLen)
        elif ori_num - i < 0:
            output += letterChart.get((ori_num - i + chartLen) % chartLen)
        else:
            output += letterChart.get((ori_num - i) % chartLen)
        i += 1
    #returning output
    sys.exit(output)

#deciding which function to call
if which == "encrypt":
    encrypt(wordp)
elif which == "decrypt":
    decrypt(wordp)
#if the arguments are invalid...
else:
    sys.exit("invalid arguments")
