#!C:\Users\acer\AppData\Local\Programs\Python\Python36\python.exe

print("Content-Type: text/html\n")

import os
import urllib.parse
import cv2
import numpy as np
import time


def create(n):
    cap = cv2.VideoCapture(0)
    
    directory = "{}".format(n)
  
    parent_dir = "C:/xampp/htdocs/policeproj/FaceDataset/dataset/"
    path = os.path.join(parent_dir, directory)  
    
    os.mkdir(path) 
    print(n)
    i=0
    k=0
    while i!=20:
        ret,img = cap.read()
        #img1 = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY )
        _,img1=cap.read()
        img = cv2.rectangle(img, (230,30), (500,320), (255,0,0), 2) 
        cv2.imshow('a',img)
        if cv2.waitKey(1) & 0xFF == ord('y'):
            k=1
        if k==1:
            k=1 
            imgname='dataset/{}/{}.png'.format(n,i)
            img1 = img1[30:30+300,230:230+270]
            cv2.imwrite(imgname,img1)
            print(i)
            i=i+1

            
        if cv2.waitKey(1) & 0xFF == ord('q'):
            break
        
        time.sleep(0.5)
    cap.release()
    cv2.destroyAllWindows()
print("H")
#query_dict = urllib.parse.parse_qs(os.environ['QUERY_STRING'])
#n= str(query_dict['name'])[2:-2]
n=input()
create(n)
print(n)







