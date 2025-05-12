from flask import Flask, request, jsonify
from flask_cors import CORS  # إضافة هذه السطر
import os
import cv2
import numpy as np
import base64
import tensorflow as tf
from tensorflow.keras.models import load_model


app = Flask(__name__)

# تفعيل CORS لجميع المصادر
CORS(app)

# تحميل النموذج
model = load_model('model.h5')

# أسماء الفئات
class_names = ['burj Khalifa', 'chichen itza', 'christ the reedemer', 'eiffel tower', 'great wall of china',
               'machu pichu', 'pyramids of giza', 'roman colosseum', 'statue of liberty', 'stonehenge', 'taj mahal', 'venezuela angel falls']

@app.route('/predict', methods=['POST'])
def predict():
    # التحقق من وجود الصورة في البيانات
    data = request.get_json()
    img_data = data.get('img')

    if not img_data:
        return jsonify({"error": "No image data found"}), 400

    # إزالة بيانات base64 الغير ضرورية
    img_data = img_data.split(",")[1]

    # تحويل البيانات من base64 إلى صورة
    img_bytes = base64.b64decode(img_data)
    np_img = np.frombuffer(img_bytes, dtype=np.uint8)
    img = cv2.imdecode(np_img, cv2.IMREAD_COLOR)

    # معالجة الصورة
    input_shape = model.input_shape[1:4]  # (200, 250, 3)
    img_resized = cv2.resize(img, (input_shape[1], input_shape[0]))
    img_input = np.reshape(img_resized, (1, input_shape[0], input_shape[1], input_shape[2]))

    # التنبؤ بالفئة
    predictions = model.predict(img_input)
    predicted_class = class_names[np.argmax(predictions)]

    return jsonify({"prediction": predicted_class})

if __name__ == '__main__':
    app.run(debug=True)
