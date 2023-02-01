import pandas as pd
import matplotlib.pylab as plt
import numpy as np
from sklearn.preprocessing import MinMaxScaler
from keras.callbacks import ModelCheckpoint
from tensorflow.keras.models import load_model

import datetime

df = pd.read_csv('[filecsv]')

#df['ngay'] = pd.to_datetime(df.ngày, format="%d/%m/%Y")
dfl = pd.DataFrame(df,columns=['ngay', 'dongcua'])
dfl.index = dfl.ngày
dfl.drop("ngay", axis=1, inplace=True)
sc = MinMaxScaler(feature_range=(0,1))
final_model = load_model('save_model.hdf5')
data = dfl.values

train_data = data[:[train]]

i=1
date = datetime.datetime([year], [month], [date]) + datetime.timedelta(days=1)
while(i<[date_predict]):
  test = dfl[len(train_data)-200:].values
  test = test.reshape(-1, 1)
  sc_test = sc.fit_transform(test)
  x_test = []
  for y in range(200, test.shape[0]):
    x_test.append(sc_test[y-200:y, 0])
  x_test = np.array(x_test)
  x_test = np.reshape(x_test, (x_test.shape[0], x_test.shape[1], 1))
  y_test_predict = final_model.predict(x_test)
  date = date + datetime.timedelta(days=1)
  y_test_predict = sc.inverse_transform(y_test_predict)
  dfl.loc[date, 'dongcua'] = y_test_predict[len(y_test_predict)-1]
  i = i+1

dfl.to_csv('dudoan.csv')
