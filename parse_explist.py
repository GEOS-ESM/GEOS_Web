import datetime
import sqlite3

listfile='intranet_list'

data=[]
with open(listfile) as fp:
    for line in fp:
        if line.strip():
            expid = line.split('</td>')[0].split('</B>')[0].split('<B>')[1].strip()
            userid = line.split('</td>')[1].split('</font>')[0].split('>')[-1].strip()
            resolution = line.split('</td>')[2].split('>')[-2].split('<')[0].strip()
            if not resolution:
                resolution = line.split('</td>')[2].split('>')[-1].split('<')[0].strip()
            datestr = line.split('</td>')[3].split('>')[-1].strip()
            date = datetime.datetime.strptime(datestr, "%m/%d/%Y").date()            
            cmpid = line.split('</td>')[4].split('</B>')[0].split('<B>')[1].strip()
            description = line.split('</td>')[5].split('>')[1].strip()

            data.append({'ExpID': expid, 'UserID': userid, 'Resolution': resolution,
                               'Date': date, 'CmpID': cmpid, 'Description': description})


        
# Connect to the SQLite database (or create it if it doesn't exist)
conn = sqlite3.connect('experiments.db')
c = conn.cursor()

# Create the table if it doesn't exist
#c.execute('''CREATE TABLE IF NOT EXISTS experiments
#             (id INTEGER PRIMARY KEY AUTOINCREMENT, ExpID TEXT UNIQUE, UserID TEXT, Resolution TEXT, Date DATE, CmpID TEXT, Description TEXT)''')

c.execute('''CREATE TABLE IF NOT EXISTS experiments
             (ExpID TEXT UNIQUE, UserID TEXT, Resolution TEXT, Date DATE, CmpID TEXT, Description TEXT)''')


for row in data:
    try:
        c.execute("INSERT INTO experiments (ExpID, UserID, Resolution, Date, CmpID, Description) VALUES (?, ?, ?, ?, ?, ?)",
                  (row['ExpID'], row['UserID'], row['Resolution'], row['Date'], row['CmpID'], row['Description']))
    except sqlite3.IntegrityError:
        print(f"Skipping duplicate ExpID: {row['ExpID']} {row['UserID']} {row['Date']}")

# Commit the changes and close the connection
conn.commit()
conn.close()


