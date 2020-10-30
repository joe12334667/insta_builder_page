# -*- coding: utf-8 -*-
from instaloader import Instaloader, Profile 
import pymysql.cursors
import time
import datetime
from datetime import timedelta  

def downloadPostFromUser(post_user , time):
    print("connect...") 
    #connection = pymysql.connect("140.131.114.143","root","superman12334667","instabuilder" ,  charset='utf8mb4' )
    connection = pymysql.connect("instabuilderdb.cmjbghjyygh8.ap-northeast-1.rds.amazonaws.com","root","superman12334667","instabuilder" ,  charset='utf8mb4' )

    print("connect success")
    i = 0
    l = Instaloader(quiet=True, compress_json=False , max_connection_attempts = 10)

    profile = Profile.from_username(l.context , post_user)
    posts = profile.get_posts()
    for post in posts :
        i+=1
        if i> int(time) : break
        print("time :" , i)
        #print("mediaid :" , post.mediaid)
        #print("caption :" , post.caption)
        #print("likes :" , post.likes )
        #print("pcaption :" , post.pcaption)
        #print("caption_hashtags :" , post.caption_hashtags)
        ##案讚的帳號
        #for like in post.get_likes():
        #    print("get_likes :" , like )
        #for comment in post.get_comments():
        #    print("comments :")
        #    print(comment.owner.username  , " : " , comment.text)
    
        insta_post_id = post.mediaid

        try:

            with connection.cursor() as cursor:
                #POST資料表有沒有這筆資料
                sql = "SELECT update_time FROM instabuilder.post where insta_post_id = %s"
                cursor.execute(sql , insta_post_id)
                connection.commit()
                update_time = cursor.fetchone()
                
                #為空值，找不到這筆POST紀錄
                if(not  update_time):
                    #會員有沒有這帳號
                    sql = "SELECT account_id FROM instabuilder.instaaccount where account_name = %s;"                
                    cursor.execute(sql , (post_user))
                    connection.commit()
                    data = cursor.fetchall()
                    if(data):
                        account_id = data[0]
                        is_member = True
                    else:
                        is_member = False
                        #沒有帳號 搜尋非會員帳號表有沒有
                        sql = "SELECT nAccount_id FROM instabuilder.nonmemberinstaacc where nAccount_name = %s ;"                
                        cursor.execute(sql , (post_user))
                        connection.commit()
                        data = cursor.fetchall()
                        if(data):
                            account_id = data[0]
                        else:
                            #新增至非會員帳號表 並取得id
                            sql = "insert into nonmemberinstaacc (nAccount_name)value ( %s);"
                            cursor.execute(sql , (post_user))
                            connection.commit()
                            #得到新增的nAccount_id
                            sql = "SELECT LAST_INSERT_ID() as id;"
                            cursor.execute(sql )
                            connection.commit()
                            data = cursor.fetchall()
                            account_id = data[0]
                       
                
                    print("新增一筆POST")
                    sql = "insert into post (insta_post_id, content , announcer_id , announce_time ,update_time) value (%s , %s , %s , %s , now())"
                    cursor.execute(sql, (insta_post_id , post.caption , 3 ,  post.date_local ))
                    connection.commit()

                    sql = "SELECT post_no FROM instabuilder.post where insta_post_id = %s;"
                    cursor.execute(sql , (insta_post_id))
                    connection.commit()
                    #有沒有新增到資料庫
                    data = cursor.fetchall()
                    if( not data):

                        print("新增失敗 insta_post_id :" , insta_post_id)

                    else :

                        print("成功新增 insta_post_id :" , insta_post_id)
                else:

                    if(update_time[0] is None):
                        print("更新貼文")
                    else:
                        update_day = datetime.datetime.today() - update_time[0]
                        if(update_day.days <= 1):
                            print(i ," 一天內更新過 insta_post_id = " ,insta_post_id,"，跳至下一篇" )
                            continue
                        else:
                            print("更新貼文")


                    #更新 post / update_time 

                    sql = "SET SQL_SAFE_UPDATES = 0;" 
                    cursor.execute(sql )
                    sql = "update post set update_time = now() where insta_post_id = %s;"

                    cursor.execute(sql , (insta_post_id))
                    connection.commit()

                    #已有這篇POST
                    #搜尋會員/非會員帳號表確認account_id
                    sql = "SELECT account_id FROM instabuilder.instaaccount where account_name = %s;"                
                    cursor.execute(sql , (post_user))
                    connection.commit()
                    data = cursor.fetchall()
                    if(data):
                        account_id = data[0]
                        is_member = True
                    else:
                        is_member = False
                        sql = "SELECT nAccount_id FROM instabuilder.nonmemberinstaacc where nAccount_name = %s;"     
                        cursor.execute(sql , (post_user))
                        connection.commit()
                        data = cursor.fetchall()
                        account_id = data[0]


                #得到新增/之前新增的post_no
                sql = "SELECT post_no FROM instabuilder.post where insta_post_id = %s;"
                cursor.execute(sql , (insta_post_id))
            
                data = cursor.fetchone()
                post_no = data[0]
                print("post_no :" ,post_no)


#---------------新增user_post or nonmemberPost-------------------------------------

                if(is_member):
                    sql = 'SELECT * FROM instabuilder.userpost where account_id = %s and post_no = %s;'
                    cursor.execute(sql , (account_id , post_no))
                    connection.commit()
                    
                    if(not cursor.fetchone()):
                        print("新增進userpost")
                        sql = "insert into instabuilder.userpost (account_id, post_no) value(%s , %s);"
                        cursor.execute(sql , (account_id , post_no))
                        connection.commit()
                else:
                    sql = 'SELECT * FROM instabuilder.nonmemberpost where account_id = %s and post_no = %s;'
                    cursor.execute(sql , (account_id , post_no))
                    connection.commit()

                    if(not cursor.fetchone()[0]):
                        print("新增進nonmemberpost")
                        sql = "insert into nonmemberpost (nAccount_id , post_no) value (%s , %s);"
                        cursor.execute(sql , (account_id , post_no))
                        connection.commit()


