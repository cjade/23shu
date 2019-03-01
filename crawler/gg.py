import db
import pymysql


class Test(db.Model):
    def tableName(self):
        return '23_test'


my_db = pymysql.connect(
    host='127.0.0.1',
    user='jade',
    password='666666',
    database='23shu'
)

t = Test(my_db)


t.save()

print(t.all())
