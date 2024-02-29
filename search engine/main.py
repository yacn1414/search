from pyrogram import Client
import time
import os

api_id = 1111
api_hash = "***"
while True:
    try:
        for x in os.listdir('../searchs/'):
            lis=x.split(' ')
            if lis[1] == '0':
                ip=x.split(' ')[0]
                path2 = '../searchs/'+ip+' 1'
                path3 = '../searchs/'+ip+' 2'
                os.remove(path2)
                os.remove(path3)
                fo = open(path2,'w+')
                fop = open(path3,'w+')
                path= '../searchs/' + x
                po = open(path)
                resualt = po.read()
                os.remove(path)
                with Client("bot", api_id, api_hash) as app:

                    num=0
                    for message in app.search_global(query=resualt,filter="document", limit=15):
                        message.forward('@FileStreamingBot')
                        num=num+1
                        time.sleep(2)
                    for message in app.search_messages(chat_id='@FileStreamingBot',filter='url',limit=num):
                        
                        pop =str(message.text +' 123'+ '\n')
                        fo.write(pop)
                        print('save link: '+ resualt)
                    for message in app.search_messages(chat_id='@FileStreamingBot',filter='description',limit=num):
                        
                        pop1 =str(message.text +' 123'+ '\n')
                        fop.write(pop1)
                        print('save description: '+ resualt)
                    
                    num=0
                    fo.close()
                    fop.close()
                    
            else:
                while True:
                    if lis[0] != lis[0]:
                        continue
                    else:
                        break
                        
    except Exception as e:
        print(e.args)
        print(effrsth)
        continue
