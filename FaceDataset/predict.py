#!C:\Users\acer\AppData\Local\Programs\Python\Python36\python.exe

print("Content-Type: text/html\n")
from numpy import load

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
	# load image from file
	image = Image.open(filename)
	# convert to RGB, if needed
	image = image.convert('RGB')
	# convert to array
	pixels = asarray(image)
	# create the detector, using default weights
	detector = MTCNN()
	# detect faces in the image
	results = detector.detect_faces(pixels)
	# extract the bounding box from the first face
	x1, y1, width, height = results[0]['box']
	# bug fix
	x1, y1 = abs(x1), abs(y1)
	x2, y2 = x1 + width, y1 + height
	# extract the face
	face = pixels[y1:y2, x1:x2]
	# resize pixels to the model size
	image = Image.fromarray(face)
	image = image.resize(required_size)
	face_array = asarray(image)
	return face_array

def get_embedding(model, face_pixels):
	# scale pixel values
	face_pixels = face_pixels.astype('float32')
	# standardize pixel values across channels (global)
	mean, std = face_pixels.mean(), face_pixels.std()
	face_pixels = (face_pixels - mean) / std
	# transform face into one sample
	samples = expand_dims(face_pixels, axis=0)
	# make prediction to get embedding
	yhat = model.predict(samples)
	return yhat[0]


facenet= load_model('facenet_keras.h5')
loaded_model=pickle.load(open('finalized_model.sav', 'rb'))


path=os.environ['QUERY_STRING']


query_dict = urllib.parse.parse_qs(os.environ['QUERY_STRING'])
#n= input("Enter image path:")
out_encoder = LabelEncoder()

data = load('5-celebrity-faces-embeddings.npz')
trainX, trainy, testX, testy = data['arr_0'], data['arr_1'], data['arr_2'], data['arr_3']
out_encoder.fit(trainy)
def predict(n):
    face=extract_face(n)
    em= get_embedding(facenet, face)
    em=em.reshape(1, -1)
    name = loaded_model.predict(em)
    return name

n= str(query_dict['path'])[2:-2]


print(out_encoder.inverse_transform(predict(n))[0])

