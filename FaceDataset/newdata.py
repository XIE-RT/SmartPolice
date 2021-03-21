#!C:\Users\acer\AppData\Local\Programs\Python\Python36\python.exe

print("Content-Type: text/html\n")
from numpy import load
import numpy as np
from numpy import expand_dims
from numpy import asarray
from numpy import savez_compressed
from keras.models import load_model
from os import listdir
import os
import urllib.parse
from os.path import isdir
from PIL import Image

from numpy import savez_compressed

from numpy import asarray
from mtcnn.mtcnn import MTCNN
from numpy import expand_dims
from sklearn.preprocessing import LabelEncoder
from sklearn.preprocessing import Normalizer
from sklearn.svm import SVC
import pickle


def extract_face(filename, required_size=(160, 160)):
	image = Image.open(filename)
	image = image.convert('RGB')
	pixels = asarray(image)
	detector = MTCNN()
	results = detector.detect_faces(pixels)
	x1, y1, width, height = results[0]['box']
	x1, y1 = abs(x1), abs(y1)
	x2, y2 = x1 + width, y1 + height
	face = pixels[y1:y2, x1:x2]
	image = Image.fromarray(face)
	image = image.resize(required_size)
	face_array = asarray(image)
	return face_array


data = load('5-celebrity-faces-dataset.npz')
train_X, train_y, test_X, test_y = data['arr_0'], data['arr_1'], data['arr_2'], data['arr_3']

print(train_X.shape)


image='dataset/tejas_anchan/5.png'
image2='dataset/tejas_anchan/6.png'
a=extract_face(image)
b=extract_face(image2)
a=list(a)
X=list()
print(X)
X.extend(a)
print(X)

a=a.reshape(1,160,160,3)


#train_X=np.concatenate((train_X,a))




def createnew(folder):
    X=list()
    y=list()
    for filename in os.listdir(folder):
        image=folder+filename
        label=image.split('/')[-2]
        print(image)
        #print(subdir(image))
        a=extract_face(image)
        a=a.reshape(1,160,160,3)
        
        
        train_X=np.concatenate((train_X,a))
        train_y=np.concatenate((train_y,label))
 
        
'''        
path='dataset/tejas_anchan/'
X,y=createnew(path)
print(X)
'''
print("HI")