#---------------新增 like record----------------------------------------------------------------
                print("新增 like record")
                print("person who like this post :")
                post_liker = set()
                for likes_profile in post.get_likes():  
                    print( likes_profile.username ,end = " , ")
                    post_liker.add(likes_profile.username)

                    
                #確認資料庫全部案讚的人
                sql = "SELECT like_account FROM instabuilder.like where post_no = %s ;"
                cursor.execute(sql, (post_no))
                like_data = cursor.fetchall()
                db_liker = set()
                for person in like_data:
                    db_liker.add(person[0])

                #將兩個set相減，取出剩下未放入資料庫的人
                for insert_liker in (post_liker - db_liker):
                    sql = "insert into instabuilder.like ( post_no, like_account , like_time) value ( %s , %s , %s);"
                    cursor.execute(sql, (post_no ,insert_liker , datetime.datetime.now() ))
                    connection.commit()
                        
#---------------新增 comment record-----------------------------------------------------------
                print("\n新增 comment record")
                print("person who comment this post :" )
                for comment in post.get_comments():
                    print( comment.owner.username  , "comment text : ", comment.text , end = " , ")
                        
                    #確認有沒有新增過
                    sql = "SELECT post_no FROM instabuilder.comment where post_no = %s and comment_account = %s and content = %s;"
                    cursor.execute(sql, (post_no , comment.owner.username , comment.text))
                    comment_data = cursor.fetchall()
                    if( not comment_data):
                        #資料庫無此comment
                        sql = "insert into comment (post_no, comment_account, content ,  comment_time) value (%s , %s , %s , %s)"
                        cursor.execute(sql, (post_no ,comment.owner.username , comment.text , comment.created_at_utc + datetime.timedelta(hours=8) ))
                        connection.commit()
                    
                    for ans in comment.answers:
                        sql = "SELECT post_no FROM instabuilder.comment where post_no = %s and comment_account = %s and content = %s;"
                        cursor.execute(sql, (post_no , ans.owner.username , ans.text))
                        comment_data = cursor.fetchall()
                        if( not comment_data):
                            #資料庫無此comment
                            sql = "insert into comment (post_no, comment_account, content ,  comment_time) value (%s , %s , %s , %s)"
                            cursor.execute(sql, (post_no ,ans.owner.username , ans.text , ans.created_at_utc + datetime.timedelta(hours=8) ))
                            connection.commit()
                    

#---------------新增hashtags-----------------------------------------------------------------
                print("新增hashtags")
                print("hashtag which in caption without # ")
                for hashtag in post.caption_hashtags:
                    print(hashtag , end = " , ")
                        
                    #確認有沒有新增過在hashtagCates
                    sql = "SELECT hashtag_no FROM instabuilder.hashtagcates where hashtag = %s ;"
                    cursor.execute(sql, (hashtag))
                    hashtag_data = cursor.fetchall()
                    if( not hashtag_data):
                        #資料庫無此HASHTAG
                        sql = "insert into hashtagcates (hashtag , stage ) value (%s , %s);"
                        cursor.execute(sql, (hashtag , 0))
                        
                    connection.commit()

                    #獲取hashtag_no 來 insert to hashpost
                    sql = "SELECT hashtag_no FROM instabuilder.hashtagcates where hashtag = %s ;"
                    cursor.execute(sql, (hashtag))
                    hashtag_data = cursor.fetchall()
                    hashtag_no = hashtag_data[0]
                        
                    #確認有沒有新增過
                    sql = "SELECT no FROM instabuilder.hashpost where post_no = %s and hashtag_no = %s ;"
                    cursor.execute(sql, (post_no , hashtag_no))
                    hashtag_data = cursor.fetchall()
                    if( not hashtag_data):
                        #資料庫無此HASHTAG    
                        sql = "insert into instabuilder.hashpost (post_no, hashtag_no) value  (%s,%s);"
                        cursor.execute(sql, ( post_no , hashtag_no))
                        connection.commit()

                    connection.commit()
        except Exception as e :
            print(e)
            #connection.close()
        finally:
            print("結束一筆")

    connection.close()



def downloadPofileFromUser():
    print("connect...") 
    #connection = pymysql.connect("140.131.114.143","root","superman12334667","instabuilder" ,  charset='utf8mb4' )
    connection = pymysql.connect("instabuilderdb.cmjbghjyygh8.ap-northeast-1.rds.amazonaws.com","root","superman12334667","instabuilder" ,  charset='utf8mb4' )

    print("connect success")
    l = Instaloader(quiet=True, compress_json=False , max_connection_attempts = 10)

    

    with connection.cursor() as cursor:

        sql = "SELECT account_name FROM instabuilder.instaaccount;"
        cursor.execute(sql )
        connection.commit()
        ig_account_data = cursor.fetchall()
        if(ig_account_data):
            for account in  ig_account_data:    
                print(account[0])
                profile = Profile.from_username(l.context , account[0])
                sql = "insert into instabuilder.instaaccountfollower (account_id, fans_amount, following_amount, post_amount, record_time) value ((SELECT account_id FROM instabuilder.instaaccount where account_name = %s), %s ,%s ,%s  , now() );"
                cursor.execute(sql , (account[0] ,profile.followers , profile.followees , profile.mediacount))
                connection.commit()
    
    connection.close()














